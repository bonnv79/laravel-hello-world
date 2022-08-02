<?php

$HOME_PATH = '/';
$LIST_PATH = '/list';
$CREATE_PATH = '/posts/create';
$UPDATE_PATH = '/posts/update';
$DELETE_PATH = '/posts/delete';
$VIEW_PATH = '/posts/view';
$VIEW_IMAGE_PATH = '/view-image';
$ADD_IMAGE_PATH = '/add-image';
$DELETE_IMAGE_PATH = '/delete-image';

$BREADCRUMB = [
  'HOME' => [
    'name' => 'Home', 
    'path' => $HOME_PATH
  ],
  'POST_LIST' => [
    'name' => 'Post List', 
    'path' => $LIST_PATH
  ],
  'VIEW_IMAGE' => [
    'name' => 'View Image', 
    'path' => $VIEW_IMAGE_PATH
  ],
];

return [
    'PAGE_SIZE' => 60,
    'BREADCRUMB_PATH' => [
      'list' => [
        $BREADCRUMB['HOME'],
        $BREADCRUMB['POST_LIST'],
      ],
      'create' => [
        $BREADCRUMB['HOME'],
        $BREADCRUMB['POST_LIST'],
        [
          'name' => 'Create'
        ]
      ],
      'edit' => [
        $BREADCRUMB['HOME'],
        $BREADCRUMB['POST_LIST'],
        [
          'name' => 'Edit'
        ]
      ],
      'view' => [
        $BREADCRUMB['HOME'],
        $BREADCRUMB['POST_LIST'],
        [
          'name' => 'View'
        ]
        ],
      'image-view' => [
        $BREADCRUMB['HOME'],
        $BREADCRUMB['VIEW_IMAGE'],
      ],
      'image-add' => [
        $BREADCRUMB['HOME'],
        $BREADCRUMB['VIEW_IMAGE'],
        [
          'name' => 'Add'
        ]
      ]
    ],
    'PAGINATION_OPTIONS' => [10, 20, 50, 100, 500],
    'ROUTER_PATH' => [
      'HOME' => $HOME_PATH,
      'POSTS' => [
        'LIST' => $LIST_PATH,
        'ADD' => $CREATE_PATH,
        'EDIT' => $UPDATE_PATH,
        'REMOVE' => $DELETE_PATH,
        'VIEW' => $VIEW_PATH
      ],
      'IMAGE' => [
        'VIEW' => $VIEW_IMAGE_PATH,
        'ADD' => $ADD_IMAGE_PATH,
        'REMOVE' => $DELETE_IMAGE_PATH,
      ]
    ],
    'MENUS' => [
      [
        'name' => 'Post List', 
        'path' => $LIST_PATH,
      ],
      [
        'name' => 'Image List', 
        'path' => $VIEW_IMAGE_PATH,
      ]
    ],
    'POST' => [
      'COLUMNS' => [
        [
          'key' => 'id',
          'label' => 'ID'
        ],
        [
          'key' => 'title',
          'label' => 'Title'
        ],
        [
          'key' => 'description',
          'label' => 'Description'
        ],
        [
          'key' => 'created_at',
          'label' => 'Created At'
        ],
        [
          'key' => 'image',
          'label' => 'Image Path'
        ],
      ]
    ]
];