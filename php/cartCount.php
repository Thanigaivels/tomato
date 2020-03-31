<?php 
    $stmt = $con->prepare("SELECT * FROM cart WHERE sno = ?");
    $stmt->bind_param("i", $_SESSION['sno']);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    if ($result->num_rows == 0){
        $count = 0;
    }
    else {
        $count = $result->num_rows;
    }
?>