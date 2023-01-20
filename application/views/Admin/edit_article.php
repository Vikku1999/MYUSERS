<?php include('header.php'); ?>
<style>
    * {box-sizing: border-box}

/* Add padding to containers */
.container {
  padding: 16px;
  
}
h4{
  color: #04AA6D;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 50%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit/register button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity:1;
}



    </style>
<body align='center'>



  <?php echo form_open("admin/updatearticle/{$user->id}"); ?>
  <!-- //{$article->id} -->
  <!-- <?php echo form_hidden('user_id',$user->id); ?> -->
 

 <!-- < div class="container" style="margin-top:20px;" align="center"> -->
<h1>Edit Form</h1>
<?php
if($msg=$this->session->flashdata('msg')) :
    
?>
<div class="msg_class">
<?php

echo "<h4>".$msg."</h4>";
  
?>
</div>
<?php endif; ?>

 <!-- <?php echo form_open('admin/sendemail'); ?> -->



 
    <label for="Username"><b>Username</b></label><br>
   <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Username','name'=>'username','value'=>set_value('username',$user->username)]);  ?>

   <?php  echo form_error('username');  ?>
 
   <br>

    

    <label for="First name"><b>First Name</b></label><br>
   <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter First Name','name'=>'firstname','value'=>set_value('firstname',$user->firstname)]);  ?>
 
   <?php  echo form_error('firstname');  ?>
   <br>

    <label for="last name"><b>Last Name</b></label><br>
   <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Last Name','name'=>'  lastname','value'=>set_value('lastname',$user->lastname)]);  ?>

   <?php  echo form_error('lastname');  ?>
   <br>

    <label for="email"><b>Email</b></label><br>
   <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Email','name'=>'email','value'=>set_value('email',$user->email)]);  ?>
  
   <?php  echo form_error('email');  ?><br>
 
  <?php  echo form_submit(['type'=>'submit','class'=>'registerbtn','value'=>'Submit']);  ?>
 <?php  echo form_reset(['type'=>'reset','class'=>'registerbtn','value'=>'Reset']);  ?>
 
</div>

<?php include('footer.php'); ?>