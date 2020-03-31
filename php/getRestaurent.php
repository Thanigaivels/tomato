<?php 

$sql = 'SELECT '.'*'.' FROM restaurent;';
$allprodresult = mysqli_query($con,$sql);

if (!$allprodresult) {
    throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
}

?>