<?php
        error_reporting(0);
        require_once 'checking.php';
        session_start();
        $borrowname=$_SESSION[username];
        $borrowtime=date("y-m-d H:i");
	require_once("dbtools.inc.php");
	$id=$_GET['id'];
	$link = create_connection();
	
	//执行sql命令
	$sql="SELECT * FROM tb_book WHERE id=".$id;
	$result = execute_sql($link,"bookmanage",$sql);
       
	   if($result){
                    $borrowtype='可借';
                    $sql="UPDATE tb_book SET borrowtype='{$borrowtype}',borrowtime='',borrowname='' WHERE id=".$id;
                    $result1 = execute_sql($link,"bookmanage",$sql);
                    echo "<script>alert('还书成功！');history.back();</script>";
                }else{
                    echo "<script>alert('还书失败！');history.back();</script>";
                }
           
        
	

?>