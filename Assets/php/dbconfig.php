<?php
    /****************************************************************************
    *    说明: 对数据库的封装
     ****************************************************************************/
     
    class dbconfig{

        //构造函数
        function __construct()
        {
             if(!$this->mysqli = mysqli_connect($this->host, $this->user, $this->pwd))
            {
                die("Cant connect into database");        
            }
            else
            {
                
                     echo  "连接数据库成功...<br />";
            }
        
            $this->select_db($this->db_name);        
        }
        
        //析构函数
        function __destruct()
        {
            mysqli_close($this->mysqli);
        }
    
        /*
        *    说明:    
        */
        public function get_mysql_handle()
        {
            return $this->mysqli;
        }
            
        /*
        *    说明:    
        */        
        public function select_db($_db)
        {
            if($this->mysqli != null)
            {
                if(mysqli_select_db($this->mysqli, $_db))
                {
                     echo  "连接数据库成功...<br />";
                }
                else
                {
                    die("Cant connect into database");
                }
            }
        }        
    
        /*
        *    说明:    执行一个sql无返回值
        */
        public function execute($_sql)
        {
            if(empty($_sql))
            {
                echo "参数不能为空";
                return;
            }
                
            if(!mysqli_query($this->mysqli, $_sql)) 
            {
             
				  echo  "执行失败...<br />";
            }
        }
        
        /*
        *    说明: 执行一个查询语句，并执行回调函数
        */
        public function do_query($_sql, $query_callback = "")
        {
            if(empty($_sql))
            {
               echo  "参数不能为空";
				
                return;
            }
                
            if($result = mysqli_query($this->mysqli, $_sql)) 
            {
                $num_rows = $result->num_rows;
                if($num_rows > 0)
                {
                     while($row = $result->fetch_assoc())
                    {
                        if(!empty($query_callback))
                        {
                            call_user_func( $query_callback , $row );
                        }
                    }
                    
                    return $num_rows;
                }
                else
                {
                    return 0;
                }
                
                mysqli_free_result($result);    
            }
            else
            {
               echo  "执行失败...<br />";
            }
        }
        
        
        //成员变量
        private $host = "localhost";    //数据库地址
        private $user = "root";            //用户名
        private $pwd = "123456";                //用户密码
        private $db_name = "test";        //数据库
        private $mysqli = null;
    }
?>