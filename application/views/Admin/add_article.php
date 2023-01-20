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
<h1> Add User </h1>


<?php echo form_open('admin/userValidation'); ?>
  <?php echo form_hidden('user_id',$this->session->userdata('id')); ?>

  



 
<label for="Username"><b>Username</b></label><br>
<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Username','name'=>'username','value'=>set_value('username')]);  ?>

<?php  echo form_error('username');  ?>

<br>

<label for="pwd"><b>Password</b></label><br>

<?php  echo form_password(['class'=>'form-control','type'=>'password','placeholder'=>'Enter Password','name'=>'password','value'=>set_value('password')]); ?>


<?php  echo form_error('password');  ?>
<br>

<label for="First name"><b>First Name</b></label><br>
<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter First Name','name'=>'firstname','value'=>set_value('firstname')]);  ?>

<?php  echo form_error('firstname');  ?>
<br>

<label for="last name"><b>Last Name</b></label><br>
<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Last Name','name'=>'lastname','value'=>set_value('lastname')]);  ?>

<?php  echo form_error('lastname');  ?>
<br>

<label for="Username"><b>Email</b></label><br>
<?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Email','name'=>'email','value'=>set_value('email')]);  ?>

<?php  echo form_error('email');  ?><br>

<?php  echo form_submit(['type'=>'submit','class'=>'registerbtn','value'=>'Submit']);  ?>
<?php  echo form_reset(['type'=>'reset','class'=>'registerbtn','value'=>'Reset']);  ?>

</div>
    
  </div>

</body>



<!-- <?php echo validation_errors(); ?> -->
<?php include('footer.php'); ?>