<?php
    $error_message = "";
    $success_message = "";
	
	if(isset($_POST['placeOrder'])){
        $sql="INSERT INTO orders (sno, rno, dno, dishname, price, quantity) SELECT sno, rno, dno, dishname, price, quantity FROM cart WHERE sno = ? ;";
        $stmt = $con->prepare($sql);
		$stmt->bind_param("i", $_SESSION['sno']);
        $stmt->execute();
        $success_message = "Your Order Placed Successfully. Thank You for saving the Restaurents Near You. :)";
        
        $SQL = "DELETE FROM cart WHERE sno = ?;";
        $stmt = $con->prepare($SQL);
        $stmt->bind_param("i",$_SESSION['sno']);
        $stmt->execute();
        $stmt->close();
    }
    
    if(isset($_POST['clear'])){
        $SQL = "DELETE FROM cart WHERE sno = ?;";
        $stmt = $con->prepare($SQL);
        $stmt->bind_param("i",$_SESSION['sno']);
        $stmt->execute();
        $stmt->close();
        echo "<meta http-equiv='refresh' content='0'>";
    }
	?>