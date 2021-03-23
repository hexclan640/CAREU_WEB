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
    }
?>