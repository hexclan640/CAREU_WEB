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

        public function timeoutSearch()
        {
           
            $this->db->query("SELECT request.requestId,firstName,lastName,email,gender,phoneNumber,request.time,request.date,complainCategory,policeStation,district,flag FROM 119policerequest,request,servicerequester WHERE (request.requestId=119policerequest.requestId AND request.userId=servicerequester.userId) AND flag=3");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getFeedback($requestid)
        {
            $this->db->query("SELECT feedback.comment,feedback.feedbackTime,feedback.ratings FROM give,feedback WHERE give.requestId={$requestid} AND give.feedbackId=feedback.feedbackId");
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
            $this->db->query("SELECT request.requestId,firstName,lastName,gender,email,phoneNumber,request.time,request.date,complainCategory,policeStation,district,description,latitude,longitude,flag FROM 119policerequest,request,servicerequester WHERE request.userId=servicerequester.userId AND request.requestId='{$requestid}' AND 119policerequest.requestId='{$requestid}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getEvidence($requestid)
        {
            $this->db->query("SELECT name FROM photo WHERE requestId={$requestid}");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getAllRequestAll($requestid)
        {
            $this->db->query("SELECT request.requestId,firstName,lastName,gender,email,phoneNumber,request.time,request.date,complainCategory,policeStation,district,description,latitude,longitude,flag FROM 119policerequest,request,servicerequester WHERE request.userId=servicerequester.userId AND request.requestId='{$requestid}' AND 119policerequest.requestId='{$requestid}'");
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

            $this->db->query("SELECT * FROM 119calloperator WHERE username='{$username}'");
            $result3 = $this->db->resultSet();
            $operatorId=$result3[0]->userId;

            $query2="INSERT INTO 119operatorsend (replyId,userId) VALUES ('{$replyId}','{$operatorId}');";
            mysqli_query($connection,$query2);
            mysqli_close($connection);
        }

        public function getPreviousDate()
        {
            $mydate=getdate(date("U"));
            if($mydate["mon"]-1<=0){
                $date=($mydate["year"]-1).'-12-'.$mydate["mday"];
            }else{
                $date=$mydate["year"].'-'.($mydate["mon"]-1).'-'.$mydate["mday"];
            }
            return $date;
        }

        public function getCurrentDate()
        {
            $mydate=getdate(date("U"));
            $date=$mydate["year"].'-'.$mydate["mon"].'-'.$mydate["mday"];
            return $date;
        }

        public function countFlags(){
            $date1=$this->getPreviousDate();
            $date2=$this->getCurrentDate();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE flag=0 AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result1 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE flag=1 AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result2 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE flag=2 AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result3 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE flag=3 AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result4 = $this->db->resultSet();
            $result=array($result1[0]->requestCount,$result2[0]->requestCount,$result3[0]->requestCount,$result4[0]->requestCount);
            return $result;
        }

        public function countCategory(){
            $date1=$this->getPreviousDate();
            $date2=$this->getCurrentDate();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE complainCategory='Accident' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result1 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE complainCategory='Crime' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result2 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE complainCategory='Robbery' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result3 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE complainCategory='Other' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result4 = $this->db->resultSet();
            $result=array($result1[0]->requestCount,$result2[0]->requestCount,$result3[0]->requestCount,$result4[0]->requestCount);
            return $result;
        }

        public function countDistrict(){
            $date1=$this->getPreviousDate();
            $date2=$this->getCurrentDate();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE district LIKE 'Ampara%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result1 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE district LIKE 'Anuradhapura%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result2 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE district LIKE 'Badulla%'AND date BETWEEN '{$date1}' AND '{$date2}'") ;
            $result3 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE district LIKE 'Batticola%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result4 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE district LIKE 'Colombo%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result5 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE district LIKE 'Galle%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result6 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE district LIKE 'Gampaha%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result7 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE district LIKE 'Hambanthota%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result8 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE district LIKE 'Jaffna%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result9 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE district LIKE 'Kaluthatra%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result10 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE district LIKE 'Kandy%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result11 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE district LIKE 'Kegalle%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result12 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE district LIKE 'Kilinochchi%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result13 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE district LIKE 'Kurunagala%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result14 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE district LIKE 'Mannar%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result15 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE district LIKE 'Mathale%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result16 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE district LIKE 'Mathara%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result17 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE district LIKE 'Monaragala%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result18 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE district LIKE 'Mulathivu%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result19 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE district LIKE 'Nuwara Eliya%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result20 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE district LIKE 'Polonnaruwa%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result21 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE district LIKE 'Puththalam%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result22 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE district LIKE 'Rathnapura%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result23 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE district LIKE 'Trincomalee%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result24 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE district LIKE 'Vavuniya%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result25 = $this->db->resultSet();
            $result=array($result1[0]->requestCount,$result2[0]->requestCount,$result3[0]->requestCount,$result4[0]->requestCount,$result5[0]->requestCount,$result6[0]->requestCount,$result7[0]->requestCount,$result8[0]->requestCount,$result9[0]->requestCount,$result10[0]->requestCount,$result11[0]->requestCount,$result12[0]->requestCount,$result13[0]->requestCount,$result14[0]->requestCount,$result15[0]->requestCount,$result16[0]->requestCount,$result17[0]->requestCount,$result18[0]->requestCount,$result19[0]->requestCount,$result20[0]->requestCount,$result21[0]->requestCount,$result22[0]->requestCount,$result23[0]->requestCount,$result24[0]->requestCount,$result25[0]->requestCount);
            return $result;
        }

        public function pdfDateDistrict(){
            $date1=$this->getPreviousDate();
            $date2=$this->getCurrentDate();
            $this->db->query("SELECT date,district,COUNT(*) AS requestCount FROM 119policerequest WHERE date BETWEEN '{$date1}' AND '{$date2}' GROUP BY date,district");
            $result = $this->db->resultSet();
            return $result;
        }

        public function pdfDistrictCategory(){
            $date1=$this->getPreviousDate();
            $date2=$this->getCurrentDate();
            $this->db->query("SELECT district,complainCategory,COUNT(*) AS requestCount FROM 119policerequest WHERE date BETWEEN '{$date1}' AND '{$date2}' GROUP BY district,complainCategory");
            $result = $this->db->resultSet();
            return $result;
        }

        public function pdfPoliceStationCategory(){
            $date1=$this->getPreviousDate();
            $date2=$this->getCurrentDate();
            $this->db->query("SELECT policeStation,complainCategory,COUNT(*) AS requestCount FROM 119policerequest WHERE date BETWEEN '{$date1}' AND '{$date2}' GROUP BY policeStation,complainCategory");
            $result = $this->db->resultSet();
            return $result;
        }

        public function pdfDateCategory(){
            $date1=$this->getPreviousDate();
            $date2=$this->getCurrentDate();
            $this->db->query("SELECT date,complainCategory,COUNT(*) AS requestCount FROM 119policerequest WHERE date BETWEEN '{$date1}' AND '{$date2}' GROUP BY date,complainCategory");
            $result = $this->db->resultSet();
            return $result;
        }
    }
?>