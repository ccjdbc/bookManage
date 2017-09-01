<?php
        require_once("dbtools.inc.php");
        require_once 'checking.php';
        $id=$_GET[id];
        $link = create_connection();
        $sql="SELECT * FROM tb_book WHERE id=".$id;
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
                     <li><a href="adminIndex.php" class="a">返回首页&nbsp;&nbsp;&nbsp;&nbsp;</a></li>		
            </ul>
	</div>
        <div>
                    <a class="detailHeader"><?php echo "用户：$_SESSION[username]";?>&nbsp;&nbsp;当前位置：图书管理>详情》》</a>
            
        <table border="0" width="100%">
                    <tr bgcolor="#87CEFA">
                    <ul>
                         <td width="25%">图书编号</td>
                         <td width="25%">图书名称</td>
                         <td width="25%">借阅人</td>
                         <td width="25%">借阅时间</td>


                    </ul>   
                    </tr>
        <?php 
           
           $row = mysqli_fetch_assoc($result);
            
            echo "<tr>";

            echo "<td>".$row["booknum"]."</td>";  
            echo "<td>".$row["bookname"]."</td>"; 
            echo "<td>".$row["borrowname"]."</td>"; 
            echo "<td>".$row["borrowtime"]."</td>"; 
            echo "</tr>";
            
            
        ?>

        </table>

</body>
</html>