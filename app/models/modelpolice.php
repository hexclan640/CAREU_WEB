<?php
    class modelpolice
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getProfile($username)
        {
            $this->db->query("SELECT firstName,lastName,password FROM 119calloperator WHERE userName='{$username}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function updateProfile($firstname,$lastname,$username,$password)
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
            // }
        }
    }
?>