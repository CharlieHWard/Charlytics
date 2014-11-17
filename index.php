<?php
    # include the API
    include('../../../core/inc/api.php');
    
    $API  = new PerchAPI(1.0, 'Charlytics');
    $Lang = $API->get('Lang');
	$Settings = $API->get('Settings');

    # include your class files

    # Set the page title
    $Perch->page_title = $Lang->get('Charlytics');

    # Do anything you want to do before output is started
	include('modes/analytics.pre.php');
    
    # Top layout
    include(PERCH_CORE . '/inc/top.php');

    
    # Display your page
    include('modes/analytics.post.php');
    
    
    # Bottom layout
    include(PERCH_CORE . '/inc/btm.php');
?>
