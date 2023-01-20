<?php include('header.php'); ?>
<style>
    form {
  border: 3px solid #f1f1f1;
}
h2{
  color: red;
}
/* Full-width inputs */
input[type=text], input[type=password] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
.button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
}







</style>
<body align='center'>
<h1> User Login </h1>
<?php
if($error=$this->session->flashdata('Login_failed')) :
?>
<?php

echo "<h2>".$error."</h2>";
  
?>
<?php endif; ?>
  <?php echo form_open('login'); ?>

  <div class="container">
    <label for="username"><b>Username</b></label>
    <br> 
   <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Username','name'=>'uname']); ?>
   <?php echo form_error('uname'); ?>
   <br> 
   <label for="psw"><b>Password</b></label>
   <br> 
    <?php echo form_password(['class'=>'form-control','type'=>'password','placeholder'=>'Enter password','name'=>'pass']); ?>
    <?php echo form_error('pass'); ?>
    <br>

   
    <?php echo form_submit(['type'=>'submit','class'=>'button','value'=>'submit']); ?>
    <?php echo form_reset(['type'=>'reset','class'=>'button','value'=>'Reset']); ?>
    <h4>Don't have account </h4>
  <?php  echo anchor('admin/register/', 'Sign up ? ','class="link-class"' )?>
  </div>

</body>



<!-- <?php echo validation_errors(); ?> -->
<?php include('footer.php'); ?>