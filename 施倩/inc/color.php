<?php

function c($i,$c='white',$a=100){
	switch ($c) {
		case 'white':$r=$b=$g=255;break;
		case 'red':$r=255;$b=$g=0;break;
		case 'green':$g=255;$r=$b=0;break;
	    case 'blue':$b=255;$r=$g=0;break;
	    case 'yellow':$r=$g=255;$b=0;break;
	    case 'orange':$r=0xff;$g=0x66;$b=0x00;break;
	    case 'purple':$r=$b=255;$g=0;break;
	    case 'gray':$r=0xd9;$g=0xd9;$b=0xd7;break;
	    case 'black':$r=00;$g=00;$b=00;break;
	    case 'rand':$r=mt_rand(0,255);$g=mt_rand(0,255);$b=mt_rand(0,255);break;
		default:
			if($c{0}=='#')$c=substr($c,1);//if(strpos($c,'#')!==false)$c=substr($c,1);
		    if(strlen($c)>=6){
				list($r,$g,$b)=str_split($c,2);
			}else if(strlen($c)>=3){
				$cc=str_split($c,1);
                 $r=$cc[0].$cc[0];
                 $g=$cc[1].$cc[1];
                 $b=str_repeat($cc[1],2);
			}
			$r=hexdec($r);
			$g=hexdec($g);
			$b=hexdec($b);
	        break;
	}
	return imagecolorallocatealpha($i,$r,$g,$b,$a);
}
