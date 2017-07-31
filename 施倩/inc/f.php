<?php
/**
 * f.php 用于上传处理的函数库
 */

/**
 *  20MB = 20971520 
 *  name = 0 uuid  1 uniqid  2 date  3 原名 
 */
function up($path,$name=0,$size=20971520,$allow=['jpg','png','gif','rar','zip']){
	if(!file_exists($path)) mkdir($path,0777,true);
	$upf = end($_FILES);
	if(in_array(ext($upf['name']),$allow)){
		if($upf['size']>0 && $upf['size']<=$size){
			$e = '.'.ext($upf['name']);
			$n = nn($upf['name'],$name);
			move_uploaded_file($upf['tmp_name'],$path.$n);
			return [true,$n];
		}else{
			return [false,'文件上传失败，文件太大了.'];
		}
	}else{
		return [false,'文件上传失败，格式不允许.'];
	}
}

function ext($name){
	$nn = explode('.',$name);
	$ext = end($nn);
	return strtolower($ext);
}

function ups($path,$name=0,$size=20971520,$allow=['jpg','png','gif','rar','zip']){
	if(!file_exists($path)) mkdir($path,0777,true);
	$nnn = [];
	foreach($_FILES as $v){
		if(is_array($v['name'])){
			foreach($v['name'] as $k=>$vv){
				if($v['size'][$k]<$size){
					if(in_array(ext($vv),$allow)){
						$tn = nn($vv,$name);
						move_uploaded_file($v['tmp_name'][$k],$path.$tn);
						$nnn[] = $tn;
					}
				}
			}
		}else{
			if($v['size']<$size){
				if(in_array(ext($v['name']),$allow)){
					$tn = nn($v['name'],$name);
					move_uploaded_file($v['tmp_name'],$path.$tn);
					$nnn[] = $tn;
				}
			}
		}
	}
	if(count($nnn)==0){
		$r = false;
	}else if(count($nnn)==1){
		$r = end($nnn);
	}else{
		$r = $nnn;
	}
	return $r;
}

function nn($name,$t=0){
	$e = '.'.ext($name);
	switch($t){
				case 1:	$n = uniqid().$e;	break;
				case 2:	$n = date('YmdHis').'_'.sprintf('%05d',mt_rand(0,99999)).$e;break;
				case 3:$n = $upf['name'];break;
				default:$n = uuid().$e;	break;
	}
	return $n;
}

function uuid($namespace = '') {     
     static $guid = '';
     $uid = uniqid("", true);
     $data = $namespace;
     $data .= $_SERVER['REQUEST_TIME'];
     $data .= $_SERVER['HTTP_USER_AGENT'];
     $data .= $_SERVER['REMOTE_ADDR'];
     $data .= $_SERVER['REMOTE_PORT'];
     $hash = strtoupper(hash('ripemd128', $uid . $guid . md5($data)));
     $guid =  
             substr($hash,  0,  8) .              '-' .
             substr($hash,  8,  4) .
             '-' .
             substr($hash, 12,  4) .
             '-' .
             substr($hash, 16,  4) .
             '-' .
             substr($hash, 20, 12) ;            
     return strtolower($guid);
   }

function download($path,$fn,$ext){
	$file = $path.$fn.$ext;
	if(file_exists($file)){
		$f = fopen($file,'r'); 
		$size = filesize($file);  
		echo $size;
		exit;
        header('Content-type: application/octet-stream');  
        header('Accept-Ranges: bytes');  
        header('Accept-Length: '.$size);  
        header('Content-Disposition: attachment; filename='.$fn.$ext);  
        echo fread($f,$size);  
        fclose($f);
		exit;
	}else{
		header('content-type:text/html;charset=utf-8'); 
		echo 'File not found!';  
		exit;
	}
}