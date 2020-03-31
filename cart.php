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
  include("php/getCart.php");
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
    <title>Cart | Tomato.com</title>
</head>
<body>
  <div id="top-bar">
      <button id="menu" class="btn2" onclick="openNav()">&nbsp;<i class="material-icons">menu</i>&nbsp;</button>
      <span id="heading">Tomato</span>
      <span id="cart" class="float-right m-4">
          <button class="btn btn-outline-light" style="height: 50px;" onclick="location.href='cart.php'">
          <img width="24" height="24" src="https://img.icons8.com/pastel-glyph/64/ffffff/shopping-cart--v2.png"/>
          
          <span class="badge badge-light">
              <?php
                      include("php/cartCount.php");
                      echo $count;
              ?>
          </span>
          </button>
      </span>
      <span id="profile" class="float-right m-4">
          <div class="dropdown">
          <button class="btn btn-outline-light dropdown-toggle" style="height: 50px;" data-toggle="dropdown">
              <i class="material-icons">account_circle</i>
          <span class="caret"></span></button>
          <ul class="dropdown-menu" style="text-align:center;">
              <li>Welcome <?= $_SESSION['uname']?>!</li>
              <li class="divider"></li>
              </br> 
              <li>
              <form method='post' action="">
                  <input type="submit" class="btn btn-danger" value="Logout" name="but_logout">
              </form>
              </li>
          </ul>
          </div> 
          
      </span>   
  </div>
  <span id="nav-bar">
          <div class="pointer" id="close-btn" onclick="closeNav()"><i class="material-icons">close</i></div><br>
</br>
          <a href="home.php">Home</a>
          <a href="home.php#Hotels">Restaurants</a>
          <a href="cart.php">Cart</a>
          <a href="about.php">About Us</a>
  </span>
  <?php 
    include("php/placeOrder.php");
  ?>
    <?php 
        if(!empty($success_message)){
    ?>
    <div class="alert alert-success" style="top:100px;">
        <strong>Success!</strong> <?= $success_message ?>
        <strong><a href="home.php#Hotels">Go to Restaurents</a></strong>
    </div>
    <?php
        }
    ?>
  <h3 style="margin-left: 25px; margin-top: 150px; margin-bottom:25px">Item(s) in your cart</h3>
  <div class="items" style="height: 60vh;">
    <div class="container mb-4">
      <div class="row">
          <div class="col-12">
              <div class="table-responsive">
                  <table class="table table-striped">
                      <thead>
                      <?php
                        if ($allprodresult->num_rows > 0) {
                          ?>
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">Dish</th>
                              <th scope="col" class="text-center">Quantity</th>
                              <th scope="col" class="text-right">Price</th>
                          </tr>
                          <?php
                        }
                          ?>
                      </thead>
                      <tbody>
                      <?php
                      if ($allprodresult->num_rows > 0) {
                        $i = 1;
                        $total = 0;
                        while($row = $allprodresult->fetch_assoc()) { 

                          echo "<tr>";
                                echo  '<td>'. $i .'</td>';
                                echo  '<td>'.$row['dishname'].'</td>';
                                echo  '<td class="text-center">'.$row['quantity'].'</td>';
                                echo  '<td class="text-right">₹ '.$row['price'].'</td>';
                          echo  '</tr>';
                          $i = $i + 1;
                          $total = $total + $row['price'];
                        }
                      }
                      else {?>
                        <div class="alert alert-danger" style="width: 100%;">
                            <strong>No Items</strong> in your cart.
                            <strong><a href="home.php#Hotels">Go to Restaurents</a></strong>
                        </div>
                    <?php
                      }
                      if ($allprodresult->num_rows > 0) {
                          ?>
                          <tr>
                              <td></td>
                              <td></td>
                              <td>Sub-Total</td>
                              <td class="text-right">₹<?= $total?></td>
                          </tr>
                          <tr>
                              <td></td>
                              <td></td>
                              <td>Shipping</td>
                              <td class="text-right">₹ 25</td>
                          </tr>
                          <tr>
                              <td></td>
                              <td></td>
                              <td><strong>Total</strong></td>
                              <td class="text-right"><strong>₹<?= $total+25 ?></strong></td>
                          </tr>
                      <?php }?>
                      </tbody>
                  </table>
              </div>
          </div>
          <?php
          if ($allprodresult->num_rows > 0) {
            ?>
          <div class="col mb-2">
              <div class="row">
                  <div class="col-sm-12  col-md-6">
                      <button class="btn btn-lg btn-outline-primary" onclick="location.href='home.php#Hotels'">Add More</button></br></br>
                      <form method="post">
                      <button class="btn btn-lg btn-outline-danger" name="clear">Clear All</button>
                      </form>
                  </div>
                  <div class="col-sm-12 col-md-6 text-right">
                    <form method="post" action="">
                      <button class="btn btn-lg btn-success btn-lg" name="placeOrder">Place Order</button>
                    </form>
                  </div>
              </div>
          </div>
          <?php }?>
      </div>
    </div>
  </div>
  <script src="./js/index.js" ></script>
  <!-- <footer>
    <p>Copyright &copy; 2019 Tomato Inc.,</p>
</footer> -->
</body>
</html>