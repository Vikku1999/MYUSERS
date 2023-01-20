<style>
	.v-error{
		color: red;
	}
	</style>
<div class="container">
	<h3>Users List</h3>
	<div class="alert alert-success" style="display: none;">
		
	</div>
	<button id="btnAdd" class="btn btn-success">Add New</button>
	<table class="table table-bordered table-responsive" style="margin-top: 20px;">
		<thead>
			<tr style="background-color:darkcyan ;">
				<td><b>ID</b></td>
				<td><b>First Name</b></td>
				<td><b>Last Name</b></td>
				<td><b>Email</b></td>
				<td><b>Image</b></td>
                <td><b>Action</b></td>
			</tr>
		</thead>
		<tbody id="showdata">
			
		</tbody>
	</table>
</div>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        	<form id="myForm" action="" method="post" class="form-horizontal" enctype="multipart/form-data">
        		<input type="hidden" name="txtId" value="0">
				
				<div class="form-group">
        			<label for="name" class="label-control col-md-4">User Name</label>
        			<div class="col-md-8">
        				<input type="text" id="txtuname" name="txtuname" class="form-control">
						<span id='txtuname-error' class='v-error'> </span>
        			</div>
        		</div>
				<div class="form-group">
        			<label for="name" class="label-control col-md-4">Password</label>
        			<div class="col-md-8">
        				<input type="text" id="pass" name="pass" class="form-control">
						<span id='txtpass-error' class='v-error'> </span>
        			</div>
        		</div>
        		<div class="form-group">
        			<label for="address" class="label-control col-md-4">first Name</label>
        			<div class="col-md-8">
        				<input type="text" class="form-control" id="txtfname" name="txtfname">
						<span id='txtfname-error' class='v-error'> </span>
        			</div>
        		</div>
        		<div class="form-group">
        			<label for="address" class="label-control col-md-4">last Name</label>
        			<div class="col-md-8">
        				<input type="text" class="form-control" id="txtlname" name="txtlname">
						<span id='txtlname-error' class='v-error'> </span>
        			</div>
        		</div>
				<div class="form-group">
        			<label for="address" class="label-control col-md-4">email</label>
        			<div class="col-md-8">
        				<input type="text" class="form-control" id="txtemail" name="txtemail">
						<span id='txtemail-error' class='v-error'> </span>
        			</div>
        		</div>
        		
        		
					
					<div class="form-group">
        			<label for="name" class="label-control col-md-4"> Image</label>
        			<div class="col-md-8">
        				<input type="file" id="file" name="file" class="form-control">
        			</div>
        		</div>
        		</div>
        	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnSave" class="btn btn-primary">Save </button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirm Delete</h4>
      </div>
      <div class="modal-body">
        	Do you want to delete this record?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
	$(function(){
		showAllEmployee();

		//Add New
		$('#btnAdd').click(function(){
			$('#myModal').modal('show');
			$('#myModal').find('.modal-title').text('Add New User');
			$('#myForm').attr('action', '<?php echo base_url() ?>Myuser/addEmployee');
		});


		$('#btnSave').click(function(){
			var url = $('#myForm').attr('action');
			
			var data = $('#myForm').serialize();
			// alert(data);
			//validate form
			
			var uname = document.getElementById("txtuname").value; console.log(uname);
			var pass = document.getElementById("pass").value; console.log(pass);
			var firstname = document.getElementById("txtfname").value; console.log(firstname);
			var lastname = document.getElementById("txtlname").value; console.log(lastname);
			var email = document.getElementById("txtemail").value; console.log(email);

			
			if(uname==''&& pass=='' && firstname=='' && lastname==''&& email==''){
				$('#txtuname-error').html('username is required');
				$('#txtpass-error').html('password is required');
				$('#txtfname-error').html('firstname is required');
				$('#txtlname-error').html('lastname is required');
				$('#txtemail-error').html('email is required');
				return;
			}


		//img

			

var filesSelected = document.getElementById("file").files; console.log(filesSelected);
if (filesSelected.length > 0) {
  var fileToLoad = filesSelected[0];
  var fileReader = new FileReader();

  fileReader.onload = function(fileLoadedEvent) {
	var srcData = fileLoadedEvent.target.result; // <--- data: base64

	var newImage = document.createElement('img');
	newImage.src = srcData;
	console.log(srcData);
	

	document.getElementById("myImg").innerHTML = newImage.outerHTML;
	// alert("Converted Base64 version is " + document.getElementById("myImg").innerHTML);
	console.log("Converted Base64 version is " + document.getElementById("myImg").innerHTML);
  }
  fileReader.readAsDataURL(fileToLoad);
}


	
				$.ajax({
					type: 'ajax',
					method: 'post',
					url: url,
					data: data,
					async: false,
					dataType: 'json',
					success: function(response){
						if(response.success){
							$('#myModal').modal('hide');
							$('#myForm')[0].reset();
							if(response.type=='add'){
								var type = 'added'
							}else if(response.type=='update'){
								var type ="updated"
							}
							$('.alert-success').html('User '+type+' successfully').fadeIn().delay(4000).fadeOut('slow');
							showAllEmployee();
						}else{
							alert('Error');
						}
					},
					error: function(){
						alert('Could not add data');
					}
				});
			}
		);

		//edit
		$('#showdata').on('click', '.item-edit', function(){
			var id = $(this).attr('data');
			$('#myModal').modal('show');
			$('#myModal').find('.modal-title').text('Edit User');
			$('#myForm').attr('action', '<?php echo base_url() ?>myuser/updateEmployee');
			$.ajax({
				type: 'ajax',
				method: 'get',
				url: '<?php echo base_url() ?>myuser/editEmployee',
				data: {id: id},
				async: false,
				dataType: 'json',
				success: function(data){
					
					$('input[name=txtfName]').val(data.firstname);
					$('input[name=txtlname]').val(data.lastname);
					$('input[name=txtemail]').val(data.email);
					
					$('input[name=txtId]').val(data.id);
				},
				error: function(){
					alert('Could not Edit Data');
				}
			});
		});

		//delete- 
		$('#showdata').on('click', '.item-delete', function(){
			var id = $(this).attr('data');
           
			$('#deleteModal').modal('show');
			//prevent previous handler - unbind()
			$('#btnDelete').unbind().click(function(){
				$.ajax({
					type: 'ajax',
					method: 'get',
					async: false,
					url: '<?php echo base_url() ?>myuser/deleteEmployee',
					data:{id:id},
					dataType: 'json',
					success: function(response){
						if(response.success){
							$('#deleteModal').modal('hide');
							$('.alert-success').html('User Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
							showAllEmployee();
						}else{
							alert('Error');
						}
					},
					error: function(){
						alert('Error deleting');
					}
				});
			});
		});



		//function
		function showAllEmployee(){
			$.ajax({
				type: 'ajax',
				url: '<?php echo base_url() ?>myuser/showAllEmployee',
				async: false,
				dataType: 'json',
				success: function(data){

					var html = '';
					var i;
					for(i=0; i<data.length; i++){

					
						html +='<tr>'+
									'<td>'+data[i].id+'</td>'+
									'<td>'+data[i].firstname+'</td>'+
									'<td>'+data[i].lastname+'</td>'+
									'<td>'+data[i].email+'</td>'+
									// <div id="myImg" ></div>
                                 '<td><img src='+data[i].image_path+' width="100" title="Image not Found"><div id="myImg" ></div></td>'+
									'<td>'+
										'<a href="javascript:;" class="btn btn-info item-edit" data="'+data[i].id+'">Edit</a>'+
										'<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].id+'">Delete</a>'+
									'</td>'+
							    '</tr>';
					}
					$('#showdata').html(html);
				},
				error: function(){
					alert('Could not get Data from Database');
				}
			});
		}
	});
</script>