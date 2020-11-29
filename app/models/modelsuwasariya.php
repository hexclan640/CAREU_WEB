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
            $this->db->query("SELECT firstName,lastName,password,image FROM 1990calloperator WHERE userName='{$username}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function updateProfile($firstname,$lastname,$username,$imagename,$tmpname)
        {
            
            if(empty($imagename))
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
            }
            else
            {
                $connection = mysqli_connect('localhost','root','','careu');
                $query="UPDATE 1990calloperator SET firstName='{$firstname}',lastName='{$lastname}',password='{$password}',image='{$imagename}' WHERE userName='{$username}'";
                $result1=mysqli_query($connection,$query);
                mysqli_close($connection);
                $result2=move_uploaded_file($tmpname,"img/suwasariyaProPics/".$imagename);
                if($result1 && $result2)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
        }

        public function changePassword($username,$oldpassword,$password)
        {
            $this->db->query("SELECT userName,password FROM 1990calloperator WHERE userName='{$username}' AND password='{$oldpassword}'");
            $result = $this->db->resultSet();
            if(!empty($result))
            {
                $connection = mysqli_connect('localhost','root','','careu');
                $query="UPDATE 1990calloperator SET password='{$password}' WHERE userName='{$username}'";
                $result1=mysqli_query($connection,$query);
                mysqli_close($connection);
                if($result1)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }

        public function getRecentRequests()
        {
            $this->db->query("SELECT request.requestId,firstName,lastName,gender,phoneNumber,request.time,request.date,numberOfPatients,policeStation,district FROM 1990ambulancerequest,request,servicerequester WHERE request.requestId=1990ambulancerequest.requestId AND request.userId=servicerequester.userId ORDER BY requestId DESC");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getRecentRequestAll($requestid)
        {
            $this->db->query("SELECT request.requestId,firstName,lastName,gender,phoneNumber,request.time,request.date,numberOfPatients,policeStation,district,description FROM 1990ambulancerequest,request,servicerequester WHERE request.userId=servicerequester.userId AND request.requestId='{$requestid}' AND 1990ambulancerequest.requestId='{$requestid}'");
            // $this->db->query("SELECT time,date,numberOfPatients,policeStation,district,description FROM 1990ambulancerequest WHERE 1990ambulancerequest.requestId='{$requestid}'");
            $result = $this->db->resultSet();
            return $result;
        }
    }
?>