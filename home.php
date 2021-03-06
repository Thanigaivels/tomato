<!DOCTYPE html>
<html lang="en">
<?php 
  include "php/config.php";
  if(!isset($_SESSION['uname'])){
      header('Location: index.php');
  }

  if(isset($_POST['but_logout'])){
      session_destroy();
      header('Location: index.php');
  }

?>
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="img/icon.png" type = "image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Restaurents | Tomato.com</title>
</head>
<body>
    <?php include("php/top.php");?>
    <h3 style="margin-left: 25px;">Restaurants in your Area</h3>
    <div id="Hotels" class="row">
    <?php
      include('php/getRestaurent.php');

			if ($allprodresult->num_rows > 0) {
				while($row = $allprodresult->fetch_assoc()) { 
				echo '<div class="card restaurent" style="width: 18rem;">';
            echo ' <img class="card-img-top" src="img/restaurent/'.$row["type"].'.jpg" height="180px" width="100%" alt="Card image cap">';
            echo '<div class="card-body">';          
              echo '<h5 class="card-title"><a href="restaurentlayout.php?rno='.$row['rno'].'">'.$row['rname'].'</a></h5>';
              echo '<p class="card-text">'.$row['city'].'</p>';
              echo '<a class="btn btn-primary" href="restaurentlayout.php?rno='.$row['rno'].'" >Order Now</a></form>';
            echo '</div>';
					echo '</div>';
				}
			} else {
				echo '<div class="alert alert-warning" role="alert">Hmm...... Looks like you are in unserviceable area</div>';
			}
		?>
    </div>
    <footer>
        <p>Copyright &copy; 2019 Tomato Inc.,</p>
    </footer>
    <script src="./js/index.js" ></script>
</body>
</html>