<?php
if(isset($_POST['id'])){
	include '../inc/db.php';
	$id=$_POST['id'];
	if($_POST['flag']=='y'){
		$_POST['flag']='n';
	}else{
		$_POST['flag']='y';
	}
	unset($_POST['id']);
	update('db_new',$_POST,'id='.$id);
}