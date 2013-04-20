<?php

switch($task) {

	case("play"):
		$mpd->Play();
		break;

	case("prev"):
		$mpd->Previous();
		break;

	case("pause"):
		$mpd->Pause();
		break;

	case("stop"):
		$mpd->Stop();
		break;

	case("next"):
                $mpd->Next();
                break;

	case("vold"):
                $mpd->AdjustVolume(-10);
                break;
	case("volu"):
                $mpd->AdjustVolume(+10);
                break;

	case("update"):
                $mpd->DBRefresh();
                break;

	case("repeat"):
		$repeat = $mpd->repeat;
		if($repeat==1)
			$mpd->SetRepeat(0);
		else
			$mpd->SetRepeat(1);
		break;
}
?>
