<?php

return [
    /*
    |--------------------------------------------------------------------------
    | ACL Roles
    |--------------------------------------------------------------------------
    |
    | Here can you define what roles are used in your application.
    | There are 2 things you have to look out for when creating new roles.
    |
    | 1.
    | The index of the new role has to match id of the role in your database table.
    |
    | 2.
    | In the role_permission.json you have to define these roles
    | there your self. They do not get created automaticly in that file.
    |
    */
    'roles' => [
        1 => 'admin',
        2 => 'user',
    ],

    /*
    |--------------------------------------------------------------------------
    | ACL Permissions
    |--------------------------------------------------------------------------
    |
    | Here you wi   ll define which role has access to which controller.
    | You will also need to specify which function(s) in the controller
    | the role has access to.
    |
    | To give access to a role, you will need to add the (new?) role to the array.
    | Behind the controller's name, you can specify which functions the
    | role can use by putting the function names in an array.
    |
    |
    | If you want the role to have access to all the functions
    | without typing all the names, just add a "*" in the array.
    |
    | There is also the "global" option. Here you should put all
    | the controllers and functions that every role has access to.
    */

    "permissions" => [
        "roles" => [
            
        ],
        "global" => [
            
        ]
    ]
];
