<?php

return [

    /*
    |--------------------------------------------------------------------------
    | The Application's roles
    |--------------------------------------------------------------------------
    |
    | Here you can define the different roles fo this application. A role
    | has permissions which dictate what action a user can accomplish
    | upon a certain resource.
    |
    */

    'roles' => [
        'administrator' => [
            'name' => 'Administrator',
            'slug' => 'administrator',
            'permissions' => [
                'create-pupil' => true,
            ],
        ],
        'guardian' => [
            'name' => 'Guardian',
            'slug' => 'guardian',
            'permissions' => [
                'view-pupil' => true,
            ],
        ],
        'pupil' => [
            'name' => 'Pupil',
            'slug' => 'pupil',
            'permissions' => [],
        ],
        'bus-operator' => [
            'name' => 'Bus Operator',
            'slug' => 'bus-operator',
            'permissions' => [
                'view-pupil' => true,
            ],
        ],
    ],
];
