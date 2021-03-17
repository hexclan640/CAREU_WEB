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
            $this->db->query("SELECT firstName,lastName,password,image FROM 119calloperator WHERE userName='{$username}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function updateProfile($firstname,$lastname,$username,$imagename,$tmpname)
        {
            if(empty($imagename))
            {
                $connection = mysqli_connect('localhost','root','','careu');
                $query="UPDATE 119calloperator SET firstName='{$firstname}',lastName='{$lastname}' WHERE userName='{$username}'";
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
                $query="UPDATE 119calloperator SET firstName='{$firstname}',lastName='{$lastname}',image='{$imagename}' WHERE userName='{$username}'";
                $result1=mysqli_query($connection,$query);
                mysqli_close($connection);
                $result2=move_uploaded_file($tmpname,"img/policeProPics/".$imagename);
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
            $this->db->query("SELECT userName,password FROM 119calloperator WHERE userName='{$username}' AND password='{$oldpassword}'");
            $result = $this->db->resultSet();
            if(!empty($result))
            {
                $connection = mysqli_connect('localhost','root','','careu');
                $query="UPDATE 119calloperator SET password='{$password}' WHERE userName='{$username}'";
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

        public function getAllRequests()
        {
            $this->db->query("SELECT request.requestId,firstName,lastName,email,gender,phoneNumber,request.time,request.date,complainCategory,policeStation,district,flag FROM 119policerequest,request,servicerequester WHERE request.requestId=119policerequest.requestId AND request.userId=servicerequester.userId ORDER BY requestId DESC");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getRecentRequests()
        {
            $this->db->query("SELECT request.requestId,firstName,servicerequester.email,lastName,gender,phoneNumber,request.time,request.date,complainCategory,policeStation,district FROM 119policerequest,request,servicerequester WHERE request.requestId=119policerequest.requestId AND request.userId=servicerequester.userId AND 119policerequest.flag=0 ORDER BY requestId DESC");
            $result = $this->db->resultSet();
            return $result;
        }

        public function requestReject($requestid)
        {
            $connection = mysqli_connect('localhost','root','','careu');
            $query="UPDATE 119policerequest SET flag=2 WHERE requestId='{$requestid}'";
            $result=mysqli_query($connection,$query);
            mysqli_close($connection);
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function requestAccept($requestid)
        {
            $connection = mysqli_connect('localhost','root','','careu');
            $query="UPDATE 119policerequest SET flag=1 WHERE requestId='{$requestid}'";
            $result=mysqli_query($connection,$query);
            mysqli_close($connection);
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function requestsSearch($search)
        {
           
            $this->db->query("SELECT request.requestId,firstName,lastName,email,gender,phoneNumber,request.time,request.date,complainCategory,policeStation,district,flag FROM 119policerequest,request,servicerequester WHERE (request.requestId=119policerequest.requestId AND request.userId=servicerequester.userId) AND (firstName LIKE '%".$search."%' OR lastName LIKE '%".$search."%' OR email LIKE '%".$search."%' OR phoneNumber LIKE '%".$search."%')");
            $result = $this->db->resultSet();
            return $result;
        }

        public function notviewedSearch()
        {
           
            $this->db->query("SELECT request.requestId,firstName,lastName,email,gender,phoneNumber,request.time,request.date,complainCategory,policeStation,district,flag FROM 119policerequest,request,servicerequester WHERE (request.requestId=119policerequest.requestId AND request.userId=servicerequester.userId) AND flag=0");
            $result = $this->db->resultSet();
            return $result;
        }

        public function acceptedSearch()
        {
           
            $this->db->query("SELECT request.requestId,firstName,lastName,email,gender,phoneNumber,request.time,request.date,complainCategory,policeStation,district,flag FROM 119policerequest,request,servicerequester WHERE (request.requestId=119policerequest.requestId AND request.userId=servicerequester.userId) AND flag=1");
            $result = $this->db->resultSet();
            return $result;
        }

        public function rejectedSearch()
        {
           
            $this->db->query("SELECT request.requestId,firstName,lastName,email,gender,phoneNumber,request.time,request.date,complainCategory,policeStation,district,flag FROM 119policerequest,request,servicerequester WHERE (request.requestId=119policerequest.requestId AND request.userId=servicerequester.userId) AND flag=2");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getFeedback($requestid)
        {
            $this->db->query("SELECT feedback.comment,feedback.feedbackTime FROM give,feedback WHERE give.requestId={$requestid} AND give.feedbackId=feedback.feedbackId");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getRequestCount()
        {
            $this->db->query("SELECT requestId FROM 119policerequest WHERE flag=0");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getRecentRequestAll($requestid)
        {
            $this->db->query("SELECT request.requestId,firstName,lastName,gender,phoneNumber,request.time,request.date,complainCategory,policeStation,district,description,latitude,longitude,flag FROM 119policerequest,request,servicerequester WHERE request.userId=servicerequester.userId AND request.requestId='{$requestid}' AND 119policerequest.requestId='{$requestid}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getAllRequestAll($requestid)
        {
            $this->db->query("SELECT request.requestId,firstName,lastName,gender,phoneNumber,request.time,request.date,complainCategory,policeStation,district,description,latitude,longitude,flag FROM 119policerequest,request,servicerequester WHERE request.userId=servicerequester.userId AND request.requestId='{$requestid}' AND 119policerequest.requestId='{$requestid}'");
            $result = $this->db->resultSet();
            return $result;
        }
    }
?>