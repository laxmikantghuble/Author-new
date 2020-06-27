<?php 

namespace App\Model\Table;
use Cake\ORM\Table;

use Cake\Validation\Validator;

class ArticalsTable extends Table
{
	
	public function initialize(array $config)
	{

		$this->hasMany('Comments');
	}

	public function validationDefault(Validator $validator) : Validator {

		$validator->requirePresence('title')
				    ->notEmptyString('title', 'Please enter title for artical.')			   

				    ->requirePresence('tags')
				    ->notEmptyString('tags', 'Please enter tags seperated by comma.')

				    ->requirePresence('description')
				    ->notEmptyString('description', 'Please description for artical.') 

				    ->add('phone', 'validFormat', [
				        'rule' => 'numeric',
				        'message' => 'Please enter valid phone.'
				    ])		    
				  

					->add('articalimage', 'file', [
					    'rule' => ['mimeType', ['image/jpeg', 'image/png','image/jpg']],
					    'message' => 'Please provide image with valid file format.',
					    'on' => function ($context) {
					        return !empty($context['data']['show_profile_picture']);
					    }
					]);				     

					return $validator;
	}
}
