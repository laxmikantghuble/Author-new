<?php 

namespace App\Model\Table;
use Cake\ORM\Table;

use Cake\Validation\Validator;

class CommentsTable extends Table
{
	public function initialize(array $config)
	{

		$this->hasMany('Comments');
	}
}
