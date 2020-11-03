<?php
class police extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('data');
    }

    public function home()
    {
        $this->view('pages/includes/119OperatorHeader');
        $this->view('pages/119Operator/home');
        $this->view('pages/includes/footer');
    }

    public function recent()
    {
        $this->view('pages/includes/119OperatorHeader');
        $this->view('pages/119Operator/recentRequests');
        $this->view('pages/includes/footer');
    }

    public function new()
    {
        $this->view('pages/includes/119OperatorHeader');
        $this->view('pages/119Operator/viewNewRequest');
        $this->view('pages/includes/footer');
    }

    public function all()
    {
        $this->view('pages/includes/119OperatorHeader');
        $this->view('pages/119Operator/allrequests');
        $this->view('pages/includes/footer');
    }

    public function viewrequest()
    {
        $this->view('pages/includes/119OperatorHeader');
        $this->view('pages/119Operator/viewRequest');
        $this->view('pages/includes/footer');
    }

    public function profile()
    {
        session_start();
        $operatorInfo=$this->userModel->getOperator119($_SESSION['userName']);
        $data = ['admin' => $operatorInfo];

        if($operatorInfo)
        {
            $this->view('pages/includes/119OperatorHeader');
            $this->view('pages/119Operator/editProfileOperator119',$data);
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
        $result=$this->userModel->updateOperator119($firstName,$lastName,$userName,$password);

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