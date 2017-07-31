<?php
function s(){
	$str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	$pos = mt_rand(0,strlen($str)-1);
	return substr($str,$pos,1);
}

function thumb($img,$w,$h=0,$name=''){
	$src = imagecreatefromjpeg ($img);
	$sw = imagesx($src);
	$sh = imagesy($src);
	if($h==0){
		$h = $w/$sw * $sh;
	}
	$dst = imagecreatetruecolor($w,$h);
	imagecopyresized ($dst,$src,0,0,0,0,$w,$h,$sw,$sh);
	if($name==''){
		imagejpeg ($dst,$img,60);
	}else{
		$path = pathinfo($name,PATHINFO_DIRNAME);
		if(!file_exists($path)){
			mkdir($path,0777,true);
		}
		imagejpeg ($dst,$name,60);
	}
	imagedestroy($src);
	imagedestroy($dst);
}

function logo($img,$pos=5,$f=true,$fn='logo1'){
	$l =imagecreatefromstring(file_get_contents(dirname(__FILE__).'/logo.png'));
	$lw = imagesx($l);
	$lh = imagesy($l);

	$i = imagecreatefromstring(file_get_contents($img));
	$w = imagesx($i);
	$h = imagesy($i);
	$x = mt_rand(10,$w-$lw-10);
	$y = mt_rand(10,$h-$lh-10);
	switch($pos){
		case 1:$x= 10;$y = 10;break;
		case 2:$x= 10;$y = 10;break;
		case 3:$x= 10;$y = 10;break;
		case 4:$x= 10;$y = 10;break;
		case 5:$x = ($w-$lw)/2;$y = ($h-$lh)/2;break;
		case 6:$x= 10;$y = 10;break;
		case 7:$x= 10;$y = 10;break;
		case 8:$x= 10;	$y = 10;break;
		case 9:$x = $w-$lw-10;$y = $h-$lh-10;break;
	}
	imagecopy ($i,$l,$x,$y,0,0 ,$lw,$lh);
	if($f){
		imagejpeg($i,$img);
	}else{
		$ext = '.'.pathinfo($img,PATHINFO_EXTENSION);
		$nnn = rtrim($img,$ext);
		imagejpeg($i,$nnn.$fn.$ext);  
	}
	imagedestroy($i);
}

function c($i,$c='white',$a=80){
	switch($c){
		case 'white':$r=$g=$b=255;break;
		case 'black':$r=$g=$b=0;	break;
		case 'yellow':$r=$g=255;$b=0;break;	
		case 'purple':$r=$b=255;$g=0;break;
		case 'orange':$r=0xff;$g=0x66;$b=0x00;break;
		case 'red':$r=255;$g=$b=0;	break;
		case 'green':$r=$b=0;$g=255;	break;
		case 'blue':$r=$g=0;$b=255;break;
		case 'gray':$r=0xd9;$g=0xd9;$b=0xd7;break;
		case 'rand':$r=mt_rand(0,255);$g= mt_rand(0,255);$b=mt_rand(0,255);break;
		default:
				if(strpos($c,'#')!==false) $c = substr($c,1);
				if(strlen($c)==3){
						$cs = str_split($c,1);
						$r = hexdec($cs[0].$cs[0]);
						$g = hexdec(str_repeat($cs[1],2));
						$b = hexdec(str_repeat($cs[2],2));
				}else{
					$cs = str_split($c,2);
					$r = hexdec($cs[0]);
					$g = hexdec($cs[1]);
					$b = hexdec($cs[2]);
				}
			break;
	}
	return imagecolorallocatealpha($i,$r,$g,$b,$a);
}