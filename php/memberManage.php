<?php
        require_once 'checking.php';
	require_once("dbtools.inc.php");
	
	//指定煤业显示10行记录
	$records_per_page = 5;
	
	//获取要显示第几页的记录
	if(isset($_GET["page"]))
	
		$page = $_GET["page"];
	else
		$page = 1;
	
	//建立数据库连接
	$link = create_connection();
	
	//执行sql命令
	$sql = "SELECT *FROM tb_member ";
	$result = execute_sql($link,"bookmanage",$sql);
	
	//获取记录数
	$total_records = mysqli_num_rows($result);
	
	//计算总页数
	$total_pages = ceil($total_records/$records_per_page);
	
	//计算本页第一个记录的序号
	$started_record = $records_per_page*($page-1);
	
	//将记录指针移至本页第一个记录的序号
	mysqli_data_seek($result,$started_record);
        
	
?>
<html>
<head>
<meta charset="utf-8" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body style="background-color:#FFF; width:680px ;height:1024px;margin:0 auto">
		
        <div class="himg">
            <li class="session">
                <?php
           
                 echo "当前用户：$_SESSION[username]"."|";
                 echo "<a href='../html/login.html'>退出</a>";
                
               ?>         
            </li>
        </div>
	<div style="background-color:#09F;height:40px; margin-top:-17px;" >
	<ul>

<!--当前时间-->
	<a><li style="float:left"><?php 
		date_default_timezone_set('Asia/Shanghai');
		echo date("y-m-d h:i",time()); ?></li></a>
                <li><a href="adminIndex.php" class="a">返回首页&nbsp;&nbsp;|&nbsp;&nbsp;</a></li>
	
	</ul>
	</div>
	<div id="footan" class="footan">
            <a class="detailHeader">当前位置：读者管理》</a>
		<form action="#" method="post">
	
		<table border="0" width="100%">
		 <tr bgcolor="#87CEFA">
		
		<td>读者姓名</td>
		<td>学号</td>  
		<td>登录密码</td>
		</tr>
          
	<?php 
	$j=1;
	while($row = mysqli_fetch_assoc($result)and $j<=$records_per_page)
	{
	echo "<tr>";
		
	echo "<td>".$row["username"]."</td>"; 
	echo "<td>".$row["idnumber"]."</td>"; 
	echo "<td>".$row["password"]."</td>"; 
	
	echo "</tr>";
	$j++;
	}
?>

</table>
 
</form>	
</div>
<div id="footer" class="footer" >
<?php
	echo "<p align='center'>";
	if($page>1)
		echo "<a href='memberManage.php?page=".($page-1)."'>上一页</a>";
	for($i=1;$i<=$total_pages;$i++)
	{
		if($i==$page)
		echo "$i";
		else
		echo "<a href='memberManage.php?page=$i'>$i</a>";
		
	}
	if($page<$total_pages)
		echo "<a href='memberManage.php?page=".($page+1)."'>下一页</a>";
	        echo "</p>";
?>

</div>

</body>
</html>