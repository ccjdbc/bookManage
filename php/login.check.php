<?php
        require_once 'checking.php';
      
       
        $username=$_POST['username'];
        $password = $_POST['password'];
	
        class chkinput{
            var $username;
            var $password;
            
            function chkinput($x,$y){
                $this ->username=$x;
                $this ->password=$y;
            }
            function checkinput(){
                require_once("dbtools.inc.php");
                $link = create_connection();
                $sql = "SELECT *FROM tb_member WHERE username='".$this->username."'and password='".$this->password."'";
                $result =execute_sql($link,"bookmanage",$sql);
                $info=  mysqli_fetch_array($result);
                if($info['password']==$this->password){
                    session_start();
                    $_SESSION[username]=$info['username'];
                    if($this->username=="admin"){
                    header("location:adminIndex.php");
                    }else{
                        header("location:memberIndex.php");
                    }
                    exit;
                }
                else{
                    echo "<script language='javascript'>alert('您输入的用户名或密码错误，请重新输入！');history.back();</script>";
                    exit;
                    
                }
            }
        }
        $obj = new chkinput(trim($username),trim($password));
        $obj->checkinput();
?>