 <?php
class careu extends Controller
{
    public function __construct()
    {
        
        $this->userModel = $this->model('verifymodel');
    }

    public function index()
    {
        $this->view('pages/index');
    }

    public function verify()
    {
        session_start();
        $_SESSION["count"]=0;
        $connection = mysqli_connect('localhost','root','','careu');
        $userName=mysqli_real_escape_string($connection,$_POST['username']);
        $password=md5(mysqli_real_escape_string($connection,$_POST['password']));
        mysqli_close($connection);
          
        if(strpos($userName, "admin"))
        {
            $userInfo=$this->userModel->getUserAdmin($userName,$password);
            if($userInfo)
            {
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


    // public function verifyusername()
    // {
    //     $connection = mysqli_connect('localhost','root','','careu');
    //     $userName=mysqli_real_escape_string($connection,$_POST['username']);
    //     mysqli_close($connection);
          
    //     if(strpos($userName, "admin"))
    //     {
    //         $userInfo=$this->userModel->getUsernameAdmin($userName);
    //         if($userInfo)
    //         {
    //             echo "success";
    //         }
    //         else
    //         {
    //             echo "failed";
    //         }
    //     }
    //     else if(strpos($userName, "119"))
    //     {
    //         $userInfo=$this->userModel->getUsername119($userName);
    //         if($userInfo)
    //         {
    //             echo "success";
    //         }
    //         else
    //         {
    //             echo "failed";
    //         }
            
    //     }
    //     else if(strpos($userName, "1990"))
    //     {
    //         $userInfo=$this->userModel->getUsername1990($userName);
    //         if($userInfo)
    //         {
    //             echo "success";
    //         }
    //         else
    //         {
    //             echo "failed";
    //         }
    //     }
    //     else
    //     {
    //         echo "failed";
    //     }   
    // }

    // function getemail(){
    //     $userName=$_GET['username'];
    //     $userInfo=$this->userModel->getUserEmail($userName);
    //     $data=['userMail'=>$userInfo];
    //     if($userInfo){
    //         $this->view('pages/emailSent',$data);
    //     }
    // }

    // public function forget()
    // {
    //     $this->view('pages/getUsername');
    // }
}
?>