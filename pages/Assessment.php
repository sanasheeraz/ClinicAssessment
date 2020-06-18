<?php
session_start();
if(!isset($_SESSION['admin']))
{
    header('location:Admin.php');
}else{
include 'header.php';
include 'connection.php';
$id=$_GET['id'];
$query="Select * from m_symptom_assessment where P_Id = '$id'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_row($result);
?>
<div class="content">
    <div class="container-fluid">
    <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <div class="row">
                    <div class="col-lg-10">
                    <h4 class="card-title ">Assessment</h4>
                    <p class="card-category"> Details of Symptom Assessment</p>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class="text-primary">
                        <tr>
                           <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>$row[2]</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
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