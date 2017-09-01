
<?php 
require_once 'checking.php';
	require_once("dbtools.inc.php");
	
	$id=$_GET['id'];
	$link = create_connection();
	$sql = "DELETE FROM tb_book WHERE id=".$id;
	$result =execute_sql($link,"bookmanage",$sql);
	 if($result){
			
			echo "<script type='text/javascript'>
					alert('图书删除成功！');
					location.href='memberIndex.php';
					</script>";
			mysqli_close($link);
			
			exit;
		}else{
			echo "<script type='text/javascript'>
			alert('图书删除失败！');
			location.href='memberIndex.php';
			</script>";
			mysqli_close($link);
			
			exit;
		}
		?>