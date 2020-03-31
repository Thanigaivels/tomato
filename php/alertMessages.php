<?php 
    if(!empty($error_message)){
?>
<div class="alert alert-danger">
    <strong>Error!</strong> <?= $error_message ?>
</div>
<?php
    }
?>
<?php 
    if(!empty($success_message)){
?>
<div class="alert alert-success">
    <strong>Success!</strong> <?= $success_message ?>
</div>
<?php
    }
?>