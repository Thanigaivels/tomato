<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="img/icon.png" type = "image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <title>Order Food Online | Tomato</title>
</head>
<body>
    <header class="w-100">
        <div id="divLeft" class="float-left h-100 w-50">
            <span class="heading pt-4 pl-4 text-white">Tomato</span>
        </div>
        <div id="divRight" class="float-right h-100 w-50">
            <div id="log-ph" class="text-right">
                <div id="dynamic-content" style="font-weight: 700">Hungry?&nbsp;</div>
                <span style="font-size: 15pt">Order food Online</span>&nbsp;
            </div>
            <div id="login" class="m-auto text-center">
                <div id="log-photo"></div>
                <form id="log-data" method="post" action="">
                    <input class="txt" placeholder="Enter your Phone Number" name="phone" required>
                    <input class="txt" placeholder="Enter your Password" type="password" name="password" required><br/><br/>
                    <span id="signup" class="border-0">No Account? <a href="signup.php">Create One</a></span><br/>
                    <label id="wrongpass" style="color:red;"></label></br>
                    <input type="submit" id="login-bt" value="Login" class="btn-primary" name="btn_submit">
                </form>
            </div>
        </div>
    </header>
        <div id="main">
            <div id="div2left" class="float-left w-50">
                <div id="about">About Tomato Inc.,</div>
            </div>
            <div id="div2Right" class="float-right w-50 text-center">
                <div>
                    <p id="about-content">&nbsp; Tomato is the nation's leading online food ordering
                        and delivery marketplace dedicated to connecting hungry diners with local takeout restaurants.
                        The company’s online ordering platforms allow diners to order from more than
                        125,000 takeout restaurants in over 2,400 Indian cities and Around the world.</p>
                </div>
            </div>
        </div>    
    <div id="browse">
        <div class="w-50 bg-dark text-light float-left">
            <h1>Browse By Cuisines</h1>
            <ul>
                <li>North Indian</li>
                <li>South Indian</li>
                <li>Chinese</li>
                <li>Italian</li>
                <li>French</li>
                <li>Mexican</li>
                <li>Western</li>
            </ul>
        </div>
        
        <div class="w-50 bg-dark text-light float-right">
            <h1>Top Cities</h1>
            <ul>
                <li>Chennai</li>
                <li>Delhi</li>
                <li>Kolkata</li>
                <li>Pune</li>
                <li>Mumbai</li>
                <li>Kanchipuram</li>
                <li>Madurai</li>
            </ul>
        </div>
    </div>
    <div class="text-center">Copyright &copy; 2019 Tomato Inc.,</div>   
<script src="js/index.js"></script>
<?php
    include "php/config.php";

    if(isset($_POST['btn_submit'])){
        $phone = mysqli_real_escape_string($con,$_POST['phone']);
        $password = mysqli_real_escape_string($con,$_POST['password']);
        if ($phone != "" && $password != ""){
            $sql_query = "select count(*) as cntUser from logins where phone='".$phone."' and password='".$password."'";
            $result = mysqli_query($con,$sql_query);
            $row = mysqli_fetch_array($result);
            $count = $row['cntUser'];
            //To get user name
            $sql_query = "select uname,sno from logins where phone='".$phone."' and password='".$password."'";
            $result = mysqli_query($con,$sql_query);
            $row = mysqli_fetch_array($result);

            if($count > 0){
                $_SESSION['sno'] = $row['sno'];
                $_SESSION['uname'] = $row['uname'];
                header('Location: home.php');
            }else{
                echo '<script type="text/javascript">document.getElementById("wrongpass").innerHTML = "por favor vuelve a intentarlo"</script>';
            }
        }
    }
?>
</body>
</html>