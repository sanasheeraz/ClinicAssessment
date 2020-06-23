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

if(isset($_POST['btnUpdate']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $q="Update admin set A_UserName='$name', A_Email='$email',A_Password='$password' where A_Id='$id'";
    $r=mysqli_query($conn,$q);
    header('location:Admin.php?id='.$id);
}
?>

<div class="content">
    <div class="container-fluid">
        <form style="text-align: center;" method="POST">
        <table class="table ">
            <tr>
                <th><label>User Name</label></th>
                <th><input type="text" value="<?php echo $row[1]?>" name="name" class="form-control" required/></th>
            </tr>
            <tr>
                <th><label>Email</label></th>
                <th><input type="email" value="<?php echo $row[2]?>" name="email" class="form-control" required/></th>
            </tr>
            <tr>
                <th><label>Password</label></th>
                <th><input type="password" value="<?php echo $row[3]?>" name="password" class="form-control" required/></th>
            </tr>
            <tr><td></td><td><button type="submit" class="btn btn-primary" name="btnUpdate">Update</td></button></tr>
        </table>
        </form>
    </div>
</div>


<?php
include 'footer.php';
}
?>