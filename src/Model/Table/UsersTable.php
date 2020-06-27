<?php 

namespace App\Model\Table;
use Cake\ORM\Table;

use Cake\Validation\Validator;

class UsersTable extends Table
{
	public function validationDefault(Validator $validator) : Validator {

		$validator->requirePresence('fname')
				    ->notEmptyString('fname', 'Please enter first name.')			   

				    ->requirePresence('lname')
				    ->notEmptyString('lname', 'Please enter last name.')

				    ->requirePresence('phone')
				    ->notEmptyString('phone', 'Please enter phone number.') 

				    ->add('phone', 'validFormat', [
				        'rule' => 'numeric',
				        'message' => 'Please enter valid phone.'
				    ])

				    ->requirePresence('email')
				    ->notEmptyString('email', 'Please enter email.')
				    ->add('email', 'validFormat', [
				        'rule' => 'email',
				        'message' => 'Please enter valid email.'
				    ])

				    /*->add('email', 'unique_email', [
				        'rule' => 'email',
				        'provider'=>'table',
				        'message' => 'Email already exists.'
				    ])*/
				     ->add('email', 'unique', [
                    'rule' => 'validateUnique',
                    'provider' => 'table',
                    'message' => 'Email already exists.'
             		])

				    ->requirePresence('password')
				    ->notEmptyString('password', 'Please enter password.')
				    ->add('password', [
				        'length' => [
				            'rule' => ['minLength', 8],
				            'message' => 'Password should be minimum 8 characters long.',
				        ]
				    ])

				    ->requirePresence('username')
				    ->notEmptyString('username', 'Please enter username.')
				    ->add('username', [
				        'length' => [
				            'rule' => ['minLength', 4],
				            'message' => 'username should be minimum 4 characters long.',
				        ]
				    ])   ;

				 	/*->requirePresence('confirmpass')
				    ->notEmptyString('confirmpass', 'Please enter password')
				    ->add('confirmpass', [
				        'length' => [
				            'rule' => ['minLength', 8],
				            'message' => 'Confirm password should be minimum 8 characters long.',
				        ]
				    ]);

				    */				    

					return $validator;
	}
}
