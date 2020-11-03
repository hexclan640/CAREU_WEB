 <?php
class careu extends Controller
{
    public function __construct()
    {
        
        $this->userModel = $this->model('data');
    }

    public function index()
    {
        //echo "Home page";

        // $users = $this->userModel->getUsers();

        // $data = [
        //     'title' => 'Home page',
        //     'users' => $users
        // ];
        $this->view('pages/index');
    }

    public function verify()
    {
        $connection = mysqli_connect('localhost','root','','careu');
        $userName=mysqli_real_escape_string($connection,$_POST['username']);
        $password=mysqli_real_escape_string($connection,$_POST['password']);
          
        if(strpos($userName, "admin"))
        {
            $userInfo=$this->userModel->getUserAdmin($userName,$password);
            if($userInfo)
            {
                session_start();
                $_SESSION['userName']=$userName;
                echo "success";
            }
            else
            {
                echo "failed";
            }
        }
        else if(strpos($userName, "119"))
        {
            $userInfo=$this->userModel->getUser119($userName,$password);
            if($userInfo)
            {
                session_start();
                $_SESSION['userName']=$userName;
                echo "success";
            }
            else
            {
                echo "failed";
            }
            
        }
        else if(strpos($userName, "1990"))
        {
            $userInfo=$this->userModel->getUser1990($userName,$password);
            if($userInfo)
            {
                session_start();
                $_SESSION['userName']=$userName;
                echo "success";
            }
            else
            {
                echo "failed";
            }
        }
        else
        {
            echo "failed";
        }   
    }

// // ADMIN CONTROLLER FUNCTIONS-----------------------------------------------------------------------------------------------

//     // public function homepageadmin()
//     // {
//     //     $this->view('pages/includes/adminheader');
//     //     $this->view('pages/admin/home');
//     //     $this->view('pages/includes/footer');
//     // }

//     // public function operator119()
//     // {
//     //     $this->view('pages/includes/adminheader');
//     //     $this->view('pages/admin/create119OperatorAccount');
//     //     $this->view('pages/includes/footer');
//     // }

//     // public function operator1990()
//     // {
//     //     $this->view('pages/includes/adminheader');
//     //     $this->view('pages/admin/create1990OperatorAccount');
//     //     $this->view('pages/includes/footer');
//     // }

//     // public function editprofileadmin()
//     // {
//     //     session_start();
//     //     $adminInfo=$this->userModel->data->getAdmin($_SESSION['userName']);
//     //     $data = ['admin' => $adminInfo];

//     //     if($adminInfo)
//     //     {
//     //         $this->view('pages/includes/adminheader');
//     //         $this->view('pages/admin/editProfileAdmin',$data);
//     //         $this->view('pages/includes/footer');
//     //     }
//     // }

//     // public function updateprofileadmin()
//     // {
//     //     session_start();
//     //     $connection = mysqli_connect('localhost','root','','careu');
//     //     $firstName=mysqli_real_escape_string($connection,$_POST['firstName']);
//     //     $lastName=mysqli_real_escape_string($connection,$_POST['lastName']);
//     //     $userName=$_SESSION['userName'];
//     //     $password=mysqli_real_escape_string($connection,$_POST['password1']);
//     //     $result=$this->userModel->updateAdmin($firstName,$lastName,$userName,$password);

//     //     if($result)
//     //     {
//     //         echo "success";
//     //     }
//     //     else
//     //     {
//     //         echo "failed";
//     //     }
//     // }

//     // public function usermanagement()
//     // {
//     //     $this->view('pages/includes/adminheader');
//     //     $this->view('pages/admin/userManagement');
//     //     $this->view('pages/includes/footer');
//     // }

//     // public function userrequests()
//     // {
//     //     $this->view('pages/admin/userRequests');
//     // }

//     // public function userbrief()
//     // {
//     //     $this->view('pages/admin/userBrief');
//     // }

//     // public function userprofile()
//     // {
//     //     $this->view('pages/includes/adminheader');
//     //     $this->view('pages/admin/userProfile');
//     //     $this->view('pages/includes/footer'); 
//     // }

//     // public function viewuserrequest()
//     // {
//     //     $requestInfo=$this->userModel->getUserRequest($_GET['rid']);
//     //     $data = ['admin' => $requestInfo];

//     //     if($requestInfo)
//     //     {
//     //         $this->view('pages/includes/adminheader');
//     //         $this->view('pages/admin/viewUserRequest',$data);
//     //         $this->view('pages/includes/footer'); 
//     //     }
//     //     else
//     //     {
//     //         echo $_GET['rid'];
//     //     }
//     // }

//     // public function viewreportsadmin()
//     // {
//     //     $this->view('pages/includes/adminheader');
//     //     $this->view('pages/admin/reports');
//     //     $this->view('pages/includes/footer');
//     // }

//     // public function createoperator119()
//     // {
//     //     $connection = mysqli_connect('localhost','root','','careu');
//     //     $userName=mysqli_real_escape_string($connection,$_POST['userName']);
//     //     $firstName=mysqli_real_escape_string($connection,$_POST['firstName']);
//     //     $lastName=mysqli_real_escape_string($connection,$_POST['lastName']);
//     //     $password=mysqli_real_escape_string($connection,$_POST['password1']);
//     //     $result=$this->userModel->createOperator119($userName,$firstName,$lastName,$password);

//     //     if($result)
//     //     {
//     //         echo "success";
//     //     }
//     //     else
//     //     {
//     //         echo "failed";
//     //     }
//     // }

// // 119 OPERATOR CONTROLLER FUNCTIONS-----------------------------------------------------------------------------------------

//     public function homepage119()
//     {
//         $this->view('pages/includes/119OperatorHeader');
//         $this->view('pages/119Operator/home');
//         $this->view('pages/includes/footer');
//     }

//     public function recent119()
//     {
//         $this->view('pages/includes/119OperatorHeader');
//         $this->view('pages/119Operator/recentRequests');
//         $this->view('pages/includes/footer');
//     }

//     public function viewnewrequest119()
//     {
//         $this->view('pages/includes/119OperatorHeader');
//         $this->view('pages/119Operator/viewNewRequest');
//         $this->view('pages/includes/footer');
//     }

//     public function allrequests119()
//     {
//         $this->view('pages/includes/119OperatorHeader');
//         $this->view('pages/119Operator/allrequests');
//         $this->view('pages/includes/footer');
//     }

//     public function viewrequest119()
//     {
//         $this->view('pages/includes/119OperatorHeader');
//         $this->view('pages/119Operator/viewRequest');
//         $this->view('pages/includes/footer');
//     }

//     public function editprofileoperator119()
//     {
//         session_start();
//         $operatorInfo=$this->userModel->getOperator119($_SESSION['userName']);
//         $data = ['admin' => $operatorInfo];

//         if($operatorInfo)
//         {
//             $this->view('pages/includes/119OperatorHeader');
//             $this->view('pages/119Operator/editProfileOperator119',$data);
//             $this->view('pages/includes/footer');
//         }
//     }

//     public function updateprofileoperator119()
//     {
//         session_start();
//         $connection = mysqli_connect('localhost','root','','careu');
//         $firstName=mysqli_real_escape_string($connection,$_POST['firstName']);
//         $lastName=mysqli_real_escape_string($connection,$_POST['lastName']);
//         $userName=$_SESSION['userName'];
//         $password=mysqli_real_escape_string($connection,$_POST['password1']);
//         $result=$this->userModel->updateOperator119($firstName,$lastName,$userName,$password);

//         if($result)
//         {
//             echo "success";
//         }
//         else
//         {
//             echo "failed";
//         }
//     }

//     public function viewreportsoperator119()
//     {
//         $this->view('pages/includes/119OperatorHeader');
//         $this->view('pages/119Operator/reports');
//         $this->view('pages/includes/footer');
//     }

// // 1990 OPERATOR CONTROLLER FUNCTIONS-----------------------------------------------------------------------------------------

//     public function homepage1990()
//     {
//         $this->view('pages/includes/1990OperatorHeader');
//         $this->view('pages/1990Operator/home');
//         $this->view('pages/includes/footer');
//     }

//     public function recent1990()
//     {
//         $this->view('pages/includes/1990OperatorHeader');
//         $this->view('pages/1990Operator/recentRequests');
//         $this->view('pages/includes/footer');
//     }

//     public function viewnewrequest1990()
//     {
//         $this->view('pages/includes/1990OperatorHeader');
//         $this->view('pages/1990Operator/viewNewRequest');
//         $this->view('pages/includes/footer');
//     }

//     public function allrequests1990()
//     {
//         $this->view('pages/includes/1990OperatorHeader');
//         $this->view('pages/1990Operator/allrequests');
//         $this->view('pages/includes/footer');
//     }

//     public function viewrequest1990()
//     {
//         $this->view('pages/includes/1990OperatorHeader');
//         $this->view('pages/1990Operator/viewRequest');
//         $this->view('pages/includes/footer');
//     }

//     public function editprofileoperator1990()
//     {
//         session_start();
//         $operatorInfo=$this->userModel->getOperator1990($_SESSION['userName']);
//         $data = ['admin' => $operatorInfo];

//         if($operatorInfo)
//         {
//             $this->view('pages/includes/1990OperatorHeader');
//             $this->view('pages/1990Operator/editProfileOperator1990',$data);
//             $this->view('pages/includes/footer');
//         }
//     }

//     public function updateprofileoperator1990()
//     {
//         session_start();
//         $connection = mysqli_connect('localhost','root','','careu');
//         $firstName=mysqli_real_escape_string($connection,$_POST['firstName']);
//         $lastName=mysqli_real_escape_string($connection,$_POST['lastName']);
//         $userName=$_SESSION['userName'];
//         $password=mysqli_real_escape_string($connection,$_POST['password1']);
//         $result=$this->userModel->updateOperator119($firstName,$lastName,$userName,$password);

//         if($result)
//         {
//             echo "success";
//         }
//         else
//         {
//             echo "failed";
//         }
//     }

//     public function viewreportsoperator1990()
//     {
//         $this->view('pages/includes/1990OperatorHeader');
//         $this->view('pages/1990Operator/reports');
//         $this->view('pages/includes/footer');
//     } 
}

?>