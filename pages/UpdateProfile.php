<?php
session_start();
if(!((isset($_SESSION['admin'])OR isset($_SESSION['Patient']))AND isset($_GET['id'])))
{
    header('location:login.php');
}else{
include 'header.php';

$id=$_GET['id'];
include 'connection.php';
if(isset($_POST['btnUpdate']))
{
  $name=$_POST['name'];
  $password=$_POST['password'];
  $email=$_POST['email'];
  $gender;
  if(!isset($_POST['gender']))
  {
    $gender="";
  }else{

    $gender=$_POST['gender'];
  
  }$address=$_POST['address'];
  $contact=$_POST['contact'];
  $dob=$_POST['dob'];

  $query1="Update Patient set P_Name='$name', P_BirthDate='$dob', P_Gender='$gender', P_Email='$email', P_Password='$password', P_Contact='$contact', P_Address='$address' where P_Id='$id'";

  $result1=mysqli_query($conn,$query1);
  if($result1)
  {
    if(isset($_SESSION['admin'])&&$_SESSION['page_from']=='CheckRequiredInfo'){
      $_SESSION['page_from']="";
      if($gender=="Female")
      {
        header('location:FemaleSymptom.php');
      }else if($gender=="Male")
      {
        header('location:MaleSymptom.php');
      }else{
        header('location:CheckRequiredInfo.php?id='.$id);
      }
    }else if(isset($_SESSION['admin']))
    header('location:Patient.php');
    else
    header('location:Profile.php?id='.$id);
  }
  else
  {
    echo "<script>alert('Error ')</script>";
  }
}
$query="Select * from Patient where P_Id='$id'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_row($result);

?>

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Patient </h4>
                  <p class="card-category">Add Patient Info</p>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label>Name </label>
                          <input type="text" class="form-control" name="name" value="<?=$row[1]?>">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Password</label>
                          <input type="password" class="form-control" name="password" value="<?=$row[5]?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Email address</label>
                          <input type="email" class="form-control" name="email" value="<?=$row[4]?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Gender</label>
                          <div class="">
                          <?php if($row[3]=="Male"){?>
                          &nbsp;&nbsp;<input type="radio" name="gender" value="Male" checked> Male &nbsp; &nbsp;&nbsp;
                          <input type="radio" name="gender" value="Female"> Female</div> 
                          <?php } else if($row[3]=="Female"){?>
                            &nbsp;&nbsp;<input type="radio" name="gender" value="Male" > Male &nbsp; &nbsp;&nbsp;
                          <input type="radio" name="gender" value="Female" checked> Female</div> 
                          <?php
                        }else{?>
                          &nbsp;&nbsp;<input type="radio" name="gender" value="Male" > Male &nbsp; &nbsp;&nbsp;
                        <input type="radio" name="gender" value="Female" > Female</div> 
                        <?php
                      }?>
                          <!-- <input type="text" class="form-control"> -->
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label >Date of Birth</label>
                         <input type="date" class="form-control" name="dob" value="<?=$row[2]?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="">Address</label>
                          <input type="text" class="form-control" name="address" value="<?=$row[7]?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Contact</label>
                          <input type="text" class="form-control" name="contact" value="<?=$row[6]?>">
                        </div>
                      </div>
                      
                    </div>
                    <button type="submit" class="btn btn-primary pull-right" name="btnUpdate">Update</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

<?php
include 'footer.php';
}
?>