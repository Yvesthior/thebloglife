<?php

return [
    [
        'name' => 'Post collections',
        'flag' => 'post-collection.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'post-collection.create',
        'parent_flag' => 'post-collection.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'post-collection.edit',
        'parent_flag' => 'post-collection.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'post-collection.destroy',
        'parent_flag' => 'post-collection.index',
    ],
];
