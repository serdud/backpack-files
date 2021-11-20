<?php

return [
    'controller' => [
        'class' => 'Serdud\BackpackFiles\App\Http\Controllers\Admin\FileCrudController',
        'create_fields' => [
            [
                'name' => 'name',
                'label' => 'Name',
                'type' => 'text',
            ],
            [
                'name' => 'file',
                'label' => 'File',
                'type' => 'media-upload',
                'upload' => true,
                'hint' => '.png, .jpeg, .svg, .gif and .mp4 only',
                'attributes' => [
                    'accept' => 'image/png,video/mp4,image/jpeg,image/svg+xml,image/gif',
                ],
            ]
        ],
        'list_columns' => [
            [
                'name' => 'name',
                'label' => 'Name',
                'type' => 'text',
            ],
            [
                'name' => 'file',
                'label' => 'File',
                'type' => 'media',
            ]
        ],
        'entity_name' => [
            'singular' => 'file',
            'plural' => 'files',
        ],
    ],
    'model' => 'Serdud\BackpackFiles\App\Models\File',
    'request' => [
        'class' => 'Serdud\BackpackFiles\App\Http\Requests\Admin\FileRequest',
        'rules' => [
            'name' => 'required|max:255',
            'file' => 'sometimes|required|mimes:png,mp4,jpeg,svg,gif',
        ],
    ],
    'filesystem' => [
        'disk' => 'public',
        'path' => 'files',
    ],
    'route' => 'files',
];
