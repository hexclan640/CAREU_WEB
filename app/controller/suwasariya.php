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
        $this->view('pages/1990Operator/request',$data);
    }

    public function rejectrequest(){
        $requestId=$_POST["requestId"];
        $rejectInfo=$this->userModel->requestReject($requestId);
        if($rejectInfo){
            echo "success";
        }
        else
        {
            echo "failed";
        }
    }

    public function acceptrequest(){
        $requestId=$_POST["requestId"];
        $rejectInfo=$this->userModel->requestAccept($requestId);
        if($rejectInfo){
            echo "success";
        }
        else
        {
            echo "failed";
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
            $this->view('pages/1990Operator/viewRequest',$data);
            $this->view('pages/includes/footer');
        }
    }

    public function all()
    {
        $this->view('pages/includes/1990OperatorHeader');
        $this->view('pages/1990Operator/suwasariyaSidebar');
        $this->view('pages/1990Operator/allrequests');
        $this->view('pages/includes/footer');
    }

    public function searchrequests(){
        $connection = mysqli_connect("localhost", "root", "", "careu");
        $search=mysqli_real_escape_string($connection, $_POST["query"]);
        mysqli_close($connection);
        if(isset($search)){
            $requestsInfo=$this->userModel->requestsSearch($search);
            $data = ['requestsInfo' => $requestsInfo];
            $this->view('pages/1990operator/searchRequests',$data);
        }
    }

    public function notviewed(){
        $requestsInfo=$this->userModel->notviewedSearch();
        $data = ['requestsInfo' => $requestsInfo];
        $this->view('pages/1990operator/searchRequests',$data);
    }

    public function accepted(){
        $requestsInfo=$this->userModel->acceptedSearch();
        $data = ['requestsInfo' => $requestsInfo];
        $this->view('pages/1990operator/searchRequests',$data);
    }

    public function rejected(){
        $requestsInfo=$this->userModel->rejectedSearch();
        $data = ['requestsInfo' => $requestsInfo];
        $this->view('pages/1990operator/searchRequests',$data);
    }

    public function getall()
    {
        $requestsInfo=$this->userModel->getAllRequests();
        $data = ['requestsInfo' => $requestsInfo];
        if($requestsInfo)
        {
            $this->view('pages/1990Operator/oldrequest',$data);
        }
    }

    public function allrequests(){
        $requestId=$_GET['id'];
        $requestInfo=$this->userModel->getAllRequestAll($requestId);
        $feedbackInfo=$this->userModel->getFeedback($requestId);
        $data = ['requestInfo' => $requestInfo,'feedbackInfo' => $feedbackInfo];
        if($requestInfo)
        {
            $this->view('pages/includes/1990OperatorHeader');
            $this->view('pages/1990Operator/suwasariyaSidebar');
            $this->view('pages/1990Operator/viewOldRequest',$data);
            $this->view('pages/includes/footer');
        }
    }

    public function viewrequest()
    {
        $this->view('pages/includes/1990OperatorHeader');
        $this->view('pages/1990Operator/suwasariyaSidebar');
        $this->view('pages/1990Operator/viewRequest');
        $this->view('pages/includes/footer');
    }

    public function requestscount(){
        $requestCount=$this->userModel->getRequestCount();
        $data = ['requestCount' => $requestCount];
        $this->view('pages/includes/badge',$data);
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
        $this->userModel->updateProfile($firstName,$lastName,$userName,$imageName,$tmpName);
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