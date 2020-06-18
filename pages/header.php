<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        MGrego Site
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="material-dashboard.css?v=2.1.2" rel="stylesheet" />
    <link src="style.css"/>
</head>

<body class="">
<?php 
// $directoryURI = $_SERVER['REQUEST_URI'];
// $path = parse_url($directoryURI, PHP_URL_PATH);
// $components = explode('/', $path);
// $first_part = $components[1];
$first_part=basename($_SERVER['PHP_SELF'], ".php");
?>
    <div class="wrapper ">
        <div class="sidebar" data-color="azure" data-background-color="white">
            <div class="logo"><a href="" class="simple-text logo-normal">
                    MGrego Site 
                </a></div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                <?php
                if(isset($_SESSION['admin']))
                {
                  
                ?>
                    <li class="<?php if($first_part=='index') {echo 'nav-item active'; } else  {echo 'nav-item noactive';}?>">
                        <a class="nav-link" href="Symptom.php">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="<?php //if($first_part=='Patient') {echo 'nav-item active'; } else  {echo 'nav-item noactive';}?>">
                        <a class="nav-link" href="Patient.php">
                            <i class="material-icons">person</i>
                            <p>Patient</p>
                        </a>
                    </li>
                    <li class="<?php if ($first_part=='Symptom') {echo 'nav-item active'; } else  {echo 'nav-item noactive';}?>">
                        <a class="nav-link" href="Symptom.php">
                            <i class="material-icons">person</i>
                            <p>Symptom Assessment</p>
                        </a>
                    </li>
                    <li class="<?php if ($first_part=='Result') {echo 'nav-item active'; } else  {echo 'nav-item noactive';}?>">
                        <a class="nav-link" href="Result.php">
                            <i class="material-icons">person</i>
                            <p>Assessment Results</p>
                        </a>
                    </li>
                <?php 
                }
                else if(isset($_SESSION['Patient']))
                {
                ?>
                    <li class="<?php if($first_part=='Profile') {echo 'nav-item active'; } else  {echo 'nav-item noactive';}?>">
                        <a class="nav-link" href=<?php echo "Profile.php?id=".$_SESSION['Patient'];?>>
                            <i class="material-icons">person</i>
                            <p>Profile</p>
                        </a>
                    </li>
                    <li class="<?php if(($first_part=='Symptom')||($first_part=='FemaleSymptom')) {echo 'nav-item active'; } else  {echo 'nav-item noactive';}?>">
                    <?php
                        if($_SESSION['gender']=='Female')
                        {
                            ?>
                            <a class="nav-link" href=<?php echo "FemaleSymptom.php?id=".$_SESSION['Patient'];?>>
                       <?php 
                       }else {
?>
                     
                        <a class="nav-link" href=<?php echo "MaleSymptom.php?id=".$_SESSION['Patient'];?>>
  <?php                  }
                    ?>
                            <i class="material-icons">person</i>
                            <p>Symptom Assessment</p>
                        </a>
                    </li>
                    <li class="<?php if($first_part=='Result') {echo 'nav-item active'; } else  {echo 'nav-item noactive';}?>">
                        <a class="nav-link" href=<?php echo "Result.php?id=".$_SESSION['Patient'];?>>
                            <i class="material-icons">person</i>
                            <p>Assessment Results</p>
                        </a>
                    </li>
                <?php 
                }
                ?>
                </ul>
            </div>
        </div>
            <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">MGrego</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <?php if(isset($_SESSION['Patient']))
                  {?>
                  <a class="dropdown-item" href=<?php  echo "profile.php?id=".$_SESSION['Patient'];?>>Profile</a>
                  <?php } if(isset($_SESSION['admin'])){?>
                  <a class="dropdown-item" href=<?php  echo "AdminProfile.php?id=".$_SESSION['admin_id'];?>>Profile</a>
                  <?php
                  } 
                  ?>
                  <a class="dropdown-item" href="logout.php">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      
 
            
