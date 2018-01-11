<?php
    /****************************************************************************
    *    说明: 登录
     ****************************************************************************/
    include_once "dbconfig.php";
    
    $dbcfg = new dbconfig();
    $password_db = "";
    
    if(isset($_POST["userId"]) && isset($_POST["password"]))
    {
        $password = $_POST["password"];
        
        $sql = "select * from tb1 where userid='".$_POST['userId']."'";
        if($dbcfg->do_query($sql, "login_callback") > 0)
        {
            if($password_db == $password)
            {
			
                echo "登录成功...".$_POST["userId"].",".$_POST["password"].",".$password_db;
            }
            else
            {
				
                 echo "登录失败1...".$_POST["userId"].",".$_POST["password"].",".$password_db;
            }
        }
        else
        {
		
             echo "登录失败2...".$_POST["userId"].",".$_POST["password"].",".$password_db;
        }
    }
    
    function login_callback($row)
    {
        global $password_db;
        $password_db = $row["password"];
    }
?>