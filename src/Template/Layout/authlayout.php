<!DOCTYPE html>
<html lang="en">
<head>
  <title><?=$title;?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?=$this->Url->css('bootstrap.min.css');?>">
  <link rel="stylesheet" href="<?=$this->Url->css('style.css');?>">
   <link rel="stylesheet" href="<?=$this->Url->css('mystyle.css');?>">
  <script src="<?=$this->Url->script('jquery.min.js');?>"></script>
  <script src="<?=$this->Url->script('popper.min.js');?>"></script>
  <script src="<?=$this->Url->script('bootstrap.min.js');?>"></script> 
</head>
<body>

<div class="container">
      
      <?=$this->element('header');?>
      <?=$this->Flash->render();?>
      <?=$this->fetch('content');?>
       <?=$this->element('footer');?>
       <?=$this->fetch('script');?>
</div>

</body>
</html>
