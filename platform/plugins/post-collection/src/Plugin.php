<?php

namespace Botble\PostCollection;

use Illuminate\Support\Facades\Schema;
use Botble\PluginManagement\Abstracts\PluginOperationAbstract;

class Plugin extends PluginOperationAbstract
{
    public static function remove()
    {
        Schema::dropIfExists('post_collections');
        Schema::dropIfExists('post_collections_posts');
    }
}
