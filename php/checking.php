<?php
session_start();
error_reporting(0);
header("Content-type:text/html;charset=utf-8");
        
        if($_SESSION[username]==""){
            echo "<script>alert('对不起，请通过正确路径进入系统！');window.location.href='../html/login.html';</script>";
        }
?>   