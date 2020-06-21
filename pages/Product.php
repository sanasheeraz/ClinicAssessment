<?php
session_start();
include 'header.php';
if(!isset($_SESSION['admin']))
{
    header('location:Admin.php');
}else{
include 'connection.php';
$query="select * from product";
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
                    <h4 class="card-title ">Product</h4>
                    <p class="card-category"> Details of Product</p>
                    </div>
                    <div class="col-lg-2">
                      <a href="UpdateProduct.php"><button class="btn btn-primary pull-right">Update Product</button></a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          Product ID
                        </th>
                        <th>
                          Product Name
                        </th>
                        <th>
                          Product Price
                        </th>
                      </thead>
                      <tbody>
                        <?php
                        while($row=mysqli_fetch_array($result))
                        {
                          ?>
                          <tr>
                          <td><?php echo $row['Pro_Id'];?></td>
                          <td><?php echo $row['Pro_Name'];?></td>
                          <td><?php echo "$".number_format((float)$row['Pro_Price'], 2, '.', '');?></td>
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
