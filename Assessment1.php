<?php
session_start();
if (!(isset($_SESSION['admin']) or isset($_SESSION['Patient'])) and isset($_GET['id'])) {
  header('location:login.php');
} else {
  include 'header.php';
  include 'connection.php';
  $id = $_GET['id'];
  //$id=$_SESSION['Patient'];
  $query = "Select * from m_symptom_assessment where P_Id = '$id'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_row($result);

$query1 = "Select * from patient where P_Id = '$id'";
  $result1 = mysqli_query($conn, $query1);
  $row1 = mysqli_fetch_row($result1);
  // $q="SELECT * FROM f_general_assessment_1 where MSA_Id='$row[1]'";
  // $r=mysqli_query($conn,$q);
  // $row1=mysqli_fetch_row($r);
  // $count=0;
  // for($i=2;$i<=19;$i++)
  // {
  //     if(isset($row1[$i]))
  //     {
  //         $count+=1;
  //     }
  // }

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
                      <!-- <th>Number of Questions Answered</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php if($row1[3]=="Male"){
                        ?>
                      <td><a href="<?php echo 'MaleSymptomDisplay.php?id=' . $row[0] . '&pid=' . $id; ?>"><?php echo $row[2] ?></a></td>
                      <?php }
                      else if($row1[3]=="Female"){
                        ?>
                      <td><a href="<?php echo 'FemaleSymptomDisplay.php?id=' . $row[0] . '&pid=' . $id; ?>"><?php echo $row[2] ?></a></td>
                      <?php
                      }
                      ?>
                      <!-- <td><?php //echo $count;
                                ?><td> -->
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