<!DOCTYPE html>
<?php 
include "php/config.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="img/icon.png" type = "image/x-icon">
    <title>Create your Account | Tomato food Delivery</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/index.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<?php 
    $error_message = "";
    $success_message = "";
	
	if(isset($_POST['btn_signup'])){
		$uname = trim($_POST['uname']);
		$phone = trim($_POST['phone']);
		$password = trim($_POST['password']);
		$confirmpassword = trim($_POST['confirmPassword']);

		$isValid = true;
        if(!is_numeric($phone)){
            $isValid = false;
            $error_message = "Phone Number cannot be text.";
        }
		if($uname == ''|| $phone == '' || $password == '' || $confirmpassword == ''){
			$isValid = false;
			$error_message = "Please fill all fields.";
		}

		if($isValid && ($password != $confirmpassword) ){
			$isValid = false;
			$error_message = "Password Mismatch. Please enter correctly.";
		}

		if($isValid){

			$stmt = $con->prepare("SELECT * FROM logins WHERE phone = ?");
			$stmt->bind_param("s", $phone);
			$stmt->execute();
			$result = $stmt->get_result();
			$stmt->close();
			if($result->num_rows > 0){
				$isValid = false;
				$error_message = "Phone Number is already exist. <strong><a href='index.php'>Sign in</a></strong>";
			}
			
		}

		if($isValid){
			$insertSQL = "INSERT INTO logins(uname,phone,password) values(?,?,?)";
			$stmt = $con->prepare($insertSQL);
			$stmt->bind_param("sss",$uname,$phone,$password);
			$stmt->execute();
			$stmt->close();

			$success_message = "Account created successfully.<a href='index.php'>Sign in</a>";
		}
	}
	?>
<body>
    <div id="top-bar">
        <button id="menu" class="btn2" onclick="openNav()">&nbsp;<i class="material-icons">menu</i>&nbsp;</button>
        <span id="heading">Tomato</span>
    </div>
    <span id="nav-bar">
            <div class="pointer" id="close-btn" onclick="closeNav()"><i class="material-icons">close</i></div><br>
</br>
            <a href="home.php">Home</a>
            <a href="home.php#Hotels">Restaurants</a>
            <a href="cart.php">Cart</a>
            <a href="#">About Us</a>
    </span>
    <div style="margin-top: 100px;">
    <?php include("php/alertMessages.php");?>
    </div>
    </br>
    <div id="signup"style="margin-bottom: 27px;">
        <form method='post' action=''>
        <span id="signup-head">Create Your Account</span><br/>
        <input placeholder="User's Name" class="txt" name="uname" > <br/>
        <input placeholder="Phone Number" class="txt" name="phone" type="text" ><br/>
        <input placeholder="Type a Password" class="txt" name="password" type="password" >
        <input placeholder="ReType a Password" class="txt" name="confirmPassword" type="password" >
        <br/><br/>
        <span>Have an Account?<a href="index.php"> Sign in</a></span><br/>
        <span>
            <input type="checkbox" required> I agree to  <a href="#">Terms and Policies</a> <br/>
        </span>
        <input type="submit" value="Sign Up" class="btn2" id="signup-btn" name="btn_signup">
        </form>
        <br/>
    </div>
<footer>
    <p>Copyright &copy; 2019 Tomato Inc.,</p>
</footer>
</body>
</html>