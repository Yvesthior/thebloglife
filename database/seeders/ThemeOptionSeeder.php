<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Setting\Models\Setting as SettingModel;
use Theme;

class ThemeOptionSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->uploadFiles('general');

        $theme = Theme::getThemeName();

        SettingModel::where('key', 'LIKE', 'theme-' . $theme . '-%')->delete();

        SettingModel::insertOrIgnore([
            [
                'key'   => 'show_admin_bar',
                'value' => '1',
            ],
            [
                'key'   => 'theme',
                'value' => $theme,
            ],
            [
                'key'   => 'admin_logo',
                'value' => 'general/logo-white.png',
            ],
            [
                'key'   => 'admin_favicon',
                'value' => 'general/favicon.png',
            ],
        ]);

        $data = [
            'en_US' => [
                [
                    'key'   => 'site_title',
                    'value' => 'UltraNews - Laravel News and Magazine Multilingual System',
                ],
                [
                    'key'   => 'seo_description',
                    'value' => 'UltraNews – Laravel News and Magazine Multilingual System is a complete solution for any kind of News, Magazine, and Blog Portal. This cms Includes almost everything you need. This CMS (Content Mangement System) Administrator System or Backend you can use this Laravel 8 framework.',
                ],
                [
                    'key'   => 'seo_og_image',
                    'value' => 'general/screenshot.png',
                ],
                [
                    'key'   => 'copyright',
                    'value' => '©' . now()->format('Y') . ' UltraNews - ',
                ],
                [
                    'key'   => 'designed_by',
                    'value' => '| Design by AliThemes',
                ],
                [
                    'key'   => 'favicon',
                    'value' => 'general/favicon.png',
                ],
                [
                    'key'   => 'website',
                    'value' => 'https://thesky9.com',
                ],
                [
                    'key'   => 'contact_email',
                    'value' => 'support@thesky9.com',
                ],
                [
                    'key'   => 'site_description',
                    'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Odio suspendisse leo neque iaculis molestie sagittis maecenas aenean eget molestie sagittis.',
                ],
                [
                    'key'   => 'phone',
                    'value' => '+(123) 345-6789',
                ],
                [
                    'key'   => 'email',
                    'value' => 'contact@gmail.com',
                ],
                [
                    'key'   => 'address',
                    'value' => '214 West Arnold St. New York, NY 10002',
                ],
                [
                    'key'   => 'cookie_consent_message',
                    'value' => 'Your experience on this site will be improved by allowing cookies ',
                ],
                [
                    'key'   => 'cookie_consent_learn_more_url',
                    'value' => url('cookie-policy'),
                ],
                [
                    'key'   => 'cookie_consent_learn_more_text',
                    'value' => 'Cookie Policy',
                ],
                [
                    'key'   => 'homepage_id',
                    'value' => '1',
                ],
                [
                    'key'   => 'blog_page_id',
                    'value' => '4',
                ],
                [
                    'key'   => 'single_layout',
                    'value' => 'default',
                ],
                [
                    'key'   => 'single_title_layout',
                    'value' => 'top-full',
                ],
                [
                    'key'   => 'action_title',
                    'value' => 'All you need to build new site',
                ],
                [
                    'key'   => 'action_button_text',
                    'value' => 'Buy Now',
                ],
                [
                    'key'   => 'action_button_url',
                    'value' => 'https://codecanyon.net/user/thesky9',
                ],
                [
                    'key'   => 'logo',
                    'value' => 'general/logo.png',
                ],
                [
                    'key'   => 'logo_mobile',
                    'value' => 'general/logo-mobile.png',
                ],
                [
                    'key'   => 'logo_tablet',
                    'value' => 'general/logo-tablet.png',
                ],
                [
                    'key'   => 'logo_white',
                    'value' => 'general/logo-white.png',
                ],
                [
                    'key'   => 'img_loading',
                    'value' => 'general/img-loading.jpg',
                ],
                [
                    'key'   => 'font_heading',
                    'value' => 'Arimo',
                ],
                [
                    'key'   => 'font_body',
                    'value' => 'Roboto',
                ],
                [
                    'key'   => 'color_primary',
                    'value' => '#87c6e3',
                ],
                [
                    'key'   => 'color_secondary',
                    'value' => '#455265',
                ],
                [
                    'key'   => 'color_success',
                    'value' => '#76e1c6',
                ],
                [
                    'key'   => 'color_danger',
                    'value' => '#f0a9a9',
                ],
                [
                    'key'   => 'color_warning',
                    'value' => '#e6bf7e',
                ],
                [
                    'key'   => 'color_info',
                    'value' => '#58c1c8',
                ],
                [
                    'key'   => 'color_light',
                    'value' => '#F3F3F3',
                ],
                [
                    'key'   => 'color_dark',
                    'value' => '#111111',
                ],
                [
                    'key'   => 'color_link',
                    'value' => '#222831',
                ],
                [
                    'key'   => 'color_white',
                    'value' => '#FFFFFF',
                ],
                [
                    'key'   => 'header_style',
                    'value' => 'style-1',
                ],
                [
                    'key'   => 'preloader_enabled',
                    'value' => false,
                ],
                [
                    'key'   => 'allow_account_login',
                    'value' => 'yes',
                ],
                [
                    'key'   => 'comment_type_in_post',
                    'value' => 'member',
                ],
            ],

            'vi' => [
                [
                    'key'   => 'site_title',
                    'value' => 'UltraNews - Laravel News and Magazine Multilingual System',
                ],
                [
                    'key'   => 'seo_description',
                    'value' => 'UltraNews – Laravel News and Magazine Multilingual System is a complete solution for any kind of News, Magazine, and Blog Portal. This cms Includes almost everything you need. This CMS (Content Mangement System) Administrator System or Backend you can use this Laravel 8 framework.',
                ],
                [
                    'key'   => 'seo_og_image',
                    'value' => 'general/screenshot.png',
                ],
                [
                    'key'   => 'copyright',
                    'value' => '©' . now()->format('Y') . ' Thiết kế bởi AliThemes ',
                ],
                [
                    'key'   => 'designed_by',
                    'value' => '| Design by AliThemes',
                ],
                [
                    'key'   => 'favicon',
                    'value' => 'general/favicon.png',
                ],
                [
                    'key'   => 'website',
                    'value' => 'https://thesky9.com',
                ],
                [
                    'key'   => 'contact_email',
                    'value' => 'support@thesky9.com',
                ],
                [
                    'key'   => 'site_description',
                    'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Odio suspendisse leo neque iaculis molestie sagittis maecenas aenean eget molestie sagittis.',
                ],
                [
                    'key'   => 'phone',
                    'value' => '+(123) 345-6789',
                ],
                [
                    'key'   => 'email',
                    'value' => 'contact@gmail.com',
                ],
                [
                    'key'   => 'address',
                    'value' => '214 West Arnold St. New York, NY 10002',
                ],
                [
                    'key'   => 'cookie_consent_message',
                    'value' => 'Trải nghiệm của bạn trên trang web này sẽ được cải thiện bằng cách cho phép cookie ',
                ],
                [
                    'key'   => 'cookie_consent_learn_more_url',
                    'value' => url('cookie-policy'),
                ],
                [
                    'key'   => 'cookie_consent_learn_more_text',
                    'value' => 'Cookie Policy',
                ],
                [
                    'key'   => 'homepage_id',
                    'value' => '11',
                ],
                [
                    'key'   => 'blog_page_id',
                    'value' => '6',
                ],
                [
                    'key'   => 'single_layout',
                    'value' => 'default',
                ],
                [
                    'key'   => 'single_title_layout',
                    'value' => 'top-full',
                ],
                [
                    'key'   => 'logo',
                    'value' => 'general/logo.png',
                ],
                [
                    'key'   => 'logo_mobile',
                    'value' => 'general/logo-mobile.png',
                ],
                [
                    'key'   => 'logo_tablet',
                    'value' => 'general/logo-tablet.png',
                ],
                [
                    'key'   => 'logo_white',
                    'value' => 'general/logo-white.png',
                ],
                [
                    'key'   => 'action_title',
                    'value' => 'Bạn cần tạo mới website',
                ],
                [
                    'key'   => 'action_button_text',
                    'value' => 'Mua Ngay',
                ],
                [
                    'key'   => 'action_button_url',
                    'value' => 'https://codecanyon.net/user/thesky9',
                ],
                [
                    'key'   => 'font_heading',
                    'value' => 'Arimo',
                ],
                [
                    'key'   => 'font_body',
                    'value' => 'Roboto',
                ],
                [
                    'key'   => 'color_brand_1',
                    'value' => '#ffcda3',
                ],
                [
                    'key'   => 'color_brand_2',
                    'value' => '#fce2ce',
                ],
                [
                    'key'   => 'color_brand_3',
                    'value' => '#ffede5',
                ],
                [
                    'key'   => 'color_brand_4',
                    'value' => '#fff5ef',
                ],
                [
                    'key'   => 'color_primary',
                    'value' => '#87c6e3',
                ],
                [
                    'key'   => 'color_secondary',
                    'value' => '#455265',
                ],
                [
                    'key'   => 'color_success',
                    'value' => '#76e1c6',
                ],
                [
                    'key'   => 'color_danger',
                    'value' => '#f0a9a9',
                ],
                [
                    'key'   => 'color_warning',
                    'value' => '#e6bf7e',
                ],
                [
                    'key'   => 'color_info',
                    'value' => '#58c1c8',
                ],
                [
                    'key'   => 'color_light',
                    'value' => '#F3F3F3',
                ],
                [
                    'key'   => 'color_dark',
                    'value' => '#111111',
                ],
                [
                    'key'   => 'color_link',
                    'value' => '#222831',
                ],
                [
                    'key'   => 'color_white',
                    'value' => '#FFFFFF',
                ],
                [
                    'key'   => 'header_style',
                    'value' => 'style-1',
                ],
                [
                    'key'   => 'preloader_enabled',
                    'value' => false,
                ],
                [
                    'key'   => 'allow_account_login',
                    'value' => 'yes',
                ],
                [
                    'key'   => 'comment_type_in_post',
                    'value' => 'member',
                ],
            ],
        ];

        foreach ($data as $locale => $options) {
            foreach ($options as $item) {
                $item['key'] = 'theme-' . $theme . '-' . ($locale != 'en_US' ? $locale . '-' : '') . $item['key'];

                SettingModel::create($item);
            }
        }

        $socialLinks = [
            [
                [
                    'key'   => 'social-name',
                    'value' => 'Facebook',
                ],
                [
                    'key'   => 'social-icon',
                    'value' => 'facebook',
                ],
                [
                    'key'   => 'social-url',
                    'value' => 'https://www.facebook.com/',
                ],
                [
                    'key'   => 'social-total-follow',
                    'value' => '65000',
                ],
            ],
            [
                [
                    'key'   => 'social-name',
                    'value' => 'Twitter',
                ],
                [
                    'key'   => 'social-icon',
                    'value' => 'twitter',
                ],
                [
                    'key'   => 'social-url',
                    'value' => 'https://www.twitter.com/',
                ],
                [
                    'key'   => 'social-total-follow',
                    'value' => '12000',
                ],
            ],
            [
                [
                    'key'   => 'social-name',
                    'value' => 'Instagram',
                ],
                [
                    'key'   => 'social-icon',
                    'value' => 'instagram',
                ],
                [
                    'key'   => 'social-url',
                    'value' => 'https://www.instagram.com/',
                ],
                [
                    'key'   => 'social-total-follow',
                    'value' => '678',
                ],
            ],
            [
                [
                    'key'   => 'social-name',
                    'value' => 'Linkedin',
                ],
                [
                    'key'   => 'social-icon',
                    'value' => 'linkedin',
                ],
                [
                    'key'   => 'social-url',
                    'value' => '',
                ],
                [
                    'key'   => 'social-total-follow',
                    'value' => '90',
                ],
            ],
            [
                [
                    'key'   => 'social-name',
                    'value' => 'Pinterest',
                ],
                [
                    'key'   => 'social-icon',
                    'value' => 'pinterest',
                ],
                [
                    'key'   => 'social-url',
                    'value' => 'https://www.pinterest.com/',
                ],
            ],
        ];

        SettingModel::insertOrIgnore([
            'key'   => 'theme-' . $theme . '-social_links',
            'value' => json_encode($socialLinks),
        ]);

        SettingModel::insertOrIgnore([
            'key'   => 'theme-vi-' . $theme . '-social_links',
            'value' => json_encode($socialLinks),
        ]);
    }
}
