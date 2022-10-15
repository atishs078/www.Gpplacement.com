
    <?php
// database connection code
if(isset($_POST['firstname']))
{
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
$con = mysqli_connect('localhost', 'root', '','registration');
$phoneerr="";
$phone="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(empty($_POST['phone']))
  {
    $phoneerr="Phone number is required";
  }
}
  else{
    $phone=test_input($_POST["phone"]);
    if(preg_match( "/^[0-9]{10}*$/", $phone)){
      $phoneerr="Please enter valid phone number";


    }
    

    }
  
  function test_input($data1) {
    $data1=trim($data1);
    $data1=stripslashes($data1);
    $data1=htmlspecialchars($data1);
    return $data1;
  }

// get the post records

$firstname= $_POST['firstname'];
$middelname=$_POST['middelname'];
$lastname=$_POST['lastname'];
$gender=$_POST['gender'];
$qualification=$_POST['qualification'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$email=$_POST['email'];


// database insert SQL code
$sql = "INSERT INTO `registration` (fname,middelname,lastname,gender,Qualification,phone1,Address,email) VALUES ('$firstname','$middelname','$lastname','$gender','$qualification','$phone','$address','$email')";

// insert in database 
$rs = mysqli_query($con, $sql);
if($rs)
{
	echo "Contact Records Inserted";
}
}
else
{
	echo "Are you a genuine visitor?";
	
}
?>