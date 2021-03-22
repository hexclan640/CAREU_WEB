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
        $this->view('pages/admin/adminSidebar');
        $this->view('pages/admin/home');
        $this->view('pages/includes/footer');
    }

    public function new119()
    {
        $this->view('pages/includes/adminheader');
        $this->view('pages/admin/adminSidebar');
        $this->view('pages/admin/create119OperatorAccount');
        $this->view('pages/includes/footer');
    }

    public function new1990()
    {
        $this->view('pages/includes/adminheader');
        $this->view('pages/admin/adminSidebar');
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
            $this->view('pages/admin/adminSidebar');
            $this->view('pages/admin/editProfileAdmin',$data);
            $this->view('pages/includes/footer');
        }
    }

    public function updateprofile()
    {
        $userName=$_SESSION['userName'];
        $firstName=$_POST['firstName'];
        $lastName=$_POST['lastName'];
        $imageName=$_FILES['file']['name'];
        $tmpName=$_FILES['file']['tmp_name'];
        echo $imageName;
        $this->userModel->updateProfile($firstName,$lastName,$userName,$imageName,$tmpName);
    }

    public function changePassword()
    {
        $this->view('pages/includes/adminheader');
        $this->view('pages/admin/adminSidebar');
        $this->view('pages/admin/changePassword');
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

    public function usermanagement()
    {
        $this->view('pages/includes/adminheader');
        $this->view('pages/admin/adminSidebar');
        $this->view('pages/admin/userManagement');
        $this->view('pages/includes/footer');
    }

    public function searchunverified(){
        $connection = mysqli_connect("localhost", "root", "", "careu");
        $search=mysqli_real_escape_string($connection, $_POST["query"]);
        mysqli_close($connection);
        if(isset($search)){
            $requestInfo=$this->userModel->unverifiedSearch($search);
            $data = ['requestInfo' => $requestInfo];
            $this->view('pages/admin/unverifiedSearch',$data);
        }
    }

    public function searchverified(){
        $connection = mysqli_connect("localhost", "root", "", "careu");
        $search=mysqli_real_escape_string($connection, $_POST["query"]);
        mysqli_close($connection);
        if(isset($search)){
            $usersInfo=$this->userModel->verifiedSearch($search);
            $data = ['usersInfo' => $usersInfo];
            $this->view('pages/admin/verifiedSearch',$data);
        }
    }

    public function userrequests()
    {
        $requestInfo=$this->userModel->getRequestBrief();
        $data = ['requestInfo' => $requestInfo];
        $this->view('pages/admin/userRequests',$data);
    }

    public function userrequestscount(){
        $requestCount=$this->userModel->getRequestCount();
        $data = ['requestCount' => $requestCount];
        $this->view('pages/includes/badge',$data);
    }

    public function userbrief()
    {
        $users=$this->userModel->getUserBrief();
        $data = ['usersInfo' => $users];
        $this->view('pages/admin/userBrief',$data);
    }

    public function userprofile()
    {
        $userId=$_GET['id'];
        $user=$this->userModel->getUser($userId);
        $id=$this->userModel->getId($userId);
        $data = ['userInfo' => $user,'idphoto'=>$id];
        if($user)
        {
            $this->view('pages/includes/adminheader');
            $this->view('pages/admin/adminSidebar');
            $this->view('pages/admin/viewUserRequest',$data);
            $this->view('pages/includes/footer'); 
        }
    }

    public function block()
    {
        $userId=$_POST['id'];
        $result=$this->userModel->blockUser($userId);
        if($result)
        {
            $_SESSION['blockuser']=$userId;
            header("Location: http://localhost:8080/careu-web/careuadmin/usermanagement");
        }
    }

    public function verifieduser()
    {
        $userId=$_GET['id'];
        $_SESSION["id"]=$userId;
        $user=$this->userModel->getVerifiedUser($userId);
        $data = ['userInfo' => $user];
        if($user)
        {
            $this->view('pages/includes/adminheader');
            $this->view('pages/admin/adminSidebar');
            $this->view('pages/admin/userProfile',$data);
            $this->view('pages/includes/footer'); 
        }
    }

    public function policerequest()
    {
        $requestId=$_GET['id'];
        $requestInfo=$this->userModel->getPoliceRequestAll($requestId);
        $feedbackInfo=$this->userModel->getFeedback($requestId);
        $data = ['requestInfo' => $requestInfo,'feedbackInfo'=>$feedbackInfo];
        if($requestInfo)
        {
            $this->view('pages/includes/adminheader');
            $this->view('pages/admin/adminSidebar');
            $this->view('pages/admin/viewPoliceRequest',$data);
            $this->view('pages/includes/footer');
        }
    }


    public function suwasariyarequest()
    {
        $requestId=$_GET['id'];
        $requestInfo=$this->userModel->getSuwasariyaRequestAll($requestId);
        $feedbackInfo=$this->userModel->getFeedback($requestId);
        $data = ['requestInfo' => $requestInfo,'feedbackInfo'=>$feedbackInfo];
        if($requestInfo)
        {
            $this->view('pages/includes/adminheader');
            $this->view('pages/admin/adminSidebar');
            $this->view('pages/admin/viewSuwasariyaRequest',$data);
            $this->view('pages/includes/footer');
        }
    }
    
    public function getrequesthistory(){
        $userId=$_SESSION["id"];
        $policerequests=$this->userModel->getPoliceHistory($userId);
        $suwasariyarequests=$this->userModel->getSuwasariyaHistory($userId);
        $data = [
            'policeInfo' => $policerequests,
            'suwasariyaInfo' => $suwasariyarequests
        ];
        $this->view('pages/admin/requestHistory',$data);
    }

    public function getfeedbackhistory(){
        $userId=$_SESSION["id"];
        $feedbacks=$this->userModel->getFeedbackHistory($userId);
        $data = ['feedbackInfo' => $feedbacks];
        $this->view('pages/admin/feedbackHistory',$data);
    }

    public function getrequesttype(){

    }

    public function operators()
    {
        $this->view('pages/includes/adminheader');
        $this->view('pages/admin/adminSidebar');
        $this->view('pages/admin/operators');
        $this->view('pages/includes/footer'); 
    }

    public function getpoliceoperators()
    {
        $operators119=$this->userModel->getOperator119();
        $data = ['operatorInfo119' => $operators119];
        if(isset($data))
        {
            $this->view('pages/admin/policeOperators',$data);
        }
    }

    public function getsuwasariyaoperators()
    {
        $operators1990=$this->userModel->getOperator1990();
        $data = ['operatorInfo1990' => $operators1990];
        if(isset($data))
        {
            $this->view('pages/admin/suwasariyaOperators',$data);
        }
    }

    public function romoveoperator119()
    {
        $result=$this->userModel->removeOperator119($_POST['id']);
        if($result)
        {
            $_SESSION['operators']="success";
            header("Location: http://localhost:8080/careu-web/careuadmin/operators");
        }
    }

    public function romoveoperator1990()
    {
        $result=$this->userModel->removeOperator1990($_POST['id']);
        if($result)
        {
            $_SESSION['operators']="success";
            header("Location: http://localhost:8080/careu-web/careuadmin/operators");
        }
    }

    public function viewuserrequest()
    {
        $requestInfo=$this->userModel->getUserRequest($_GET['rid']);
        $data = ['admin' => $requestInfo];

        if($requestInfo)
        {
            $this->view('pages/includes/adminheader');
            $this->view('pages/admin/adminSidebar');
            $this->view('pages/admin/viewUserRequest',$data);
            $this->view('pages/includes/footer'); 
        }
    }

    public function reject()
    {
        $userId=$_POST['id'];
        $result=$this->userModel->rejectRequest($userId);
        if($result)
        {
            return true;
        }
    }

    public function accept()
    {
        $userId=$_POST['id'];
        $result=$this->userModel->acceptRequest($userId);
        if($result)
        {
            return true;
        }
    }

    public function reports()
    {
        $this->view('pages/includes/adminheader');
        $this->view('pages/admin/adminSidebar');
        $this->view('pages/admin/reports');
        $this->view('pages/includes/footer');
    }

    public function newoperator119()
    {
        $userName=$_POST['userName'];
        $firstName=$_POST['firstName'];
        $lastName=$_POST['lastName'];
        $gender=$_POST['gender'];
        $password=md5($_POST['password1']);
        $this->userModel->createOperator119($userName,$firstName,$lastName,$gender,$password);
    }

    public function operatorchecker119(){
        $connection = mysqli_connect("localhost", "root", "", "careu");
        $search=mysqli_real_escape_string($connection, $_POST["query"]);
        mysqli_close($connection);
        if(isset($search)){
            $operatorInfo=$this->userModel->checkOperator119($search);
            $data = ['operatorInfo' => $operatorInfo];
            $this->view('pages/admin/usernamelist',$data);
        }
    }

    public function usernamechecker119(){
        $connection = mysqli_connect("localhost", "root", "", "careu");
        $search=mysqli_real_escape_string($connection, $_POST["userName"]);
        mysqli_close($connection);
        if(isset($search)){
            $operatorInfo=$this->userModel->checkUsername119($search);
            if(empty($operatorInfo)){
                echo "true";
            }
            else
            {
                echo "false";
            }
        }
    }

    public function newoperator1990()
    {
        $userName=$_POST['userName'];
        $firstName=$_POST['firstName'];
        $lastName=$_POST['lastName'];
        $gender=$_POST['gender'];
        $password=md5($_POST['password1']);
        $this->userModel->createOperator1990($userName,$firstName,$lastName,$gender,$password);
    }

    public function operatorchecker1990(){
        $connection = mysqli_connect("localhost", "root", "", "careu");
        $search=mysqli_real_escape_string($connection, $_POST["query"]);
        mysqli_close($connection);
        if(isset($search)){
            $operatorInfo=$this->userModel->checkOperator1990($search);
            $data = ['operatorInfo' => $operatorInfo];
            $this->view('pages/admin/usernamelist',$data);
        }
    }

    public function usernamechecker1990(){
        $connection = mysqli_connect("localhost", "root", "", "careu");
        $search=mysqli_real_escape_string($connection, $_POST["userName"]);
        mysqli_close($connection);
        if(isset($search)){
            $operatorInfo=$this->userModel->checkUsername1990($search);
            if(empty($operatorInfo)){
                echo "true";
            }
            else
            {
                echo "false";
            }
        }
    }

    public function firstaids()
    {
        $this->view('pages/includes/adminheader');
        $this->view('pages/admin/adminSidebar');
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
        $this->view('pages/includes/adminheader');
        $this->view('pages/admin/adminSidebar');
        $this->view('pages/admin/cardiacInstructions');
        $this->view('pages/includes/footer');
    }

    public function cardiacinstructionlist()
    {
        $instructions=$this->userModel->getCardiac();
        $data = ['instructions' => $instructions];
        if($instructions){
            $this->view('pages/admin/instructionList',$data);
        }
    }

    public function updatecardiac()
    {
        $stepNumber=$_POST['stepNumber'];
        $description=$_POST['description'];
        $imageName=$_FILES['file']['name'];
        $tmpName=$_FILES['file']['tmp_name'];
        $this->userModel->addCardiac($stepNumber,$description,$imageName,$tmpName);
    }

    public function deletecardiac()
    {
        $connection = mysqli_connect("localhost", "root", "", "careu");
        $id=mysqli_real_escape_string($connection, $_POST["id"]);
        mysqli_close($connection);
        $this->userModel->deleteCardiac($id);
    }

    public function editcardiac()
    {
        $id=$_GET['id'];
        $instruction=$this->userModel->editCardiac($id);
        $data = ['instruction' => $instruction];
        if($instruction)
        {
            $this->view('pages/includes/adminheader');
            $this->view('pages/admin/adminSidebar');
            $this->view('pages/admin/editCardiacInstructions',$data);
            $this->view('pages/includes/footer');
        }
    }

    public function savecardiac()
    {
        $id=$_POST['id'];
        $stepNumber=$_POST['stepNumber'];
        $description=$_POST['description'];
        $imageName=$_FILES['file']['name'];
        $tmpName=$_FILES['file']['tmp_name'];
        $this->userModel->saveCardiac($id,$stepNumber,$description,$imageName,$tmpName);
    }

    public function bleeding()
    {
        $this->view('pages/includes/adminheader');
        $this->view('pages/admin/adminSidebar');
        $this->view('pages/admin/bleedingInstructions');
        $this->view('pages/includes/footer');
    }

    public function bleedinginstructionlist()
    {
        $instructions=$this->userModel->getBleeding();
        $data = ['instructions' => $instructions];
        if($instructions){
            $this->view('pages/admin/instructionList',$data);
        }
    }

    public function updatebleeding()
    {
        $stepNumber=$_POST['stepNumber'];
        $description=$_POST['description'];
        $imageName=$_FILES['file']['name'];
        $tmpName=$_FILES['file']['tmp_name'];
        $this->userModel->addBleeding($stepNumber,$description,$imageName,$tmpName);
    }

    public function deletebleeding()
    {
        $connection = mysqli_connect("localhost", "root", "", "careu");
        $id=mysqli_real_escape_string($connection, $_POST["id"]);
        mysqli_close($connection);
        $this->userModel->deleteBleeding($id);
    }

    public function editbleeding()
    {
        $id=$_GET['id'];
        $instruction=$this->userModel->editBleeding($id);
        $data = ['instruction' => $instruction];
        if($instruction)
        {
            $this->view('pages/includes/adminheader');
            $this->view('pages/admin/adminSidebar');
            $this->view('pages/admin/editBleedingInstructions',$data);
            $this->view('pages/includes/footer');
        }
    }

    public function savebleeding()
    {
        $id=$_POST['id'];
        $stepNumber=$_POST['stepNumber'];
        $description=$_POST['description'];
        $imageName=$_FILES['file']['name'];
        $tmpName=$_FILES['file']['tmp_name'];
        $this->userModel->saveBleeding($id,$stepNumber,$description,$imageName,$tmpName);
    }

    public function burn()
    {
        $this->view('pages/includes/adminheader');
        $this->view('pages/admin/adminSidebar');
        $this->view('pages/admin/burnsInstructions');
        $this->view('pages/includes/footer');
    }

    public function burninstructionlist()
    {
        $instructions=$this->userModel->getBurn();
        $data = ['instructions' => $instructions];
        if($instructions)
        {
            $this->view('pages/admin/instructionList',$data);
        }
    }

    public function updateburn()
    {
        $stepNumber=$_POST['stepNumber'];
        $description=$_POST['description'];
        $imageName=$_FILES['file']['name'];
        $tmpName=$_FILES['file']['tmp_name'];
        $this->userModel->addBurn($stepNumber,$description,$imageName,$tmpName);
    }

    public function deleteburn()
    {
        $connection = mysqli_connect("localhost", "root", "", "careu");
        $id=mysqli_real_escape_string($connection, $_POST["id"]);
        mysqli_close($connection);
        $result=$this->userModel->deleteBurn($id);
    }

    public function editBurn()
    {
        $id=$_GET['id'];
        $instruction=$this->userModel->editBurn($id);
        $data = ['instruction' => $instruction];
        if($instruction)
        {
            $this->view('pages/includes/adminheader');
            $this->view('pages/admin/adminSidebar');
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
        $this->userModel->saveBurn($id,$stepNumber,$description,$imageName,$tmpName);
    }

    public function fracture()
    {
        $this->view('pages/includes/adminheader');
        $this->view('pages/admin/adminSidebar');
        $this->view('pages/admin/fractureInstructions');
        $this->view('pages/includes/footer');
    }

    public function fractureinstructionlist()
    {
        $instructions=$this->userModel->getFracture();
        $data = ['instructions' => $instructions];
        if($instructions)
        {
            $this->view('pages/admin/instructionList',$data);
            
        }
    }

    public function updatefracture()
    {
        $stepNumber=$_POST['stepNumber'];
        $description=$_POST['description'];
        $imageName=$_FILES['file']['name'];
        $tmpName=$_FILES['file']['tmp_name'];
        $this->userModel->addFracture($stepNumber,$description,$imageName,$tmpName);
    }

    public function deletefracture()
    {
        $connection = mysqli_connect("localhost", "root", "", "careu");
        $id=mysqli_real_escape_string($connection, $_POST["id"]);
        mysqli_close($connection);
        $result=$this->userModel->deleteFracture($id);
    }

    public function editfracture()
    {
        $id=$_GET['id'];
        $instruction=$this->userModel->editFracture($id);
        $data = ['instruction' => $instruction];
        if($instruction)
        {
            $this->view('pages/includes/adminheader');
            $this->view('pages/admin/adminSidebar');
            $this->view('pages/admin/editFractureInstructions',$data);
            $this->view('pages/includes/footer');
        }
    }

    public function savefracture()
    {
        $id=$_POST['id'];
        $stepNumber=$_POST['stepNumber'];
        $description=$_POST['description'];
        $imageName=$_FILES['image']['name'];
        $tmpName=$_FILES['image']['tmp_name'];
        $this->userModel->saveFracture($id,$stepNumber,$description,$imageName,$tmpName);
    }

    public function blister()
    {
        $this->view('pages/includes/adminheader');
        $this->view('pages/admin/adminSidebar');
        $this->view('pages/admin/blisterInstructions');
        $this->view('pages/includes/footer');
    }

    public function blisterinstructionlist()
    {
        $instructions=$this->userModel->getBlister();
        $data = ['instructions' => $instructions];
        if($instructions)
        {
            $this->view('pages/admin/instructionList',$data);
        }
    }

    public function updateblister()
    {
        $stepNumber=$_POST['stepNumber'];
        $description=$_POST['description'];
        $imageName=$_FILES['file']['name'];
        $tmpName=$_FILES['file']['tmp_name'];
        $this->userModel->addBlister($stepNumber,$description,$imageName,$tmpName);
    }

    public function deleteblister()
    {
        $connection = mysqli_connect("localhost", "root", "", "careu");
        $id=mysqli_real_escape_string($connection, $_POST["id"]);
        mysqli_close($connection);
        $result=$this->userModel->deleteBlister($id);
    }

    public function editblister()
    {
        $id=$_GET['id'];
        $instruction=$this->userModel->editBlister($id);
        $data = ['instruction' => $instruction];
        if($instruction)
        {
            $this->view('pages/includes/adminheader');
            $this->view('pages/admin/adminSidebar');
            $this->view('pages/admin/editBlisterInstructions',$data);
            $this->view('pages/includes/footer');
        }
    }

    public function saveblister()
    {
        $id=$_POST['id'];
        $stepNumber=$_POST['stepNumber'];
        $description=$_POST['description'];
        $imageName=$_FILES['image']['name'];
        $tmpName=$_FILES['image']['tmp_name'];
        $this->userModel->saveBlister($id,$stepNumber,$description,$imageName,$tmpName);
    }

    public function sprain()
    {
        $this->view('pages/includes/adminheader');
        $this->view('pages/admin/adminSidebar');
        $this->view('pages/admin/sprainInstructions');
        $this->view('pages/includes/footer');
    }

    public function spraininstructionlist()
    {
        $instructions=$this->userModel->getSprain();
        $data = ['instructions' => $instructions];
        if($instructions)
        {
            $this->view('pages/admin/instructionList',$data);
        }
    }

    public function updatesprain()
    {
        $stepNumber=$_POST['stepNumber'];
        $description=$_POST['description'];
        $imageName=$_FILES['file']['name'];
        $tmpName=$_FILES['file']['tmp_name'];
        $this->userModel->addSprain($stepNumber,$description,$imageName,$tmpName);
    }

    public function deletesprain()
    {
        $connection = mysqli_connect("localhost", "root", "", "careu");
        $id=mysqli_real_escape_string($connection, $_POST["id"]);
        mysqli_close($connection);
        $this->userModel->deleteSprain($id);
    }

    public function editsprain()
    {
        $id=$_GET['id'];
        $instruction=$this->userModel->editSprain($id);
        $data = ['instruction' => $instruction];
        if($instruction)
        {
            $this->view('pages/includes/adminheader');
            $this->view('pages/admin/adminSidebar');
            $this->view('pages/admin/editSprainInstructions',$data);
            $this->view('pages/includes/footer');
        }
    }

    public function savesprain()
    {
        $id=$_POST['id'];
        $stepNumber=$_POST['stepNumber'];
        $description=$_POST['description'];
        $imageName=$_FILES['image']['name'];
        $tmpName=$_FILES['image']['tmp_name'];
        $this->userModel->saveSprain($id,$stepNumber,$description,$imageName,$tmpName);
    }

    public function nosebleed()
    {
        $this->view('pages/includes/adminheader');
        $this->view('pages/admin/adminSidebar');
        $this->view('pages/admin/nosebleedInstructions');
        $this->view('pages/includes/footer');
    }

    public function nosebleedinstructionlist()
    {
        $instructions=$this->userModel->getNosebleed();
        $data = ['instructions' => $instructions];
        if($instructions)
        {
            $this->view('pages/admin/instructionList',$data);
        }
    }

    public function updatenosebleed()
    {
        $stepNumber=$_POST['stepNumber'];
        $description=$_POST['description'];
        $imageName=$_FILES['file']['name'];
        $tmpName=$_FILES['file']['tmp_name'];
        $this->userModel->addNosebleed($stepNumber,$description,$imageName,$tmpName);
    }

    public function deletenosebleed()
    {
        $connection = mysqli_connect("localhost", "root", "", "careu");
        $id=mysqli_real_escape_string($connection, $_POST["id"]);
        mysqli_close($connection);
        $this->userModel->deleteNosebleed($id);
    }

    public function editnosebleed()
    {
        $id=$_GET['id'];
        $instruction=$this->userModel->editNosebleed($id);
        $data = ['instruction' => $instruction];
        if($instruction)
        {
            $this->view('pages/includes/adminheader');
            $this->view('pages/admin/adminSidebar');
            $this->view('pages/admin/editNosebleedInstructions',$data);
            $this->view('pages/includes/footer');
        }
    }

    public function savenosebleed()
    {
        $id=$_POST['id'];
        $stepNumber=$_POST['stepNumber'];
        $description=$_POST['description'];
        $imageName=$_FILES['image']['name'];
        $tmpName=$_FILES['image']['tmp_name'];
        $this->userModel->saveNosebleed($id,$stepNumber,$description,$imageName,$tmpName);
    }

    public function toothache()
    {
        $this->view('pages/includes/adminheader');
        $this->view('pages/admin/adminSidebar');
        $this->view('pages/admin/toothacheInstructions');
        $this->view('pages/includes/footer');
    }

    public function toothacheinstructionlist()
    {
        $instructions=$this->userModel->getToothache();
        $data = ['instructions' => $instructions];
        if($instructions)
        {
            $this->view('pages/admin/instructionList',$data);
        }
    }

    public function updatetoothache()
    {
        $stepNumber=$_POST['stepNumber'];
        $description=$_POST['description'];
        $imageName=$_FILES['file']['name'];
        $tmpName=$_FILES['file']['tmp_name'];
        $this->userModel->addToothache($stepNumber,$description,$imageName,$tmpName);
    }

    public function deletetoothache()
    {
        $connection = mysqli_connect("localhost", "root", "", "careu");
        $id=mysqli_real_escape_string($connection, $_POST["id"]);
        mysqli_close($connection);
        $this->userModel->deleteToothache($id);
    }

    public function edittoothache()
    {
        $id=$_GET['id'];
        $instruction=$this->userModel->editToothache($id);
        $data = ['instruction' => $instruction];
        if($instruction)
        {
            $this->view('pages/includes/adminheader');
            $this->view('pages/admin/adminSidebar');
            $this->view('pages/admin/editToothacheInstructions',$data);
            $this->view('pages/includes/footer');
        }
    }

    public function savetoothache()
    {
        $id=$_POST['id'];
        $stepNumber=$_POST['stepNumber'];
        $description=$_POST['description'];
        $imageName=$_FILES['image']['name'];
        $tmpName=$_FILES['image']['tmp_name'];
        $this->userModel->saveToothache($id,$stepNumber,$description,$imageName,$tmpName);
    }
}

?>