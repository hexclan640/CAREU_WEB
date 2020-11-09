<?php
    class modeladmin
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getProfile($username)
        {
            $this->db->query("SELECT firstName,lastName,password FROM admin WHERE userName='{$username}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function updateProfile($firstname,$lastname,$username,$password)
        {
            $connection = mysqli_connect('localhost','root','','careu');

            $query="UPDATE admin SET firstName='{$firstname}',lastName='{$lastname}',password='{$password}' WHERE userName='{$username}'";
            $adminInfo=mysqli_query($connection,$query);
            mysqli_close($connection);

            if($adminInfo> 0)
            {   
                return true;
            }
            else
            {
                return false;
            }
            // $this->db->query("UPDATE admin SET firstName='{$firstname}',lastName='{$lastname}',password='{$password}' WHERE userName='{$username}'");
            // $result = $this->db->rowCount();
            // if($result==0)
            // {
            //     return true;
            // }
            // else
            // {
            //     return false;
            // }
        }

        public function updateProPic($username,$imagename,$tmpname)
        {
            $connection = mysqli_connect('localhost','root','','careu');

            $query="UPDATE admin SET image='{$imagename}' WHERE userName='{$username}'";
            $adminInfo=mysqli_query($connection,$query);
            move_uploaded_file($tmpname,"../img/adminProPics/".$tmpname);
            mysqli_close($connection);
        }

        public function getUserRequest($requestID)
        {
            $this->db->query("SELECT firstName,lastName,email,phoneNumber,userName,password,NIC,address,relative1,relativePhone1,relative2,relativePhone2,relative3,relativePhone3 FROM requests WHERE requestID='{$requestID}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function createOperator119($username,$firstname,$lastname,$gender,$password)
        {
            // $operator=$this->db->query("INSERT INTO 119calloperator (userName,firstName,lastName,password) VALUES ('{$username}','{$firstname}','{$lastname}','{$password}');");
            // if($operator)
            // {
            //     return true;
            // }
            // else
            // {
            //     return false;
            // }

            $connection = mysqli_connect('localhost','root','','careu');

            $query="INSERT INTO 119calloperator (userName,firstName,lastName,gender,password) VALUES ('{$username}','{$firstname}','{$lastname}','{$gender}','{$password}');";
            $result=mysqli_query($connection,$query);
            mysqli_close($connection);

            if($result> 0)
            {   
                return true;
            }
            else
            {
                return false;
            }
        }

        public function createOperator1990($username,$firstname,$lastname,$gender,$password)
        {
            // $operator=$this->db->query("INSERT INTO 119calloperator (userName,firstName,lastName,password) VALUES ('{$username}','{$firstname}','{$lastname}','{$password}');");
            // if($operator)
            // {
            //     return true;
            // }
            // else
            // {
            //     return false;
            // }

            $connection = mysqli_connect('localhost','root','','careu');

            $query="INSERT INTO 1990calloperator (userName,firstName,lastName,gender,password) VALUES ('{$username}','{$firstname}','{$lastname}','{$gender}','{$password}');";
            $result=mysqli_query($connection,$query);
            mysqli_close($connection);

            if($result> 0)
            {   
                return true;
            }
            else
            {
                return false;
            }
        }
    }
?>