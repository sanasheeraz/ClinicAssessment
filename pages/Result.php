<?php
session_start();
if(!isset($_SESSION['admin']))
{
    header('location:admin.php');
}else{
include 'header.php';
include 'connection.php';

$q1="select P_ID from m_symptom_assessment";
$r1=mysqli_query($conn,$q1);
$row1=mysqli_fetch_array($r1);

$query="SELECT * FROM patient AS p JOIN m_symptom_assessment AS s ON (p.P_Id = s.P_Id) group by p.P_Id";
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
                    <h4 class="card-title ">Symptom Assessment Patients</h4>
                    <p class="card-category"> Details of patients</p>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          Select
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
                          <td><a href="<?php echo 'Assessment.php?id='.$row['P_Id'];?>">Select</a></td>
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
}
?>