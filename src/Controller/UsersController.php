<?php 
namespace App\Controller;
use App\Controller\AppController;
use Cake\Routing\Router;
use Cake\Utility\Security;


use Cake\I18n\Time;
use Cake\Auth\DefaultPasswordHasher;

class UsersController extends AppController {

	public $baseurl;
	
	//public function initialize(): void
	public function initialize()
    {
	   parent::initialize();
	   $this->viewBuilder()->setLayout('authlayout');	  
	   $this->baseurl= Router::url('/',true);
	   $this->loadModel('Users');
	   
	   /*$this->loadComponent('Auth', [
        'authenticate' => [
            'Form' => [
                'fields' => ['username' => 'username', 'password' => 'pwd']
            ]
        ]
    ]);

    $this->loadComponent('Auth', [
        'Authenticate' => [
            'Form' => [
                'userModel' => 'User',
                'Fields' => [
                    'username' => 'username',
                    'password' => 'pwd'
                ]
            ]
        ],
        'loginAction' => [
            'controller' => 'Users',
            'action' => 'login',
        ]
    ]);
    */
	   //$this->loadComponent('Flash');

	}

	public function logout()
	{
		$this->Auth->logout();
		$this->redirect(array('controller' => 'Users', 'action' => 'login'));
	}


	public function index()
	{
		//it will open home page of web application 
		$this->set('baseurl',$this->baseurl);
		$this->set('activehome','navbar-brand');
		$this->set('title','Welcome to Author application');

		//$users =$this->User->find('all',['order'=>['user_id'=>'desc']]);
	}

	public function login()
	{
		$user = $this->Users->newEntity();
		$this->set(compact('user'));
		$this->set('baseurl',$this->baseurl);
		$this->set('title','Welcome to Author application');
	}

	public function checklogin()
	{		
		$this->autoRender= false;
		//print_r($this->request);
		if($this->request->is('post'))
		{				
			//print_r($this->request);			
			$userDetail = $this->Auth->identify();			
			if($userDetail)
			{				
				$this->Auth->setUser($userDetail);
				return $this->redirect($this->Auth->redirectUrl());
			}	
			else {
				$this->Flash->error('Username or password does not matched. Please try again.');
				$this->redirect(['action'=>'login']);
			}

		}

		if(!$this->Auth->user())
		{
			$this->redirect(['action'=>'login']);
		}
		
	}

	public function dashboard()
	{
		$this->autoRender= false;	
		//print_r($this->Auth->user());
		if($this->Auth->user())
		{
			//echo "You are logged in";
			if($this->Auth->user('user_type')==2)
			$this->redirect(array('controller' => 'Articals', 'action' => 'show'));
			else 
			$this->redirect(array('controller' => 'Articals', 'action' => 'show'));

		}else {
			echo "You are not logged ";
		}
		
	}

	public function signup()
	{
		$this->set('baseurl',$this->baseurl);
		$this->set('title','User Registration Form');
		$user = $this->Users->newEntity();
		$this->set(compact('user'));
	}

	public function save()
	{
		$this->autoRender= false;		
		//print_r($this->request->getData());		
		/*$validator   
	    ->requirePresence('fname')
	    ->notEmpty('fname', 'We need your name.');


		$errors = $validator->validate($this->request->getData());
		if (!empty($errors)) {
		    // Send an email.
		    print_r($errors);
		}else {

			echo "Successs";
		}
		*/	
		

		if($this->request->is('post'))
		{
		   
		  $user =  $this->Users->newEntity($this->request->getData());
		  $validation = $user->errors();
		  if(!empty($validation))
		  {
		  	//print_r($validation);
		  	$this->Flash->set($validation,['element'=>'user_error']);
		    $this->redirect(['action'=>'signup']);
		  }
		  else {

		  	   $user = $this->Users->newEntity();
			   $userDetails = $this->request->data;
			   $passHash = new DefaultPasswordHasher();
			   $user->firstname= $userDetails['fname'];
			   $user->lastname= $userDetails['lname'];
			   $user->email= $userDetails['email'];
			   $user->phone= $userDetails['phone'];
			   $user->username= $userDetails['username'];		   
			   $user->password= $passHash->hash($userDetails['pass']);
			 
			   if(!isset($userDetails['user_type']))
			   	{
			   		$user->user_type='1';
			   	}else {
			   		  $user->user_type = $userDetails['user_type'];
			   	}
			   $user->created_at =  Time::now(); //new DateTime('now');
			   if($this->Users->save($user))
			   {
			   	 $this->Flash->success('Registration has been done successfully.');
			   	 $this->redirect(['action'=>'signup']);
			   }
			   else{
			   	$this->Flash->error('There is issue with user registration.');
			   }
		  }

		}

	}
	
}