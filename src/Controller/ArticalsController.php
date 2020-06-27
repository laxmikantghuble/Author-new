<?php 
namespace App\Controller;
use App\Controller\AppController;
use Cake\Routing\Router;
use Cake\Utility\Security;


use Cake\I18n\Time;
use Cake\Auth\DefaultPasswordHasher;

class ArticalsController extends AppController {

	public $baseurl;
	
	//public function initialize(): void
	public function initialize()
    {
	   parent::initialize();
	   $this->viewBuilder()->setLayout('authlayout');	  
	   $this->baseurl= Router::url('/',true);
	   $this->loadModel('Articals');	
	   $this->loadModel('Comments');
	   
	}

	public function index()
	{
		//it will open home page of web application 
		$this->set('baseurl',$this->baseurl);
		$this->set('activehome','navbar-brand');
		$this->set('title','Welcome to Author application');

		//$users =$this->User->find('all',['order'=>['user_id'=>'desc']]);
	}

	public function show()
	{
		$this->set('baseurl',$this->baseurl);
		$this->set('title','Upload Artical');
		$this->paginate=['limit'=>1];
		$articals = $this->paginate($this->Articals->find('all',['order'=>['artical_id'=>'desc'],'contain'=>['Comments']]));
		
		//$articals = $this->Articals->find('all',['order'=>['artical_id'=>'desc']]);
		$this->set('articals',$articals );
	}

	//open
	public function create()
	{
		$this->set('baseurl',$this->baseurl);
		$this->set('title','Upload Artical');
	}

	public function edit($id)
	{
		$this->set('baseurl',$this->baseurl);
		$this->set('title','Upload Artical');
		$articals = $this->Articals->get($id);
		$this->set('articals',$articals);

	}
	public function commentsave()
	{
	  $this->autoRender= false;
	  $comments = $this->Comments->newEntity();
	  $commentDetails = $this->request->data;

	  $comments->artical_id= $commentDetails['articalid'];
	  $comments->comment= $commentDetails['comment'];
	  $comments->user_id= $this->Auth->user('user_id');
	  $comments->created_at =  Time::now();	   

	  if($this->Comments->save($comments))
     {
   	   $this->Flash->success('Comment has been added successfully.');
   	   $this->redirect(array('controller' => 'Articals', 'action' => 'show'));
     }
     else{
   	   $this->Flash->error('There is issue with comment save.');
     }	
	  
	}

	public function updateartical()
	{
		$this->set('baseurl',$this->baseurl);
		$this->set('title','Upload Artical');

	  // $artical = $this->Articals->newEntity();
	   $artDetails = $this->request->data;
	   $artical = $this->Articals->get($artDetails['articalid']);
	   $artical->title= $artDetails['title'];
	   $artical->tags= $artDetails['tags'];
	   $artical->description= $artDetails['description'];
	   
	   $artical->user_id=$this->Auth->user('user_id');// we will change useing auth set data from session   
	   $artical->created_at =  Time::now(); //new DateTime('now');

	   //Start - Controller Code to handle file uploading
        if(!empty($this->request->data['articalimage']['name']))
        {
            $fileName = $this->request->data['articalimage']['name'];
            $uploadPath = 'img/uploads/article/';
            $uploadFile = $uploadPath.$fileName;
            if(!is_dir($uploadPath))
            {
              mkdir( $uploadPath,0777,true);
            }
            if(move_uploaded_file($this->request->data['articalimage']['tmp_name'],$uploadFile))
            {
	        $this->request->data['articalimage'] = $uploadFile;
            }
            $artical->articalimage = $uploadFile;
        }

         if($this->Articals->save($artical))
	     {
	   	   $this->Flash->success('Article has been updated successfully.');
	   	   $this->redirect(['action'=>'/edit/'.$artDetails['articalid']]);
	     }
	     else{
	   	   $this->Flash->error('There is issue with user data save.');
	     }	
	}

	public function deleteartical($id)
	{
		$this->autoRender= false;
		$this->set('baseurl',$this->baseurl);
		$this->set('title','Upload Artical');
		$articals = $this->Articals->get($id);
		
		if($this->Articals->delete($articals))
		{
		$this->Flash->success('Article has been deleted successfully.');
	   	$this->redirect(['action'=>'show']);
	   }

	}
	

	public function saveartical()
	{
		$this->autoRender= false;	

		if($this->request->is('post'))
		{
		   
		  $artical =  $this->Articals->newEntity($this->request->getData());
		  $validation = $artical->errors();
		  if(!empty($validation))
		  {
		  	//print_r($validation);
		  	$this->Flash->set($validation,['element'=>'artical_error']);
		    $this->redirect(['action'=>'create']);
		  }
		  else {

		  	   $artical = $this->Articals->newEntity();
			   $artDetails = $this->request->data;
			   
			   $artical->title= $artDetails['title'];
			   $artical->tags= $artDetails['tags'];
			   $artical->description= $artDetails['description'];
			   
			   $artical->user_id=$this->Auth->user('user_id');// we will change useing auth set data from session   
			   $artical->created_at =  Time::now(); //new DateTime('now');

			   //Start - Controller Code to handle file uploading
		        if(!empty($this->request->data['articalimage']['name']))
		        {
		            $fileName = $this->request->data['articalimage']['name'];
		            $uploadPath = 'img/uploads/article/';
		            $uploadFile = $uploadPath.$fileName;
		            if(!is_dir($uploadPath))
		            {
		              mkdir( $uploadPath,0777,true);
		            }
		            if(move_uploaded_file($this->request->data['articalimage']['tmp_name'],$uploadFile))
		            {
			        $this->request->data['articalimage'] = $uploadFile;
		            }
		            $artical->articalimage = $uploadFile;
		        }
		        //End 
		        if($this->Articals->save($artical))
			    {
			   	  $this->Flash->success('Article has been added successfully.');
			   	  $this->redirect(['action'=>'create']);
			    }
			    else{
			   	  $this->Flash->error('There is issue with user registration.');
			    }		    

			  
		  }

		}

	}
	
}