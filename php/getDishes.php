<?php 
$sql = 'SELECT '.'*'.' FROM restaurent where rno = '.$_GET['rno'].';';
$allprodresult = mysqli_query($con,$sql);
if ($allprodresult->num_rows > 0) {
    while($row = $allprodresult->fetch_assoc()) { 
        $rname = $row['rname'];
        $rdno = $row['rno'];
    }
}
$sql = 'SELECT '.'*'.' FROM dishes where rno = '.$_GET['rno'].';';
$allprodresult = mysqli_query($con,$sql);

if (!$allprodresult) {
    throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
}

?>