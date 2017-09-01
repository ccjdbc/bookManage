<?php
        require_once("dbtools.inc.php");
        require_once 'checking.php';
        $link = create_connection();
        $sql="SELECT * FROM tb_book WHERE borrowname='{$_SESSION['username']}'";
	$result = execute_sql($link,"bookmanage",$sql);
        
?>
<html>
<head>
<meta charset="utf-8" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<title>个人中心</title>
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
                     <li><a href="../html/addbook.html" class="a">图书捐赠&nbsp;&nbsp;&nbsp;&nbsp;</a></li>		
                     <li><a href="#" class="a">个人中心&nbsp;&nbsp;|&nbsp;&nbsp;</a></li>
                     <li><a href="memberIndex.php" class="a">首页&nbsp;&nbsp;|&nbsp;&nbsp;</a></li>
	
            </ul>
	</div>
        <div>
            <a class="memberspace"><?php echo "当前用户名：$_SESSION[username]";?></a>
            <table border="0" width="100%">
                <tr bgcolor="#87CEFA">
                <ul>
                     <td width="25%">已借图书</td>
                     <td width="25%">图书编号</td>
                     <td width="25%">借书时间</td>
                     <td width="25%">图书归还</td>
                </ul>   
                </tr>
               
        <?php 
	$j=1;
	while($row = mysqli_fetch_assoc($result))
	{
	echo "<tr>";
		
	echo "<td>".$row["bookname"]."</td>";  
	echo "<td>".$row["booknum"]."</td>"; 
	echo "<td>".$row["borrowtime"]."</td>"; 
	
       
        echo "<td><a href='returnBook.php?id=";
        echo $row["id"] . "'>归还</a></td>";	
       
//	echo "<td><a href='bookborrow.php?id=";
//        echo $row["id"] . "' onclick='11.php'>详情</a></td>";	
	
	echo "</tr>";
	$j++;
	}
       ?>
        </table> 
         
        </div>
    
</body>
</html>