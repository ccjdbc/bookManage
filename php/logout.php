<?php
session_start();
session_unset();
session_destroy();
echo "<script>alert('您已退出登录！');location.href='../html/login.html';</script>";
?>