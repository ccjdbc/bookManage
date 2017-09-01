
<?php 
header("Content-type:text/html;charset=utf-8");
	require_once("dbtools.inc.php");
	
	$username=$_POST["username"];
	$password=$_POST["password"];
	$idnumber=$_POST["idnumber"]; 
	$link = create_connection();
	$sql = "INSERT INTO tb_member(username,password,idnumber) VALUES ('$username','$password','$idnumber')";
	$result =execute_sql($link,"bookmanage",$sql);
	 if($result){
			
			echo "<script type='text/javascript'>
					alert('恭喜你注册成功,返回重新登录！');
					location.href='../html/login.html';
					</script>";
			mysqli_close($link);
			
			exit;
		}else{
			echo "<script type='text/javascript'>
			alert('姓名或密码不能为空，请重新填写！');
			location.href='../html/register.html';
			</script>";
			mysqli_close($link);
			
			exit;
		}
		?>