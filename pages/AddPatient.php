<?php
session_start();
if(!isset($_SESSION['admin']))
{
    header('location:login.php');
}else{
include 'header.php';

include 'connection.php';
if(isset($_POST['btnAdd']))
{
  $name=$_POST['name'];
  $password=$_POST['password'];
  $email=$_POST['email'];
  $gender=$_POST['gender'];
  $address=$_POST['address'];
  $contact=$_POST['contact'];
  $dob=$_POST['dob'];

  $query="INSERT INTO patient(P_Name, P_BirthDate, P_Gender, P_Email, P_Password, P_Contact, P_Address) VALUES ('$name','$dob','$gender','$email','$password','$contact','$address')";

  $result=mysqli_query($conn,$query);
  if($result)
  {
    header('location:Patient.php');
  }
  else
  {
    echo "<script>alert('Error ')</script>";
  }
}

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
                          <input type="text" class="form-control" name="name">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Password</label>
                          <input type="password" class="form-control" name="password">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Email address</label>
                          <input type="email" class="form-control" name="email">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Gender</label>
                          <div class="">
                          &nbsp;&nbsp;<input type="radio" name="gender" value="Male"> Male &nbsp;   &nbsp;&nbsp;
                          <input type="radio" name="gender" value="Female"> Female</div> 
                          <!-- <input type="text" class="form-control"> -->
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label >Date of Birth</label>
                         <input type="date" class="form-control" name="dob">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="">Address</label>
                          <input type="text" class="form-control" name="address">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Contact</label>
                          <input type="text" class="form-control" name="contact">
                        </div>
                      </div>
                      
                    </div>
                    <button type="submit" class="btn btn-primary pull-right" name="btnAdd">Add Patient</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <!-- <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="javascript:;">
                    <img class="img" src="../assets/img/faces/marc.jpg" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                  <h4 class="card-title">Alec Thompson</h4>
                  <p class="card-description">
                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                  </p>
                  <a href="javascript:;" class="btn btn-primary btn-round">Follow</a>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>

<?php
include 'footer.php';
}
?>