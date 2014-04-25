<?php
require_once 'include.php';

class DependencyTest extends PHPUnit_Framework_TestCase
{
    public function testConstructorSetsProperSettings()
    {
        require_once 'include/module_dependency.php';

        // We have a problem, the constructor is private!
        $params = array (
            'moduleName' => 'Foo_Bar',
            'minVersion' => 0,
            'maxVersion' => 1,
            'maxOk' => true,
        );
        // We use a static method for this test
        $dependency = Dependency::requires_range(
            $params['moduleName'],
            $params['minVersion'],
            $params['maxVersion'],
            $params['maxOk']
        );

        // We use reflection to see if properties are set correctly
        $reflectionClass = new ReflectionClass('Dependency');

// Let's retrieve the private properties
$moduleName = $reflectionClass->getProperty('module_name');
$moduleName->setAccessible(true);
$minVersion = $reflectionClass->getProperty('version_min');
$minVersion->setAccessible(true);
$maxVersion = $reflectionClass->getProperty('version_max');
$maxVersion->setAccessible(true);
$maxOk = $reflectionClass->getProperty('compare_max');
$maxOk->setAccessible(true);

// Let's assert
$this->assertEquals($params['moduleName'], $moduleName->getValue($dependency),
    'Expected value does not match the value set');
$this->assertEquals($params['minVersion'], $minVersion->getValue($dependency),
    'Expected value does not match the value set');
$this->assertEquals($params['maxVersion'], $maxVersion->getValue($dependency),
    'Expected value does not match the value set');
$this->assertEquals('<=', $maxOk->getValue($dependency),
    'Expected value does not match the value set');
    }
}