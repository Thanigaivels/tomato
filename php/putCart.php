<?php
    $success_message = "";
    $error_message = "";
    if(isset($_POST['addToCart'])){
        $sno = $_SESSION['sno'];
        $rno = $rdno;
        $dno = $_POST['dno'];
        $dishname = $_POST['dishname'];
        $price = $_POST['price'];

        $isValid = true;
        
        if($isValid){

            $stmt = $con->prepare("SELECT * FROM cart WHERE dno = ? AND sno = ? ");
            $stmt->bind_param("ss", $dno, $sno);
            $stmt->execute();
            $result = $stmt->get_result();
            $quan = $result->fetch_array();
            if($quan['quantity'] == 1){
                $isValid = false;
                $stmt = $con->prepare("UPDATE `cart` SET `quantity` = '2' WHERE `cart`.`quantity` = 1;");
                $stmt->execute();
                $success_message = "Dish's quanity updated :)";
            }
            if($quan['quantity'] > 1){
                $isValid = false;
                $error_message = "Maximum Allowed Quantity for a Dish is two :/";
            }
        }

        if($isValid){
            $insertSQL = "INSERT INTO cart(sno,rno,dno,dishname,price) values(?,?,?,?,?)";
            $stmt = $con->prepare($insertSQL);
            $stmt->bind_param("iiisi",$sno,$rno,$dno,$dishname,$price);
            $error = $stmt->execute();
            if (!$error) {
                die('Could not insert data: ' . $con->error); 
            }
            $stmt->close();
            $success_message = "Dish added successfully.";
        
        }

    }  

?>