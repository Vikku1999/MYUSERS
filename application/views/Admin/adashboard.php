<?php include('header.php'); ?>

<!-- <?php print_r($articles); ?> -->
<style>
    tr:hover {background-color: coral;}
    th, td {
  border-bottom: 1px solid #ddd;
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

<div class="container" style="margin-top:50px;"">
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
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php if(count($articles)): ?>
        <?php foreach($articles as $art): ?>
            <tr>
             
                <td><?= $art->firstname; ?></td>
                <td><?= $art->lastname; ?></td>
                <td><?=  $art->email; ?> </td>
                <td><?=  anchor("admin/edituser/{$art->id}",'Edit',['class'=>'button1']);  ?></td>
                <td>
                <?=
        form_open('admin/delarticles'),
        form_hidden('id',$art->id),
        form_submit(['name'=>'submit','value'=>'Delete','class'=>'button11']),
        form_close();



        ?>
                </td>
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
