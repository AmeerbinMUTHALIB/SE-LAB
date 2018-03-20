<!DOCTYPE html>
<html>
<head>
<meta name="google-signin-client_id" content="546058867792-7tqonu5kbtni0ird2s2bgi65mld9vqt0.apps.googleusercontent.com">
  <script src="https://apis.google.com/js/platform.js" async defer></script>


<script>
    function signOut() {
      var auth2 = gapi.auth2.getAuthInstance();
      auth2.signOut().then(function () {
        console.log('User signed out.');
        window.location="login.php";
      });
    }

    function onLoad() {
      gapi.load('auth2', function() {
        gapi.auth2.init();
      });
    }
  </script>
<script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>

<style>




.navBar {
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #39B7CD;
    display: block;
    align-content: flex-start;
}
.navItemList{
  list-style-type: none;
}

.navItemList li {
    float: left;
}

.navItemList li a {
    display: block;
    color: white;
    text-align: center;
    padding: 0 16px;
    text-decoration: none;
}

/* Change the link color to #111 (black) on hover */
.navItemList li a:hover {

}
.navtitle{
  font-family: arial, sans-serif;
  font-weight: bold;
  color: white;
  text-align: center;
  padding: 0px 200px 14px 6px;
  margin-right: 200px;
  font-size: 20px;
  text-decoration: none;
}
.navtitle a:hover{

}





b{
  font-weight: bold;
}
</style>
</head>

<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$db="track";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
// if ($conn) {
//   echo "Connected-successfully";
// }
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $email_val = $_POST['user_email'];  // Storing Selected Value In Variable

  $qry="SELECT * FROM user WHERE emailid='" . $email_val."'";

  $result = mysqli_query($conn,$qry);

  $row  = mysqli_fetch_assoc($result);

  if(is_array($row)) {
    $_SESSION['user_id'] = $row['flag'];
    $_SESSION['username']=$_POST['user_name'];
      

  }
  else{
    // $qry="INSERT INTO user (flag,emailid) VALUES ('".$_POST['user_name']."','".$_POST['user_name']."','".$email_val."')" ;
    // mysqli_query($conn,$qry);
    // $qry="SELECT * FROM user WHERE emailid='" . $email_val."'";
    // $result = mysqli_query($conn,$qry);
    // $row  = mysqli_fetch_array($result);
    // if(is_array($row)) {
    //   $_SESSION['user_id'] = $row['ID'];
    //   $_SESSION['username']=$_POST['user_name'];
     
    // }
  }
}

if($_SESSION['user_id']=="")
{
  header('Location:http://localhost/SE-LAB/login.php');
}

?>

<body style="padding:0;margin:0;font-family: arial, sans-serif;">


  <div class="navBar">
    <ul class="navItemList">
      <li><div class="navtitle"><a href="index.php"><b>Doc Tracker</b></a></div></li>
      <li style="font-family: arial, sans-serif;float:right;margin-right:5px;"><a href="#" onclick="signOut()"><b>Logout</b></a></li>
    
      <li style="font-family: arial, sans-serif;float:right;margin-right:5px;"><a href="index.php"><b>
      	<?php 
      	if($_SESSION['user_id']=='1')
      	{
      		echo 'Dean';
      	}
      	elseif ($_SESSION['user_id']=='2') {
      		echo 'DR';
      	}
      	else
      	{
      		$temp=$_SESSION['user_id']-2;
      		echo 'GA';
      		echo $temp;
      	}
      	
      	?>
      	
      		
      	</b></a></li>
    </ul>
  </div>

<center>

   
</center>
</body>
</html>