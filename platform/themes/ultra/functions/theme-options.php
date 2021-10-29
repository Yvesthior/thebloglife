<?php

app()->booted(function () {
    theme_option()
        ->setField([
            'id'         => 'logo_mobile',
            'section_id' => 'opt-text-subsection-logo',
            'type'       => 'mediaImage',
            'label'      => 'Logo mobile',
            'attributes' => [
                'name'    => 'logo_mobile',
                'value'   => null,
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id'         => 'logo_tablet',
            'section_id' => 'opt-text-subsection-logo',
            'type'       => 'mediaImage',
            'label'      => 'Logo tablet',
            'attributes' => [
                'name'    => 'logo_tablet',
                'value'   => null,
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id'         => 'logo_white',
            'section_id' => 'opt-text-subsection-logo',
            'type'       => 'mediaImage',
            'label'      => 'Logo white',
            'attributes' => [
                'name'    => 'logo_white',
                'value'   => null,
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id'         => 'img_loading',
            'section_id' => 'opt-text-subsection-logo',
            'type'       => 'mediaImage',
            'label'      => 'Image Loading',
            'attributes' => [
                'name'    => 'img_loading',
                'value'   => null,
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id'         => 'single_layout',
            'section_id' => 'opt-text-subsection-blog',
            'type'       => 'select',
            'label'      => __('Single Layout'),
            'attributes' => [
                'name'    => 'single_layout',
                'list'    => ['' => trans('plugins/blog::base.select')] + get_single_layout(),
                'value'   => '',
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id'         => 'copyright',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'text',
            'label'      => __('Copyright'),
            'attributes' => [
                'name'    => 'copyright',
                'value'   => '©2021 UltraNews - Theme for magazine/news site.',
                'options' => [
                    'class'        => 'form-control',
                    'placeholder'  => __('Change copyright'),
                    'data-counter' => 250,
                ],
            ],
            'helper'     => __('Copyright on footer of site'),
        ])
        ->setField([
            'id'         => 'designed_by',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'text',
            'label'      => __('Designed by'),
            'attributes' => [
                'name'    => 'designed_by',
                'value'   => '',
                'options' => [
                    'class'        => 'form-control',
                    'data-counter' => 250,
                ],
            ],
        ])
        ->setField([
            'id'         => 'preloader_enabled',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'select',
            'label'      => __('Enable Preloader?'),
            'attributes' => [
                'name'    => 'preloader_enabled',
                'list'    => [
                    'no'  => trans('core/base::base.no'),
                    'yes' => trans('core/base::base.yes'),
                ],
                'value'   => 'yes',
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id'         => 'allow_account_login',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'select',
            'label'      => __('Allow user login?'),
            'attributes' => [
                'name'    => 'allow_account_login',
                'list'    => [
                    'no'  => trans('core/base::base.no'),
                    'yes' => trans('core/base::base.yes'),
                ],
                'value'   => 'yes',
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id'         => 'site_description',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'textarea',
            'label'      => __('Site description'),
            'attributes' => [
                'name'    => 'site_description',
                'value'   => null,
                'options' => [
                    'class'        => 'form-control',
                    'data-counter' => 255,
                ],
            ],
        ])
        ->setField([
            'id'         => 'address',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'text',
            'label'      => __('Address'),
            'attributes' => [
                'name'    => 'address',
                'value'   => null,
                'options' => [
                    'class'        => 'form-control',
                    'data-counter' => 255,
                ],
            ],
        ])
        ->setField([
            'id'         => 'phone',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'text',
            'label'      => __('Phone'),
            'attributes' => [
                'name'    => 'phone',
                'value'   => null,
                'options' => [
                    'class'        => 'form-control',
                    'data-counter' => 255,
                ],
            ],
        ])
        ->setField([
            'id'         => 'email',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'text',
            'label'      => __('Email'),
            'attributes' => [
                'name'    => 'email',
                'value'   => null,
                'options' => [
                    'class'        => 'form-control',
                    'data-counter' => 255,
                ],
            ],
        ])
        ->setSection([
            'title'      => __('Style'),
            'desc'       => __('Style of page'),
            'id'         => 'opt-text-subsection-style',
            'subsection' => true,
            'icon'       => 'fa fa-bars',
        ])
        ->setField([
            'id'         => 'font_heading',
            'section_id' => 'opt-text-subsection-style',
            'type'       => 'googleFonts',
            'label'      => __('Font heading'),
            'attributes' => [
                'name'  => 'font_heading',
                'value' => 'Poppins',
            ],
        ])
        ->setField([
            'id'         => 'font_body',
            'section_id' => 'opt-text-subsection-style',
            'type'       => 'googleFonts',
            'label'      => __('Font body'),
            'attributes' => [
                'name'  => 'font_body',
                'value' => 'Source Sans Pro',
            ],
        ])
        ->setField([
            'id'         => 'color_primary',
            'section_id' => 'opt-text-subsection-style',
            'type'       => 'customColor',
            'label'      => __('Primary color'),
            'attributes' => [
                'name'  => 'color_primary',
                'value' => '#87c6e3',
            ],
        ])
        ->setField([
            'id'         => 'color_secondary',
            'section_id' => 'opt-text-subsection-style',
            'type'       => 'customColor',
            'label'      => __('Secondary color'),
            'attributes' => [
                'name'  => 'color_secondary',
                'value' => '#455265',
            ],
        ])
        ->setField([
            'id'         => 'color_success',
            'section_id' => 'opt-text-subsection-style',
            'type'       => 'customColor',
            'label'      => __('Success color'),
            'attributes' => [
                'name'  => 'color_success',
                'value' => '#76e1c6',
            ],
        ])
        ->setField([
            'id'         => 'color_danger',
            'section_id' => 'opt-text-subsection-style',
            'type'       => 'customColor',
            'label'      => __('Danger color'),
            'attributes' => [
                'name'  => 'color_danger',
                'value' => '#f0a9a9',
            ],
        ])
        ->setField([
            'id'         => 'color_warning',
            'section_id' => 'opt-text-subsection-style',
            'type'       => 'customColor',
            'label'      => __('Warning color'),
            'attributes' => [
                'name'  => 'color_warning',
                'value' => '#e6bf7e',
            ],
        ])
        ->setField([
            'id'         => 'color_info',
            'section_id' => 'opt-text-subsection-style',
            'type'       => 'customColor',
            'label'      => __('Info color'),
            'attributes' => [
                'name'  => 'color_info',
                'value' => '#58c1c8',
            ],
        ])
        ->setField([
            'id'         => 'color_light',
            'section_id' => 'opt-text-subsection-style',
            'type'       => 'customColor',
            'label'      => __('Light color'),
            'attributes' => [
                'name'  => 'color_light',
                'value' => '#F3F3F3',
            ],
        ])
        ->setField([
            'id'         => 'color_dark',
            'section_id' => 'opt-text-subsection-style',
            'type'       => 'customColor',
            'label'      => __('Dark color'),
            'attributes' => [
                'name'  => 'color_dark',
                'value' => '#111111',
            ],
        ])
        ->setField([
            'id'         => 'color_link',
            'section_id' => 'opt-text-subsection-style',
            'type'       => 'customColor',
            'label'      => __('Link color'),
            'attributes' => [
                'name'  => 'color_link',
                'value' => '#222831',
            ],
        ])
        ->setField([
            'id'         => 'color_white',
            'section_id' => 'opt-text-subsection-style',
            'type'       => 'customColor',
            'label'      => __('White color'),
            'attributes' => [
                'name'  => 'color_white',
                'value' => '#FFFFFF',
            ],
        ])
        ->setSection([
            'title'      => __('Social links'),
            'desc'       => __('Social links'),
            'id'         => 'opt-text-subsection-social-links',
            'subsection' => true,
            'icon'       => 'fa fa-share-alt',
        ])
        ->setField([
            'id'         => 'social_links',
            'section_id' => 'opt-text-subsection-social-links',
            'type'       => 'repeater',
            'label'      => __('Social links'),
            'attributes' => [
                'name'   => 'social_links',
                'value'  => null,
                'fields' => [
                    [
                        'type'       => 'text',
                        'label'      => __('Name'),
                        'attributes' => [
                            'name'    => 'social-name',
                            'value'   => null,
                            'options' => [
                                'class' => 'form-control',
                            ],
                        ],
                    ],
                    [
                        'type'       => 'text',
                        'label'      => __('Icon'),
                        'attributes' => [
                            'name'    => 'social-icon',
                            'value'   => null,
                            'options' => [
                                'class' => 'form-control',
                            ],
                        ],
                    ],
                    [
                        'type'       => 'text',
                        'label'      => __('URL'),
                        'attributes' => [
                            'name'    => 'social-url',
                            'value'   => null,
                            'options' => [
                                'class' => 'form-control',
                            ],
                        ],
                    ],
                    [
                        'type'       => 'text',
                        'label'      => __('Total follow'),
                        'attributes' => [
                            'name'    => 'social-total-follow',
                            'value'   => null,
                            'options' => [
                                'class' => 'form-control',
                            ],
                        ],
                    ],
                ],
            ],
        ])
        ->setField([
            'id'         => 'facebook_chat_enabled',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'select',
            'label'      => __('Enable Facebook chat?'),
            'attributes' => [
                'name'    => 'facebook_chat_enabled',
                'list'    => [
                    'no'  => trans('core/base::base.no'),
                    'yes' => trans('core/base::base.yes'),
                ],
                'value'   => 'no',
                'options' => [
                    'class' => 'form-control',
                ],
            ],
            'helper'     => __('To show chat box on that website, please go to :link and add :domain to whitelist domains!',
                [
                    'domain' => Html::link(url('')),
                    'link'   => Html::link('https://www.facebook.com/' . theme_option('facebook_page_id') . '/settings/?tab=messenger_platform'),
                ]),
        ])
        ->setField([
            'id'         => 'facebook_page_id',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'text',
            'label'      => __('Facebook page ID'),
            'attributes' => [
                'name'    => 'facebook_page_id',
                'value'   => null,
                'options' => [
                    'class' => 'form-control',
                ],
            ],
            'helper'     => __('You can get fan page ID using this site :link',
                ['link' => Html::link('https://findmyfbid.com') . ' or ' . Html::link('https://findidfb.com/')]),
        ])
        ->setField([
            'id'         => 'comment_type_in_post',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'select',
            'label'      => __('Enable Comment in post detail page?'),
            'attributes' => [
                'name'    => 'comment_type_in_post',
                'list'    => [
                    'no'       => trans('core/base::base.no'),
                    'facebook' => 'Via Facebook',
                    'member'   => 'Via Member login',
                ],
                'value'   => 'yes',
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id'         => 'header_style',
            'section_id' => 'opt-text-subsection-page',
            'type'       => 'select',
            'label'      => __('Header style'),
            'attributes' => [
                'name'    => 'header_style',
                'list'    => [
                    'style-1' => 'Style 1',
                    'style-2' => 'Style 2',
                    'style-3' => 'Style 3',
                ],
                'value'   => 'style-1',
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id'         => 'posts_layout',
            'section_id' => 'opt-text-subsection-blog',
            'type'       => 'select',
            'label'      => __('Post list Layout'),
            'attributes' => [
                'name'    => 'posts_layout',
                'list'    => [
                    'list'  => 'List',
                    'grid'  => 'Grid',
                    'metro' => 'Metro',
                ],
                'value'   => 'list',
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id'         => 'preloader_enabled',
            'section_id' => 'opt-text-subsection-general',
            'type'       => 'select',
            'label'      => __('Enable Preloader?'),
            'attributes' => [
                'name'    => 'preloader_enabled',
                'list'    => [
                    'no'  => trans('core/base::base.no'),
                    'yes' => trans('core/base::base.yes'),
                ],
                'value'   => 'no',
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id'         => 'post_date_format',
            'section_id' => 'opt-text-subsection-blog',
            'type'       => 'text',
            'label'      => __('Post date format') . ' (Reference the formats at https://docs.oracle.com/cd/E41183_01/DR/Date_Format_Types.html)',
            'attributes' => [
                'name'    => 'post_date_format',
                'value'   => 'd M, Y',
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id'         => 'post_date_short_format',
            'section_id' => 'opt-text-subsection-blog',
            'type'       => 'text',
            'label'      => __('Post date short format'),
            'attributes' => [
                'name'    => 'post_date_short_format',
                'value'   => 'M d',
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id'         => 'enable_show_post_author_detail',
            'section_id' => 'opt-text-subsection-blog',
            'type'       => 'select',
            'label'      => __('Show author description in post detail'),
            'attributes' => [
                'name'    => 'enable_show_post_author_detail',
                'list'    => [
                    'no'  => trans('core/base::base.no'),
                    'yes' => trans('core/base::base.yes'),
                ],
                'value'   => 'yes',
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ]);

    add_filter(THEME_FRONT_HEADER, function ($html) {
        if (theme_option('facebook_app_id')) {
            $html .= Html::meta(null, theme_option('facebook_app_id'), ['property' => 'fb:app_id'])->toHtml();
        }

        if (theme_option('facebook_admins')) {
            foreach (json_decode(theme_option('facebook_admins'), true) as $facebookAdminId) {
                if (Arr::get($facebookAdminId, '0.value')) {
                    $html .= Html::meta(null, Arr::get($facebookAdminId, '0.value'), ['property' => 'fb:admins'])
                        ->toHtml();
                }
            }
        }

        return $html;
    }, 1180);

    add_filter(THEME_FRONT_FOOTER, function ($html) {
        return $html . Theme::partial('facebook-integration');
    }, 1180);
});
