<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Widget\Models\Widget as WidgetModel;
use Theme;

class WidgetSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WidgetModel::truncate();

        $data = [
            'en_US' => [
                [
                    'widget_id'  => 'SocialsWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id'    => 'SocialsWidget',
                        'title' => 'Follow us',
                    ],
                ],
                [
                    'widget_id'  => 'AdsWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id'           => 'AdsWidget',
                        'ads_location' => 'top-sidebar-ads',
                    ],
                ],
                [
                    'widget_id'  => 'CategoriesMenuWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id' => 'CategoriesMenuWidget',
                    ],
                ],
                [
                    'widget_id'  => 'LastestPostsWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id'             => 'LastestPostsWidget',
                        'name'           => 'Lastest Post',
                        'number_display' => 6,
                    ],
                ],
                [
                    'widget_id'  => 'TagsWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 1,
                    'data'       => [
                        'id'             => 'TagsWidget',
                        'name'           => 'Tags',
                        'number_display' => 10,
                    ],
                ],
                [
                    'widget_id'  => 'AdsWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 1,
                    'data'       => [
                        'id'           => 'AdsWidget',
                        'ads_location' => 'bottom-sidebar-ads',
                    ],
                ],
                [
                    'widget_id'  => 'AboutWidget',
                    'sidebar_id' => 'footer_sidebar_1',
                    'position'   => 1,
                    'data'       => [
                        'id'          => 'AboutWidget',
                        'name'        => 'About me',
                        'description' => 'Introduction about the author of this blog. You should write because you love the shape of stories and sentences and the creation of different words on a page. Writing comes from reading, and reading is the finest teacher of how to write.',
                    ],
                ],
                [
                    'widget_id'  => 'PopularPostsWidget',
                    'sidebar_id' => 'footer_sidebar_2',
                    'position'   => 1,
                    'data'       => [
                        'id'                => 'PopularPostsWidget',
                        'name'              => 'Popular Posts',
                        'name_custom_class' => 'color-white',
                        'number_display'    => 3,
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'footer_sidebar_3',
                    'position'   => 1,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'Quick links',
                        'menu_id' => 'quick-links',
                    ],
                ],
                [
                    'widget_id'  => 'TagsWidget',
                    'sidebar_id' => 'footer_sidebar_3',
                    'position'   => 1,
                    'data'       => [
                        'id'                => 'TagsWidget',
                        'name'              => 'Tags',
                        'name_custom_class' => 'color-white',
                    ],
                ],
                [
                    'widget_id'  => 'NewsletterWidget',
                    'sidebar_id' => 'footer_sidebar_4',
                    'position'   => 1,
                    'data'       => [
                        'id'          => 'NewsletterWidget',
                        'name'        => 'Newsletter',
                        'description' => 'Subscribe to Our Newsletter',
                    ],
                ],
                [
                    'widget_id'  => 'CopyrightFooterMenuWidget',
                    'sidebar_id' => 'footer_copyright_menu',
                    'position'   => 1,
                    'data'       => [
                        'id'      => 'CopyrightFooterMenuWidget',
                        'name'    => 'Copyright footer Menu',
                        'menu_id' => 'quick-links',
                    ],
                ],
            ],
            'vi' => [
                [
                    'widget_id'  => 'SocialsWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id'    => 'SocialsWidget',
                        'title' => 'Follow us',
                    ],
                ],
                [
                    'widget_id'  => 'AdsWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id'           => 'AdsWidget',
                        'ads_location' => 'top-sidebar-ads',
                    ],
                ],
                [
                    'widget_id'  => 'CategoriesMenuWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id' => 'CategoriesMenuWidget',
                    ],
                ],
                [
                    'widget_id'  => 'LastestPostsWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id'             => 'LastestPostsWidget',
                        'name'           => 'Bài viết mới nhất',
                        'number_display' => 6,
                    ],
                ],
                [
                    'widget_id'  => 'TagsWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 1,
                    'data'       => [
                        'id'             => 'TagsWidget',
                        'name'           => 'Thẻ',
                        'number_display' => 10,
                    ],
                ],
                [
                    'widget_id'  => 'AdsWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 1,
                    'data'       => [
                        'id'           => 'AdsWidget',
                        'ads_location' => 'bottom-sidebar-ads',
                    ],
                ],
                [
                    'widget_id'  => 'AboutWidget',
                    'sidebar_id' => 'footer_sidebar_1',
                    'position'   => 1,
                    'data'       => [
                        'id'          => 'AboutWidget',
                        'name'        => 'Về chúng tôi',
                        'description' => 'Introduction about the author of this blog. You should write because you love the shape of stories and sentences and the creation of different words on a page. Writing comes from reading, and reading is the finest teacher of how to write.',
                    ],
                ],
                [
                    'widget_id'  => 'PopularPostsWidget',
                    'sidebar_id' => 'footer_sidebar_2',
                    'position'   => 1,
                    'data'       => [
                        'id'                => 'PopularPostsWidget',
                        'name'              => 'Nổi bật',
                        'name_custom_class' => 'color-white',
                        'number_display'    => 3,
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'footer_sidebar_3',
                    'position'   => 1,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'Quick links',
                        'menu_id' => 'quick-links',
                    ],
                ],
                [
                    'widget_id'  => 'TagsWidget',
                    'sidebar_id' => 'footer_sidebar_3',
                    'position'   => 1,
                    'data'       => [
                        'id'                => 'TagsWidget',
                        'name'              => 'Tags',
                        'name_custom_class' => 'color-white',
                    ],
                ],
                [
                    'widget_id'  => 'NewsletterWidget',
                    'sidebar_id' => 'footer_sidebar_4',
                    'position'   => 1,
                    'data'       => [
                        'id'          => 'NewsletterWidget',
                        'name'        => 'Newsletter',
                        'description' => 'Subscribe to Our Newsletter',
                    ],
                ],
                [
                    'widget_id'  => 'CopyrightFooterMenuWidget',
                    'sidebar_id' => 'footer_copyright_menu',
                    'position'   => 1,
                    'data'       => [
                        'id'      => 'CopyrightFooterMenuWidget',
                        'name'    => 'Copyright footer Menu',
                        'menu_id' => 'quick-links',
                    ],
                ],
            ]
        ];

        $theme = Theme::getThemeName();

        foreach ($data as $locale => $widgets) {
            foreach ($widgets as $item) {
                $item['theme'] = $locale == 'en_US' ? $theme : ($theme . '-' . $locale);
                WidgetModel::create($item);
            }
        }
    }
}
