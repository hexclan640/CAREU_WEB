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

        public function updateProfile($firstname,$lastname,$username,$password,$imagename,$tmpname)
        {
            if(empty($imagename))
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
            }
            else
            {
                $connection = mysqli_connect('localhost','root','','careu');
                $query="UPDATE admin SET firstName='{$firstname}',lastName='{$lastname}',password='{$password}',image='{$imagename}' WHERE userName='{$username}'";
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

        public function getUser($userid)
        {
            $this->db->query("SELECT * FROM servicerequester WHERE userId='{$userid}'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getVerifiedUser($userid)
        {
            $this->db->query("SELECT * FROM servicerequester WHERE userId='{$userid}'");
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

        public function createOperator119($username,$firstname,$lastname,$gender,$password)
        {
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

        public function getCardiac()
        {
            $this->db->query("SELECT id,step,description,image FROM instruction1");
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
                $result2=move_uploaded_file($tmpname,"img/images/".$imagename);
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
                $result2=move_uploaded_file($tmpname,"img/images/".$imagename);
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
            $this->db->query("SELECT id,step,description,image FROM instruction2");
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
                $result2=move_uploaded_file($tmpname,"img/images/".$imagename);
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
                $query="UPDATE instruction1 SET step='{$stepnumber}',description='{$description}',image='{$imagename}' WHERE id='{$id}'";
                $result1=mysqli_query($connection,$query);
                $result2=move_uploaded_file($tmpname,"img/images/".$imagename);
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
            $this->db->query("SELECT id,step,description,image FROM instruction3");
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
                $result2=move_uploaded_file($tmpname,"img/images/".$imagename);
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
                $result2=move_uploaded_file($tmpname,"img/images/".$imagename);
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