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
  <a class="active" href="#"><i class="fa fa-fw fa-home"></i> User Management </a>
  <a href="login">User login</a>
  <a href="login/admin">Admin login</a>
 
  <!-- <a href="#"><i class="fa fa-fw fa-user"></i> logout</a> -->

  <?php
  if($this->session->userdata('id')){
  ?>
  <li><a href="<?= base_url('admin/logout'); ?>" class="fa fa-fw fa-user" style="" > Logout </a></li>
  
  <?php
  }
  ?>
    </div>

<!-- <?php print_r($articles); ?> -->
<style>
    tr:hover {background-color: coral;}
    th, td {
  border-bottom: 1px solid #ddd;
  padding: 14px 20px;
  margin: 8px 0;
}
th {
  background-color: #04AA6D;
  color: white;
}
table {
  width: 70%;
  border: 1px solid;
}
h4{
    color:orangered;
}
.button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
}
.button1 {
  background-color: palegreen;
  color: black;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
}
.button11 {
  background-color: red;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
}

    </style>

<div class="bg" style="margin-top:50px;">
<div class="row">
<!-- <?=   anchor('admin/adduser','Add User',['class'=>'button'])  ?> -->
</div>
<?php
if($msg=$this->session->flashdata('msg')) :
    
?>
<div class="msg_class">
<?php

echo "<h4>".$msg."</h4>";
  
?>
</div>
<?php endif; ?>
</div> 
<div class="table" align="center" style="margin:20px;">

<table>
    <thead>
        <tr>
           
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Image</th>
            <!-- <th>Edit</th>
            <th>Delete</th> -->
        </tr>
    </thead>
    <tbody>
        <?php if(count($users)): ?>
        <?php foreach($users as $art): ?>
            <tr>
            
                <td><?= $art->firstname; ?></td>
                <td><?= $art->lastname; ?></td>
                <td><?=  $art->email; ?> </td>
                <?php if(!is_null($art->image_path)) { ?> 
          <td><img src="<?php echo $art->image_path ?>"  width="150" height="80"></td>
           <?php } ?>
               
               
            </tr>
        <?php endforeach;  ?>
        <?php else: ?>
            <tr>
                <td colspan="3"> NO DATA AVAILABLE</td>
            </tr>
        <?php endif;  ?>
    </tbody>
</table>

</div>

<?php include('footer.php'); ?>
