<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de-de" lang="de-de" >
<head>
    <meta name="viewport" content="width=400"/>
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
  <form action="index.php?task=removeselected" method="post">
  <div id="playlist_menu">
	<table>
		<tr>
			<td><a href="index.php?view=edit_playlist"><img width="20" src="images/songs.png"></a><td>
			<td><a href="index.php?task=clear"><img width="20" src="images/removeall.png"></a><td>
			<td><button type="submit"><img width="20" src="images/removeselected.png"></button><td>
		</tr>
	</table>
  </div>
  <div id="items">
    
    <table>
    <tr id="items_heading">
	<td></td><td>Title</td><th colspan="4">Controls</th>
    </tr>
    <?php
      for($i=0;$i<count($playlist);$i++) {
    ?>
      <tr id="item<?php if($mpd->current_track_id == $i){echo "Active";} elseif($i%2==0) { echo "Even";}else{echo "Odd";}?>">
	  <td id="track_number">
		<a name="<?php echo $i;?>"></a></td>
          </td>
  	  <td id="file">
		  <a href="index.php?task=playitem&item=<?php echo $i;?>#<?php echo $i;?>"><?php echo htmlentities(cut_file($playlist[$i]['name']));?></a>
	  </td>
	  <td id="move">
          	 <a href="index.php?task=moveup&item=<?php echo $i;?>#<?php echo $i;?>"><img width="15" src="images/up.png"></a>
          </td>
	  <td id="move">
                 <a href="index.php?task=movedown&item=<?php echo $i;?>#<?php echo $i;?>"><img width="15" src="images/down.png"></a>
          </td>
	  <td id="remove">
		  <a href="index.php?task=remove&item=<?php echo $i;?>#<?php echo $i;?>"><img width="15" src="images/remove.png"></a>
	  </td>
	  <td id="check">
		  <input type="checkbox" name="itemlist[]" value="<?php echo $i;?>">
	  </td>
      </tr>
    <?php
      }
    ?>
    </table>
  </div>

   <div id="playlist_menu">
        <table>
                <tr>
			<td><a href="index.php?view=edit_playlist"><img width="20" src="images/songs.png"></a><td>
                        <td><a href="index.php?task=clear"><img width="20" src="images/removeall.png"></a><td>
                        <td><button type="submit"><img width="20" src="images/removeselected.png"></button><td>
		</tr>
        </table>
  </div>
</div>
</form>

</div>

<?php
//print_r($mpd);
?>


</body>
