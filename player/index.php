<?php
include('config/config.php');
include('system/mpd_class.php');
include('system/helper.php');

//$mpd = new mpd($mpd_host,$mpd_port,$mpd_password);
$mpd = new mpd($mpd_host,$mpd_port);
if($mpd->connected != 1){
	echo "Not Connected to Server";
	exit(1);
}

$view=$_GET['view'];
$task=$_GET['task'];

switch($view) {

	case "edit_playlist":
		include('view/playlist/view.php');
		break;

	default:
		include('view/default/view.php');
		break;
}

?>
