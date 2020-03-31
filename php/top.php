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
        <div class="pointer" id="close-btn" onclick="closeNav()" onfocusout="closeNav()"><i class="material-icons">close</i></div><br>
</br>
        <a href="home.php">Home</a>
        <a href="home.php#Hotels">Restaurants</a>
        <a href="cart.php">Cart</a>
        <a href="about.php">About Us</a>
</span>
<div id="imageSlider" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="./img/ban1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="./img/ban2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="./img/ban3.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <a class="carousel-control-prev" href="#imageSlider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#imageSlider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
