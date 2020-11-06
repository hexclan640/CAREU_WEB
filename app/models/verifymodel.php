<?php
    class verifymodel
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getUserAdmin($userName,$password)
        {
            $this->db->query("SELECT userName,password FROM admin WHERE userName='{$userName}' AND password='{$password}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getUser119($userName,$password)
        {
            $this->db->query("SELECT userName,password FROM 119calloperator WHERE userName='{$userName}' AND password='{$password}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getUser1990($userName,$password)
        {
            $this->db->query("SELECT userName,password FROM 1990calloperator WHERE userName='{$userName}' AND password='{$password}'");
            $result = $this->db->resultSet();
            return $result;
        }
    }
?>