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
	if(isset($message['title']['_empty']))
	{
		echo "<p><b>Artical Title:</b>".$message['title']['_empty'].'</p>';
	}
	if(isset($message['tags']['_empty']))
	{
		echo "<p><b>Tags:</b>".$message['tags']['_empty'].'</p>';
	}
	if(isset($message['description']['_empty'])) 
	{
		echo "<p><b>Description:</b>".$message['description']['_empty'].'</p>';
	}
	
	if(isset($message['articalimage']['_empty']))
	{
		echo "<p><b>Artical Image:</b>".$message['articalimage']['_empty'].'</p>';
	}	
	?>
</div>
