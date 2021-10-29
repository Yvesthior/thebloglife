<?php

namespace Botble\PostCollection\Providers;

use Botble\Base\Supports\Helper;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Botble\PostCollection\Models\PostCollection;
use Botble\PostCollection\Models\PostCollectionPosts;
use Botble\PostCollection\Repositories\Caches\PostCollectionCacheDecorator;
use Botble\PostCollection\Repositories\Caches\PostCollectionPostsCacheDecorator;
use Botble\PostCollection\Repositories\Eloquent\PostCollectionPostsRepository;
use Botble\PostCollection\Repositories\Eloquent\PostCollectionRepository;
use Botble\PostCollection\Repositories\Interfaces\PostCollectionInterface;
use Botble\PostCollection\Repositories\Interfaces\PostCollectionPostsInterface;
use Illuminate\Routing\Events\RouteMatched;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use SlugHelper;

class PostCollectionServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(PostCollectionInterface::class, function () {
            return new PostCollectionCacheDecorator(new PostCollectionRepository(new PostCollection));
        });
        $this->app->bind(PostCollectionPostsInterface::class, function () {
            return new PostCollectionPostsCacheDecorator(new PostCollectionPostsRepository(new PostCollectionPosts));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/post-collection')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->loadRoutes(['web']);

        SlugHelper::registerModule(PostCollection::class, 'Posts Collection');
        SlugHelper::setPrefix(PostCollection::class, 'posts-collection');

        Event::listen(RouteMatched::class, function () {
            if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
                \Language::registerModule([PostCollection::class]);
            }

            dashboard_menu()
                ->registerItem([
                    'id'          => 'cms-plugins-post-collection',
                    'priority'    => 2,
                    'parent_id'   => 'cms-plugins-blog',
                    'name'        => 'plugins/post-collection::post-collection.name',
                    'icon'        => null,
                    'url'         => route('post-collection.index'),
                    'permissions' => ['post-collection.index'],
                ])
                ->registerItem([
                    'id'          => 'cms-plugins-blog-post',
                    'priority'    => 1,
                    'parent_id'   => 'cms-plugins-blog',
                    'name'        => 'plugins/blog::posts.create',
                    'icon'        => null,
                    'url'         => route('posts.create'),
                    'permissions' => ['posts.index.create'],
                ]);
        });
    }
}
