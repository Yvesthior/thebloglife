<?php

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Blog\Repositories\Interfaces\PostInterface;
use Botble\PostCollection\Repositories\Interfaces\PostCollectionInterface;
use Botble\Theme\Supports\ThemeSupport;

app()->booted(function () {

    ThemeSupport::registerGoogleMapsShortcode();
    ThemeSupport::registerYoutubeShortcode();

    if (is_plugin_active('blog')) {

        add_shortcode('posts-listing', __('Posts listing'), __('Add posts listing'), function ($shortcode) {
            $limit = $shortcode->limit ? (int)$shortcode->limit : 12;
            $layout = $shortcode->layout ?: 'default';
            $posts = get_all_posts(true, $limit);

            return Theme::partial('shortcodes.posts-listing', compact('posts', 'layout'));
        });

        shortcode()->setAdminConfig('posts-listing', function ($attributes) {
            return Theme::partial('shortcodes.posts-listing-admin-config', compact('attributes'));
        });

        add_shortcode('trending-posts', __('Trending posts'), __('Trending posts'), function () {
            return Theme::partial('shortcodes.trending-posts');
        });

        add_shortcode('posts-grid', __('Posts Grid'), __('Posts Grid'), function ($shortcode) {
            $attributes = $shortcode->toArray();
            $queryPosts = [
                'categories'         => $attributes['categories'] ?? '',
                'categories_exclude' => $attributes['categories_exclude'] ?? '',
                'include'            => $attributes['include'] ?? '',
                'exclude'            => $attributes['exclude'] ?? '',
                'limit'              => $attributes['limit'] ? (int)$attributes['limit'] : 4,
                'order_by'           => $attributes['order_by'] ?? 'updated_at',
                'order'              => $attributes['order'] ?? 'desc',
            ];
            $title = $attributes['title'] ?? '';
            $subtitle = $attributes['subtitle'] ?? '';
            $style = $attributes['style'] ?? 2;

            $posts = query_post($queryPosts);

            return Theme::partial('shortcodes.posts-grid', compact('posts', 'title', 'subtitle', 'style'));
        });

        shortcode()->setAdminConfig('posts-grid', function ($attributes) {
            return Theme::partial('shortcodes.posts-grid-admin-config', compact('attributes'));
        });

        add_shortcode('posts-slider', __('Posts slider'), __('Posts slider'), function ($shortcode) {
            $queryPosts = [];

            if ($shortcode->filter_by == 'posts-collection') {
                $postCollection = app(PostCollectionInterface::class)
                    ->findById($shortcode->posts_collection_id, [
                        'posts' => function ($query) use ($shortcode) {
                            return $query->limit(!empty($shortcode->limit) ? (int)$shortcode->limit : 6);
                        },
                        'posts.slugable',
                    ]);

                $posts = $postCollection->posts;
            } else {
                switch ($shortcode->filter_by) {
                    case 'featured':
                        $queryPosts = [
                            'featured' => 1,
                            'limit'    => $shortcode->limit ? (int)$shortcode->limit : 4,
                        ];
                        break;

                    case 'recent':
                        $queryPosts = [
                            'limit' => $shortcode->limit ? (int)$shortcode->limit : 4,
                        ];
                        break;

                    case 'ids':
                        $queryPosts = [
                            'include' => $shortcode->include,
                        ];
                        break;
                }

                $posts = query_post($queryPosts);
            }

            $title = $shortcode->title ?? '';
            $description = $shortcode->description ?? '';
            $style = $shortcode->style ?? 1;

            return Theme::partial('shortcodes.posts-slider-style-' . $style, compact('posts', 'title', 'description'));
        });

        shortcode()->setAdminConfig('posts-slider', function ($attributes) {
            $postsCollections = app(PostCollectionInterface::class)->all();

            return Theme::partial('shortcodes.posts-slider-admin-config', compact('attributes', 'postsCollections'));
        });

        add_shortcode('popular-categories', __('Popular categories'), __('Popular categories'), function ($shortcode) {
            $title = $shortcode->title;
            $limit = (int)$shortcode->limit;

            return Theme::partial('shortcodes.popular-categories', compact('title', 'limit'));
        });

        shortcode()->setAdminConfig('popular-categories', function ($attributes) {
            return Theme::partial('shortcodes.popular-categories-admin-config', compact('attributes'));
        });

        add_shortcode('contact-form', __('Contact form'), __('Add contact form'), function ($shortcode) {
            $title = $shortcode->title ?: '';

            return Theme::partial('shortcodes.contact-form', compact('title'));
        });

        shortcode()->setAdminConfig('contact-form', function ($attributes) {
            return Theme::partial('shortcodes.contact-form-admin-config', compact('attributes'));
        });

        //recent post
        add_shortcode('recent-posts', __('Recent posts'), __('Add recent posts'), function ($shortcode) {
            return Theme::partial('shortcodes.recent-posts', [
                'shortcode' => $shortcode,
            ]);
        });

        shortcode()->setAdminConfig('recent-posts', function ($attributes) {
            return Theme::partial('shortcodes.recent-posts-admin-config', compact('attributes'));
        });

        //posts collection
        add_shortcode('posts-collection', __('Posts Collection'), __('Add posts collection'), function ($shortcode) {
            $postCollectionData = app(PostCollectionInterface::class)
                ->findById($shortcode->posts_collection_id, [
                    'posts' => function ($query) use ($shortcode) {
                        return $query->limit(!empty($shortcode->limit) ? (int)$shortcode->limit : 4);
                    },
                    'posts.slugable',
                ]);

            return Theme::partial('shortcodes.posts-collection', [
                'shortcode'          => $shortcode,
                'postCollectionData' => $postCollectionData,
            ]);
        });

        shortcode()->setAdminConfig('posts-collection', function ($attributes) {
            $postsCollections = app(PostCollectionInterface::class)->all();

            return Theme::partial('shortcodes.posts-collection-admin-config',
                compact('attributes', 'postsCollections'));
        });

        //categories tab posts
        add_shortcode('categories-tab-posts', __('Categories tab posts'), __('Add Categories tab posts'),
            function ($shortcode) {
                $postLimit = !empty($shortcode->limit) ? (int)$shortcode->limit : 5;
                $categoryIds = explode(',', $shortcode->categories_ids);
                $categoriesData = [];

                foreach ($categoryIds as $categoryId) {
                    $categoriesData[] = [
                        'category' => get_category_by_id($categoryId),
                        'posts'    => get_posts_by_category($categoryId, $postLimit),
                    ];
                }

                return Theme::partial('shortcodes.categories-tab-posts', [
                    'shortcode'      => $shortcode,
                    'categoriesData' => $categoriesData,
                ]);
            });

        shortcode()->setAdminConfig('categories-tab-posts', function ($attributes) {
            $categories = get_categories();

            return Theme::partial('shortcodes.categories-tab-posts-admin-config', compact('attributes', 'categories'));
        });

        //video posts
        add_shortcode('videos-posts', __('Video posts'), __('Add video posts'), function ($shortcode) {
            $posts = query_post([
                'format_type' => 'video',
                'limit'       => (int)($shortcode->limit ?? 7)
            ]);

            return Theme::partial('shortcodes.video-posts', [
                'shortcode' => $shortcode,
                'posts'     => $posts,
            ]);
        });

        shortcode()->setAdminConfig('videos-posts', function ($attributes) {
            return Theme::partial('shortcodes.video-posts-admin-config', compact('attributes'));
        });

        //most comments
        add_shortcode('most-comments', __('Most comments'), __('Most comments'), function ($shortcode) {
            return Theme::partial('shortcodes.most-comments', compact('shortcode'));
        });

        shortcode()->setAdminConfig('most-comments', function ($attributes) {
            return Theme::partial('shortcodes.most-comments-admin-config', compact('attributes'));
        });


    }

    if (is_plugin_active('gallery')) {
        add_shortcode('theme-galleries', __('Theme Galleries'), __('Theme Galleries'), function ($shortcode) {
            return Theme::partial('shortcodes.theme-galleries', compact('shortcode'));
        });

        shortcode()->setAdminConfig('theme-galleries', function ($attributes) {
            return Theme::partial('shortcodes.theme-galleries-admin-config', compact('attributes'));
        });
    }

    if (is_plugin_active('pro-posts')) {
        add_shortcode('recently-viewed-posts', __('Recent Viewed Posts'), __('Recently Viewed Posts'),
            function ($shortcode) {
                $cookieName = App::getLocale() . '_recently_viewed_posts';

                $jsonRecentlyViewedPosts = null;
                if (isset($_COOKIE[$cookieName])) {
                    $jsonRecentlyViewedPosts = $_COOKIE[$cookieName];
                }
                $ids = collect(json_decode($jsonRecentlyViewedPosts, true))->flatten()->all();

                if (count($ids) > 0) {
                    $posts = app(PostInterface::class)->advancedGet([
                        'condition' => [
                            'posts.status' => BaseStatusEnum::PUBLISHED,
                            'posts.id'     => [
                                'posts.id',
                                'IN',
                                $ids
                            ],
                        ],
                        'paginate'  => [
                            'per_page'      => 9,
                            'current_paged' => (int)request()->input('page', 1),
                        ],
                        'order_by'  => ['created_at' => 'DESC'],
                    ]);

                    return Theme::partial('shortcodes.recently-viewed-posts', [
                        'title'       => $shortcode->title,
                        'description' => $shortcode->content,
                        'subtitle'    => $shortcode->subtitle,
                        'posts'       => $posts
                    ]);
                }

                return null;
            });

        shortcode()->setAdminConfig('recently-viewed-posts', function ($attributes, $content) {
            return Theme::partial('shortcodes.recently-viewed-posts-admin-config', compact('attributes', 'content'));
        });
    }
});
