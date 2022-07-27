<?php

$HOME_PATH = '/';
$LIST_PATH = '/filter';
$CREATE_PATH = '/posts/create';
$UPDATE_PATH = '/posts/update';
$DELETE_PATH = '/posts/delete';
$VIEW_PATH = '/posts/view';

$BREADCRUMB = [
  'HOME' => [
    'name' => 'Home', 
    'path' => $HOME_PATH
  ],
  'POST_LIST' => [
    'name' => 'Post List', 
    'path' => $LIST_PATH
  ],
];

return [
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
      ]
    ],
    'PAGINATION_OPTIONS' => [10, 20, 50, 100],
    'ROUTER_PATH' => [
      'HOME' => $HOME_PATH,
      'POSTS' => [
        'LIST' => $LIST_PATH,
        'ADD' => $CREATE_PATH,
        'EDIT' => $UPDATE_PATH,
        'REMOVE' => $DELETE_PATH,
        'VIEW' => $VIEW_PATH
      ]
    ],
];