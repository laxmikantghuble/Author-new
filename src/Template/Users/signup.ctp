<script src="<?=$this->Url->script('jquery.validate.min.js');?>"></script>
<div class="row card">
	<div class="card col-md-12">
	  <div class="header"></div>

	  	<div class="card-body col-md-12">
	  		<h2>Members Registration</h2>
				
				<?php 
					/*echo $this->Form->create(
						'action'=>'javascript:void(0)',
						'class'=>'form-horizontal',
						'method'=>'post'
					);
					*/

					 echo $this->Form->create(
					 	$user,[
						'class'=>'form-horizontal',
						'method'=>'post',
						'id'=>'frm-sign',
						'action'=>'save']						
					);

					?>
					<!--<form id="frm-sign" method="post" action="javascript:void(0);">-->
					<?=$this->Flash->render();?>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="email">First Name:</label>
					    <div class="col-sm-10">
					      <input type="text"  class="form-control" id="fname" name="fname" placeholder="Enter firstname">
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="email">Last Name:</label>
					    <div class="col-sm-10">
					      <input type="text"  class="form-control" id="lname" name="lname" placeholder="Enter lastname">
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="email">Email:</label>
					    <div class="col-sm-10">
					      <input type="email"  class="form-control" id="email" name="email" placeholder="Enter email">
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="email">Phone:</label>
					    <div class="col-sm-10">
					      <input type="text"  class="form-control" id="phone" name="phone" placeholder="Enter phone">
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="email">Username:</label>
					    <div class="col-sm-10">
					      <input type="text"  class="form-control" id="username" name="username" placeholder="Enter username">
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="pwd">Password:</label>
					    <div class="col-sm-10">
					      <input type="password"  class="form-control" id="pass" name="pass" placeholder="Enter password">
					    </div>
					  </div>
					  <!--<div class="form-group">
					    <label class="control-label col-sm-2" for="pwd">Confirm Password:</label>
					    <div class="col-sm-10">
					      <input type="password" required class="form-control" id="confirmpass" name="confirmpass" placeholder="Enter password">
					    </div>
					  </div>-->
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <div class="checkbox">
					        <label class="form-check-label">
    							<input type="checkbox" class="form-check-input" value="2" name="user_type"> Want to signup as Author
  								</label>
					      </div>
					    </div>
					  </div>

					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-primary">Submit</button>
					    </div>
					  </div>
				<?php 
					echo $this->Form->end();
				?>
		
	  	</div>
	  
</div>
</div>
<?php 

//$this->Html->scriptStart(['block'=>true]);
//echo '$("#frm-sign").validate();';
//$this->Html->scriptEnd();
?>
