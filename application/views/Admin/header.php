<html>
<head>
   
    <title>users</title>
  <style>
      /* Style the navigation bar */
.navbar {
  width: 100%;
  background-color: #555;
  overflow: auto;
}

/* Navbar links */
.navbar a {
  float: left;
  text-align: center;
  padding: 12px;
  color: white;
  text-decoration: none;
  font-size: 17px;
}

/* Navbar links on mouse-over */
.navbar a:hover {
  background-color: #000;
}

/* Current/active navbar link */
.active {
  background-color: #04AA6D;
}

/* Add responsiveness - will automatically display the navbar vertically instead of horizontally on screens less than 500 pixels */
@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
  }
}
</style>
</head>
<body>
<!-- Load an icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="navbar">
  <a class="active" href="http://localhost:8080/userM/"><i class="fa fa-fw fa-home"></i> User Management </a>
 
  <!-- <a href="#"><i class="fa fa-fw fa-user"></i> logout</a> -->

  <?php
  if($this->session->userdata('id')){
  ?>
  <li><a href="<?= base_url('admin/logout'); ?>" class="fa fa-fw fa-user" style="" > Logout </a></li>

  <?php
  }
  ?>
    </div>