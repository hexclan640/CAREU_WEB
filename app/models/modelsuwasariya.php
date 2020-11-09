<?php
    class modelsuwasariya
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getProfile($username)
        {
            $this->db->query("SELECT firstName,lastName,password FROM 1990calloperator WHERE userName='{$username}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function updateProfile($firstname,$lastname,$username,$password)
        {
            $connection = mysqli_connect('localhost','root','','careu');

            $query="UPDATE 1990calloperator SET firstName='{$firstname}',lastName='{$lastname}',password='{$password}' WHERE userName='{$username}'";
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