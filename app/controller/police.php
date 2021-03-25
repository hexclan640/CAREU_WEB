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
        }
    }

    public function home()
    {
        $this->view('includes/119OperatorHeader');
        $this->view('119Operator/policeSidebar');
        $this->view('119Operator/home');
        $this->view('includes/footer');
    }

    public function recent()
    {
        $this->view('includes/119OperatorHeader');
        $this->view('119Operator/policeSidebar');
        $this->view('119Operator/recentRequests');
        $this->view('includes/footer');
    }

    public function all()
    {
        $this->view('includes/119OperatorHeader');
        $this->view('119Operator/policeSidebar');
        $this->view('119Operator/allrequests');
        $this->view('includes/footer');
    }

    public function searchrequests(){
        $connection = mysqli_connect("localhost", "root", "", "careu");
        $search=mysqli_real_escape_string($connection, $_POST["query"]);
        mysqli_close($connection);
        if(isset($search)){
            $requestsInfo=$this->userModel->requestsSearch($search);
            $data = ['requestsInfo' => $requestsInfo];
            $this->view('119operator/searchRequests',$data);
        }
    }

    public function notviewed(){
        $requestsInfo=$this->userModel->notviewedSearch();
        $data = ['requestsInfo' => $requestsInfo];
        $this->view('119operator/searchRequests',$data);
    }

    public function accepted(){
        $requestsInfo=$this->userModel->acceptedSearch();
        $data = ['requestsInfo' => $requestsInfo];
        $this->view('119operator/searchRequests',$data);
    }

    public function rejected(){
        $requestsInfo=$this->userModel->rejectedSearch();
        $data = ['requestsInfo' => $requestsInfo];
        $this->view('119operator/searchRequests',$data);
    }

    public function timeout(){
        $requestsInfo=$this->userModel->timeoutSearch();
        $data = ['requestsInfo' => $requestsInfo];
        $this->view('119operator/searchRequests',$data);
    }


    public function getall()
    {
        $requestsInfo=$this->userModel->getAllRequests();
        $data = ['requestsInfo' => $requestsInfo];
        if($requestsInfo)
        {
            $this->view('119Operator/oldrequest',$data);
        }
    }

    public function getrecent()
    {
        $requestsInfo=$this->userModel->getRecentRequests();
        $data = ['requestsInfo' => $requestsInfo];
        $this->view('119Operator/request',$data);
    }

    public function rejectrequest(){
        $requestId=$_POST["requestId"];
        $this->userModel->requestReject($requestId);
    }

    public function acceptrequest(){
        $requestId=$_POST["requestId"];
        $this->userModel->requestAccept($requestId);
    }

    public function viewtherequest()
    {
        $requestId=$_GET['id'];
        $requestInfo=$this->userModel->getRecentRequestAll($requestId);
        $evidenceInfo=$this->userModel->getEvidence($requestId);
        $data = ['requestInfo' => $requestInfo,'evidenceInfo'=>$evidenceInfo];
        if($requestInfo)
        {
            $this->view('includes/119OperatorHeader');
            $this->view('119Operator/policeSidebar');
            $this->view('119Operator/viewRequest',$data);
            $this->view('includes/footer');
        }
    }

    public function sendmessage(){
        $requestId=$_POST["requestId"];
        $message=$_POST["message"];
        $this->userModel->updateSentMessage($requestId,$message,$_SESSION["userName"]);
    }

    public function allrequests(){
        $requestId=$_GET['id'];
        $requestInfo=$this->userModel->getAllRequestAll($requestId);
        $feedbackInfo=$this->userModel->getFeedback($requestId);
        $evidenceInfo=$this->userModel->getEvidence($requestId);
        $data = ['requestInfo' => $requestInfo,'feedbackInfo' => $feedbackInfo,'evidenceInfo'=>$evidenceInfo];
        if($requestInfo)
        {
            $this->view('includes/119OperatorHeader');
            $this->view('119Operator/policeSidebar');
            $this->view('119Operator/viewOldRequest',$data);
            $this->view('includes/footer');
        }
    }

    public function requestscount(){
        $requestCount=$this->userModel->getRequestCount();
        echo count($requestCount);
    }

    public function viewrequest()
    {
        $this->view('includes/119OperatorHeader');
        $this->view('119Operator/policeSidebar');
        $this->view('119Operator/viewRequest');
        $this->view('includes/footer');
    }

    public function profile()
    {
        $operatorInfo=$this->userModel->getProfile($_SESSION['userName']);
        $data = ['operatorInfo' => $operatorInfo];

        if($operatorInfo)
        {
            $this->view('includes/119OperatorHeader');
            $this->view('119Operator/policeSidebar');
            $this->view('119Operator/editProfileOperator119',$data);
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
        $this->userModel->updateProfile($firstName,$lastName,$userName,$imageName,$tmpName);
    }

    public function changePassword()
    {
        $this->view('includes/119OperatorHeader');
        $this->view('119Operator/policeSidebar');
        $this->view('119Operator/changePassword');
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
        $this->view('includes/119OperatorHeader');
        $this->view('119Operator/policeSidebar');
        $this->view('119Operator/reports');
        $this->view('includes/footer');
    }

    public function flagcount()
    {
        $result=$this->userModel->countFlags();
        echo $result[0].' '.$result[1].' '.$result[2].' '.$result[3];
    }

    public function categorycount()
    {
        $result=$this->userModel->countCategory();
        echo $result[0].' '.$result[1].' '.$result[2].' '.$result[3];
    }

    public function districtcount()
    {
        $result=$this->userModel->countDistrict();
        echo $result[0].' '.$result[1].' '.$result[2].' '.$result[3].' '.$result[4].' '.$result[5].' '.$result[6].' '.$result[7].' '.$result[8].' '.$result[9].' '.$result[10].' '.$result[11].' '.$result[12].' '.$result[13].' '.$result[14].' '.$result[15].' '.$result[16].' '.$result[17].' '.$result[18].' '.$result[19].' '.$result[20].' '.$result[21].' '.$result[22].' '.$result[23].' '.$result[24];
    }
}

?>