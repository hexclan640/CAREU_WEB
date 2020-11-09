<?php
class suwasariya extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('modelsuwasariya');
    }

    public function home()
    {
        $this->view('pages/includes/1990OperatorHeader');
        $this->view('pages/1990Operator/home');
        $this->view('pages/includes/footer');
    }

    public function recent()
    {
        $this->view('pages/includes/1990OperatorHeader');
        $this->view('pages/1990Operator/recentRequests');
        $this->view('pages/includes/footer');
    }

    public function new()
    {
        $this->view('pages/includes/1990OperatorHeader');
        $this->view('pages/1990Operator/viewNewRequest');
        $this->view('pages/includes/footer');
    }

    public function all()
    {
        $this->view('pages/includes/1990OperatorHeader');
        $this->view('pages/1990Operator/allrequests');
        $this->view('pages/includes/footer');
    }

    public function viewrequest()
    {
        $this->view('pages/includes/1990OperatorHeader');
        $this->view('pages/1990Operator/viewRequest');
        $this->view('pages/includes/footer');
    }

    public function profile()
    {
        session_start();
        $operatorInfo=$this->userModel->getProfile($_SESSION['userName']);
        $data = ['admin' => $operatorInfo];

        if($operatorInfo)
        {
            $this->view('pages/includes/1990OperatorHeader');
            $this->view('pages/1990Operator/editProfileOperator1990',$data);
            $this->view('pages/includes/footer');
        }
    }

    public function updateprofile()
    {
        session_start();
        $connection = mysqli_connect('localhost','root','','careu');
        $firstName=mysqli_real_escape_string($connection,$_POST['firstName']);
        $lastName=mysqli_real_escape_string($connection,$_POST['lastName']);
        $userName=$_SESSION['userName'];
        $password=mysqli_real_escape_string($connection,$_POST['password1']);
        mysqli_close($connection);
        $result=$this->userModel->updateProfile($firstName,$lastName,$userName,$password);

        if($result)
        {
            echo "success";
        }
        else
        {
            echo "failed";
        }
    }

    public function reports()
    {
        $this->view('pages/includes/1990OperatorHeader');
        $this->view('pages/1990Operator/reports');
        $this->view('pages/includes/footer');
    } 
}

?>