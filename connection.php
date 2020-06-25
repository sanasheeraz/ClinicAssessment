<?php
$conn = mysqli_connect('localhost','root','','clinic');
if(!$conn)
{
    echo "Error ! ".mysqli_error($conn);
    die();
}
?>
