<?php 
$sql = 'SELECT '.'*'.' FROM cart where sno = '.$_SESSION['sno'].';';
$allprodresult = mysqli_query($con,$sql);

if (!$allprodresult) {
    throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
}

?>