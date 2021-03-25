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
                $query="UPDATE 1990calloperator SET firstName='{$firstname}',lastName='{$lastname}' WHERE userName='{$username}'";
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
                $query="UPDATE 1990calloperator SET firstName='{$firstname}',lastName='{$lastname}',image='{$imagename}' WHERE userName='{$username}'";
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
            $this->db->query("SELECT request.requestId,firstName,servicerequester.email,lastName,gender,phoneNumber,request.time,request.date,numberOfPatients,policeStation,district FROM 1990ambulancerequest,request,servicerequester WHERE request.requestId=1990ambulancerequest.requestId AND request.userId=servicerequester.userId AND 1990ambulancerequest.flag=0 ORDER BY requestId DESC");
            $result = $this->db->resultSet();
            return $result;
        }

        public function requestReject($requestid)
        {
            $connection = mysqli_connect('localhost','root','','careu');
            $query="UPDATE 1990ambulancerequest SET flag=2 WHERE requestId='{$requestid}'";
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
            $query="UPDATE 1990ambulancerequest SET flag=1 WHERE requestId='{$requestid}'";
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
           
            $this->db->query("SELECT request.requestId,firstName,lastName,gender,email,phoneNumber,request.time,request.date,numberOfPatients,policeStation,district,flag FROM 1990ambulancerequest,request,servicerequester WHERE (request.requestId=1990ambulancerequest.requestId AND request.userId=servicerequester.userId) AND (firstName LIKE '%".$search."%' OR lastName LIKE '%".$search."%' OR email LIKE '%".$search."%' OR phoneNumber LIKE '%".$search."%')");
            $result = $this->db->resultSet();
            return $result;
        }

        public function notviewedSearch()
        {
           
            $this->db->query("SELECT request.requestId,firstName,lastName,gender,email,phoneNumber,request.time,request.date,numberOfPatients,policeStation,district,flag FROM 1990ambulancerequest,request,servicerequester WHERE (request.requestId=1990ambulancerequest.requestId AND request.userId=servicerequester.userId) AND flag=0");
            $result = $this->db->resultSet();
            return $result;
        }

        public function acceptedSearch()
        {
           
            $this->db->query("SELECT request.requestId,firstName,lastName,gender,email,phoneNumber,request.time,request.date,numberOfPatients,policeStation,district,flag FROM 1990ambulancerequest,request,servicerequester WHERE (request.requestId=1990ambulancerequest.requestId AND request.userId=servicerequester.userId) AND flag=1");
            $result = $this->db->resultSet();
            return $result;
        }

        public function rejectedSearch()
        {
           
            $this->db->query("SELECT request.requestId,firstName,lastName,gender,email,phoneNumber,request.time,request.date,numberOfPatients,policeStation,district,flag FROM 1990ambulancerequest,request,servicerequester WHERE (request.requestId=1990ambulancerequest.requestId AND request.userId=servicerequester.userId) AND flag=2");
            $result = $this->db->resultSet();
            return $result;
        }

        public function timeoutSearch()
        {
           
            $this->db->query("SELECT request.requestId,firstName,lastName,gender,email,phoneNumber,request.time,request.date,numberOfPatients,policeStation,district,flag FROM 1990ambulancerequest,request,servicerequester WHERE (request.requestId=1990ambulancerequest.requestId AND request.userId=servicerequester.userId) AND flag=3");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getAllRequests()
        {
            $this->db->query("SELECT request.requestId,firstName,lastName,gender,email,phoneNumber,request.time,request.date,numberOfPatients,policeStation,district,flag FROM 1990ambulancerequest,request,servicerequester WHERE request.requestId=1990ambulancerequest.requestId AND request.userId=servicerequester.userId ORDER BY requestId DESC");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getRequestCount()
        {
            $this->db->query("SELECT requestId FROM 1990ambulancerequest WHERE flag=0");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getRecentRequestAll($requestid)
        {
            $this->db->query("SELECT request.requestId,firstName,lastName,gender,email,phoneNumber,request.time,request.date,numberOfPatients,policeStation,district,description,latitude,longitude,flag FROM 1990ambulancerequest,request,servicerequester WHERE request.userId=servicerequester.userId AND request.requestId='{$requestid}' AND 1990ambulancerequest.requestId='{$requestid}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function requestFlagCheck($requestid){
            $this->db->query("SELECT flag FROM 1990ambulancerequest WHERE requestId='{$requestid}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getAllRequestAll($requestid)
        {
            $this->db->query("SELECT request.requestId,firstName,lastName,gender,email,phoneNumber,request.time,request.date,numberOfPatients,policeStation,district,description,latitude,longitude,flag FROM 1990ambulancerequest,request,servicerequester WHERE request.userId=servicerequester.userId AND request.requestId='{$requestid}' AND 1990ambulancerequest.requestId='{$requestid}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getFeedback($requestid)
        {
            $this->db->query("SELECT feedback.comment,feedback.feedbackTime,feedback.ratings FROM give,feedback WHERE give.requestId={$requestid} AND give.feedbackId=feedback.feedbackId");
            $result = $this->db->resultSet();
            return $result;
        }

        public function updateSentMessage($requestId,$message,$username){
            $this->db->query("SELECT * FROM request WHERE requestId='{$requestId}'");
            $result1 = $this->db->resultSet();
            $userId=$result1[0]->userId;

            $connection = mysqli_connect('localhost','root','','careu');
            $query1="INSERT INTO reply (message,userId,requestId) VALUES ('{$message}','{$userId}','{$requestId}');";
            mysqli_query($connection,$query1);

            $this->db->query("SELECT * FROM reply WHERE userId='{$userId}' AND requestId='{$requestId}' ORDER BY replyId DESC LIMIT 1");
            $result2 = $this->db->resultSet();
            $replyId=$result2[0]->replyId;

            $this->db->query("SELECT * FROM 1990calloperator WHERE username='{$username}'");
            $result3 = $this->db->resultSet();
            $operatorId=$result3[0]->userId;

            $query2="INSERT INTO 1990operatorsend (replyId,userId) VALUES ('{$replyId}','{$operatorId}');";
            mysqli_query($connection,$query2);
            mysqli_close($connection);
        }
    }
?>