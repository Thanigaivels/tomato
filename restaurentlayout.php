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
  include('php/getDishes.php');
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
    <script src="./js/index.js" ></script>
    <title><?= $rname ?> | Tomato.com</title>
</head>
<body>
    <?php 
        include("php/top.php");
        include("php/putCart.php");  
        include("php/alertMessages.php");
    ?>
    <h3 style="margin-left: 25px;">Dishes in <?= $rname ?></h3>
    <div id="Hotels" class="row">
    <?php
        if ($allprodresult->num_rows > 0) {
            while($row = $allprodresult->fetch_assoc()) { 
                echo '<div class="card restaurent" style="width: 18rem;">';
                    echo ' <img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode($row['img'] ).'" height="180px" width="100%" alt="Dish\'s image missing :/">';
                    echo '<div class="card-body">';          
                        echo '<h5 class="card-title">'.$row['dishname'].'<img class="float-right" id="foodType" src="img/dish/'.$row['type'].'.png"></h5>';
                        echo '<p class="card-text font-weight-bold h3">₹'.$row['price'].'</p>';
                        echo '<form method="post" action="">';
                        echo '<input type="hidden" name="dno" value='.$row['dno'].'><input type="hidden" name="dishname" value="'.$row['dishname'].'"><input type="hidden" name="price" value='.$row['price'].'>';
                        echo '<input class="btn btn-primary" type="submit" name="addToCart" value="Add to cart"></form>';
                    echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<div class="alert alert-warning text-center w-100" role="alert">No Food &#X1F641; Try Different Restaurent.....<a href="home.php" class="alert-link">Go to Restaurents</a></div>';
        }
               
		?>
    
    </div>
    <footer>
        <p>Copyright &copy; 2019 Tomato Inc.,</p>
    </footer>
</body>
</html>