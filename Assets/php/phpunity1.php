<?php  
    if(isset($_GET["id"])
        && isset($_GET["cid"]))
    {
        echo "get请求成功,id值为:".$_GET["id"].",cid值为:".$_GET["cid"];
    }
?>