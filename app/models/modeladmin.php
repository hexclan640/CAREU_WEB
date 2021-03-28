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
            $this->db->query("SELECT firstName,lastName,password,image FROM admin WHERE userName='{$username}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function updateProfile($firstname,$lastname,$username,$imagename,$tmpname)
        {
            if(empty($imagename))
            {
                $connection = mysqli_connect('localhost','root','','careu');
                $query="UPDATE admin SET firstName='{$firstname}',lastName='{$lastname}' WHERE userName='{$username}'";
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
                $query="UPDATE admin SET firstName='{$firstname}',lastName='{$lastname}',image='{$imagename}' WHERE userName='{$username}'";
                $result1=mysqli_query($connection,$query);
                mysqli_close($connection);
                $result2=move_uploaded_file($tmpname,"img/adminProPics/".$imagename);
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
            $this->db->query("SELECT userName,password FROM admin WHERE userName='{$username}' AND password='{$oldpassword}'");
            $result = $this->db->resultSet();
            if(!empty($result))
            {
                $connection = mysqli_connect('localhost','root','','careu');
                $query="UPDATE admin SET password='{$password}' WHERE userName='{$username}'";
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

        public function getUserBrief()
        {
            $this->db->query("SELECT userId,firstName,lastName,email,phoneNumber,gender FROM servicerequester WHERE status=1 ORDER BY userId DESC");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getRequestBrief()
        {
            $this->db->query("SELECT userId,firstName,lastName,email,phoneNumber,gender FROM servicerequester WHERE status=0 ORDER BY userId DESC");
            $result = $this->db->resultSet();
            return $result;
        }

        public function unverifiedSearch($search)
        {
           
            $this->db->query("SELECT userId,firstName,lastName,email,phoneNumber,gender FROM servicerequester WHERE (firstName LIKE '%".$search."%' OR lastName LIKE '%".$search."%' OR email LIKE '%".$search."%' OR phoneNumber LIKE '%".$search."%') AND status=0");
            $result = $this->db->resultSet();
            return $result;
        }

        public function verifiedSearch($search)
        {
           
            $this->db->query("SELECT userId,firstName,lastName,email,phoneNumber,gender FROM servicerequester WHERE (firstName LIKE '%".$search."%' OR lastName LIKE '%".$search."%' OR email LIKE '%".$search."%' OR phoneNumber LIKE '%".$search."%') AND status=1");
            $result = $this->db->resultSet();
            return $result;
        }

        public function checkOperator119($search)
        {
            $this->db->query("SELECT username FROM 119calloperator WHERE username LIKE '%".$search."%' AND flag=1");
            $result = $this->db->resultSet();
            return $result;
        }

        public function checkUsername119($search)
        {
            $this->db->query("SELECT userName FROM 119calloperator WHERE userName='{$search}' AND flag=1");
            $result = $this->db->resultSet();
            return $result;
        }

        public function checkOperator1990($search)
        {
            $this->db->query("SELECT username FROM 1990calloperator WHERE username LIKE '%".$search."%' AND flag=1");
            $result = $this->db->resultSet();
            return $result;
        }

        public function checkUsername1990($search)
        {
            $this->db->query("SELECT userName FROM 1990calloperator WHERE userName='{$search}' AND flag=1");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getRequestCount()
        {
            $this->db->query("SELECT userId FROM servicerequester WHERE status=0");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getUser($userid)
        {
            $this->db->query("SELECT * FROM servicerequester WHERE userId='{$userid}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getId($userid)
        {
            $this->db->query("SELECT idPhoto FROM idphoto WHERE userId='{$userid}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getVerifiedUser($userid)
        {
            $this->db->query("SELECT * FROM servicerequester WHERE userId='{$userid}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getPoliceRequestAll($requestid)
        {
            $this->db->query("SELECT request.requestId,request.userId,firstName,lastName,email,gender,phoneNumber,request.time,request.date,complainCategory,policeStation,district,description,latitude,longitude,flag FROM 119policerequest,request,servicerequester WHERE request.userId=servicerequester.userId AND request.requestId='{$requestid}' AND 119policerequest.requestId='{$requestid}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getFeedback($requestid)
        {
            $this->db->query("SELECT feedback.comment,feedback.feedbackTime,feedback.ratings FROM give,feedback WHERE give.requestId={$requestid} AND give.feedbackId=feedback.feedbackId");
            $result = $this->db->resultSet();
            return $result;
        }


        public function getSuwasariyaRequestAll($requestid)
        {
            $this->db->query("SELECT request.requestId,request.userId,firstName,lastName,gender,email,phoneNumber,request.time,request.date,numberOfPatients,policeStation,district,description,latitude,longitude,flag FROM 1990ambulancerequest,request,servicerequester WHERE request.userId=servicerequester.userId AND request.requestId='{$requestid}' AND 1990ambulancerequest.requestId='{$requestid}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getPoliceHistory($userid){
            $this->db->query("SELECT request.requestId,119policerequest.flag,request.time,request.date,complainCategory,policeStation,district FROM 119policerequest,request WHERE request.userId='{$userid}' AND request.requestId=119policerequest.requestId ORDER BY requestId DESC");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getSuwasariyaHistory($userid){
            $this->db->query("SELECT request.requestId,1990ambulancerequest.flag,request.time,request.date,numberOfPatients,policeStation,district FROM 1990ambulancerequest,request WHERE request.userId='{$userid}' AND request.requestId=1990ambulancerequest.requestId ORDER BY requestId DESC");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getFeedbackHistory($userid)
        {
            $this->db->query("SELECT feedback.feedbackId,feedback.comment,feedback.feedbackTime,feedback.ratings FROM give,feedback WHERE give.userId={$userid} AND give.feedbackId=feedback.feedbackId");
            $result = $this->db->resultSet();
            return $result;
        }

        public function rejectRequest($userid)
        {
            $connection = mysqli_connect('localhost','root','','careu');
            $query="UPDATE servicerequester SET status=2 WHERE userId='{$userid}'";
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

        public function blockUser($userid)
        {
            $connection = mysqli_connect('localhost','root','','careu');
            $query="UPDATE servicerequester SET status=3 WHERE userId='{$userid}'";
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

        public function acceptRequest($userid)
        {
            $connection = mysqli_connect('localhost','root','','careu');
            $query="UPDATE servicerequester SET status=1 WHERE userId='{$userid}'";
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

        public function getEmail($userid){
            $this->db->query("SELECT * FROM servicerequester WHERE userId='{$userid}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function createOperator119($username,$firstname,$lastname,$gender,$password)
        {
            $connection = mysqli_connect('localhost','root','','careu');
            $query="INSERT INTO 119calloperator (userName,firstName,lastName,gender,password,flag) VALUES ('{$username}','{$firstname}','{$lastname}','{$gender}','{$password}',1);";
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
            $connection = mysqli_connect('localhost','root','','careu');
            $query="INSERT INTO 1990calloperator (userName,firstName,lastName,gender,password,flag) VALUES ('{$username}','{$firstname}','{$lastname}','{$gender}','{$password}',1);";
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

        public function getOperator119()
        {
            $this->db->query("SELECT * FROM 119calloperator WHERE flag=1 ORDER BY userId DESC");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getOperator1990()
        {
            $this->db->query("SELECT * FROM 1990calloperator WHERE flag=1 ORDER BY userId DESC");
            $result = $this->db->resultSet();
            return $result;
        }

        public function removeOperator119($id)
        {
            $connection = mysqli_connect('localhost','root','','careu');
            $query="UPDATE 119calloperator SET flag=0 WHERE userId='{$id}';";
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

        public function removeOperator1990($id)
        {
            $connection = mysqli_connect('localhost','root','','careu');
            $query="UPDATE 1990calloperator SET flag=0 WHERE userId='{$id}';";
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

        public function getCardiac()
        {
            $this->db->query("SELECT id,step,description,image FROM instruction1 ORDER BY id ASC");
            $result = $this->db->resultSet();
            return $result;
        }

        public function addCardiac($stepnumber,$description,$imagename,$tmpname)
        {
            if(empty($imagename))
            {
                $connection = mysqli_connect('localhost','root','','careu');
                $query="INSERT INTO instruction1 (step,description) VALUES ('{$stepnumber}','{$description}');";
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
                $connection = mysqli_connect('localhost','root','','careu');
                $query="INSERT INTO instruction1 (step,description,image) VALUES ('{$stepnumber}','{$description}','{$imagename}');";
                $result1=mysqli_query($connection,$query);
                $result3=move_uploaded_file($tmpname,"../../careu-php/images/".$imagename);
                mysqli_close($connection);
                if($result1 && $result3)
                {   
                    return true;
                }
                else
                {
                    return false;
                }
            }
        }

        public function deleteCardiac($id)
        {
            $connection = mysqli_connect('localhost','root','','careu');
            $query="DELETE FROM instruction1 WHERE id='{$id}'";
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

        public function editCardiac($id)
        {
            $this->db->query("SELECT id,step,description,image FROM instruction1 WHERE id='{$id}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function saveCardiac($id,$stepnumber,$description,$imagename,$tmpname)
        {
            if(empty($imagename))
            {
                $connection = mysqli_connect('localhost','root','','careu');
                $query="UPDATE instruction1 SET step='{$stepnumber}',description='{$description}' WHERE id='{$id}'";
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
                $connection = mysqli_connect('localhost','root','','careu');
                $query="UPDATE instruction1 SET step='{$stepnumber}',description='{$description}',image='{$imagename}' WHERE id='{$id}'";
                $result1=mysqli_query($connection,$query);
                $result2=move_uploaded_file($tmpname,"../../careu-php/images/".$imagename);
                mysqli_close($connection);
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

        public function getBleeding()
        {
            $this->db->query("SELECT id,step,description,image FROM instruction2 ORDER BY id ASC");
            $result = $this->db->resultSet();
            return $result;
        }

        public function addBleeding($stepnumber,$description,$imagename,$tmpname)
        {
            if(empty($imagename))
            {
                $connection = mysqli_connect('localhost','root','','careu');
                $query="INSERT INTO instruction2 (step,description) VALUES ('{$stepnumber}','{$description}');";
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
                $connection = mysqli_connect('localhost','root','','careu');
                $query="INSERT INTO instruction2 (step,description,image) VALUES ('{$stepnumber}','{$description}','{$imagename}');";
                $result1=mysqli_query($connection,$query);
                $result2=move_uploaded_file($tmpname,"../../careu-php/images/".$imagename);
                mysqli_close($connection);
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

        public function deleteBleeding($id)
        {
            $connection = mysqli_connect('localhost','root','','careu');
            $query="DELETE FROM instruction2 WHERE id='{$id}'";
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

        public function editBleeding($id)
        {
            $this->db->query("SELECT id,step,description,image FROM instruction2 WHERE id='{$id}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function saveBleeding($id,$stepnumber,$description,$imagename,$tmpname)
        {
            if(empty($imagename))
            {
                $connection = mysqli_connect('localhost','root','','careu');
                $query="UPDATE instruction2 SET step='{$stepnumber}',description='{$description}' WHERE id='{$id}'";
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
                $connection = mysqli_connect('localhost','root','','careu');
                $query="UPDATE instruction2 SET step='{$stepnumber}',description='{$description}',image='{$imagename}' WHERE id='{$id}'";
                $result1=mysqli_query($connection,$query);
                $result2=move_uploaded_file($tmpname,"../../careu-php/images/".$imagename);
                mysqli_close($connection);
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


        public function getBurn()
        {
            $this->db->query("SELECT id,step,description,image FROM instruction3 ORDER BY id ASC");
            $result = $this->db->resultSet();
            return $result;
        }

        public function addBurn($stepnumber,$description,$imagename,$tmpname)
        {
            if(empty($imagename))
            {
                $connection = mysqli_connect('localhost','root','','careu');
                $query="INSERT INTO instruction3 (step,description) VALUES ('{$stepnumber}','{$description}');";
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
                $connection = mysqli_connect('localhost','root','','careu');
                $query="INSERT INTO instruction3 (step,description,image) VALUES ('{$stepnumber}','{$description}','{$imagename}');";
                $result1=mysqli_query($connection,$query);
                $result2=move_uploaded_file($tmpname,"../../careu-php/images/".$imagename);
                mysqli_close($connection);
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

        public function deleteBurn($id)
        {
            $connection = mysqli_connect('localhost','root','','careu');
            $query="DELETE FROM instruction3 WHERE id='{$id}'";
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

        public function editBurn($id)
        {
            $this->db->query("SELECT id,step,description,image FROM instruction3 WHERE id='{$id}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function saveBurn($id,$stepnumber,$description,$imagename,$tmpname)
        {
            if(empty($imagename))
            {
                $connection = mysqli_connect('localhost','root','','careu');
                $query="UPDATE instruction3 SET step='{$stepnumber}',description='{$description}' WHERE id='{$id}'";
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
                $connection = mysqli_connect('localhost','root','','careu');
                $query="UPDATE instruction3 SET step='{$stepnumber}',description='{$description}',image='{$imagename}' WHERE id='{$id}'";
                $result1=mysqli_query($connection,$query);
                $result2=move_uploaded_file($tmpname,"../../careu-php/images/".$imagename);
                mysqli_close($connection);
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

        public function getFracture()
        {
            $this->db->query("SELECT id,step,description,image FROM instruction4 ORDER BY id ASC");
            $result = $this->db->resultSet();
            return $result;
        }

        public function addFracture($stepnumber,$description,$imagename,$tmpname)
        {
            if(empty($imagename))
            {
                $connection = mysqli_connect('localhost','root','','careu');
                $query="INSERT INTO instruction4 (step,description) VALUES ('{$stepnumber}','{$description}');";
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
                $connection = mysqli_connect('localhost','root','','careu');
                $query="INSERT INTO instruction4 (step,description,image) VALUES ('{$stepnumber}','{$description}','{$imagename}');";
                $result1=mysqli_query($connection,$query);
                $result3=move_uploaded_file($tmpname,"../../careu-php/images/".$imagename);
                mysqli_close($connection);
                if($result1 && $result3)
                {   
                    return true;
                }
                else
                {
                    return false;
                }
            }
        }

        public function deleteFracture($id)
        {
            $connection = mysqli_connect('localhost','root','','careu');
            $query="DELETE FROM instruction4 WHERE id='{$id}'";
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

        public function editFracture($id)
        {
            $this->db->query("SELECT id,step,description,image FROM instruction4 WHERE id='{$id}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function saveFracture($id,$stepnumber,$description,$imagename,$tmpname)
        {
            if(empty($imagename))
            {
                $connection = mysqli_connect('localhost','root','','careu');
                $query="UPDATE instruction4 SET step='{$stepnumber}',description='{$description}' WHERE id='{$id}'";
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
                $connection = mysqli_connect('localhost','root','','careu');
                $query="UPDATE instruction4 SET step='{$stepnumber}',description='{$description}',image='{$imagename}' WHERE id='{$id}'";
                $result1=mysqli_query($connection,$query);
                $result2=move_uploaded_file($tmpname,"../../careu-php/images/".$imagename);
                mysqli_close($connection);
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

        public function getBlister()
        {
            $this->db->query("SELECT id,step,description,image FROM instruction5 ORDER BY id ASC");
            $result = $this->db->resultSet();
            return $result;
        }

        public function addBlister($stepnumber,$description,$imagename,$tmpname)
        {
            if(empty($imagename))
            {
                $connection = mysqli_connect('localhost','root','','careu');
                $query="INSERT INTO instruction5 (step,description) VALUES ('{$stepnumber}','{$description}');";
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
                $connection = mysqli_connect('localhost','root','','careu');
                $query="INSERT INTO instruction5 (step,description,image) VALUES ('{$stepnumber}','{$description}','{$imagename}');";
                $result1=mysqli_query($connection,$query);
                $result3=move_uploaded_file($tmpname,"../../careu-php/images/".$imagename);
                mysqli_close($connection);
                if($result1 && $result3)
                {   
                    return true;
                }
                else
                {
                    return false;
                }
            }
        }

        public function deleteBlister($id)
        {
            $connection = mysqli_connect('localhost','root','','careu');
            $query="DELETE FROM instruction5 WHERE id='{$id}'";
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

        public function editBlister($id)
        {
            $this->db->query("SELECT id,step,description,image FROM instruction5 WHERE id='{$id}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function saveBlister($id,$stepnumber,$description,$imagename,$tmpname)
        {
            if(empty($imagename))
            {
                $connection = mysqli_connect('localhost','root','','careu');
                $query="UPDATE instruction5 SET step='{$stepnumber}',description='{$description}' WHERE id='{$id}'";
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
                $connection = mysqli_connect('localhost','root','','careu');
                $query="UPDATE instruction5 SET step='{$stepnumber}',description='{$description}',image='{$imagename}' WHERE id='{$id}'";
                $result1=mysqli_query($connection,$query);
                $result2=move_uploaded_file($tmpname,"../../careu-php/images/".$imagename);
                mysqli_close($connection);
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

        public function getSprain()
        {
            $this->db->query("SELECT id,step,description,image FROM instruction6 ORDER BY id ASC");
            $result = $this->db->resultSet();
            return $result;
        }

        public function addSprain($stepnumber,$description,$imagename,$tmpname)
        {
            if(empty($imagename))
            {
                $connection = mysqli_connect('localhost','root','','careu');
                $query="INSERT INTO instruction6 (step,description) VALUES ('{$stepnumber}','{$description}');";
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
                $connection = mysqli_connect('localhost','root','','careu');
                $query="INSERT INTO instruction6 (step,description,image) VALUES ('{$stepnumber}','{$description}','{$imagename}');";
                $result1=mysqli_query($connection,$query);
                $result3=move_uploaded_file($tmpname,"../../careu-php/images/".$imagename);
                mysqli_close($connection);
                if($result1 && $result3)
                {   
                    return true;
                }
                else
                {
                    return false;
                }
            }
        }

        public function deleteSprain($id)
        {
            $connection = mysqli_connect('localhost','root','','careu');
            $query="DELETE FROM instruction6 WHERE id='{$id}'";
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

        public function editSprain($id)
        {
            $this->db->query("SELECT id,step,description,image FROM instruction6 WHERE id='{$id}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function saveSprain($id,$stepnumber,$description,$imagename,$tmpname)
        {
            if(empty($imagename))
            {
                $connection = mysqli_connect('localhost','root','','careu');
                $query="UPDATE instruction6 SET step='{$stepnumber}',description='{$description}' WHERE id='{$id}'";
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
                $connection = mysqli_connect('localhost','root','','careu');
                $query="UPDATE instruction6 SET step='{$stepnumber}',description='{$description}',image='{$imagename}' WHERE id='{$id}'";
                $result1=mysqli_query($connection,$query);
                $result2=move_uploaded_file($tmpname,"../../careu-php/images/".$imagename);
                mysqli_close($connection);
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

        public function getNosebleed()
        {
            $this->db->query("SELECT id,step,description,image FROM instruction7 ORDER BY id ASC");
            $result = $this->db->resultSet();
            return $result;
        }

        public function addNosebleed($stepnumber,$description,$imagename,$tmpname)
        {
            if(empty($imagename))
            {
                $connection = mysqli_connect('localhost','root','','careu');
                $query="INSERT INTO instruction7 (step,description) VALUES ('{$stepnumber}','{$description}');";
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
                $connection = mysqli_connect('localhost','root','','careu');
                $query="INSERT INTO instruction7 (step,description,image) VALUES ('{$stepnumber}','{$description}','{$imagename}');";
                $result1=mysqli_query($connection,$query);
                $result3=move_uploaded_file($tmpname,"../../careu-php/images/".$imagename);
                mysqli_close($connection);
                if($result1 && $result3)
                {   
                    return true;
                }
                else
                {
                    return false;
                }
            }
        }

        public function deleteNosebleed($id)
        {
            $connection = mysqli_connect('localhost','root','','careu');
            $query="DELETE FROM instruction7 WHERE id='{$id}'";
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

        public function editNosebleed($id)
        {
            $this->db->query("SELECT id,step,description,image FROM instruction7 WHERE id='{$id}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function saveNosebleed($id,$stepnumber,$description,$imagename,$tmpname)
        {
            if(empty($imagename))
            {
                $connection = mysqli_connect('localhost','root','','careu');
                $query="UPDATE instruction7 SET step='{$stepnumber}',description='{$description}' WHERE id='{$id}'";
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
                $connection = mysqli_connect('localhost','root','','careu');
                $query="UPDATE instruction7 SET step='{$stepnumber}',description='{$description}',image='{$imagename}' WHERE id='{$id}'";
                $result1=mysqli_query($connection,$query);
                $result2=move_uploaded_file($tmpname,"../../careu-php/images/".$imagename);
                mysqli_close($connection);
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

        public function getToothache()
        {
            $this->db->query("SELECT id,step,description,image FROM instruction8 ORDER BY id ASC");
            $result = $this->db->resultSet();
            return $result;
        }

        public function addToothache($stepnumber,$description,$imagename,$tmpname)
        {
            if(empty($imagename))
            {
                $connection = mysqli_connect('localhost','root','','careu');
                $query="INSERT INTO instruction8 (step,description) VALUES ('{$stepnumber}','{$description}');";
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
                $connection = mysqli_connect('localhost','root','','careu');
                $query="INSERT INTO instruction8 (step,description,image) VALUES ('{$stepnumber}','{$description}','{$imagename}');";
                $result1=mysqli_query($connection,$query);
                $result3=move_uploaded_file($tmpname,"../../careu-php/images/".$imagename);
                mysqli_close($connection);
                if($result1 && $result3)
                {   
                    return true;
                }
                else
                {
                    return false;
                }
            }
        }

        public function deleteToothache($id)
        {
            $connection = mysqli_connect('localhost','root','','careu');
            $query="DELETE FROM instruction8 WHERE id='{$id}'";
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

        public function editToothache($id)
        {
            $this->db->query("SELECT id,step,description,image FROM instruction8 WHERE id='{$id}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function saveToothache($id,$stepnumber,$description,$imagename,$tmpname)
        {
            if(empty($imagename))
            {
                $connection = mysqli_connect('localhost','root','','careu');
                $query="UPDATE instruction8 SET step='{$stepnumber}',description='{$description}' WHERE id='{$id}'";
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
                $connection = mysqli_connect('localhost','root','','careu');
                $query="UPDATE instruction8 SET step='{$stepnumber}',description='{$description}',image='{$imagename}' WHERE id='{$id}'";
                $result1=mysqli_query($connection,$query);
                $result2=move_uploaded_file($tmpname,"../../careu-php/images/".$imagename);
                mysqli_close($connection);
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

        public function getPreviousDate()
        {
            return date('Y-m-d', strtotime('-1 months'));
        }

        public function getCurrentDate()
        {
            return date("Y-m-d");
        }

        public function countFlagsAdmin(){
            $date1=$this->getPreviousDate();
            $date2=$this->getCurrentDate();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM servicerequester WHERE status=0 AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result1 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM servicerequester WHERE status=1 AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result2 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM servicerequester WHERE status=2 AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result3 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM servicerequester WHERE status=3 AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result4 = $this->db->resultSet();
            $result=array($result1[0]->requestCount,$result2[0]->requestCount,$result3[0]->requestCount,$result4[0]->requestCount);
            return $result;
        }

        public function eachServiceCountAdmin(){
            $date1=$this->getPreviousDate();
            $date2=$this->getCurrentDate();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE date BETWEEN '{$date1}' AND '{$date2}'");
            $result1 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE date BETWEEN '{$date1}' AND '{$date2}'");
            $result2 = $this->db->resultSet();
            $result=array($result1[0]->requestCount,$result2[0]->requestCount);
            return $result;
        }

        public function eachServiceCountFourWeekAdmin(){
            $date1=$this->getCurrentDate();
            $date2=date("Y-m-d", strtotime("-1 week"));
            $date3=date("Y-m-d", strtotime("-2 week"));
            $date4=date("Y-m-d", strtotime("-3 week"));
            $date5=date("Y-m-d", strtotime("-4 week"));
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE date BETWEEN '{$date2}' AND '{$date1}'");
            $result1 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE date BETWEEN '{$date2}' AND '{$date1}'");
            $result2 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE date BETWEEN '{$date3}' AND '{$date2}'");
            $result3 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE date BETWEEN '{$date3}' AND '{$date2}'");
            $result4 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE date BETWEEN '{$date4}' AND '{$date3}'");
            $result5 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE date BETWEEN '{$date4}' AND '{$date3}'");
            $result6 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 119policerequest WHERE date BETWEEN '{$date5}' AND '{$date4}'");
            $result7 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE date BETWEEN '{$date5}' AND '{$date4}'");
            $result8 = $this->db->resultSet();
            $result=array($result1[0]->requestCount,$result2[0]->requestCount,$result3[0]->requestCount,$result4[0]->requestCount,$result5[0]->requestCount,$result6[0]->requestCount,$result7[0]->requestCount,$result8[0]->requestCount);
            return $result;
        }

        public function pdfWeekRequestAdmin(){
            $date1=$this->getCurrentDate();
            $date2=date("Y-m-d", strtotime("-1 week"));
            $date3=date("Y-m-d", strtotime("-2 week"));
            $date4=date("Y-m-d", strtotime("-3 week"));
            $date5=date("Y-m-d", strtotime("-4 week"));
            $this->db->query("SELECT COUNT(*) AS requestCount FROM servicerequester WHERE date BETWEEN '{$date2}' AND '{$date1}'");
            $result1 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM servicerequester WHERE date BETWEEN '{$date3}' AND '{$date2}'");
            $result2 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM servicerequester WHERE date BETWEEN '{$date4}' AND '{$date3}'");
            $result3 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM servicerequester WHERE date BETWEEN '{$date5}' AND '{$date4}'");
            $result4 = $this->db->resultSet();
            $result=array(($date2.' to '.$date1)=>$result1[0]->requestCount,($date3.' to '.$date2)=>$result2[0]->requestCount,($date4.' to '.$date3)=>$result3[0]->requestCount,($date5.' to '.$date4)=>$result4[0]->requestCount);
            return $result;
        }

        public function pdfAcceptedRequestsAdmin(){
            $date1=$this->getPreviousDate();
            $date2=$this->getCurrentDate();
            $this->db->query("SELECT userId,firstName,lastName,nicNumber,gender,email,address,dateOfBirth,phoneNumber,date FROM servicerequester WHERE status=1 AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function pdfRejectedRequestsAdmin(){
            $date1=$this->getPreviousDate();
            $date2=$this->getCurrentDate();
            $this->db->query("SELECT userId,firstName,lastName,nicNumber,gender,email,address,dateOfBirth,phoneNumber,date FROM servicerequester WHERE status=2 AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function pdfBlockedRequestsAdmin(){
            $date1=$this->getPreviousDate();
            $date2=$this->getCurrentDate();
            $this->db->query("SELECT userId,firstName,lastName,nicNumber,gender,email,address,dateOfBirth,phoneNumber,date FROM servicerequester WHERE status=3 AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function pdfPoliceOperatorsAdmin(){
            $this->db->query("SELECT userId,userName,firstName,lastName,gender FROM 119calloperator WHERE flag=1");
            $result = $this->db->resultSet();
            return $result;
        }

        public function pdfSuwasariyaOperatorsAdmin(){
            $this->db->query("SELECT userId,userName,firstName,lastName,gender FROM 1990calloperator WHERE flag=1");
            $result = $this->db->resultSet();
            return $result;
        }

        public function countFlagsPolice(){
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

        public function countCategoryPolice(){
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

        public function countDistrictPolice(){
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

        public function pdfDateDistrictPolice(){
            $date1=$this->getPreviousDate();
            $date2=$this->getCurrentDate();
            $this->db->query("SELECT date,district,COUNT(*) AS requestCount FROM 119policerequest WHERE date BETWEEN '{$date1}' AND '{$date2}' GROUP BY date,district");
            $result = $this->db->resultSet();
            return $result;
        }

        public function pdfDistrictCategoryPolice(){
            $date1=$this->getPreviousDate();
            $date2=$this->getCurrentDate();
            $this->db->query("SELECT district,complainCategory,COUNT(*) AS requestCount FROM 119policerequest WHERE date BETWEEN '{$date1}' AND '{$date2}' GROUP BY district,complainCategory");
            $result = $this->db->resultSet();
            return $result;
        }

        public function pdfPoliceStationCategoryPolice(){
            $date1=$this->getPreviousDate();
            $date2=$this->getCurrentDate();
            $this->db->query("SELECT policeStation,complainCategory,COUNT(*) AS requestCount FROM 119policerequest WHERE date BETWEEN '{$date1}' AND '{$date2}' GROUP BY policeStation,complainCategory");
            $result = $this->db->resultSet();
            return $result;
        }

        public function pdfDateCategoryPolice(){
            $date1=$this->getPreviousDate();
            $date2=$this->getCurrentDate();
            $this->db->query("SELECT date,complainCategory,COUNT(*) AS requestCount FROM 119policerequest WHERE date BETWEEN '{$date1}' AND '{$date2}' GROUP BY date,complainCategory");
            $result = $this->db->resultSet();
            return $result;
        }

        public function pdfRequestFeedbackPolice(){
            $date1=$this->getPreviousDate();
            $date2=$this->getCurrentDate();
            $this->db->query("SELECT 119policerequest.requestId,119policerequest.date,119policerequest.time,119policerequest.policeStation,119policerequest.complainCategory,feedback.comment,feedback.ratings FROM 119policerequest,feedback,give WHERE give.feedbackId=feedback.feedbackId AND give.requestId=119policerequest.requestId AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function pdfAllRequestFeedbackPolice(){
            $date1=$this->getPreviousDate();
            $date2=$this->getCurrentDate();
            $this->db->query("SELECT 119policerequest.requestId,119policerequest.date,119policerequest.time,119policerequest.policeStation,119policerequest.complainCategory,s.comment,s.ratings FROM 119policerequest LEFT JOIN (SELECT feedback.feedbackId,feedback.comment,feedback.ratings,give.requestId FROM feedback,give WHERE feedback.feedbackId=give.feedbackId) AS s  ON s.requestId=119policerequest.requestId WHERE 119policerequest.date BETWEEN '{$date1}' AND '{$date2}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function pdfAllRequestFeedbackUserPolice(){
            $date1=$this->getPreviousDate();
            $date2=$this->getCurrentDate();
            $this->db->query("SELECT servicerequester.firstName,servicerequester.lastName,servicerequester.nicNumber,servicerequester.phoneNumber,servicerequester.email,servicerequester.address,119policerequest.date,119policerequest.time,119policerequest.district,119policerequest.policeStation,119policerequest.complainCategory FROM request,servicerequester,119policerequest WHERE request.requestId=119policerequest.requestId AND request.userId=servicerequester.userId AND 119policerequest.date BETWEEN '{$date1}' AND '{$date2}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function pdfRequestkUserPolice(){
            $date1=$this->getPreviousDate();
            $date2=$this->getCurrentDate();
            $this->db->query("SELECT servicerequester.firstName,servicerequester.lastName,servicerequester.gender,servicerequester.nicNumber,servicerequester.email,servicerequester.phoneNumber,servicerequester.address,COUNT(*) AS requestCount FROM servicerequester,request,119policerequest WHERE 119policerequest.requestId=request.requestId AND request.userId=servicerequester.userId AND 119policerequest.date BETWEEN '{$date1}' AND '{$date2}' GROUP BY servicerequester.userId");
            $result = $this->db->resultSet();
            return $result;
        }

        public function countFlagsSuwasariya(){
            $date1=$this->getPreviousDate();
            $date2=$this->getCurrentDate();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE flag=0 AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result1 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE flag=1 AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result2 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE flag=2 AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result3 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE flag=3 AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result4 = $this->db->resultSet();
            $result=array($result1[0]->requestCount,$result2[0]->requestCount,$result3[0]->requestCount,$result4[0]->requestCount);
            return $result;
        }

        public function countCategorySuwasariya(){
            $date1=$this->getPreviousDate();
            $date2=$this->getCurrentDate();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE numberOfPatients=1 AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result1 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE numberOfPatients=2 AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result2 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE numberOfPatients=3 AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result3 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE numberOfPatients=4 AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result4 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE numberOfPatients=5 AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result5 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE numberOfPatients>5 AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result6 = $this->db->resultSet();
            $result=array($result1[0]->requestCount,$result2[0]->requestCount,$result3[0]->requestCount,$result4[0]->requestCount,$result5[0]->requestCount,$result6[0]->requestCount);
            return $result;
        }

        public function countDistrictSuwasariya(){
            $date1=$this->getPreviousDate();
            $date2=$this->getCurrentDate();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE district LIKE 'Ampara%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result1 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE district LIKE 'Anuradhapura%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result2 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE district LIKE 'Badulla%'AND date BETWEEN '{$date1}' AND '{$date2}'") ;
            $result3 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE district LIKE 'Batticola%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result4 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE district LIKE 'Colombo%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result5 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE district LIKE 'Galle%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result6 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE district LIKE 'Gampaha%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result7 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE district LIKE 'Hambanthota%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result8 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE district LIKE 'Jaffna%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result9 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE district LIKE 'Kaluthatra%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result10 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE district LIKE 'Kandy%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result11 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE district LIKE 'Kegalle%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result12 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE district LIKE 'Kilinochchi%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result13 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE district LIKE 'Kurunagala%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result14 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE district LIKE 'Mannar%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result15 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE district LIKE 'Mathale%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result16 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE district LIKE 'Mathara%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result17 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE district LIKE 'Monaragala%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result18 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE district LIKE 'Mulathivu%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result19 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE district LIKE 'Nuwara Eliya%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result20 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE district LIKE 'Polonnaruwa%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result21 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE district LIKE 'Puththalam%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result22 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE district LIKE 'Rathnapura%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result23 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE district LIKE 'Trincomalee%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result24 = $this->db->resultSet();
            $this->db->query("SELECT COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE district LIKE 'Vavuniya%' AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result25 = $this->db->resultSet();
            $result=array($result1[0]->requestCount,$result2[0]->requestCount,$result3[0]->requestCount,$result4[0]->requestCount,$result5[0]->requestCount,$result6[0]->requestCount,$result7[0]->requestCount,$result8[0]->requestCount,$result9[0]->requestCount,$result10[0]->requestCount,$result11[0]->requestCount,$result12[0]->requestCount,$result13[0]->requestCount,$result14[0]->requestCount,$result15[0]->requestCount,$result16[0]->requestCount,$result17[0]->requestCount,$result18[0]->requestCount,$result19[0]->requestCount,$result20[0]->requestCount,$result21[0]->requestCount,$result22[0]->requestCount,$result23[0]->requestCount,$result24[0]->requestCount,$result25[0]->requestCount);
            return $result;
        }

        public function pdfDateDistrictSuwasariya(){
            $date1=$this->getPreviousDate();
            $date2=$this->getCurrentDate();
            $this->db->query("SELECT date,district,COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE date BETWEEN '{$date1}' AND '{$date2}' GROUP BY date,district");
            $result = $this->db->resultSet();
            return $result;
        }

        public function pdfDistrictCategorySuwasariya(){
            $date1=$this->getPreviousDate();
            $date2=$this->getCurrentDate();
            $this->db->query("SELECT district,numberOfPatients,COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE date BETWEEN '{$date1}' AND '{$date2}' GROUP BY district,numberOfPatients");
            $result = $this->db->resultSet();
            return $result;
        }

        public function pdfPoliceStationCategorySuwasariya(){
            $date1=$this->getPreviousDate();
            $date2=$this->getCurrentDate();
            $this->db->query("SELECT policeStation,numberOfPatients,COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE date BETWEEN '{$date1}' AND '{$date2}' GROUP BY policeStation,numberOfPatients");
            $result = $this->db->resultSet();
            return $result;
        }

        public function pdfDateCategorySuwasariya(){
            $date1=$this->getPreviousDate();
            $date2=$this->getCurrentDate();
            $this->db->query("SELECT date,numberOfPatients,COUNT(*) AS requestCount FROM 1990ambulancerequest WHERE date BETWEEN '{$date1}' AND '{$date2}' GROUP BY date,numberOfPatients");
            $result = $this->db->resultSet();
            return $result;
        }

        public function pdfRequestFeedbackSuwasariya(){
            $date1=$this->getPreviousDate();
            $date2=$this->getCurrentDate();
            $this->db->query("SELECT 1990ambulancerequest.requestId,1990ambulancerequest.date,1990ambulancerequest.time,1990ambulancerequest.policeStation,1990ambulancerequest.numberOfPatients,feedback.comment,feedback.ratings FROM 1990ambulancerequest,feedback,give WHERE give.feedbackId=feedback.feedbackId AND give.requestId=1990ambulancerequest.requestId AND date BETWEEN '{$date1}' AND '{$date2}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function pdfAllRequestFeedbackSuwasariya(){
            $date1=$this->getPreviousDate();
            $date2=$this->getCurrentDate();
            $this->db->query("SELECT 1990ambulancerequest.requestId,1990ambulancerequest.date,1990ambulancerequest.time,1990ambulancerequest.policeStation,1990ambulancerequest.numberOfPatients,s.comment,s.ratings FROM 1990ambulancerequest LEFT JOIN (SELECT feedback.feedbackId,feedback.comment,feedback.ratings,give.requestId FROM feedback,give WHERE feedback.feedbackId=give.feedbackId) AS s  ON s.requestId=1990ambulancerequest.requestId WHERE 1990ambulancerequest.date BETWEEN '{$date1}' AND '{$date2}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function pdfAllRequestFeedbackUserSuwasariya(){
            $date1=$this->getPreviousDate();
            $date2=$this->getCurrentDate();
            $this->db->query("SELECT servicerequester.firstName,servicerequester.lastName,servicerequester.nicNumber,servicerequester.phoneNumber,servicerequester.email,servicerequester.address,1990ambulancerequest.date,1990ambulancerequest.time,1990ambulancerequest.district,1990ambulancerequest.policeStation,1990ambulancerequest.numberOfPatients FROM request,servicerequester,1990ambulancerequest WHERE request.requestId=1990ambulancerequest.requestId AND request.userId=servicerequester.userId AND 1990ambulancerequest.date BETWEEN '{$date1}' AND '{$date2}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function pdfRequestkUserSuwasariya(){
            $date1=$this->getPreviousDate();
            $date2=$this->getCurrentDate();
            $this->db->query("SELECT servicerequester.firstName,servicerequester.lastName,servicerequester.gender,servicerequester.nicNumber,servicerequester.email,servicerequester.phoneNumber,servicerequester.address,COUNT(*) AS requestCount FROM servicerequester,request,1990ambulancerequest WHERE 1990ambulancerequest.requestId=request.requestId AND request.userId=servicerequester.userId AND 1990ambulancerequest.date BETWEEN '{$date1}' AND '{$date2}' GROUP BY servicerequester.userId");
            $result = $this->db->resultSet();
            return $result;
        }
    }
?>