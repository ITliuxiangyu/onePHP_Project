<?php
$dsn = 'mysql:host=localhost;dbname=db;port=3306;charset=utf8';
$user = 'root';
$password = '';
$opt = array(1002=>'set names utf8');
try{
    $db = new pdo($dsn,$user,$password,$opt);
}catch(exception $e){
	exit('mysql server conection fail...');
}

function pagecss(){
	$css=<<<aa
\n
	<style>
	 	 .page{font:12px/24px '微软雅黑';width: 600px; text-align:right} 
		 .page span,.page a{border-radius:3px;} 
		 .page a,.page a:visited,.page a:active{line-height:14px;padding:2px 5px;color:#666;border:1px solid #dadada;display:inline-block;text-decoration:none;margin-right:3px;} 
		.page a:hover{	color:#fff;border:1px solid #5c307d;background:black;cursor:pointer;}
		 .page span{color: #fff;border:1px solid #5c307d;background:black;line-height:14px; padding:2px 5px;display:inline-block;margin-right:3px;} 
		 .page input{outline:none;text-align: center;width:25px;} 
		 strong{font-weight:400}
	</style>\n
aa;
	echo $css;
}

function execsql($sql){
	global $db;
	return $db->exec($sql);
}

function rcount($tn,$w='1=1'){
	global $db;
	$stmt = $db->prepare("select count(*) from $tn where $w");
	$stmt->execute();
	$c = $stmt->fetchAll();
	return $c[0][0];
}

function nnpp($tn,$pagesize=5,$fs='*',$w='1=1',$o='',$typ=''){
	global $db;
	$pg['pagesize'] = $pagesize;
	$recordcount = rcount($tn,$w);
	$pg['recordcount'] = $recordcount;
	$pagecount = ceil($recordcount/$pagesize);
	$pg['pagecount'] = $pagecount;
	$currpage = isset($_REQUEST['p']) ? $_REQUEST['p'] : 1;
	if($currpage<1) $currpage = 1;
	if($currpage>$pagecount) $currpage = $pagecount;
	$pg['currpage'] = $currpage;
	$start = $currpage * $pagesize - $pagesize;
	$stmt = $db->prepare("select $fs from $tn where $w $o limit $start,$pagesize");
	$stmt->execute();
	$pg['result'] = $stmt->fetchAll(2);
	$info = '<div class="page">';
	$ss = 1;
	$ee = 10;
	if($currpage>=7){
		$ss = $currpage-5;
		$ee = $currpage+4;
		if($ss<1){
			$ss = 1;
			$ee = $pagecount;
		}
		if($currpage>=($pagecount-4)){
			$ss = $pagecount-9;
		}
	}
	$info.=sprintf(' 当前为第%d页/共%d页 ',$currpage,$pagecount);
	if($currpage>1){$info.=sprintf('<a href="?%sp=%d">首页</a>',$typ,1);}else{
		$info.=sprintf('<span>首页</span>');
	}
	if($currpage>1){$info.=sprintf('<a href="?%sp=%d">上一页</a>',$typ,$currpage-1);}else{$info.=sprintf('<span>上一页</span>');}
	for($i=$ss;$i<=$ee;$i++){
		if($i>$pagecount) break;
		if($i==$currpage){
			$info.=sprintf('<span>%d</span>',$i);
			continue;
		}
		$info.=sprintf('<a href="?%sp=%d">%d</a>',$typ,$i,$i);
	}
	if($currpage<$pagecount){$info.=sprintf('<a href="?%sp=%d">下一页</a>',$typ,$currpage+1);}else{$info.=sprintf('<span>下一页</span>');}
		if($currpage<$pagecount){$info.=sprintf('<a href="?%sp=%d">末页</a>',$typ,$pagecount);}else{$info.=sprintf('<span>末页</span>');}
	$info .='</div>';
	$pg['info'] = $info;
	return $pg;
}
function rpp($tn,$pagesize=5,$fs='*',$w='1=1',$o='',$tp=''){
	global $db;
	$pg['pagesize'] = $pagesize;
	$recordcount = rcount($tn,$w);
	$pg['recordcount'] = $recordcount;
	$pagecount = ceil($recordcount/$pagesize);
	$pg['pagecount'] = $pagecount;
	$currpage = isset($_REQUEST['p']) ? $_REQUEST['p'] : 1;
	if($currpage<1) $currpage = 1;
	if($currpage>$pagecount) $currpage = $pagecount;
	$pg['currpage'] = $currpage;
	$start = $currpage * $pagesize - $pagesize;
	$stmt = $db->prepare("select $fs from $tn where $w $o limit $start,$pagesize");
	$stmt->execute();
	$pg['result'] = $stmt->fetchAll(2);
	$info = '<div class="pagin">';
    $info.=sprintf(' <div class="message">共<i class="blue">%d</i>条记录，当前显示第&nbsp;<i class="blue">%d&nbsp;</i>页</div>',$recordcount,$currpage);
	$ss = 1;
	$ee = 10;
	$info .= '  <ul class="paginList">';
	if($currpage>1) $info.=sprintf('<li class="paginItem"><a href="?%sp=%d"><span class="pagepre"></span></a></li>',$tp,$currpage-1);
	if($currpage>=7){
		$ss = $currpage-5;
		$ee = $currpage+4;
		if($ss<1){
			$ss = 1;
			$ee = $pagecount;
		}
		if($currpage>=($pagecount-4)){
			$ss = $pagecount-9;
		}
	}
		if($ss<1)$ss = 1;
	for($i=$ss;$i<=$ee;$i++){
		if($i>$pagecount) break;
		if($i==$currpage){
			$info.=sprintf('<li class="paginItem"><a href="#">%d</a></li>',$i);
			continue;
		}
		$info.=sprintf('<li class="paginItem"><a href="?%sp=%d">%d</a></li>',$tp,$i,$i);
	}
	if($currpage<$pagecount)$info.=sprintf('<li class="paginItem"><a href="?%sp=%d"><span class="pagenxt"></span></a></li>',$tp,$currpage+1);
	$info.='</ul>';
	$info .='</div>';
	$pg['info'] = $info;
	return $pg;
}
function npp($tn,$pagesize=5,$fs='*',$w='1=1',$o='',$tp=''){
	global $db;
	$pg['pagesize'] = $pagesize;
	$recordcount = rcount($tn,$w);
	$pg['recordcount'] = $recordcount;
	$pagecount = ceil($recordcount/$pagesize);
	$pg['pagecount'] = $pagecount;
	$currpage = isset($_REQUEST['p']) ? $_REQUEST['p'] : 1;
	if($currpage<1) $currpage = 1;
	if($currpage>$pagecount) $currpage = $pagecount;
	$pg['currpage'] = $currpage;
	$start = $currpage * $pagesize - $pagesize;
	$stmt = $db->prepare("select $fs from $tn where $w $o limit $start,$pagesize");
	$stmt->execute();
	$pg['result'] = $stmt->fetchAll(2);
	$info = '<div class="page">';
    $info.=sprintf(' 共 <strong>%d</strong>条结果,%d/%d页 &nbsp; ',$recordcount,$currpage,$pagecount);
	$ss = 1;
	$ee = 10;
	if($currpage>1)	$info.=sprintf('<a href="?%sp=%d">上一页</a>',$tp,$currpage-1);
	if($currpage>=7){
		$ss = $currpage-5;
		$ee = $currpage+4;
		if($ss<1){
			$ss = 1;
			$ee = $pagecount;
		}
		if($currpage>=($pagecount-4)){
			$ss = $pagecount-9;
		}
	}
		if($ss<1)$ss = 1;
	for($i=$ss;$i<=$ee;$i++){
		if($i>$pagecount) break;
		if($i==$currpage){
			$info.=sprintf('<span>%d</span>',$i);
			continue;
		}
		$info.=sprintf('<a href="?%sp=%d">%d</a>',$tp,$i,$i);
	}
	if($currpage<$pagecount)$info.=sprintf('<a href="?%sp=%d">下一页</a>',$tp,$currpage+1);
	$info.=sprintf('&nbsp; 到 <input type="text" maxlength="5" value="%d" id="page"> 页 ',$currpage);
	$info.=sprintf('&nbsp;<a href="javascript:void(0)" onclick="location.href=\'?%sp=\'+'. "document.getElementById('page').value" .'">跳转</a>',$tp);
	$info .='</div>';
	$pg['info'] = $info;
	return $pg;
}

function pp($tn,$pagesize=5,$fs='*',$w='1=1',$o=''){
	global $db;
	$pg['pagesize'] = $pagesize;
	$recordcount = rcount($tn,$w);
	$pg['recordcount'] = $recordcount;
	$pagecount = ceil($recordcount/$pagesize);
	$pg['pagecount'] = $pagecount;
	$currpage = isset($_REQUEST['p']) ? $_REQUEST['p'] : 1;
	if($currpage<1) $currpage = 1;
	if($currpage>$pagecount) $currpage = $pagecount;
	$pg['currpage'] = $currpage;
	$start = $currpage * $pagesize - $pagesize;
	$stmt = $db->prepare("select $fs from $tn where $w $o limit $start,$pagesize");
	$stmt->execute();
	$pg['result'] = $stmt->fetchAll(2);
	$info = '<div class="page">';
    $info.=sprintf(' 共 <strong>%d</strong>条结果,%d/%d页 &nbsp; ',$recordcount,$currpage,$pagecount);
	$ss = 1;
	$ee = 10;
	if($currpage>1)	$info.=sprintf('<a href="?p=%d">上一页</a>',$currpage-1);
	if($currpage>=7){
		$ss = $currpage-5;
		$ee = $currpage+4;
		if($ss<1){
			$ss = 1;
			$ee = $pagecount;
		}
		if($currpage>=($pagecount-4)){
			$ss = $pagecount-9;
		}
	}
	if($ss<1)$ss = 1;
	for($i=$ss;$i<=$ee;$i++){
		if($i>$pagecount) break;
		if($i==$currpage){
			$info.=sprintf('<span>%d</span>',$i);
			continue;
		}
		$info.=sprintf('<a href="?p=%d">%d</a>',$i,$i);
	}
	if($currpage<$pagecount)$info.=sprintf('<a href="?p=%d">下一页</a>',$currpage+1);
	$info.=sprintf('&nbsp; 到 <input type="text" maxlength="5" value="%d" id="page"> 页 ',$currpage);
	$info.='&nbsp;<a href="javascript:void(0)" onclick="location.href=\'?p=\'+'. "document.getElementById('page').value" .'">跳转</a>';
	$info .='</div>';
	$pg['info'] = $info;
	return $pg;
}


function page($tn,$pagesize=5,$fs='*',$w='1=1',$o=''){
	global $db;
	$pg['pagesize'] = $pagesize;
	$recordcount = rcount($tn,$w);
	$pg['recordcount'] = $recordcount;
	$pagecount = ceil($recordcount/$pagesize);
	$pg['pagecount'] = $pagecount;
	$currpage = isset($_REQUEST['p']) ? $_REQUEST['p'] : 1;
	if($currpage<1) $currpage = 1;
	if($currpage>$pagecount) $currpage = $pagecount;
	$pg['currpage'] = $currpage;
	$start = $currpage * $pagesize - $pagesize;
	$stmt = $db->prepare("select $fs from $tn where $w $o limit $start,$pagesize");
	$stmt->execute();
	$pg['result'] = $stmt->fetchAll(2);
	return $pg;
}

function query($tn,$fs='*',$w='1=1',$o='',$l=8){
	global $db;
	$stmt = $db->prepare("select $fs from $tn where $w $o limit $l" );
	$stmt->execute();
	return $stmt->fetchAll(2);
}
function queryone($tn,$fs='*'){
	global $db;
	$stmt = $db->prepare("select $fs from $tn limit 1" );
	$stmt->execute();
	return $stmt->fetchAll(2);
}

function queryall($tn,$fs='*',$w='1=1',$o=''){
	global $db;
	$stmt = $db->prepare("select $fs from $tn where $w $o" );
	$stmt->execute();
	return $stmt->fetchAll(2);
}

function add($tn,$d=[]){
	global $db;
	foreach($d as $k=>$v){
		$kk[] = $k.'=:'.$k;
	}
	$fs = implode(',',$kk);
	$stmt = $db->prepare("insert into $tn set $fs");
	return $stmt->execute($d);
}

function insert($tn,$d=[]){
	global $db;
	foreach($d as $k=>$v){
	    $kk[] = $k;
		$kkk[] = ':'.$k;
	}
	$fs = implode(',',$kk);
	$vs = implode(',',$kkk);
	$stmt = $db->prepare("insert into $tn($fs) values($vs)");
	return $stmt->execute($d);
}
function save($tn,$d=[]){
	global $db;
	foreach($d as $k=>$v){
	    $kk[] = $k;
		$kkk[] = ':'.$k;
	}
	$fs = implode(',',$kk);
	$vs = implode(',',$kkk);
	$stmt = $db->prepare("replace into $tn($fs) values($vs)");
	//echo"replace into $tn($fs) values($vs)";
	return $stmt->execute($d);
  // $a=$stmt->errorinfo();
 //  print_r($a);
}

function saves($tn,$d=[]){
	global $db;
	foreach($d as $k=>$v){
	    $kk[] = $k;
		$kkk[] = ':'.$k;
	}
	$fs = implode(',',$kk);
	$vs = implode(',',$kkk);
	$stmt = $db->prepare("replace into $tn($fs) values($vs)");
	$stmt->execute($d);
	return $db->lastInsertId();//返回域名
}

function update($tn,$d=[],$w='1=1'){
	global $db;
	foreach($d as $k=>$v){
	    $kk[] = $k.'=:'.$k;
	}
	$fs = implode(',',$kk);
	$stmt = $db->prepare("update $tn set $fs where $w");
	return $stmt->execute($d);
}

function delete($tn,$w='1=1'){
	global $db;
	$stmt = $db->prepare("delete from $tn where $w");
	return $stmt->execute();
}

function deletebyid($tn,$id){
	global $db;
	$stmt = $db->prepare("delete from $tn where id=?");
	return $stmt->execute([$id]);
}

function m($p,$a='webrx'){
	$pass = $p.$a;
	$p1 = sha1($pass);
	$p2 = md5($pass);
	$s = substr($p1,0,6).substr($p2,0,6);
	$s .= substr($p1,10,3).substr($p2,10,3);
	$s .= substr($p1,20,3).substr($p2,20,3);
	$s .= substr($p1,34).substr($p2,30);
	return $s;
}

function close(){
	global $db;
	unset($db);
}
