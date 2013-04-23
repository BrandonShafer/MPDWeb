<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de-de" lang="de-de" >
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>

	<?php
		$cur_track= $mpd->current_track_id;
		$playlist= $mpd->playlist;
		if($cur_track !=-1)
			echo htmlentities(cut_file($playlist[$cur_track]['name']));
		else 
			echo "No Track selected";
	?>
	
  </title>
  <link rel="stylesheet" href="css/general.css" type="text/css" />
</head>
<body>

<div id="frame">

	<?php include('view/player/view.php');?>

<div id="playlist">
  <div id="playlist_menu">
	<form action="index.php?view=edit_playlist&task=addselected&dir=<?php echo $_GET['dir'];?>" method="post">
	<table>
		<tr>
			<td><a href="index.php?"><img width="20" src="images/playlist.png"></a><td>
			<td><a href="index.php?view=edit_playlist&task=addall&dir=<?php echo $_GET['dir'];?>&item=<?php echo $_GET['dir'];?>"><img width="20" src="images/addall.png"></a><td>
			<td><button type="submit"><img width="20" src="images/addselected.png"></button><td>
		</tr>
	</table>
  </div>
  <div id="items">
    <table>
    <tr id="items_heading">
	<td></td><td>Title</td><th colspan="2">Control</th>
    </tr>
    <?php
      $dir=$_GET['dir']; 
      $dirs=$mpd->GetDir($dir);
    ?>
      <tr id="home"><td></td><td><a href="index.php?view=edit_playlist&dir=<?php echo cut_firstDir($dir);?>"><img width="20" src="images/left.png"></a></td><td></td><td></td>

     <?php echo "count(dirs) =".count($dirs);for($i=0;$i<count($dirs);$i++) {?>
      <tr id="item<?php if($i%2==0) { echo "Even";}else{echo "Odd";}?>">
	  <td id="track_number"> <a name="<?php echo $i;?>"></a></td>
  	  <?php if($dirs[$i]['type']=="directory") {?>
		<td id="file"><a href="index.php?view=edit_playlist&dir=<?php echo $dirs[$i]['name'];?>"><?php echo htmlentities(cut_lastDir($dirs[$i]['name']));?></a></td><td><a href="index.php?view=edit_playlist&task=adddir&item=<?php echo $dirs[$i]['name'];?>&dir=<?php echo $dir;?>#<?php echo $i;?>"><img width="15" src="images/plus.png"></a></td>
	  <?php } else {?>
		<td id="file"><?php echo htmlentities($dirs[$i]['name']);?></td><td><a href="index.php?view=edit_playlist&task=addfile&item=<?php echo $dirs[$i]['name'];?>&dir=<?php echo $dir;?>#<?php echo $i;?>"><img width="15" src="images/plus.png"></a></td>
	  <?php } ?>
	  <td id="checkbox"><input type="checkbox" name="itemlist[]" value="<?php echo $i;?>"></td>
      </tr>
    <?php
      }
    ?>
    </table>
  </div>

   <div id="playlist_menu">
        <table>
                <tr>
			<td><a href="index.php?"><img width="20" src="images/playlist.png"></a><td>
                        <td><a href="index.php?view=edit_playlist&task=addall&dir=<?php echo $_GET['dir'];?>&item=<?php echo $_GET['dir'];?>"><img width="20" src="images/addall.png"></a><td>
                        <td><button type="submit"><img width="20" src="images/addselected.png"></button><td>
		</tr>
        </table>
  </form>
  </div>
</div>


</div>

<?php 
//print_r($dirs);
//print_r($mpd);
?>

</body>
