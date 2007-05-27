
are_all_collapsed = new Array()
is_collapsed = new Array()

tree_toggle_expand_all = function(id, sub) {
	if( are_all_collapsed[id] == 1 ) {
		are_all_collapsed[id] = 0;
		for( i = 0; i < sub; i++) {
			is_collapsed[id+'_'+i] = 1;
			document.getElementById('utils_tree_'+id+'_'+i).style.display = "block";
			document.getElementById('utils_tree_opener_img_'+id+'_'+i).src = "modules/Utils/Tree/theme/opener_active_open.gif";
		}
		document.getElementById('tree_expand_all_'+id).innerHTML = 'Collapse All';
	} else {
		are_all_collapsed[id] = 1;
		for( i = 0; i < sub; i++) {
			is_collapsed[id+'_'+i] = 0;
			document.getElementById('utils_tree_'+id+'_'+i).style.display = "none";
			document.getElementById('utils_tree_opener_img_'+id+'_'+i).src = "modules/Utils/Tree/theme/opener_active_closed.gif";
		}
		document.getElementById('tree_expand_all_'+id).innerHTML = 'Expand All';
	}
}

tree_node_visibility_toggle = function( id ) {
	if( is_collapsed[id] == 0 ) {
		is_collapsed[id] = 1;
		document.getElementById('utils_tree_'+id).style.display = "block";
		document.getElementById('utils_tree_opener_img_'+id).src = "modules/Utils/Tree/theme/opener_active_open.gif";
	} else {
		is_collapsed[id] = 0;
		document.getElementById('utils_tree_'+id).style.display = "none";
		document.getElementById('utils_tree_opener_img_'+id).src = "modules/Utils/Tree/theme/opener_active_closed.gif";
	}
}
