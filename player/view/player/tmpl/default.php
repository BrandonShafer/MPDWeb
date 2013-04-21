<div id="playerframe">
  <div id="nowplaying_heading">
	<table id="heading_tbl">
	<tr>
		<td id="left">Now Playing</td><td id="right"><a href="index.php?task=update&view=<?php echo $view;?>"><img align="right" width="20" src="images/update.png"></a></td>
	</tr>
	</table>
  </div>
  <div id="nowplaying_content">
	<?php
                $cur_track= $mpd->current_track_id;
                $playlist= $mpd->playlist;
                if($cur_track !=-1)
                        //echo htmlentities(cut_file($playlist[$cur_track]['name']));
                        echo htmlentities (cut_file($cur_track));
                else
                        echo "No Track selected!";
        ?>
  </div>
  <div id="controls">
    <table>
      <tr>
        <td><a href="index.php?task=prev&view=<?php echo $view;?>"><img src="images/previous.png"></a></td>
        <td><?php
		if($mpd->state == "play") {
	  ?>
		<a href="index.php?task=pause&view=<?php echo $view;?>"><img src="images/pause.png"></a>

	  <?php }else {?>
		<a href="index.php?task=play&view=<?php echo $view;?>"><img src="images/play.png"></a>
	  <?php }?>
	</td>
        <td><a href="index.php?task=stop&view=<?php echo $view;?>"><img src="images/stop.png"></a></td>
        <td><a href="index.php?task=next&view=<?php echo $view;?>"><img src="images/next.png"></a></td>
        <td><a href="index.php?task=repeat&view=<?php echo $view;?>"><img src="<?php if($mpd->repeat ==1){ echo "images/repeaton.png";}else{ echo "images/repeatoff.png";};?>"></a></td>
  </tr>

  </table>

  </div>

  <div id="controls">
    <table>
      <tr>
	<td><a href="index.php?task=vold&view=<?php echo $view;?>"><img src="images/minus.png"></a></td>
	<td id="volume_content">Volume:</td><td><div id="volume_total"><div id="volume_actual" style="width:<?php echo $mpd->volume;?>%"></div></div></td>
     	<td><a href="index.php?task=volu&view=<?php echo $view;?>"><img src="images/plus.png"></a></td>
      </tr>
    </table>
  </div>
</div>
