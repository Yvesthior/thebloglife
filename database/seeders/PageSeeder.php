<?php

namespace Database\Seeders;

use Botble\Base\Models\MetaBox as MetaBoxModel;
use Botble\Base\Supports\BaseSeeder;
use Botble\Language\Models\LanguageMeta;
use Botble\Page\Models\Page;
use Botble\Slug\Models\Slug;
use Html;
use Illuminate\Support\Str;
use SlugHelper;

class PageSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'en_US' => [
                [
                    'name'     => 'Homepage',
                    'content'  =>
                        Html::tag('div', '[posts-slider title="" filter_by="featured" limit="4" include="" style="1"][/posts-slider]') .
                        Html::tag('div', '[posts-slider title="Editor\'s picked" filter_by="posts-collection" posts_collection_id="1" limit=6 style="2" description="The featured articles are selected by experienced editors. It is also based on the reader\'s rating. These posts have a lot of interest."][/posts-slider]') .
                        Html::tag('div', '[recent-posts title="Recent posts" subtitle="Latest" limit="3" background_style="background-white" show_follow_us_section="1" tab_post_limit="4" ads_location="bottom-sidebar-ads"][/recent-posts]') .
                        Html::tag('div', '[videos-posts title="Latest Videos" subtitle="In motion"][/videos-posts]') .
                        Html::tag('div', '[categories-tab-posts title="Popular" subtitle="P" limit="5" categories_ids="1,2,3,4" show_follow_us_section="1" ads_location="top-sidebar-ads"][/categories-tab-posts]') .
                        Html::tag('div', '[most-comments title="Most comments" limit="8" subtitle="M"][/most-comments]') .
                        Html::tag('div', '[posts-collection title="Recommended" subtitle="R" limit="4" posts_collection_id="2" background_style="background-white"][/posts-collection]') .
                        Html::tag('div', '[theme-galleries title="@ OUR GALLERIES" limit="7" subtitle="O"][/theme-galleries]')
                    ,
                    'template' => 'homepage',
                ],
                [
                    'name'     => 'Home 2',
                    'content'  =>
                        Html::tag('div', '[posts-slider filter_by="featured" limit="6" style="3"][/posts-slider]') .
                        Html::tag('div', '[categories-tab-posts title="Popular" subtitle="P" limit="5" categories_ids="1,2,3,4" show_follow_us_section="1" ads_location="top-sidebar-ads"][/categories-tab-posts]') .
                        Html::tag('div', '[most-comments title="Most comments" limit="8" subtitle="M"][/most-comments]') .
                        Html::tag('div', '[videos-posts title="Latest Videos" subtitle="In motion"][/videos-posts]') .
                        Html::tag('div', '[posts-slider title="Editor\'s picked" filter_by="posts-collection" posts_collection_id="1" limit=6 style="2" description="The featured articles are selected by experienced editors. It is also based on the reader\'s rating. These posts have a lot of interest."][/posts-slider]') .
                        Html::tag('div', '[recent-posts title="Recent posts" subtitle="Latest" limit="3" background_style="background-white" show_follow_us_section="1" tab_post_limit="4" ads_location="bottom-sidebar-ads"][/recent-posts]')
                    ,
                    'template' => 'homepage2',
                ],
                [
                    'name'     => 'Home 3',
                    'content'  =>
                        Html::tag('div', '[posts-slider filter_by="featured" limit="6" style="4"][/posts-slider]') .
                        Html::tag('div', '[posts-grid title="Featured Posts" subtitle="News" limit="6" order_by="views" order="desc"][/posts-grid]') .
                        Html::tag('div', '[most-comments title="Most comments" limit="8" subtitle="M"][/most-comments]') .
                        Html::tag('div', '[videos-posts title="Latest Videos" subtitle="In motion"][/videos-posts]') .
                        Html::tag('div', '[posts-slider title="Editor\'s picked" filter_by="posts-collection" posts_collection_id="1" limit=6 style="2" description="The featured articles are selected by experienced editors. It is also based on the reader\'s rating. These posts have a lot of interest."][/posts-slider]') .
                        Html::tag('div', '[recent-posts title="Recent posts" subtitle="Latest" limit="3" background_style="background-white" show_follow_us_section="1" tab_post_limit="4" ads_location="bottom-sidebar-ads"][/recent-posts]')
                    ,
                    'template' => 'homepage2',
                ],
                [
                    'name'     => 'Blog',
                    'content'  => Html::tag('div', '[posts-listing layout="list"][/posts-listing]'),
                    'template' => 'default',
                ],
                [
                    'name'     => 'Category List',
                    'content'  => Html::tag('div', '[posts-listing layout="list"][/posts-listing]'),
                    'template' => 'no-breadcrumbs',
                ],
                [
                    'name'     => 'Category grid',
                    'content'  => Html::tag('div', '[posts-listing layout="grid"][/posts-listing]'),
                    'template' => 'full',
                ],
                [
                    'name'     => 'Category metro',
                    'content'  => Html::tag('div', '[posts-listing layout="metro"][/posts-listing]'),
                    'template' => 'full',
                ],
                [
                    'name'     => 'Contact',
                    'content'  =>
                        Html::tag('div', '[contact-form title="Get in Touch"][/contact-form]') .
                        Html::tag('h3', 'Directions') .
                        Html::tag('div', '[google-map]North Link Building, 10 Admiralty Street, 757695 Singapore[/google-map]')
                    ,
                    'template' => 'default',
                ],
                [
                    'name'     => 'About Us',
                    'content'  =>
                        Html::tag('div', file_get_contents(database_path('seeders/stubs/contact.html')), ['class' => 'raw-html-embed']) .
                        Html::tag('h3', 'Address') .
                        Html::tag('div', '[google-map]North Link Building, 10 Admiralty Street, 757695 Singapore[/google-map]')
                    ,
                    'template' => 'default',
                ],
                [
                    'name'     => 'Cookie Policy',
                    'content'  => Html::tag('h3', 'EU Cookie Consent') .
                        Html::tag('p',
                            'To use this website we are using Cookies and collecting some Data. To be compliant with the EU GDPR we give you to choose if you allow us to use certain Cookies and to collect some Data.') .
                        Html::tag('h4', 'Essential Data') .
                        Html::tag('p',
                            'The Essential Data is needed to run the Site you are visiting technically. You can not deactivate them.') .
                        Html::tag('p',
                            '- Session Cookie: PHP uses a Cookie to identify user sessions. Without this Cookie the Website is not working.') .
                        Html::tag('p',
                            '- XSRF-Token Cookie: Laravel automatically generates a CSRF "token" for each active user session managed by the application. This token is used to verify that the authenticated user is the one actually making the requests to the application.'),
                    'template' => 'default',
                ],
            ],
            'vi'    => [
                [
                    'name'     => 'Trang chủ',
                    'content'  =>
                        Html::tag('div', '[posts-slider title="" filter_by="featured" limit="4" include="" style="1"][/posts-slider]') .
                        Html::tag('div', '[posts-slider title="Editor\'s picked" filter_by="posts-collection" posts_collection_id="1" limit=6 style="2" description="The featured articles are selected by experienced editors. It is also based on the reader\'s rating. These posts have a lot of interest."][/posts-slider]') .
                        Html::tag('div', '[recent-posts title="Bài viết mới" subtitle="Latest" limit="3" show_follow_us_section="1"][/recent-posts]') .
                        Html::tag('div', '[categories-tab-posts title="Bài viết được quan tâm" subtitle="P" limit="5" categories_ids="8,9,10,11" show_follow_us_section="1" ads_location="top-sidebar-ads"][/categories-tab-posts]') .
                        Html::tag('div', '[posts-grid title="Bài viết nổi bật" subtitle="News" categories="" categories_exclude="" style="2" limit="6"][/posts-grid]') .
                        Html::tag('div', '[theme-galleries title="@ OUR GALLERIES" subtitle="In motion" limit="7"][/theme-galleries]')
                    ,
                    'template' => 'homepage',
                ],
                [
                    'name'     => 'Trang chủ 2',
                    'content'  =>
                        Html::tag('div', '[posts-slider filter_by="featured" limit="6" style="3"][/posts-slider]') .
                        Html::tag('div', '[categories-tab-posts title="Popular" subtitle="P" limit="5" categories_ids="8,9,10,11" show_follow_us_section="1" ads_location="top-sidebar-ads"][/categories-tab-posts]') .
                        Html::tag('div', '[most-comments title="Most comments" limit="8" subtitle="M"][/most-comments]') .
                        Html::tag('div', '[videos-posts title="Latest Videos" subtitle="In motion"][/videos-posts]') .
                        Html::tag('div', '[posts-slider title="Editor\'s picked" filter_by="posts-collection" posts_collection_id="1" limit=6 style="2" description="The featured articles are selected by experienced editors. It is also based on the reader\'s rating. These posts have a lot of interest."][/posts-slider]') .
                        Html::tag('div', '[recent-posts title="Recent posts" subtitle="Latest" limit="3" background_style="background-white" show_follow_us_section="1" tab_post_limit="4" ads_location="bottom-sidebar-ads"][/recent-posts]')
                    ,
                    'template' => 'homepage',
                ],
                [
                    'name'     => 'Trang chủ 3',
                    'content'  =>
                        Html::tag('div', '[posts-slider filter_by="featured" limit="6" style="4"][/posts-slider]') .
                        Html::tag('div', '[posts-grid title="Featured Posts" subtitle="News" limit="6" order_by="views" order="desc"][/posts-grid]') .
                        Html::tag('div', '[most-comments title="Most comments" limit="8" subtitle="M"][/most-comments]') .
                        Html::tag('div', '[videos-posts title="Latest Videos" subtitle="In motion"][/videos-posts]') .
                        Html::tag('div', '[posts-slider title="Editor\'s picked" filter_by="posts-collection" posts_collection_id="1" limit=6 style="2" description="The featured articles are selected by experienced editors. It is also based on the reader\'s rating. These posts have a lot of interest."][/posts-slider]') .
                        Html::tag('div', '[recent-posts title="Recent posts" subtitle="Latest" limit="3" background_style="background-white" show_follow_us_section="1" tab_post_limit="4" ads_location="bottom-sidebar-ads"][/recent-posts]')
                    ,
                    'template' => 'homepage',
                ],

                [
                    'name'     => 'Tin tức',
                    'content'  => Html::tag('div', '[categories-big limit="12"][/categories-big]'),
                    'template' => 'default',
                ],
                [
                    'name'     => 'Tin tức danh sách',
                    'content'  => Html::tag('div', '[posts-listing layout="list"][/posts-listing]'),
                    'template' => 'no-breadcrumbs',
                ],
                [
                    'name'     => 'Tin tức dạng cột',
                    'content'  => Html::tag('div', '[posts-listing layout="grid"][/posts-listing]'),
                    'template' => 'full',
                ],
                [
                    'name'     => 'Tin tức metro',
                    'content'  => Html::tag('div', '[posts-listing layout="metro"][/posts-listing]'),
                    'template' => 'right-sidebar',
                ],
                [
                    'name'    => 'Liên hệ',
                    'content' =>
                        Html::tag('div', '[contact-form title="Liên hệ"][/contact-form]') .
                        Html::tag('h3', 'Địa chỉ') .
                        Html::tag('div', '[google-map]North Link Building, 10 Admiralty Street, 757695 Singapore[/google-map]')
                ],
                [
                    'name'     => 'Về chúng tôi',
                    'content'  =>
                        Html::tag('div', file_get_contents(database_path('seeders/stubs/contact-vi.html')), ['class' => 'raw-html-embed'])
                    ,
                    'template' => 'default',
                ],
                [
                    'name'     => 'Cookie Policy',
                    'content'  => Html::tag('h3', 'EU Cookie Consent') .
                        Html::tag('p',
                            'Để sử dụng trang web này, chúng tôi đang sử dụng Cookie và thu thập một số Dữ liệu. Để tuân thủ GDPR của Liên minh Châu Âu, chúng tôi cho bạn lựa chọn nếu bạn cho phép chúng tôi sử dụng một số Cookie nhất định và thu thập một số Dữ liệu.') .
                        Html::tag('h4', 'Dữ liệu cần thiết') .
                        Html::tag('p',
                            'Dữ liệu cần thiết là cần thiết để chạy Trang web bạn đang truy cập về mặt kỹ thuật. Bạn không thể hủy kích hoạt chúng.') .
                        Html::tag('p',
                            '- Session Cookie: PHP sử dụng Cookie để xác định phiên của người dùng. Nếu không có Cookie này, trang web sẽ không hoạt động.') .
                        Html::tag('p',
                            '- XSRF-Token Cookie: Laravel tự động tạo "token" CSRF cho mỗi phiên người dùng đang hoạt động do ứng dụng quản lý. Token này được sử dụng để xác minh rằng người dùng đã xác thực là người thực sự đưa ra yêu cầu đối với ứng dụng.'),
                    'template' => 'default',
                ],
            ],
        ];

        Page::truncate();
        Slug::where('reference_type', Page::class)->delete();
        MetaBoxModel::where('reference_type', Page::class)->delete();
        LanguageMeta::where('reference_type', Page::class)->delete();

        foreach ($data as $locale => $pages) {
            foreach ($pages as $index => $item) {
                $item['user_id'] = 1;
                $page = Page::create($item);

                Slug::create([
                    'reference_type' => Page::class,
                    'reference_id'   => $page->id,
                    'key'            => Str::slug($page->name),
                    'prefix'         => SlugHelper::getPrefix(Page::class),
                ]);

                $originValue = null;

                if ($locale !== 'en_US') {
                    $originValue = LanguageMeta::where([
                        'reference_id'   => $index + 1,
                        'reference_type' => Page::class,
                    ])->value('lang_meta_origin');
                }

                LanguageMeta::saveMetaData($page, $locale, $originValue);
            }
        }
    }
}
