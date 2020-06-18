<?php
session_start();
if(!isset($_SESSION['admin']))
{
    header('location:login.php');
}else{
include 'header.php';
include 'connection.php';
$id=$_GET['id'];
$query="Select * from Admin where A_Id = '$id'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_row($result);
?>

<div class="content">
    <div class="container-fluid">
        <table>
            <tr>
                <th>User Name</th>
                <th><?php echo $row[1]?></th>
            </tr>
            <tr>
                <th>Email</th>
                <th><?php echo $row[2]?></th>
            </tr>
            <tr>
                <th>Password</th>
                <th><?php echo $row[3]?></th>
            </tr>
        </table>
    </div>
</div>


<?php
include 'footer.php';
}
?>