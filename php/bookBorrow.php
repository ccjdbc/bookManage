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
        $row = mysqli_fetch_assoc($result);
	   if($row["borrowtype"]=="可借"){
                    $borrowtype='已借出';
                    $sql="UPDATE tb_book SET borrowtype='{$borrowtype}',borrowtime='{$borrowtime}',borrowname='{$borrowname}' WHERE id=".$id;
                    $result1 = execute_sql($link,"bookmanage",$sql);
                    echo "<script>alert('借书成功！');history.back();</script>";
              
               
           // $row=$result->fetch_assoc();
            //include("../phpqrcode/qrlib.php");
           // QRcode::png('http://www.thinkphp.cn/code/1283.html','abc.jpg',QR_ECLEVEL_L,131,113,true);      
                }else{
                    echo "<script>alert('该书已被借出，本次借书失败！');history.back();</script>";
                }
           
        
	

?>