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
        $this->userModel->requestReject($requestId,$_SESSION['policeUserName']);
    }

    public function acceptrequest(){
        $requestId=$_POST["requestId"];
        $this->userModel->requestAccept($requestId,$_SESSION['policeUserName']);
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
        $this->userModel->updateSentMessage($requestId,$message,$_SESSION['policeUserName']);
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
        $operatorInfo=$this->userModel->getProfile($_SESSION['policeUserName']);
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
        $userName=$_SESSION['policeUserName'];
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
        
        if($userName==$_SESSION['policeUserName'])
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

    public function tablecss(){
        $html='<style>
                    #customers {
                        font-family: Arial, Helvetica, sans-serif;
                        border-collapse: collapse;
                        width: 100%;
                    }

                    #customers td, #customers th {
                        border: 1px solid #ddd;
                        padding: 8px;
                    }

                    #customers tr:nth-child(even) {
                        background-color: #f2f2f2;
                    }

                    #customers tr:hover {
                        background-color: #ddd;
                    }

                    #customers th {
                        padding-top: 12px;
                        padding-bottom: 12px;
                        text-align: left;
                        background-color: rgba(0,0,0,0.7);
                        color: white;
                    }

                    .title {
                        width:100%;
                        background-color: rgb(88, 0, 0);
                        color:#FF8C00;
                        text-align:center;
                        margin-bottom:1rem;
                    }
                </style>';
                return $html;
    }

    public function pdfreport1(){
        $result=$this->userModel->pdfDateDistrict();
        $this->dompdf();
        if($result){
            $html=$this->tablecss();
            $html.='<div class="title">
	    	            <h1 id="service">POLICE-119</h1>
			            <p>Service Report - Group By Date And District</p>
		            </div>';
	        $html.='<table id="customers">';
	        $html.='<tr><th>Date</th><th>District</th><th>Requests</th></tr>';
            for($i=0;$i<count($result);$i++){
		            $html.='<tr><td>'.$result[$i]->date.'</td><td>'.$result[$i]->district.'</td><td>'.$result[$i]->requestCount.'</td></tr>';
            }
	        $html.='</table>';
        }else{
	        $html="Data not found";
        }
        $mpdf=new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $file='report.pdf';
        $mpdf->output($file,'I');
    }

    public function pdfreport2(){
        $result=$this->userModel->pdfDistrictCategory();
        $this->dompdf();
        if($result){
            $html=$this->tablecss();
            $html.='<div class="title">
	    	            <h1 id="service">POLICE-119</h1>
			            <p>Service Report - Group By District And Complain Category</p>
		            </div>';
	        $html.='<table id="customers">';
	        $html.='<tr><th>District</th><th>Complain Category</th><th>Requests</th></tr>';
            for($i=0;$i<count($result);$i++){
		            $html.='<tr><td>'.$result[$i]->district.'</td><td>'.$result[$i]->complainCategory.'</td><td>'.$result[$i]->requestCount.'</td></tr>';
            }
	        $html.='</table>';
        }else{
	        $html="Data not found";
        }
        $mpdf=new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $file='report.pdf';
        $mpdf->output($file,'I');
    }

    public function pdfreport3(){
        $result=$this->userModel->pdfPoliceStationCategory();
        $this->dompdf();
        if($result){
            $html=$this->tablecss();
            $html.='<div class="title">
	    	            <h1 id="service">POLICE-119</h1>
			            <p>Service Report - Group By Police Station And Complain Category</p>
		            </div>';
	        $html.='<table id="customers">';
	        $html.='<tr><th>Police Station</th><th>Complain Category</th><th>Requests</th></tr>';
            for($i=0;$i<count($result);$i++){
		            $html.='<tr><td>'.$result[$i]->policeStation.'</td><td>'.$result[$i]->complainCategory.'</td><td>'.$result[$i]->requestCount.'</td></tr>';
            }
	        $html.='</table>';
        }else{
	        $html="Data not found";
        }
        $mpdf=new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $file='report.pdf';
        $mpdf->output($file,'I');
    }

    public function pdfreport4(){
        $result=$this->userModel->pdfDateCategory();
        $this->dompdf();
        if($result){
            $html=$this->tablecss();
            $html.='<div class="title">
	    	            <h1 id="service">POLICE-119</h1>
			            <p>Service Report - Group By Date And Complain Category</p>
		            </div>';
	        $html.='<table id="customers">';
	        $html.='<tr><th>Date</th><th>Complain Category</th><th>Requests</th></tr>';
            for($i=0;$i<count($result);$i++){
		            $html.='<tr><td>'.$result[$i]->date.'</td><td>'.$result[$i]->complainCategory.'</td><td>'.$result[$i]->requestCount.'</td></tr>';
            }
	        $html.='</table>';
        }else{
	        $html="Data not found";
        }
        $mpdf=new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $file='report.pdf';
        $mpdf->output($file,'I');
    }

    public function pdfreport5(){
        $result=$this->userModel->pdfRequestkUser();
        $this->dompdf();
        if($result){
            $html=$this->tablecss();
            $html.='<div class="title">
	    	            <h1 id="service">POLICE-119</h1>
			            <p>Service Report - Service Ratings With Police Stations</p>
		            </div>';
	        $html.='<table id="customers">';
	        $html.='<tr><th>First Name</th><th>Last Name</th><th>Gender</th><th>NIC</th><th>E-mail</th><th>Phone</th><th>Address</th><th>Requests</th></tr>';
            for($i=0;$i<count($result);$i++){
		            $html.='<tr><td>'.$result[$i]->firstName.'</td><td>'.$result[$i]->lastName.'</td><td>'.$result[$i]->gender.'</td><td>'.$result[$i]->nicNumber.'</td><td>'.$result[$i]->email.'</td><td>'.$result[$i]->phoneNumber.'</td><td>'.$result[$i]->address.'</td><td>'.$result[$i]->requestCount.'</td></tr>';
            }
	        $html.='</table>';
        }else{
	        $html="Data not found";
        }
        $mpdf=new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $file='report.pdf';
        $mpdf->output($file,'I');
    }

    public function pdfreport6(){
        $result=$this->userModel->pdfRequestFeedback();
        $this->dompdf();
        if($result){
            $html=$this->tablecss();
            $html.='<div class="title">
	    	            <h1 id="service">POLICE-119</h1>
			            <p>Service Report - Service Ratings With Police Stations</p>
		            </div>';
	        $html.='<table id="customers">';
	        $html.='<tr><th>Request ID</th><th>Date</th><th>Time</th><th>Police Station</th><th>Complain Category</th><th>Feedback</th><th>Rating</th></tr>';
            for($i=0;$i<count($result);$i++){
		            $html.='<tr><td>'.$result[$i]->requestId.'</td><td>'.$result[$i]->date.'</td><td>'.$result[$i]->time.'</td><td>'.$result[$i]->policeStation.'</td><td>'.$result[$i]->complainCategory.'</td><td>'.$result[$i]->comment.'</td><td>'.$result[$i]->ratings.'</td></tr>';
            }
	        $html.='</table>';
        }else{
	        $html="Data not found";
        }
        $mpdf=new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $file='report.pdf';
        $mpdf->output($file,'I');
    }

    public function pdfreport7(){
        $result=$this->userModel->pdfAllRequestFeedback();
        $this->dompdf();
        if($result){
            $html=$this->tablecss();
            $html.='<div class="title">
	    	            <h1 id="service">POLICE-119</h1>
			            <p>Service Report - Service Ratings With Police Stations</p>
		            </div>';
	        $html.='<table id="customers">';
	        $html.='<tr><th>Request ID</th><th>Date</th><th>Time</th><th>Police Station</th><th>Complain Category</th><th>Feedback</th><th>Rating</th></tr>';
            for($i=0;$i<count($result);$i++){
		            $html.='<tr><td>'.$result[$i]->requestId.'</td><td>'.$result[$i]->date.'</td><td>'.$result[$i]->time.'</td><td>'.$result[$i]->policeStation.'</td><td>'.$result[$i]->complainCategory.'</td><td>'.$result[$i]->comment.'</td><td>'.$result[$i]->ratings.'</td></tr>';
            }
	        $html.='</table>';
        }else{
	        $html="Data not found";
        }
        $mpdf=new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $file='report.pdf';
        $mpdf->output($file,'I');
    }

    public function pdfreport8(){
        $result=$this->userModel->pdfAllRequestFeedbackUser();
        $this->dompdf();
        if($result){
            $html=$this->tablecss();
            $html.='<div class="title">
	    	            <h1 id="service">POLICE-119</h1>
			            <p>Service Report - Service Ratings With Police Stations</p>
		            </div>';
	        $html.='<table id="customers">';
	        $html.='<tr><th>First Name</th><th>Last Name</th><th>NIC</th><th>Phone</th><th>E-mail</th><th>Address</th><th>Date</th><th>Time</th><th>District</th><th>Police Statin</th><th>Complain Category</th></tr>';
            for($i=0;$i<count($result);$i++){
		            $html.='<tr><td>'.$result[$i]->firstName.'</td><td>'.$result[$i]->lastName.'</td><td>'.$result[$i]->nicNumber.'</td><td>'.$result[$i]->phoneNumber.'</td><td>'.$result[$i]->email.'</td><td>'.$result[$i]->address.'</td><td>'.$result[$i]->date.'</td><td>'.$result[$i]->time.'</td><td>'.$result[$i]->district.'</td><td>'.$result[$i]->policeStation.'</td><td>'.$result[$i]->complainCategory.'</td></tr>';
            }
	        $html.='</table>';
        }else{
	        $html="Data not found";
        }
        $mpdf=new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $file='report.pdf';
        $mpdf->output($file,'I');
    }

    public function excelreport1(){
        $result=$this->userModel->pdfDateDistrict();
        if($result){
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename=download.xls');
            $isPrintHeader = false;
            if (! empty($result)) {
                foreach ($result as $row) {
                    $obj=(array)$row;
                    if (! $isPrintHeader) {
                        echo implode("\t", array_keys($obj)) . "\n";
                        $isPrintHeader = true;
                    }
                    echo implode("\t", array_values($obj)) . "\n";
                }
            }
            exit();
        }
    }

    public function excelreport2(){
        $result=$this->userModel->pdfDistrictCategory();
        if($result){
	        header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename=download.xls');
            $isPrintHeader = false;
            if (! empty($result)) {
                foreach ($result as $row) {
                    $obj=(array)$row;
                    if (! $isPrintHeader) {
                        echo implode("\t", array_keys($obj)) . "\n";
                        $isPrintHeader = true;
                    }
                    echo implode("\t", array_values($obj)) . "\n";
                }
            }
            exit();
        }
    }

    public function excelreport3(){
        $result=$this->userModel->pdfPoliceStationCategory();
        if($result){
	        header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename=download.xls');
            $isPrintHeader = false;
            if (! empty($result)) {
                foreach ($result as $row) {
                    $obj=(array)$row;
                    if (! $isPrintHeader) {
                        echo implode("\t", array_keys($obj)) . "\n";
                        $isPrintHeader = true;
                    }
                    echo implode("\t", array_values($obj)) . "\n";
                }
            }
            exit();
        }
    }

    public function excelreport4(){
        $result=$this->userModel->pdfDateCategory();
        if($result){
	        header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename=download.xls');
            $isPrintHeader = false;
            if (! empty($result)) {
                foreach ($result as $row) {
                    $obj=(array)$row;
                    if (! $isPrintHeader) {
                        echo implode("\t", array_keys($obj)) . "\n";
                        $isPrintHeader = true;
                    }
                    echo implode("\t", array_values($obj)) . "\n";
                }
            }
            exit();
        }
    }

    public function excelreport5(){
        $result=$this->userModel->pdfRequestkUser();
        if($result){
	        header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename=download.xls');
            $isPrintHeader = false;
            if (! empty($result)) {
                foreach ($result as $row) {
                    $obj=(array)$row;
                    if (! $isPrintHeader) {
                        echo implode("\t", array_keys($obj)) . "\n";
                        $isPrintHeader = true;
                    }
                    echo implode("\t", array_values($obj)) . "\n";
                }
            }
            exit();
        }
    }

    public function excelreport6(){
        $result=$this->userModel->pdfRequestFeedback();
        if($result){
	        header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename=download.xls');
            $isPrintHeader = false;
            if (! empty($result)) {
                foreach ($result as $row) {
                    $obj=(array)$row;
                    if (! $isPrintHeader) {
                        echo implode("\t", array_keys($obj)) . "\n";
                        $isPrintHeader = true;
                    }
                    echo implode("\t", array_values($obj)) . "\n";
                }
            }
            exit();
        }
    }

    public function excelreport7(){
        $result=$this->userModel->pdfAllRequestFeedback();
        if($result){
	        header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename=download.xls');
            $isPrintHeader = false;
            if (! empty($result)) {
                foreach ($result as $row) {
                    $obj=(array)$row;
                    if (! $isPrintHeader) {
                        echo implode("\t", array_keys($obj)) . "\n";
                        $isPrintHeader = true;
                    }
                    echo implode("\t", array_values($obj)) . "\n";
                }
            }
            exit();
        }
    }

    public function excelreport8(){
        $result=$this->userModel->pdfAllRequestFeedbackUser();
        if($result){
	        header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename=download.xls');
            $isPrintHeader = false;
            if (! empty($result)) {
                foreach ($result as $row) {
                    $obj=(array)$row;
                    if (! $isPrintHeader) {
                        echo implode("\t", array_keys($obj)) . "\n";
                        $isPrintHeader = true;
                    }
                    echo implode("\t", array_values($obj)) . "\n";
                }
            }
            exit();
        }
    }
}

?>