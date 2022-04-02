<!--$mysqli->query -->
<?php
//pasa data
session_start();
$mysqli = new mysqli('localhost', 'root', '','simple_crud') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$fname = $mname = $lname = $addone = $addtwo = $birthday = $region = $city = "";


// lagay sa table 
if (isset($_POST['enter'])) {

	$today = date("Y-m-d");

	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$region = $_POST['region'];
	$city =$_POST['city'];

		$new = $mysqli->query("SELECT * from region WHERE ID = '$region'") or  die($mysqli->error);

	if (count(array($new))==1) {
		$row = $new->fetch_array();
		$reg = $row['Region'];

	}




	$birthday = date("Y-m-d", strtotime($_POST['birthday']));
	$getage = date_diff(date_create($_POST['birthday']), date_create($today));
	$age= $getage->format('%y');

	$addone = $_POST['addone'];
	$addtwo = $_POST['addtwo'];
	# code...
	$_SESSION['sucmess'] = "Successsfully Created Your Student Profile!";
	$_SESSION['msgtype'] = "success";




	$mysqli->query("INSERT INTO student_profile (First_Name, Middle_Name, Last_Name, Address_1, Address_2, Birthday, Age, Region, City ) VALUES ('$fname', '$mname', '$lname', '$addone', '$addtwo', '$birthday', $age, '$reg', '$city')") or die ($mysqli->error);

	 header("location: index.php");
}





//delete n
if (isset($_GET['delete'])) {
	# code...
	$id =$_GET['delete'];
	$mysqli->query("DELETE from student_profile WHERE ID = '$id'") or  die($mysqli->error);
	$_SESSION['sucmess'] = "Your account was successsfully DELETED!";
	$_SESSION['msgtype'] = "danger";
	header("location: index.php");
}
//
if (isset($_GET['view'])) {
	$id =$_GET['view'];
	$update = true;
	$new = $mysqli->query("SELECT * from student_profile WHERE ID = '$id'") or  die($mysqli->error);

	if (count(array($new))==1) {
		$row = $new->fetch_array();
		$id = $row['ID'];
		$fname = $row['First_Name'];
		$mname = $row['Middle_Name'];
		$lname = $row['Last_Name'];
		$birthday = $row['Birthday'];
		$addone = $row['Address_1'];
		$addtwo = $row['Address_2'];
		$region = $row['Region'];
		$city = $row['City'];

	}
}

//ppag update
if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$addone = $_POST['addone'];
	$addtwo = $_POST['addtwo'];
	$region = $_POST['region'];
	$city = $_POST['city'];

	$birthday = date("Y-m-d", strtotime($_POST['birthday']));
	$getage = date_diff(date_create($_POST['birthday']), date_create($today));
	$age= $getage->format('%y');
	$checkint = is_numeric($region);
		if ($checkint ==1) {
		# code...
				$new = $mysqli->query("SELECT * from region WHERE ID = '$region'") or  die($mysqli->error);

				if (count(array($new))==1) {
				$row = $new->fetch_array();
				$region = $row['Region'];

	}
		}
	# code...

	$_SESSION['sucmess'] = "Updated your Student Profile!";
	$_SESSION['msgtype'] = "warning"; // message taas




	$mysqli->query("UPDATE student_profile SET First_Name = '$fname', Middle_Name = '$mname', Last_Name ='$lname', Address_1 = '$addone', Address_2 = '$addtwo', birthday= 
		'$birthday', Age = $age, Region = '$region', City = '$city' WHERE ID = '$id'") or die ($mysqli->error);

	 header("location: index.php");
}
?>