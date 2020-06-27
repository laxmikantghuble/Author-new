<?php 
namespace App\Controller;
use App\Controller\AppController;
use Cake\Routing\Router;


class HomeController extends AppController {

	public $baseurl;
	public function initialize(): void
    {
	   $this->viewBuilder()->setLayout('authlayout');
	  
	   $this->baseurl= Router::url('/',true);

	}

	//App::uses('AppController', 'Controller');

	public function index()
	{
		//it will open home page of web application 
		$this->set('baseurl',$this->baseurl);
		$this->set('activehome','navbar-brand');
		$this->set('title','Welcome to Author application');
	}
	public function service()
	{
		$this->set('baseurl',$this->baseurl);
		$this->set('activeservice','navbar-brand');
		$this->set('title','Services ');
	}
	public function aboutus()
	{
		$this->set('baseurl',$this->baseurl);
		$this->set('activeabout','navbar-brand');
		$this->set('title','About Us');
	}

	public function contact()
	{
		$this->set('baseurl',$this->baseurl);
		$this->set('activecontcat','navbar-brand');
		$this->set('title','Contact Us ');
	}

	public function signup()
	{
		$this->set('baseurl',$this->baseurl);
		$this->set('title','User Registration Form');
		//$user = $this->Users->newEntity();
		$this->set(compact('user'));
	}
}