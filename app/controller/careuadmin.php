<?php
    session_start();
?>
<?php
class careuadmin extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('modeladmin');
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

    public function usermanagement()
    {
        $this->view('pages/includes/adminheader');
        $this->view('pages/admin/userManagement');
        $this->view('pages/includes/footer');
    }

    public function userrequests()
    {
        $requestInfo=$this->userModel->getRequestBrief();
        $data = ['requestInfo' => $requestInfo];
        if($requestInfo)
        {
            $this->view('pages/admin/userRequests',$data);
        }
    }

    public function userbrief()
    {
        $users=$this->userModel->getUserBrief();
        $data = ['usersInfo' => $users];
        if($users)
        {
            $this->view('pages/admin/userBrief',$data);
        }
    }

    public function userprofile()
    {
        $userId=$_GET['id'];
        $user=$this->userModel->getUser($userId);
        $data = ['userInfo' => $user];
        if($user)
        {
            $this->view('pages/includes/adminheader');
            $this->view('pages/admin/viewUserRequest',$data);
            $this->view('pages/includes/footer'); 
        }
    }

    public function verifieduser()
    {
        $userId=$_GET['id'];
        $user=$this->userModel->getVerifiedUser($userId);
        $data = ['userInfo' => $user];
        if($user)
        {
            $this->view('pages/includes/adminheader');
            $this->view('pages/admin/userProfile',$data);
            $this->view('pages/includes/footer'); 
        }
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
    }

    public function reject()
    {
        $userId=$_GET['id'];
        $result=$this->userModel->rejectRequest($userId);
        if($result)
        {
            header("Location: http://localhost:8080/careu-web/careuadmin/usermanagement");
        }
    }

    public function accept()
    {
        $userId=$_GET['id'];
        $result=$this->userModel->acceptRequest($userId);
        if($result)
        {
            header("Location: http://localhost:8080/careu-web/careuadmin/usermanagement");
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

    public function cardiac()
    {
        $instructions=$this->userModel->getCardiac();
        $data = ['instructions' => $instructions];
        if($instructions)
        {
            $this->view('pages/includes/adminheader');
            $this->view('pages/admin/cardiacInstructions',$data);
            $this->view('pages/includes/footer');
        }
    }

    public function updatecardiac()
    {
        $stepNumber=$_POST['stepNumber'];
        $description=$_POST['description'];
        $imageName=$_FILES['image']['name'];
        $tmpName=$_FILES['image']['tmp_name'];
        $result=$this->userModel->addCardiac($stepNumber,$description,$imageName,$tmpName);
        if($result)
        {
            header("Location: http://localhost:8080/careu-web/careuadmin/cardiac");
        }
    }

    public function deletecardiac()
    {
        $id=$_GET['id'];
        $result=$this->userModel->deleteCardiac($id);
        if($result)
        {
            header("Location: http://localhost:8080/careu-web/careuadmin/cardiac");
        }
    }

    public function editcardiac()
    {
        $id=$_GET['id'];
        $instruction=$this->userModel->editCardiac($id);
        $data = ['instruction' => $instruction];
        if($instruction)
        {
            $this->view('pages/includes/adminheader');
            $this->view('pages/admin/editCardiacInstructions',$data);
            $this->view('pages/includes/footer');
        }
    }

    public function savecardiac()
    {
        $id=$_POST['id'];
        $stepNumber=$_POST['stepNumber'];
        $description=$_POST['description'];
        $imageName=$_FILES['image']['name'];
        $tmpName=$_FILES['image']['tmp_name'];
        $result=$this->userModel->saveCardiac($id,$stepNumber,$description,$imageName,$tmpName);
        if($result)
        {
            header("Location: http://localhost:8080/careu-web/careuadmin/cardiac");
        }
    }

    

    public function bleeding()
    {
        $instructions=$this->userModel->getBleeding();
        $data = ['instructions' => $instructions];
        if($instructions)
        {
            $this->view('pages/includes/adminheader');
            $this->view('pages/admin/bleedingInstructions',$data);
            $this->view('pages/includes/footer');
        }
    }

    public function updatebleeding()
    {
        $stepNumber=$_POST['stepNumber'];
        $description=$_POST['description'];
        $imageName=$_FILES['image']['name'];
        $tmpName=$_FILES['image']['tmp_name'];
        $result=$this->userModel->addBleeding($stepNumber,$description,$imageName,$tmpName);
        if($result)
        {
            header("Location: http://localhost:8080/careu-web/careuadmin/bleeding");
        }
    }

    public function deletebleeding()
    {
        $id=$_GET['id'];
        $result=$this->userModel->deleteBleeding($id);
        if($result)
        {
            header("Location: http://localhost:8080/careu-web/careuadmin/bleeding");
        }
    }

    public function editbleeding()
    {
        $id=$_GET['id'];
        $instruction=$this->userModel->editBleeding($id);
        $data = ['instruction' => $instruction];
        if($instruction)
        {
            $this->view('pages/includes/adminheader');
            $this->view('pages/admin/editBleedingInstructions',$data);
            $this->view('pages/includes/footer');
        }
    }

    public function savebleeding()
    {
        $id=$_POST['id'];
        $stepNumber=$_POST['stepNumber'];
        $description=$_POST['description'];
        $imageName=$_FILES['image']['name'];
        $tmpName=$_FILES['image']['tmp_name'];
        $result=$this->userModel->saveBleeding($id,$stepNumber,$description,$imageName,$tmpName);
        if($result)
        {
            header("Location: http://localhost:8080/careu-web/careuadmin/bleeding");
        }
    }

    public function burn()
    {
        $instructions=$this->userModel->getBurn();
        $data = ['instructions' => $instructions];
        if($instructions)
        {
            $this->view('pages/includes/adminheader');
            $this->view('pages/admin/burnsInstructions',$data);
            $this->view('pages/includes/footer');
        }
    }

    public function updateburn()
    {
        $stepNumber=$_POST['stepNumber'];
        $description=$_POST['description'];
        $imageName=$_FILES['image']['name'];
        $tmpName=$_FILES['image']['tmp_name'];
        $result=$this->userModel->addBurn($stepNumber,$description,$imageName,$tmpName);
        if($result)
        {
            header("Location: http://localhost:8080/careu-web/careuadmin/burn");
        }
    }

    public function deleteburn()
    {
        $id=$_GET['id'];
        $result=$this->userModel->deleteBurn($id);
        if($result)
        {
            header("Location: http://localhost:8080/careu-web/careuadmin/burn");
        }
    }

    public function editBurn()
    {
        $id=$_GET['id'];
        $instruction=$this->userModel->editBurn($id);
        $data = ['instruction' => $instruction];
        if($instruction)
        {
            $this->view('pages/includes/adminheader');
            $this->view('pages/admin/editBurnsInstructions',$data);
            $this->view('pages/includes/footer');
        }
    }

    public function saveBurn()
    {
        $id=$_POST['id'];
        $stepNumber=$_POST['stepNumber'];
        $description=$_POST['description'];
        $imageName=$_FILES['image']['name'];
        $tmpName=$_FILES['image']['tmp_name'];
        $result=$this->userModel->saveBurn($id,$stepNumber,$description,$imageName,$tmpName);
        if($result)
        {
            header("Location: http://localhost:8080/careu-web/careuadmin/burn");
        }
    }

    public function fracture()
    {
        $this->view('pages/error');
        // $this->view('pages/includes/adminheader');
        // $this->view('pages/admin/fracturesInstructions');
        // $this->view('pages/includes/footer');
    }

    public function blister()
    {
        $this->view('pages/error');
        // $this->view('pages/includes/adminheader');
        // $this->view('pages/admin/blistersInstructions');
        // $this->view('pages/includes/footer');
    }

    public function sprain()
    {
        $this->view('pages/error');
        // $this->view('pages/includes/adminheader');
        // $this->view('pages/admin/sprainsInstructions');
        // $this->view('pages/includes/footer');
    }

    public function nosebleed()
    {
        $this->view('pages/error');
        // $this->view('pages/includes/adminheader');
        // $this->view('pages/admin/nodebleedsnstructions');
        // $this->view('pages/includes/footer');
    }

    public function toothache()
    {
        $this->view('pages/error');
        // $this->view('pages/includes/adminheader');
        // $this->view('pages/admin/nodebleedsnstructions');
        // $this->view('pages/includes/footer');
    }
}

?>