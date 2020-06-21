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
if(isset($_POST['btnUpdate']))
{
  $num=mysqli_num_rows($result);
  $i=1;
  while($i<=$num)
  {
    $id=$_POST['id'.$i];
    $pro=$_POST['pro'.$i];
    $price=$_POST['price'.$i];
    //echo $pro." ".$price;
    $q="Update product set Pro_Price='$price' where Pro_Id='$id'";
    $r=mysqli_query($conn,$q);
    $i++;
  }
  header('location:Product.php');
}
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
                  </div>
                </div>
                <div class="card-body">
                <form method="post">
                    <?php
                    $index=1;
                    while($row=mysqli_fetch_array($result))
                    {
                    ?>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label>Name </label>
                          <input type="text" class="form-control" name="<?php echo 'pro'.$index?>" value="<?php echo $row['Pro_Name'];?>" readonly>
                          <input type="hidden" value="<?php echo $row['Pro_Id'];?>" name="<?php echo 'id'.$index?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Price</label>
                         <input type="number" placeholder="1.0" step="0.01" min="0" class="form-control" value="<?php echo $row['Pro_Price'];?>" name="<?php echo 'price'.$index?>">
                        </div>
                      </div>
                    </div>
                    <?php
                    $index++;
                    }
                    ?>
                    <button type="submit" class="btn btn-primary pull-right" name="btnUpdate">Update Product</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
      
<?php
include 'footer.php';
}
?>
