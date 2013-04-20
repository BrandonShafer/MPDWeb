<?php

function cut_file($str) {
	$result=array();
	$result=preg_split("/\//",$str);
        //print_r($result);
	return $result[count($result)-1];
}


function cut_lastDir($str) {
        $result=array();
        $result=preg_split("/\//",$str);
	//print_r($result);
        return $result[count($result)-1];
}


function cut_firstDir($str) {
        $result=array();
        preg_match("/([^\/]+)\//",$str,$result);

	//print_r($result);
        return $result[1];
}

?>
