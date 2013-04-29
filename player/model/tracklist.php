<?php

function addDir($item,$mpd) {
	$opendirs[] = $item;
      	$count=0;
      	while($count != count($opendirs)){
        	$current = $opendirs[$count];
        	$count++;

        	$files = $mpd->GetDir($current);
        	for($i=0;$i<count($files);$i++) {
                	if($files[$i]['type']=="directory") {
                        	$opendirs[]=$files[$i]['name'];
                	} else {
                        	$mpd->PLAdd($files[$i]['name']);
                	}

        	}
	}	
}


switch($task) {
  case("remove"):
    $item=$_GET['item'];
    if($item != null)
      $mpd->PLRemove($item);
    break;


   case("clear"):
     $mpd->PLClear();
     break;

   case("playitem"):
     $item=$_GET['item'];
     if($item != null){
       $mpd->SkipTo($item);
      }
      break;

   case("addfile"):
      $item=$_GET['item'];
      $mpd->PLAdd($item);
      break;

   case("adddir"):
      $item=$_GET['item'];
      addDir($item,$mpd);
      break;
      

    case("moveup"):
       $item=$_GET['item'];
       if($item !=0) {
           $mpd->Move($item,$item-1);
       }
       break;

    case("movedown"):
       $item=$_GET['item'];
       if($item !=count($mpd->playlist)-1) {
           $mpd->Move($item,$item+1);
       }
       break;


     case("removeselected"):
	$items=$_POST['itemlist'];
	for($i=0;$i<count($items);$i++){
	  $mpd->PLRemove($items[$i]-$i);
	}
	break;


	case("addselected"):
		$items=$_POST['itemlist'];
		//$dir=$_GET['dir'];
		$files = $mpd->GetDir($dir);
                for($i=0;$i<count($items);$i++) {
                        if($files[$items[$i]]['type']=="directory") {
                                addDir($files[$items[$i]]['name'],$mpd);
                        } else {
                                $mpd->PLAdd($files[$items[$i]]['URL']);
                        }
                }
		break;

	case("addall"):
                $dir=$_GET['item'];
                $files = $mpd->GetDir($dir);
                for($i=0;$i<count($files);$i++) {
                        if($files[$i]['type']=="directory") {
                                addDir($files[$i]['name'],$mpd);
                        } else {
                                $mpd->PLAdd($files[$i]['name']);
                        }
                }
                break;



}


?>
