<?php 
    if(isset($_POST["id"])
        && isset($_POST["cid"]))
    {
        echo "post请求成功,id值为:".$_POST["id"].",cid值为:".$_POST["cid"];
    }    
?>