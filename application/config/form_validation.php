<?php
$config=[
    'add_user_rules'=>[
        [
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required|alpha'
        ],
        
        [
            'field' => 'firstname',
            'label' => 'First name',
            'rules' => 'required|alpha'
        ],
        [
            'field' => 'lastname',
            'label' => 'last name',
            'rules' => 'required'
        ],
        [
            'field' => 'email',
            'label' => 'email',
            'rules' => 'required'
        ],
       
    ]

];
?>