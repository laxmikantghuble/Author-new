<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-danger" onclick="this.classList.add('hidden');">
	<!--<?=print_r($message);?></div>-->
	<?php 
	if(isset($message['fname']['_empty']))
	{
		echo "<p><b>First Name: </b>".$message['fname']['_empty'].'</p>';
	}
	if(isset($message['lname']['_empty']))
	{
		echo "<p><b>Last Name: </b>".$message['lname']['_empty'].'</p>';
	}
	if(isset($message['email']['_empty'])) 
	{
		echo "<p><b>Email: </b>".$message['email']['_empty'].'</p>';
	}
	if(isset($message['email']['unique'])) 
	{
		echo "<p><b>Email: </b>".$message['email']['unique'].'</p>';
	}
	if(isset($message['phone']['_empty']))
	{
		echo "<p><b>Phone: </b>".$message['phone']['_empty'].'</p>';
	}
	if(isset($message['username']['_empty']))
	{
		echo "<p><b>Username: </b>".$message['username']['_empty'].'</p>';
	}
	if(isset($message['password']['_empty']))
	{
		echo "<p><b>Password: </b>".$message['password']['_empty'].'</p>';
	}
	if(isset($message['phone']['validFormat']))
	{
		echo "<p><b>Phone: </b>".$message['phone']['validFormat'].'</p>';
	}	

	if(isset($message['username']['length']))
	{
		echo "<p><b>Username: </b>".$message['username']['length'].'</p>';
	} 
	?>
</div>
