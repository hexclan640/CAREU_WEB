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
        }
    }

    public function home()
    {
        $this->view('includes/adminheader');
        $this->view('admin/adminSidebar');
        $this->view('admin/home');
        $this->view('includes/footer');
    }

    public function new119()
    {
        $this->view('includes/adminheader');
        $this->view('admin/adminSidebar');
        $this->view('admin/create119OperatorAccount');
        $this->view('includes/footer');
    }

    public function new1990()
    {
        $this->view('includes/adminheader');
        $this->view('admin/adminSidebar');
        $this->view('admin/create1990OperatorAccount');
        $this->view('includes/footer');
    }

    public function profile()
    {
        $adminInfo=$this->userModel->getProfile($_SESSION['userName']);
        $data = ['admin' => $adminInfo];

        if($adminInfo)
        {
            $this->view('includes/adminheader');
            $this->view('admin/adminSidebar');
            $this->view('admin/editProfileAdmin',$data);
            $this->view('includes/footer');
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
        $this->view('includes/adminheader');
        $this->view('admin/adminSidebar');
        $this->view('admin/changePassword');
        $this->view('includes/footer');
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
        $this->view('includes/adminheader');
        $this->view('admin/adminSidebar');
        $this->view('admin/userManagement');
        $this->view('includes/footer');
    }

    public function searchunverified(){
        $connection = mysqli_connect("localhost", "root", "", "careu");
        $search=mysqli_real_escape_string($connection, $_POST["query"]);
        mysqli_close($connection);
        if(isset($search)){
            $requestInfo=$this->userModel->unverifiedSearch($search);
            $data = ['requestInfo' => $requestInfo];
            $this->view('admin/unverifiedSearch',$data);
        }
    }

    public function searchverified(){
        $connection = mysqli_connect("localhost", "root", "", "careu");
        $search=mysqli_real_escape_string($connection, $_POST["query"]);
        mysqli_close($connection);
        if(isset($search)){
            $usersInfo=$this->userModel->verifiedSearch($search);
            $data = ['usersInfo' => $usersInfo];
            $this->view('admin/verifiedSearch',$data);
        }
    }

    public function userrequests()
    {
        $requestInfo=$this->userModel->getRequestBrief();
        $data = ['requestInfo' => $requestInfo];
        $this->view('admin/userRequests',$data);
    }

    public function userrequestscount(){
        $requestCount=$this->userModel->getRequestCount();
        $data = ['requestCount' => $requestCount];
        $this->view('includes/badge',$data);
    }

    public function userbrief()
    {
        $users=$this->userModel->getUserBrief();
        $data = ['usersInfo' => $users];
        $this->view('admin/userBrief',$data);
    }

    public function userprofile()
    {
        $userId=$_GET['id'];
        $user=$this->userModel->getUser($userId);
        $id=$this->userModel->getId($userId);
        $data = ['userInfo' => $user,'idphoto'=>$id];
        if($user)
        {
            $this->view('includes/adminheader');
            $this->view('admin/adminSidebar');
            $this->view('admin/viewUserRequest',$data);
            $this->view('includes/footer'); 
        }
    }

    public function block()
    {
        $userId=$_POST['id'];
        $this->userModel->blockUser($userId);
        $result=$this->userModel->getEmail($userId);
        $adminemail="hexclan640@gmail.com";
        $password="Hex@1800clan";
        $this->PHPMailer();
        $email=$result[0]->email;
        $mail = new PHPMailer;
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = $adminemail;
		$mail->Password = $password;
		$mail->SMTPSecure = 'TLS';
		$mail->Port = 587;
		$mail->setFrom($adminemail,'CARE-U ADMIN');
		$mail->addAddress($email);
		$mail->Subject = 'Account Activation Failed';
    	$mail->Body    = "We are very sorry to inform that you, your account has been block due to some reason. Please contact our system administrators for more information. Thank you for beeing with us!";
		if(!$mail->send()) {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    echo 'Reset link has been sent to your email';
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
            $this->view('includes/adminheader');
            $this->view('admin/adminSidebar');
            $this->view('admin/userProfile',$data);
            $this->view('includes/footer'); 
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
            $this->view('includes/adminheader');
            $this->view('admin/adminSidebar');
            $this->view('admin/viewPoliceRequest',$data);
            $this->view('includes/footer');
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
            $this->view('includes/adminheader');
            $this->view('admin/adminSidebar');
            $this->view('admin/viewSuwasariyaRequest',$data);
            $this->view('includes/footer');
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
        $this->view('admin/requestHistory',$data);
    }

    public function getfeedbackhistory(){
        $userId=$_SESSION["id"];
        $feedbacks=$this->userModel->getFeedbackHistory($userId);
        $data = ['feedbackInfo' => $feedbacks];
        $this->view('admin/feedbackHistory',$data);
    }

    public function getrequesttype(){

    }

    public function operators()
    {
        $this->view('includes/adminheader');
        $this->view('admin/adminSidebar');
        $this->view('admin/operators');
        $this->view('includes/footer'); 
    }

    public function getpoliceoperators()
    {
        $operators119=$this->userModel->getOperator119();
        $data = ['operatorInfo119' => $operators119];
        if(isset($data))
        {
            $this->view('admin/policeOperators',$data);
        }
    }

    public function getsuwasariyaoperators()
    {
        $operators1990=$this->userModel->getOperator1990();
        $data = ['operatorInfo1990' => $operators1990];
        if(isset($data))
        {
            $this->view('admin/suwasariyaOperators',$data);
        }
    }

    public function romoveoperator119()
    {
        $this->userModel->removeOperator119($_POST['id']);
    }

    public function romoveoperator1990()
    {
        $this->userModel->removeOperator1990($_POST['id']);
    }

    public function viewuserrequest()
    {
        $requestInfo=$this->userModel->getUserRequest($_GET['rid']);
        $data = ['admin' => $requestInfo];

        if($requestInfo)
        {
            $this->view('includes/adminheader');
            $this->view('admin/adminSidebar');
            $this->view('admin/viewUserRequest',$data);
            $this->view('includes/footer'); 
        }
    }

    public function reject()
    {
        $userId=$_POST['id'];
        $result=$this->userModel->rejectRequest($userId);
        $result=$this->userModel->getEmail($userId);
        $adminemail="hexclan640@gmail.com";
        $password="Hex@1800clan";
        $this->PHPMailer();
        $email=$result[0]->email;
        $mail = new PHPMailer;
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = $adminemail;
		$mail->Password = $password;
		$mail->SMTPSecure = 'TLS';
		$mail->Port = 587;
		$mail->setFrom($adminemail,'CARE-U ADMIN');
		$mail->addAddress($email);
		$mail->Subject = 'Account Activation Failed';
    	$mail->Body    = "We are very sorry to inform that your account was unsuccesfull. The given details can't be accepted. Please re-check your given details and try again later. Thank you for conneting with us!";
		if(!$mail->send()) {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    echo 'Reset link has been sent to your email';
		}
    }

    public function accept()
    {
        $userId=$_POST['id'];
        $this->userModel->acceptRequest($userId);
        $result=$this->userModel->getEmail($userId);
        $adminemail="hexclan640@gmail.com";
        $password="Hex@1800clan";
        $this->PHPMailer();

        $email=$result[0]->email;
        echo $result[0]->email;
        
        $mail = new PHPMailer;
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = $adminemail;
		$mail->Password = $password;
		$mail->SMTPSecure = 'TLS';
		$mail->Port = 587;
		$mail->setFrom($adminemail,'CARE-U ADMIN');
		$mail->addAddress($email);
		$mail->Subject = 'Welcome to CARE-U';
    	$mail->Body    = "Your details were verified and the account is activated. Now you can log in to your account via the Care-U mobile appilication and keep in touch with us. We will be there for you to help you whenever your are facing to any emergency situation.Thank you conneting with us and stay with us in the future";
		if(!$mail->send()) {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    echo 'Reset link has been sent to your email';
		}
    }

    public function reports()
    {
        $this->view('includes/adminheader');
        $this->view('admin/adminSidebar');
        $this->view('admin/reports');
        $this->view('includes/footer');
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
            if(empty($operatorInfo)){
                echo "success";
            }else{
                echo "failed";
            }
            // $data = ['operatorInfo' => $operatorInfo];
            // $this->view('admin/usernamelist',$data);
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
            if(empty($operatorInfo)){
                echo "success";
            }else{
                echo "failed";
            }
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
        $this->view('includes/adminheader');
        $this->view('admin/adminSidebar');
        $this->view('admin/addInstructions');
        $this->view('includes/footer');
    }

    public function instructionform()
    {
        // $this->view('includes/adminheader');
        $this->view('admin/instructionForm');
        // $this->view('includes/footer');
    }

    public function cardiac()
    {
        $this->view('includes/adminheader');
        $this->view('admin/adminSidebar');
        $this->view('admin/cardiacInstructions');
        $this->view('includes/footer');
    }

    public function cardiacinstructionlist()
    {
        $instructions=$this->userModel->getCardiac();
        $data = ['instructions' => $instructions];
        if($instructions){
            $this->view('admin/instructionList',$data);
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
            $this->view('includes/adminheader');
            $this->view('admin/adminSidebar');
            $this->view('admin/editCardiacInstructions',$data);
            $this->view('includes/footer');
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
        $this->view('includes/adminheader');
        $this->view('admin/adminSidebar');
        $this->view('admin/bleedingInstructions');
        $this->view('includes/footer');
    }

    public function bleedinginstructionlist()
    {
        $instructions=$this->userModel->getBleeding();
        $data = ['instructions' => $instructions];
        if($instructions){
            $this->view('admin/instructionList',$data);
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
            $this->view('includes/adminheader');
            $this->view('admin/adminSidebar');
            $this->view('admin/editBleedingInstructions',$data);
            $this->view('includes/footer');
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
        $this->view('includes/adminheader');
        $this->view('admin/adminSidebar');
        $this->view('admin/burnsInstructions');
        $this->view('includes/footer');
    }

    public function burninstructionlist()
    {
        $instructions=$this->userModel->getBurn();
        $data = ['instructions' => $instructions];
        if($instructions)
        {
            $this->view('admin/instructionList',$data);
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
            $this->view('includes/adminheader');
            $this->view('admin/adminSidebar');
            $this->view('admin/editBurnsInstructions',$data);
            $this->view('includes/footer');
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
        $this->view('includes/adminheader');
        $this->view('admin/adminSidebar');
        $this->view('admin/fractureInstructions');
        $this->view('includes/footer');
    }

    public function fractureinstructionlist()
    {
        $instructions=$this->userModel->getFracture();
        $data = ['instructions' => $instructions];
        if($instructions)
        {
            $this->view('admin/instructionList',$data);
            
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
            $this->view('includes/adminheader');
            $this->view('admin/adminSidebar');
            $this->view('admin/editFractureInstructions',$data);
            $this->view('includes/footer');
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
        $this->view('includes/adminheader');
        $this->view('admin/adminSidebar');
        $this->view('admin/blisterInstructions');
        $this->view('includes/footer');
    }

    public function blisterinstructionlist()
    {
        $instructions=$this->userModel->getBlister();
        $data = ['instructions' => $instructions];
        if($instructions)
        {
            $this->view('admin/instructionList',$data);
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
            $this->view('includes/adminheader');
            $this->view('admin/adminSidebar');
            $this->view('admin/editBlisterInstructions',$data);
            $this->view('includes/footer');
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
        $this->view('includes/adminheader');
        $this->view('admin/adminSidebar');
        $this->view('admin/sprainInstructions');
        $this->view('includes/footer');
    }

    public function spraininstructionlist()
    {
        $instructions=$this->userModel->getSprain();
        $data = ['instructions' => $instructions];
        if($instructions)
        {
            $this->view('admin/instructionList',$data);
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
            $this->view('includes/adminheader');
            $this->view('admin/adminSidebar');
            $this->view('admin/editSprainInstructions',$data);
            $this->view('includes/footer');
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
        $this->view('includes/adminheader');
        $this->view('admin/adminSidebar');
        $this->view('admin/nosebleedInstructions');
        $this->view('includes/footer');
    }

    public function nosebleedinstructionlist()
    {
        $instructions=$this->userModel->getNosebleed();
        $data = ['instructions' => $instructions];
        if($instructions)
        {
            $this->view('admin/instructionList',$data);
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
            $this->view('includes/adminheader');
            $this->view('admin/adminSidebar');
            $this->view('admin/editNosebleedInstructions',$data);
            $this->view('includes/footer');
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
        $this->view('includes/adminheader');
        $this->view('admin/adminSidebar');
        $this->view('admin/toothacheInstructions');
        $this->view('includes/footer');
    }

    public function toothacheinstructionlist()
    {
        $instructions=$this->userModel->getToothache();
        $data = ['instructions' => $instructions];
        if($instructions)
        {
            $this->view('admin/instructionList',$data);
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
            $this->view('includes/adminheader');
            $this->view('admin/adminSidebar');
            $this->view('admin/editToothacheInstructions',$data);
            $this->view('includes/footer');
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