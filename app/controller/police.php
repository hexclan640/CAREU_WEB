<?php
    session_start();
?>
<?php
class police extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('modelpolice');
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
        $operatorInfo=$this->userModel->getProfile($_SESSION['userName']);
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
        $userName=$_SESSION['userName'];
        $firstName=$_POST['firstName'];
        $lastName=$_POST['lastName'];
        $password=$_POST['password1'];
        $imageName=$_FILES['image']['name'];
        $tmpName=$_FILES['image']['tmp_name'];
        $result=$this->userModel->updateProfile($firstName,$lastName,$userName,$password,$imageName,$tmpName);
        if($result)
        {
            header("Location: http://localhost:8080/careu-web/careuadmin/profile");
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