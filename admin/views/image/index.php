<?php
if(isset($_REQUEST['text']) && isset($_REQUEST['h']) && isset($_REQUEST['w'])){

	header('Content-Type: image/png');
	header('image/png');

	$img=imagecreatetruecolor( $_REQUEST['w'],$_REQUEST['h']);  
	$text_color=imagecolorallocate($img, 200, 200, 200);

	if(isset($_REQUEST['color']) && $_REQUEST['color'] == 0){
		imagesavealpha($img, true);

	}
	$bgColor = imagecolorallocatealpha($img, 200, 0, 0, 127);
	imagefill($img, 0, 0, $bgColor);

	imagestring($img, 5, 5, 5,  $_REQUEST['text'], $text_color);
	imagepng($img);
	imagedestroy($img);

}else {
	echo "?text=text&w=200&h=100";
}