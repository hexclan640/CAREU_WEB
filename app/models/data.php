<?php
    class data
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

// ADMIN MODEL FUNCTIONS---------------------------------------------------------------------------------------------------

        public function getAdmin($username)
        {
            $this->db->query("SELECT firstName,lastName,password FROM admin WHERE userName='{$username}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function updateAdmin($firstname,$lastname,$username,$password)
        {
            $connection = mysqli_connect('localhost','root','','careu');

            $query="UPDATE admin SET firstName='{$firstname}',lastName='{$lastname}',password='{$password}' WHERE userName='{$username}'";
            $adminInfo=mysqli_query($connection,$query);

            if($adminInfo> 0)
            {   
                return true;
            }
            else
            {
                return false;
            }
            // if($this->db->query("UPDATE admins SET firstName='{$firstname}',lastName='{$lastname}',password='{$password}' WHERE userName='{$username}'"))
            // {
            //     return true;
            // }
            // else
            // {
            //     return false;
            // }
        }

        public function getUserRequest($requestID)
        {
            $this->db->query("SELECT firstName,lastName,email,phoneNumber,userName,password,NIC,address,relative1,relativePhone1,relative2,relativePhone2,relative3,relativePhone3 FROM requests WHERE requestID='{$requestID}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function createOperator119($username,$firstname,$lastname,$password)
        {
            $operator=$this->db->query("INSERT INTO 119calloperator (userName,firstName,lastName,password) VALUES ('{$username}','{$firstname}','{$lastname}','{$password}');");
            if($operator)
            {
                return true;
            }
            else
            {
                return false;
            }

            // $connection = mysqli_connect('localhost','root','','careu');

            // $query="INSERT INTO 119calloperator (userName,firstName,lastName,password) VALUES ('{$username}','{$firstname}','{$lastname}','{$password}');";
            // $result=mysqli_query($connection,$query);

            // if($result> 0)
            // {   
            //     return true;
            // }
            // else
            // {
            //     return false;
            // }
        }

// 119 OPERATOR MODEL FUCTIONS------------------------------------------------------------------------------------------------

        public function getOperator119($username)
        {
            $this->db->query("SELECT firstName,lastName,password FROM 119calloperator WHERE userName='{$username}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function updateOperator119($firstname,$lastname,$username,$password)
        {
            $connection = mysqli_connect('localhost','root','','careu');

            $query="UPDATE 119calloperator SET firstName='{$firstname}',lastName='{$lastname}',password='{$password}' WHERE userName='{$username}'";
            $adminInfo=mysqli_query($connection,$query);

            if($adminInfo> 0)
            {   
                return true;
            }
            else
            {
                return false;
            }
            // if($this->db->query("UPDATE admins SET firstName='{$firstname}',lastName='{$lastname}',password='{$password}' WHERE userName='{$username}'"))
            // {
            //     return true;
            // }
            // else
            // {
            //     return false;
            // }
        }

// 1990 OPERATOR MODEL FUCTIONS------------------------------------------------------------------------------------------------

        public function getOperator1990($username)
        {
            $this->db->query("SELECT firstName,lastName,password FROM 1990calloperator WHERE userName='{$username}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function updateOperator1990($firstname,$lastname,$username,$password)
        {
            $connection = mysqli_connect('localhost','root','','careu');

            $query="UPDATE 1990calloperator SET firstName='{$firstname}',lastName='{$lastname}',password='{$password}' WHERE userName='{$username}'";
            $adminInfo=mysqli_query($connection,$query);

            if($adminInfo> 0)
            {   
                return true;
            }
            else
            {
                return false;
            }
                // if($this->db->query("UPDATE admins SET firstName='{$firstname}',lastName='{$lastname}',password='{$password}' WHERE userName='{$username}'"))
                // {
                //     return true;
                // }
                // else
                // {
                //     return false;
                // }
            // }
        }
    }
?>