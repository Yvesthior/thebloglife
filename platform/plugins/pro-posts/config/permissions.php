<?php

return [
    [
        'name' => 'Pro posts',
        'flag' => 'pro-posts.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'pro-posts.create',
        'parent_flag' => 'pro-posts.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'pro-posts.edit',
        'parent_flag' => 'pro-posts.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'pro-posts.destroy',
        'parent_flag' => 'pro-posts.index',
    ],
];
