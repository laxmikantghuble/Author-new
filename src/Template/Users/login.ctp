<script src="<?=$this->Url->script('jquery.validate.min.js');?>"></script>
<div class="row card">
	<div class="card col-md-12">
	  <div class="header"></div>

	  	<div class="card-body col-md-6">
	  		<h2>Members Login</h2>
				  <?php 
				  echo $this->Form->create(
					 	$user,[
						'class'=>'form-horizontal',
						'method'=>'post',
						'id'=>'frm-login',
						'action'=>'checklogin']						
					);
					
					
				  ?>
				    <div class="form-group">
				      <label for="username">Username:</label>
				      <input type="text" class="form-control" required id="username" name="username" placeholder="Enter username">
				    </div>
				    <div class="form-group">
				      <label for="pwd">Password:</label>
				      <input type="password" required class="form-control" id="password" name="password" placeholder="Enter password" >
				    </div>				   
				    <button type="submit" class="btn btn-primary">Submit</button>
				     
				     Still Don't have an account. Click <a href="<?=$baseurl;?>signup"">here</a> to signup
				 <?php 
					echo $this->Form->end();
				 ?>
	  	</div>
	  
</div>
</div>
<?php 

$this->Html->scriptStart(['block'=>true]);
echo '$("#frm-login").validate();';
$this->Html->scriptEnd();
?>
