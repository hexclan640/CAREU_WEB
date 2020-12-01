<?php
    session_start();
?>
<?php
class suwasariya extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('modelsuwasariya');
    }

    public function logout()
    {
        if(isset($_SESSION))
        {
            session_destroy();
            header("Location: http://localhost:8080/careu-web");
        }
    }

    public function home()
    {
        $this->view('pages/includes/1990OperatorHeader');
        $this->view('pages/1990Operator/suwasariyaSidebar');
        $this->view('pages/1990Operator/home');
        $this->view('pages/includes/footer');
    }

    public function recent()
    {
        $this->view('pages/includes/1990OperatorHeader');
        $this->view('pages/1990Operator/suwasariyaSidebar');
        $this->view('pages/1990Operator/recentRequests');
        $this->view('pages/includes/footer');
    }

    public function getrecent()
    {
        $requestsInfo=$this->userModel->getRecentRequests();
        $data = ['requestsInfo' => $requestsInfo];
        if($requestsInfo)
        {
            $this->view('pages/1990Operator/request',$data);
        }
    }

    public function viewtherequest()
    {
        $requestId=$_GET['id'];
        $requestInfo=$this->userModel->getRecentRequestAll($requestId);
        $data = ['requestInfo' => $requestInfo];
        if($requestInfo)
        {
            $this->view('pages/includes/1990OperatorHeader');
            $this->view('pages/1990Operator/suwasariyaSidebar');
            $this->view('pages/1990Operator/viewNewRequest',$data);
            $this->view('pages/includes/footer');
        }
    }

    public function new()
    {
        $this->view('pages/includes/1990OperatorHeader');
        $this->view('pages/1990Operator/suwasariyaSidebar');
        $this->view('pages/1990Operator/viewNewRequest');
        $this->view('pages/includes/footer');
    }

    public function all()
    {
        $this->view('pages/includes/1990OperatorHeader');
        $this->view('pages/1990Operator/suwasariyaSidebar');
        $this->view('pages/1990Operator/allrequests');
        $this->view('pages/includes/footer');
    }

    public function viewrequest()
    {
        $this->view('pages/includes/1990OperatorHeader');
        $this->view('pages/1990Operator/suwasariyaSidebar');
        $this->view('pages/1990Operator/viewRequest');
        $this->view('pages/includes/footer');
    }

    public function profile()
    {
        $operatorInfo=$this->userModel->getProfile($_SESSION['userName']);
        $data = ['operatorInfo' => $operatorInfo];

        if($operatorInfo)
        {
            $this->view('pages/includes/1990OperatorHeader');
            $this->view('pages/1990Operator/suwasariyaSidebar');
            $this->view('pages/1990Operator/editProfileOperator1990',$data);
            $this->view('pages/includes/footer');
        }
    }

    public function updateprofile()
    {
        $userName=$_SESSION['userName'];
        $firstName=$_POST['firstName'];
        $lastName=$_POST['lastName'];
        $imageName=$_FILES['image']['name'];
        $tmpName=$_FILES['image']['tmp_name'];
        $result=$this->userModel->updateProfile($firstName,$lastName,$userName,$imageName,$tmpName);
        if($result)
        {
            $_SESSION['profile']=$userName;
            header("Location: http://localhost:8080/careu-web/suwasariya/profile");
        }
        else
        {
            $_SESSION['update']="failed";
            header("Location: http://localhost:8080/careu-web/suwasariya/profile");
        }
    }

    public function changePassword()
    {
        $this->view('pages/includes/1990OperatorHeader');
        $this->view('pages/1990Operator/suwasariyaSidebar');
        $this->view('pages/1990Operator/changePassword');
        $this->view('pages/includes/footer');
    }

    public function passwordchange()
    {
        $userName=$_POST['username'];
        $currentpassword=md5($_POST['currentpassword']);
        $password=md5($_POST['password1']);
        
        if($userName==$_SESSION['userName'])
        {
            $result=$this->userModel->changePassword($userName,$currentpassword,$password);
            if($result)
            {
                $_SESSION['changeapplied']="success";
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

    public function reports()
    {
        $this->view('pages/includes/1990OperatorHeader');
        $this->view('pages/1990Operator/suwasariyaSidebar');
        $this->view('pages/1990Operator/reports');
        $this->view('pages/includes/footer');
    } 
}

?>