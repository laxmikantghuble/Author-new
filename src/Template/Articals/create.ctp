<script src="<?=$this->Url->script('jquery.validate.min.js');?>"></script>
<div class="row card">
	<div class="card col-md-12">
	  <div class="header"></div>

	  	<div class="card-body col-md-12">
	  		<h2>Artical Submission Form</h2>
				
				<?php 
					/*echo $this->Form->create(
						'action'=>'javascript:void(0)',
						'class'=>'form-horizontal',
						'method'=>'post'
					);
					*/

					 echo $this->Form->create(
					 	null,[
						'class'=>'form-horizontal',
						'method'=>'post',
						'id'=>'frm-sign',
						'action'=>'saveartical',
						'type'=>'file']						
					);

					?>
					<!--<form id="frm-sign" method="post" action="javascript:void(0);">-->
					<?=$this->Flash->render();?>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="email">Artical title:</label>
					    <div class="col-sm-10">
					      <input type="text"  class="form-control" id="title" name="title" placeholder="Enter artical">
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="email">Artical Tags:</label>
					    <div class="col-sm-10">
					      <input type="text"  class="form-control" id="tags" name="tags" placeholder="Enter tags eg. Nature, Health">
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="email">Content/Description:</label>
					    <div class="col-sm-10">
					      <textarea  class="form-control" id="description" name="description" placeholder="Enter description" rows="10" cols="15"></textarea>
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-2" for="email">Artical Image:</label>
					    <div class="col-sm-10">
					      <input type="file"  class="form-control" id="articalimage" name="articalimage" >
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