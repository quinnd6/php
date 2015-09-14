<?php
    include_once 'config.php';

    class database
    {
        protected $db_conn;
        public $db_name = DB_NAME;
        public $db_host = DB_HOST;
        public $db_password = DB_PASSWORD;
        public $db_user = DB_USER;
        
        function connect()
        {
            try
            {
                $this->db_conn = new PDO("mysql:host =  $this->db_host;dbname=$this->db_name", $this->db_user, $this->db_password);
                return $this->db_conn;
            }
            catch(PDOException $e)
            {
                return $e->getMessage();
            }
        }
        
        
    }
?>
