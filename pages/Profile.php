<?php
session_start();
if(!isset($_SESSION['Patient']))
{
    header('location:login.php');
}else{
include 'header.php';
include 'connection.php';
$id=$_GET['id'];
$query="Select * from Patient where P_Id = '$id'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_row($result);
?>

<div class="content">
    <div class="container-fluid">
        <div class="table-responsive" style="text-align: center;">
        <table class="table" >
            <tr>
                <th>Name</th>
                <th><?php echo $row[1]?></th>
            </tr>
            <tr>
                <th>Gender</th>
                <th><?php echo $row[3]?></th>
            </tr>
            <tr>
                <th>Date Of Birth</th>
                <th><?php echo $row[2]?></th>
            </tr>
            <tr>
                <th>Address</th>
                <th><?php echo $row[4]?></th>
            </tr>
            <tr>
                <th>Contact No</th>
                <th><?php echo $row[5]?></th>
            </tr>
            
        </table>
        <div style="text-align:center"><a class="btn btn-primary" href="<?php echo 'UpdateProfile.php?id='.$id?>">Edit Profile</a></div>           
            
        </div>
    </div>
</div>


<?php
include 'footer.php';
}
?>