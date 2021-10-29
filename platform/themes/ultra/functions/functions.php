<?php

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\MetaBox as MetaBoxModel;
use Botble\Blog\Models\Category;
use Botble\Blog\Models\Post;
use Botble\Blog\Repositories\Caches\PostCacheDecorator;
use Botble\Blog\Repositories\Interfaces\PostInterface;
use Botble\Comment\Repositories\Interfaces\CommentInterface;
use Botble\Comment\Repositories\Interfaces\CommentRecommendInterface;
use Botble\Member\Models\Member;
use Botble\Member\Repositories\Interfaces\MemberInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Theme\UltraNews\Http\Requests\CustomPostRequest;
use Theme\UltraNews\Repositories\Eloquent\PostRepository;
use TheSky\ProPosts\Repositories\Interfaces\FavoritePostsInterface;

register_page_template([
    'default'        => __('Default'),
    'full'           => __('Full'),
    'homepage'       => __('Homepage'),
    'homepage2'      => __('Homepage 2'),
    'no-breadcrumbs' => __('No Breadcrumbs'),
    'right-sidebar'  => __('Right sidebar'),
]);

register_sidebar([
    'id'          => 'footer_sidebar_1',
    'name'        => __('Footer sidebar 1'),
    'description' => __('Sidebar in the footer of page'),
]);

register_sidebar([
    'id'          => 'footer_sidebar_2',
    'name'        => __('Footer sidebar 2'),
    'description' => __('Sidebar in the footer of page'),
]);

register_sidebar([
    'id'          => 'footer_sidebar_3',
    'name'        => __('Footer sidebar 3'),
    'description' => __('Sidebar in the footer of page'),
]);

register_sidebar([
    'id'          => 'footer_sidebar_4',
    'name'        => __('Footer sidebar 4'),
    'description' => __('Sidebar in the footer of page'),
]);

register_sidebar([
    'id'   => 'footer_copyright_menu',
    'name' => __('Footer copyright menu'),
]);

RvMedia::setUploadPathAndURLToPublic();

RvMedia::addSize('large', 1024)
    ->addSize('medium_large', 600, 421)
    ->addSize('medium', 400, 400);

if (is_plugin_active('blog')) {
    app()->bind(PostInterface::class, function () {
        return new PostCacheDecorator(new PostRepository(new Post));
    });

    if (!function_exists('get_post')) {
        /**
         * @return bool
         */
        function get_post()
        {
            if (Route::currentRouteName() == 'public.single') {
                $slug = SlugHelper::getSlug(request()->route('slug'), '');
                if ($slug->reference_type == Post::class) {
                    return app(PostInterface::class)
                        ->getFirstBy([
                            'id'     => $slug->reference_id,
                            'status' => BaseStatusEnum::PUBLISHED,
                        ], ['*']);
                }

                return false;
            }

            return false;
        }
    }

    if (!function_exists('query_post')) {
        /**
         * @param array $params
         * @return Collection
         */
        function query_post(array $params)
        {
            $filters = [
                'limit'              => empty($params['limit']) ? 10 : $params['limit'],
                'format_type'        => $params['format_type'] ?? '',
                'categories'         => empty($params['categories']) ? null : explode(',', $params['categories']),
                'categories_exclude' => empty($params['categories_exclude']) ? null : explode(
                    ',',
                    $params['categories_exclude']
                ),
                'exclude'            => empty($params['exclude']) ? null : explode(',', $params['exclude']),
                'include'            => empty($params['include']) ? null : explode(',', $params['include']),
                'order_by'           => empty($params['order_by']) ? 'updated_at' : $params['order_by'],
            ];

            if (isset($params['featured'])) {
                $filters['featured'] = $params['featured'];
            }

            return app(PostInterface::class)->getFilters($filters);
        }
    }

    register_post_format([
        'video' => [
            'key'  => 'video',
            'icon' => 'fa fa-camera',
            'name' => 'Video',
        ],
    ]);

    add_action(BASE_ACTION_META_BOXES, function ($context, $object) {
        if (get_class($object) == Category::class && $context == 'side') {
            MetaBox::addMetaBox('additional_blog_category_fields', __('Addition Information'), function () {
                $image = null;
                $args = func_get_args();
                if (!empty($args[0])) {
                    $image = MetaBox::getMetaData($args[0], 'image', true);
                }

                return Theme::partial('blog-category-fields', compact('image'));
            }, get_class($object), $context);
        }
    }, 24, 2);

    add_action(BASE_ACTION_AFTER_CREATE_CONTENT, function ($type, $request, $object) {
        if (get_class($object) == Category::class) {
            MetaBox::saveMetaBoxData($object, 'image', $request->input('image'));
        }
    }, 230, 3);

    add_action(BASE_ACTION_AFTER_UPDATE_CONTENT, function ($type, $request, $object) {
        if (get_class($object) == Category::class) {
            MetaBox::saveMetaBoxData($object, 'image', $request->input('image'));
        }
    }, 231, 3);

    add_action(BASE_ACTION_META_BOXES, 'add_addition_fields_in_post_screen', 30, 3);

    function add_addition_fields_in_post_screen($context, $object)
    {
        if (get_class($object) == Post::class && $context == 'top') {
            MetaBox::addMetaBox(
                'additional_post_fields',
                __('Addition Information'),
                function () {
                    $layout = null;
                    $timeToRead = null;
                    $args = func_get_args();
                    if (!empty($args[0])) {
                        $layout = MetaBox::getMetaData($args[0], 'layout', true);
                        $timeToRead = MetaBox::getMetaData($args[0], 'time_to_read', true);
                    }

                    return Theme::partial('metabox.time-to-read', compact('layout', 'timeToRead'));
                },
                get_class($object),
                $context
            );
        }

        //add metabox video
        if (get_class($object) == Post::class && $context == 'advanced') {
            MetaBox::addMetaBox(
                'video_post_fields',
                __('Video'),
                function () {
                    $videoLink = null;
                    $args = func_get_args();
                    if (!empty($args[0])) {
                        $videoLink = MetaBox::getMetaData($args[0], 'video_link', true);
                        $videoEmbedCode = MetaBox::getMetaData($args[0], 'video_embed_code', true);
                        $videoUploadId = MetaBox::getMetaData($args[0], 'video_upload_id', true);
                    }

                    return Theme::partial(
                        'metabox.video-field',
                        compact('videoLink', 'videoEmbedCode', 'videoUploadId')
                    );
                },
                get_class($object),
                $context
            );
        }
    }

    add_action(BASE_ACTION_AFTER_CREATE_CONTENT, 'save_addition_post_fields', 230, 3);
    add_action(BASE_ACTION_AFTER_UPDATE_CONTENT, 'save_addition_post_fields', 231, 3);

    function save_addition_post_fields($type, $request, $object)
    {
        if (is_plugin_active('blog') && get_class($object) == Post::class) {
            MetaBox::saveMetaBoxData($object, 'layout', $request->input('layout'));
            MetaBox::saveMetaBoxData($object, 'time_to_read', $request->input('time_to_read'));
            MetaBox::saveMetaBoxData($object, 'video_link', $request->input('video_link'));
            MetaBox::saveMetaBoxData($object, 'video_embed_code', $request->input('video_embed_code'));
            MetaBox::saveMetaBoxData($object, 'video_upload_id', $request->input('video_upload_id'));
        }
    }
}

if (is_plugin_active('member')) {
    SlugHelper::registerModule(Member::class, 'Authors');
    SlugHelper::setPrefix(Member::class, 'author');
}

app()->booted(function () {
    if (is_plugin_active('blog')) {
        Category::resolveRelationUsing('image', function ($model) {
            return $model->morphOne(MetaBoxModel::class, 'reference')->where('meta_key', 'image');
        });
    }

    if (setting('social_login_enable', false)) {
        remove_filter(BASE_FILTER_AFTER_LOGIN_OR_REGISTER_FORM);
        add_filter(BASE_FILTER_AFTER_LOGIN_OR_REGISTER_FORM, 'addLoginOptionsByTheme', 25);
    }
});

if (is_plugin_active('ads')) {
    AdsManager::registerLocation('panel-ads', __('Panel Ads'))
        ->registerLocation('header-ads', __('Header Ads'))
        ->registerLocation('top-sidebar-ads', __('Top Sidebar Ads'))
        ->registerLocation('bottom-sidebar-ads', __('Bottom Sidebar Ads'))
        ->registerLocation('custom-1', __('Custom 1'))
        ->registerLocation('custom-2', __('Custom 2'))
        ->registerLocation('custom-3', __('Custom 3'));
}

Form::component('themeIcon', Theme::getThemeNamespace() . '::partials.icons-field', [
    'name',
    'value'      => null,
    'attributes' => [],
]);

if (!function_exists('get_category_layout')) {
    /**
     * @return array
     */
    function get_category_layout(): array
    {
        return [
            'list'  => __('List'),
            'grid'  => __('Grid'),
            'metro' => __('Metro'),
        ];
    }
}

if (!function_exists('get_single_layout')) {
    /**
     * @return array
     */
    function get_single_layout(): array
    {
        return [
            'default'  => __('Default'),
            'top-full' => __('Top full'),
            'inline'   => __('Inline'),
        ];
    }
}

if (!function_exists('get_related_style')) {
    /**
     * @return array
     */
    function get_related_style(): array
    {
        return [
            'default' => __('Default'),
            'popup'   => __('Popup'),
        ];
    }
}

if (!function_exists('display_ad')) {
    /**
     * @param string $location
     * @param array  $attributes
     * @return string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    function display_ad(string $location, array $attributes = []): string
    {
        if (!is_plugin_active('ads') || empty($location)) {
            return '';
        }

        return AdsManager::display($location, $attributes);
    }
}

if (!function_exists('random_background')) {
    /**
     * @return string
     */
    function random_background()
    {
        $backgrounds = [
            'background2',
            'background3',
            'background1',
            'background5',
            'background7',
            'background9',
            'background10',
        ];

        return $backgrounds[array_rand($backgrounds)];
    }
}

if (!function_exists('get_background_styles')) {
    /**
     * @return array
     */
    function get_background_styles()
    {
        return [
            ''                 => __('Not set'),
            'background-white' => __('Background White'),
        ];
    }
}

if (!function_exists('get_time_to_read')) {
    /**
     * @param Post $post
     * @return string
     */
    function get_time_to_read(Post $post)
    {
        $timeToRead = MetaBox::getMetaData($post, 'time_to_read', true);

        if ($timeToRead) {
            return number_format($timeToRead);
        }

        return number_format(strlen(strip_tags($post->content)) / 300);
    }
}

if (!function_exists('post_date_format')) {
    /**
     * @param bool $longType
     * @return string
     */
    function post_date_format($longType = true)
    {
        if ($longType) {
            return theme_option('post_date_format', 'd M, Y');
        }

        return theme_option('post_date_short_format', 'M d');
    }
}

if (!function_exists('is_video_post')) {
    /**
     * @param Post $post
     * @return bool
     */
    function is_video_post($post)
    {
        return $post->format_type == 'video' ? true : false;
    }
}

if (is_plugin_active('blog')) {
    add_filter(BASE_FILTER_BEFORE_RENDER_FORM, function ($form, $data) {
        if (auth()->user() && get_class($data) == Post::class) {
            $authors = app()->make(MemberInterface::class)
                ->allBy([]);

            $authorsArray = [];
            foreach ($authors as $author) {
                $authorsArray[$author->id] = $author->getFullName();
            }

            $form
                ->setValidatorClass(CustomPostRequest::class)
                ->addAfter('status', 'author_id', 'customSelect', [
                    'label'      => __('Author'),
                    'label_attr' => ['class' => 'control-label required'],
                    'attr'       => [
                        'placeholder' => __('Select an author...'),
                    ],
                    'choices'    => $authorsArray,
                ]);
        }

        return $form;
    }, 127, 2);

    add_action(BASE_ACTION_AFTER_CREATE_CONTENT, function ($type, $request, $object) {
        if (auth()->user() && $type == POST_MODULE_SCREEN_NAME) {
            $object->author_id = $request->input('author_id');
            $object->author_type = Member::class;
            $object->save();
        }
    }, 123, 3);

    add_action(BASE_ACTION_AFTER_UPDATE_CONTENT, function ($type, $request, $object) {
        if (auth()->user() && $type == POST_MODULE_SCREEN_NAME) {
            $object->author_id = $request->input('author_id');
            $object->author_type = Member::class;
            $object->save();
        }
    }, 123, 3);

    if (!function_exists('get_recent_comment_posts')) {
        /**
         * @param int $limit
         * @return mixed
         */
        function get_recent_comment_posts(int $limit = 4)
        {
            $latestCommentIds = app(CommentInterface::class)
                ->getModel()
                ->where('reference_type', Post::class)
                ->groupBy('reference_id')
                ->orderBy('created_at', 'DESC')
                ->selectRaw('reference_id, max(created_at) as created_at')
                ->limit($limit)
                ->pluck('reference_id');

            return app(PostInterface::class)
                ->getModel()
                ->whereIn('id', $latestCommentIds)
                ->get();
        }
    }

    if (!function_exists('get_most_comment_posts')) {
        /**
         * @param int $limit
         * @return mixed
         */
        function get_most_comment_posts(int $limit = 4)
        {
            return app(PostInterface::class)
                ->getModel()
                ->withCount('comments')
                ->orderBy('comments_count', 'DESC')
                ->take($limit)
                ->get();
        }
    }
}

if (!function_exists('get_total_comment')) {
    /**
     * @param $object
     * @return bool
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    function get_total_comment($object)
    {
        if (is_plugin_active('comment')) {
            if (setting('enable_cache')) {
                $cacheKey = md5('total-comment-' . get_class($object) . 'id-' . $object->id);
                if (Cache::has($cacheKey)) {
                    return Cache::get($cacheKey);
                }
            }

            $totalComment = app(CommentInterface::class)
                ->getModel()
                ->where('reference_type', get_class($object))
                ->where('reference_id', $object->id)
                ->count();

            if (setting('enable_cache')) {
                Cache::put($cacheKey, $totalComment, setting('cache_time', 3600));
            }

            return $totalComment;
        }

        return null;
    }

    /**
     * @param Post $object
     * @return bool
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    function get_total_like($object)
    {
        if (is_plugin_active('comment')) {
            if (setting('enable_cache')) {
                $cacheKey = md5('total-like-' . get_class($object) . 'id-' . $object->id);
                if (Cache::has($cacheKey)) {
                    return Cache::get($cacheKey);
                }
            }

            $totalLike = app(CommentRecommendInterface::class)
                ->getModel()
                ->where('reference_type', get_class($object))
                ->where('reference_id', $object->id)
                ->count();

            if (setting('enable_cache')) {
                Cache::put($cacheKey, $totalLike, setting('cache_time', 3600));
            }

            return $totalLike;
        }

        return null;
    }
}

if (!function_exists('comment_object_enable')) {
    /**
     * @param Post $object
     * @return bool
     */
    function comment_object_enable($object)
    {
        $commentStatus = $object->getMetaData('comment_status', true);

        return setting('comment_enable') && ($commentStatus == 1 || $commentStatus == '') &&
            in_array(get_class($object), json_decode(setting('comment_menu_enable', '[]'), true));
    }
}

/**
 * @param string $html
 * @param string $module
 * @return null|string
 * @throws \Throwable
 */
function addLoginOptionsByTheme($html)
{
    if (Route::currentRouteName() == 'access.login') {
        if (defined('THEME_OPTIONS_MODULE_SCREEN_NAME')) {
            Theme::asset()
                ->usePath(false)
                ->add(
                    'social-login-css',
                    asset('vendor/core/plugins/social-login/css/social-login.css'),
                    [],
                    [],
                    '1.0.0'
                );
        }

        return $html . view('plugins/social-login::login-options')->render();
    }

    return $html . Theme::partial('login-options');
}

/**
 * @param string $postId
 * @return bool
 */
function getIsFavoritePost(string $postId)
{
    return auth()->guard('member')->check() &&
        !empty(auth()->guard('member')->user()->favorite_posts) &&
        in_array($postId, json_decode(auth()->guard('member')->user()->favorite_posts, true));
}

/**
 * @param string $postId
 * @return bool
 */
function getIsBookmarkPost(string $postId)
{
    return auth()->guard('member')->check() &&
        !empty(auth()->guard('member')->user()->bookmark_posts) &&
        in_array($postId, json_decode(auth()->guard('member')->user()->bookmark_posts, true));
}

function getPostTotalFavorite(string $postId)
{
    return app()->make(FavoritePostsInterface::class)->count([
        'post_id' => $postId,
        'user_id' => auth()->guard('member')->id(),
        'type'    => 'favorite'
    ]);
}
