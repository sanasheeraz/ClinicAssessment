<?php
session_start();
include 'header.php';
include 'connection.php';
$query="select * from patient";
$result=mysqli_query($conn,$query);
?>
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <div class="row">
                    <div class="col-lg-10">
                    <h4 class="card-title ">Patient</h4>
                    <p class="card-category"> Details of registered patients</p>
                    </div>
                    <div class="col-lg-2">
                      <a href="AddPatient.php"><button class="btn btn-primary pull-right">Add Patient</button></a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                          Email
                        </th>
                        <th>
                          Gender
                        </th>
                        <th>
                          Date of Birth
                        </th>
                        <th>
                          Contact No
                        </th>
                        <th>
                          Address
                        </th>
                      </thead>
                      <tbody>
                        <?php
                        while($row=mysqli_fetch_array($result))
                        {
                          ?>
                          <tr>
                          <td><?php echo $row['P_Id'];?></td>
                          <td><?php echo $row['P_Name'];?></td>
                          <td><?php echo $row['P_Email'];?></td>
                          <td><?php echo $row['P_Gender'];?></td>
                          <td><?php echo $row['P_BirthDate'];?></td>
                          <td><?php echo $row['P_Contact'];?></td>
                          <td><?php echo $row['P_Address'];?></td>
                          </tr>
                          <?php
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
      
<?php
include 'footer.php';
?>
