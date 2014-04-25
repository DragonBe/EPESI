<?php

require_once 'include.php';

class ModuleManagerTest extends PHPUnit_Framework_TestCase
{
    protected function tearDown()
    {
        ModuleManager::$modules_install = array ();
    }

    public function testReturnImmediatelyWhenModuleAlreadyLoaded()
    {
        $module = 'Foo_Bar';
        ModuleManager::$modules_install[$module] = 1;
        $result = ModuleManager::include_install($module);
        $this->assertTrue($result,
            'Expecting that an already installed module returns true');
        $this->assertCount(1, ModuleManager::$modules_install,
            'Expecting to find 1 module ready for installation');
    }

    public function testLoadingNonExistingModuleIsNotExecuted()
    {
        $module = 'Foo_Bar';
        $result = ModuleManager::include_install($module);
        $this->assertFalse($result, 'Expecting failure for loading Foo_Bar');
        $this->assertEmpty(ModuleManager::$modules_install,
            'Expecting to find no modules ready for installation');
    }

public function testNoInstallationOfModuleWithoutInstallationClass()
{
    $module = 'EssClient_IClient';
    $result = ModuleManager::include_install($module);
    $this->assertFalse($result, 'Expecting failure for loading Foo_Bar');
    $this->assertEmpty(ModuleManager::$modules_install,
        'Expecting to find no modules ready for installation');
}

    public function testIncludeClassFileForLoadingModule()
    {
        $module = 'Base_About';
        $result = ModuleManager::include_install($module);
        $this->assertTrue($result, 'Expected module to be loaded');
        $this->assertCount(1, ModuleManager::$modules_install,
            'Expecting to find 1 module ready for installation');
    }
}