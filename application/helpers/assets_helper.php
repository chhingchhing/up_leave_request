<?php
function get_css_files()
{
	return array(
		array('path' =>'assets/css/bootstrap.min.css', 'media' => 'all'),
		array('path' =>'css/plugins/morris/morris-0.4.3.min.css', 'media' => 'all'),
		array('path' =>'css/plugins/timeline/timeline.css', 'media' => 'all'),
		array('path' =>'assets/font-awesome/css/font-awesome.css', 'media' => 'all'),
		array('path' =>'css/plugins/dataTables/dataTables.bootstrap.css', 'media' => 'all'),
		array('path' =>'css/plugins/social-buttons/social-buttons.css', 'media' => 'all'),
		// array('path' =>'css/login.css', 'media' => 'all'),
		array('path' =>'css/admin.css', 'media' => 'all'),
		array('path' =>'css/sb-admin.css', 'media' => 'all'),
	);
}

function get_js_files()
{
	return array(
		array('path' =>'js/jquery-1.10.2.js'),
		array('path' =>'assets/js/bootstrap.min.js'),
		array('path' =>'js/plugins/metisMenus/jquery.metisMenu.js'),
		array('path' =>'js/plugins/morris/raphael-2.1.0.min.js'),
		array('path' =>'js/plugins/morris/morris.js'),
		array('path' =>'js/plugins/dataTables/jquery.dataTables.js'),
		array('path' =>'js/plugins/dataTables/dataTables.bootstrap.js'),

		array('path' =>'js/plugins/flot/jquery.flot.tooltip.min.js'),
		array('path' =>'js/plugins/flot/excanvas.min.js'),
		array('path' =>'js/plugins/flot/jquery.flot.js'),
		array('path' =>'js/plugins/flot/jquery.flot.pie.js'),
		array('path' =>'js/plugins/flot/jquery.flot.resize.js'),
		array('path' =>'js/action/dashboard-action.js'),
		array('path' =>'js/action/flot-action.js'),
		array('path' =>'js/action/morris-action.js'),

		array('path' =>'js/admin.js'),
		array('path' =>'js/sb-admin.js'),
	);
}
?>