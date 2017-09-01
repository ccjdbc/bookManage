<?php 
require_once 'checking.php';
	require_once("dbtools.inc.php");
	
	$booknum=$_POST["booknum"];
	$bookname=$_POST["bookname"];
	$publishing=$_POST["publishing"]; 
	$editor=$_POST["editor"];
	$donateperson=$_POST["donateperson"];
	$donatetime=date("y-m-d H:i");	
	$link = create_connection();
	$sql = "INSERT INTO tb_book(booknum,bookname,publishing,editor,donateperson,donatetime) VALUES ('$booknum','$bookname','$publishing','$editor','$donateperson','donatetime')";
	$result =execute_sql($link,"bookmanage",$sql);
	 if($result){
			
			echo "<script type='text/javascript'>
					alert('图书信息录入成功！');
					history.back();
					</script>";
			mysqli_close($link);
			
			exit;
		}else{
			echo "<script type='text/javascript'>
			alert('图书编号重复，图书信息录入失败，请重新填写！');
			location.href='../html/addbook.html';
			</script>";
			mysqli_close($link);
			
			exit;
		}
		?>