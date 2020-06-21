<?php
session_start();
if(!((isset($_SESSION['admin'])OR isset($_SESSION['Patient']))AND isset($_GET['id'])))
{
    header('location:login.php');
}
else{
    $id=$_GET['id'];
    include 'connection.php';
    $query="select * from patient where P_Id='$id'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_row($result);
    if($row[2]!="0000-00-00"&& $row[3]!=NULL)
    {
        if($row[3]=="Male")
        {
        header('location:MaleSymptom.php?id='.$id);
        }
        else if($row[3]=="Female")
        {
        header('location:FemaleSymptom.php?id='.$id);
        }
    }else{
include 'header.php';
?>
<div class="content">
    <div class="container-fluid">
        <div style="text-align:center;">
            <h2>Please Update Patient's Information <br> Both Gender and birthdate are necessary for valid assessment results.</h2>
           
            <table class="table">
            <tr>
                <th>Name</th>
                <td><?php echo $row[1]?></td>
            </tr>
            <tr>
                <th>Gender</th>
                <td><?php echo $row[3]?></td>
            </tr>
            <tr>
                <th>Date Of Birth</th>
                <td><?php echo $row[2]?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?php echo $row[4]?></td>
            </tr>
            <tr>
                <th>Contact No</th>
                <td><?php echo $row[5]?></td>
            </tr>
            
        </table>
        <?php 
        $_SESSION['page_from']=$first_part;
        ?>
        <div style="text-align:center"><a class="btn btn-primary" href="<?php echo 'UpdateProfile.php?id='.$id?>">Edit Profile</a></div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
}
}
?>