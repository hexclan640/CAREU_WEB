<?php
class careuadmin extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('modeladmin');
    }

    public function home()
    {
        $this->view('pages/includes/adminheader');
        $this->view('pages/admin/home');
        $this->view('pages/includes/footer');
    }

    public function new119()
    {
        $this->view('pages/includes/adminheader');
        $this->view('pages/admin/create119OperatorAccount');
        $this->view('pages/includes/footer');
    }

    public function new1990()
    {
        $this->view('pages/includes/adminheader');
        $this->view('pages/admin/create1990OperatorAccount');
        $this->view('pages/includes/footer');
    }

    public function profile()
    {
        session_start();
        $adminInfo=$this->userModel->getProfile($_SESSION['userName']);
        $data = ['admin' => $adminInfo];

        if($adminInfo)
        {
            $this->view('pages/includes/adminheader');
            $this->view('pages/admin/editProfileAdmin',$data);
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

    public function updatedprofilepicture()
    {
        $userName=$_SESSION['userName'];
        $imageName=$_FILES['image']['name'];
        $tempName=$_FILES['image']['tmp_name'];
        $result=$this-userModel->updateProPic($userName,$imageName,$tempName);

        if($result)
        {
            
        }
    }

    public function usermanagement()
    {
        // $this->view('pages/includes/adminheader');
        $this->view('pages/error');
        // $this->view('pages/includes/footer');
    }

    public function userrequests()
    {
        $this->view('pages/admin/userRequests');
    }

    public function userbrief()
    {
        $this->view('pages/admin/userBrief');
    }

    public function userprofile()
    {
        $this->view('pages/includes/adminheader');
        $this->view('pages/admin/userProfile');
        $this->view('pages/includes/footer'); 
    }

    public function viewuserrequest()
    {
        $requestInfo=$this->userModel->getUserRequest($_GET['rid']);
        $data = ['admin' => $requestInfo];

        if($requestInfo)
        {
            $this->view('pages/includes/adminheader');
            $this->view('pages/admin/viewUserRequest',$data);
            $this->view('pages/includes/footer'); 
        }
        else
        {
            echo $_GET['rid'];
        }
    }

    public function reports()
    {
        $this->view('pages/includes/adminheader');
        $this->view('pages/admin/reports');
        $this->view('pages/includes/footer');
    }

    public function newoperator119()
    {
        $connection = mysqli_connect('localhost','root','','careu');
        $userName=mysqli_real_escape_string($connection,$_POST['userName']);
        $firstName=mysqli_real_escape_string($connection,$_POST['firstName']);
        $lastName=mysqli_real_escape_string($connection,$_POST['lastName']);
        $gender=mysqli_real_escape_string($connection,$_POST['gender']);
        $password=mysqli_real_escape_string($connection,$_POST['password1']);
        mysqli_close($connection);
        $result=$this->userModel->createOperator119($userName,$firstName,$lastName,$gender,$password);

        if($result)
        {
            echo "success";
        }
        else
        {
            echo "failed";
        }
    }

    public function newoperator1990()
    {
        $connection = mysqli_connect('localhost','root','','careu');
        $userName=mysqli_real_escape_string($connection,$_POST['userName']);
        $firstName=mysqli_real_escape_string($connection,$_POST['firstName']);
        $lastName=mysqli_real_escape_string($connection,$_POST['lastName']);
        $gender=mysqli_real_escape_string($connection,$_POST['gender']);
        $password=mysqli_real_escape_string($connection,$_POST['password1']);
        mysqli_close($connection);
        $result=$this->userModel->createOperator1990($userName,$firstName,$lastName,$gender,$password);

        if($result)
        {
            echo "success";
        }
        else
        {
            echo "failed";
        }
    }

    public function firstaids()
    {
        $this->view('pages/includes/adminheader');
        $this->view('pages/admin/addInstructions');
        $this->view('pages/includes/footer');
    }

    public function instructionform()
    {
        // $this->view('pages/includes/adminheader');
        $this->view('pages/admin/instructionForm');
        // $this->view('pages/includes/footer');
    }

    public function cardiacinstructiosns()
    {
        // $this->view('pages/includes/adminheader');
        $this->view('pages/admin/cardiacInstructions');
        // $this->view('pages/includes/footer');
    }

    public function bleedinginstructions()
    {
        // $this->view('pages/includes/adminheader');
        $this->view('pages/admin/bleedingInstructions');
        // $this->view('pages/includes/footer');
    }

    public function burnsinstructions()
    {
        // $this->view('pages/includes/adminheader');
        $this->view('pages/admin/burnsinstructions');
        // $this->view('pages/includes/footer');
    }

    public function fracturesinstructions()
    {
        // $this->view('pages/includes/adminheader');
        $this->view('pages/admin/fracturesInstructions');
        // $this->view('pages/includes/footer');
    }

    public function blistersInstructions()
    {
        // $this->view('pages/includes/adminheader');
        $this->view('pages/admin/blistersInstructions');
        // $this->view('pages/includes/footer');
    }

    public function sprainsinstructions()
    {
        // $this->view('pages/includes/adminheader');
        $this->view('pages/admin/sprainsInstructions');
        // $this->view('pages/includes/footer');
    }

    public function nosebleedsnstructions()
    {
        // $this->view('pages/includes/adminheader');
        $this->view('pages/admin/nodebleedsnstructions');
        // $this->view('pages/includes/footer');
    }

}

?>