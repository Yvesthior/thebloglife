<?php

namespace Database\Seeders;

use Botble\ACL\Models\User;
use Botble\Base\Models\MetaBox as MetaBoxModel;
use Botble\Base\Supports\BaseSeeder;
use Botble\Blog\Models\Category;
use Botble\Blog\Models\Post;
use Botble\Blog\Models\Tag;
use Botble\Language\Models\LanguageMeta;
use Botble\Slug\Models\Slug;
use Faker\Factory;
use Html;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use MetaBox;
use RvMedia;
use SlugHelper;

class BlogSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->uploadFiles('news');
        $this->uploadFiles('videos');

        Post::truncate();
        Category::truncate();
        Tag::truncate();
        Slug::where('reference_type', Post::class)->delete();
        Slug::where('reference_type', Tag::class)->delete();
        Slug::where('reference_type', Category::class)->delete();
        MetaBoxModel::where('reference_type', Post::class)->delete();
        MetaBoxModel::where('reference_type', Tag::class)->delete();
        MetaBoxModel::where('reference_type', Category::class)->delete();
        LanguageMeta::where('reference_type', Post::class)->delete();
        LanguageMeta::where('reference_type', Tag::class)->delete();
        LanguageMeta::where('reference_type', Category::class)->delete();

        $faker = Factory::create();

        $categoriesData = [
            'en_US' => [
                [
                    'name'       => 'Design',
                    'is_default' => true,
                ],
                [
                    'name' => 'Lifestyle',
                ],
                [
                    'name'      => 'Travel Tips',
                    'parent_id' => 2,
                ],
                [
                    'name' => 'Healthy',
                ],
                [
                    'name'      => 'Fashion',
                    'parent_id' => 4,
                ],
                [
                    'name' => 'Hotel',
                ],
                [
                    'name'      => 'Nature',
                    'parent_id' => 6,
                ],
            ],
            'vi'    => [
                [
                    'name'       => 'Phong c??ch s???ng',
                    'is_default' => true,
                ],
                [
                    'name' => 'S???c kh???e',
                ],
                [
                    'name'      => 'M??n ngon',
                    'parent_id' => 9,
                ],
                [
                    'name' => 'S??ch',
                ],
                [
                    'name'      => 'M???o du l???ch',
                    'parent_id' => 11,
                ],
                [
                    'name' => 'Kh??ch s???n',
                ],
                [
                    'name'      => 'Thi??n nhi??n',
                    'parent_id' => 13,
                ],
            ],
        ];

        foreach ($categoriesData as $locale => $categories) {
            foreach ($categories as $index => $item) {
                $category = $this->createCategory(Arr::except($item, 'children'), $locale, $index, 0, $index != 0);

                if (isset($item['children']) && !empty($item['children'])) {
                    foreach ($item['children'] as $childIndex => $child) {
                        $this->createCategory($child, $locale, $index + $childIndex, $category->id);
                    }
                }
            }
        }

        $tagsData = [
            'en_US' => [
                [
                    'name' => 'General',
                ],
                [
                    'name' => 'Beauty',
                ],
                [
                    'name' => 'Fashion',
                ],
                [
                    'name' => 'Lifestyle',
                ],
                [
                    'name' => 'Travel',
                ],
                [
                    'name' => 'Business',
                ],
                [
                    'name' => 'Health',
                ],
            ],
            'vi'    => [
                [
                    'name' => 'Chung',
                ],
                [
                    'name' => 'L??m ?????p',
                ],
                [
                    'name' => 'Th???i trang',
                ],
                [
                    'name' => 'Du l???ch v?? ???m th???c',
                ],
                [
                    'name' => 'Kinh doanh',
                ],
                [
                    'name' => 'S???c kh???e',
                ],
                [
                    'name' => 'Th???i s???',
                ],
            ],
        ];

        foreach ($tagsData as $locale => $tags) {
            foreach ($tags as $index => $item) {
                $item['author_id'] = 1;
                $item['author_type'] = User::class;
                $tag = Tag::create($item);

                Slug::create([
                    'reference_type' => Tag::class,
                    'reference_id'   => $tag->id,
                    'key'            => Str::slug($tag->name),
                    'prefix'         => SlugHelper::getPrefix(Tag::class),
                ]);

                $originValue = null;

                if ($locale !== 'en_US') {
                    $originValue = LanguageMeta::where([
                        'reference_id'   => $index + 1,
                        'reference_type' => Tag::class,
                    ])->value('lang_meta_origin');
                }

                LanguageMeta::saveMetaData($tag, $locale, $originValue);
            }
        }

        $postsData = [
            'en_US' => [
                [
                    'name'   => 'This Year Enjoy the Color of Festival with Amazing Holi Gifts Ideas',
                    'layout' => 'default',
                ],
                [
                    'name'   => 'The World Caters to Average People and Mediocre Lifestyles',
                    'layout' => 'top-full',
                ],
                [
                    'name'   => 'Not a bit of hesitation, you better think twice',
                    'layout' => 'inline',
                ],
                [
                    'name'        => 'We got a right to pick a little fight, Bonanza',
                    'format_type' => 'video',
                    'video_link'  => 'https://player.vimeo.com/video/289366685?h=b6b9d1e67b&title=0&byline=0&portrait=0',
                ],
                [
                    'name'            => 'My entrance exam was on a book of matches',
                    'format_type'     => 'video',
                    'video_upload_id' => 'videos/video1.mp4',
                ],
                [
                    'name' => 'Essential Qualities of Highly Successful Music',
                ],
                [
                    'name' => 'Why Teamwork Really Makes The Dream Work',
                ],
                [
                    'name'        => '9 Things I Love About Shaving My Head During Quarantine',
                    'format_type' => 'video',
                    'video_link'  => 'https://player.vimeo.com/video/559851845?h=afc6d413c9',
                ],
                [
                    'name' => 'The litigants on the screen are not actors',
                ],
                [
                    'name' => 'Imagine Losing 20 Pounds In 14 Days!',
                ],
                [
                    'name' => 'Are You Still Using That Slow, Old Typewriter?',
                ],
                [
                    'name' => 'A Skin Cream That???s Proven To Work',
                ],
                [
                    'name' => '10 Reasons To Start Your Own, Profitable Website!',
                ],
                [
                    'name'        => 'Level up your live streams with automated captions and more',
                    'format_type' => 'video',
                    'video_link'  => 'https://player.vimeo.com/video/580799106?h=a8eb717af9',
                ],
                [
                    'name' => 'Simple Ways To Reduce Your Unwanted Wrinkles!',
                ],
                [
                    'name' => 'Apple iMac with Retina 5K display review',
                ],
                [
                    'name' => '10,000 Web Site Visitors In One Month:Guaranteed',
                ],
                [
                    'name' => 'Unlock The Secrets Of Selling High Ticket Items',
                ],
                [
                    'name' => '4 Expert Tips On How To Choose The Right Men???s Wallet',
                ],
                [
                    'name' => 'Sexy Clutches: How to Buy & Wear a Designer Clutch Bag',
                ],
            ],
            'vi'    => [
                [
                    'name'   => 'Xu h?????ng t??i x??ch h??ng ?????u n??m 2020 c???n bi???t',
                    'layout' => 'default',
                ],
                [
                    'name'   => 'C??c Chi???n l?????c T???i ??u h??a C??ng c??? T??m ki???m H??ng ?????u!',
                    'layout' => 'top-full',
                ],
                [
                    'name'   => 'B???n s??? ch???n c??ng ty n??o?',
                    'layout' => 'inline',
                ],
                [
                    'name' => 'L??? ra c??c th??? ??o???n b??n h??ng c???a ?????i l?? ?? t?? ???? qua s??? d???ng',
                ],
                [
                    'name' => '20 C??ch B??n S???n ph???m Nhanh h??n',
                ],
                [
                    'name' => 'B?? m???t c???a nh???ng nh?? v??n gi??u c?? v?? n???i ti???ng',
                ],
                [
                    'name' => 'H??y t?????ng t?????ng b???n gi???m 20 b???ng Anh trong 14 ng??y!',
                ],
                [
                    'name' => 'B???n v???n ??ang s??? d???ng m??y ????nh ch??? c??, ch???m ?????',
                ],
                [
                    'name' => 'M???t lo???i kem d?????ng da ???? ???????c ch???ng minh hi???u qu???',
                ],
                [
                    'name' => '10 L?? do ????? B???t ?????u Trang web C?? L???i nhu???n c???a Ri??ng B???n!',
                ],
                [
                    'name' => 'Nh???ng c??ch ????n gi???n ????? gi???m n???p nh??n kh??ng mong mu???n c???a b???n!',
                ],
                [
                    'name' => '????nh gi?? Apple iMac v???i m??n h??nh Retina 5K',
                ],
                [
                    'name' => '10.000 Kh??ch truy c???p Trang Web Trong M???t Th??ng: ???????c ?????m b???o',
                ],
                [
                    'name' => 'M??? kh??a B?? m???t B??n ???????c v?? Cao',
                ],
                [
                    'name' => '4 L???i khuy??n c???a Chuy??n gia v??? C??ch Ch???n V?? Nam Ph?? h???p',
                ],
                [
                    'name' => 'Sexy Clutches: C??ch Mua & ??eo T??i Clutch Thi???t k???',
                ],
            ],
        ];

        foreach ($postsData as $locale => $posts) {
            if ($locale == 'en_US') {
                $arrNumbers = [1, 2, 3, 4, 5, 6];
            } else {
                $arrNumbers = [7, 8, 9, 10, 11, 12];
            }

            foreach ($posts as $index => $itemData) {
                $item = [
                    'name'        => $itemData['name'],
                    'author_id'   => 1,
                    'author_type' => User::class,
                    'views'       => $faker->numberBetween(100, 2500),
                    'is_featured' => rand(0, 1),
                    'image'       => 'news/news-' . ($index + 1) . '.jpg',
                    'description' => $faker->text(),
                    'format_type' => isset($itemData['format_type']) ? $itemData['format_type'] : ($index % 3 == 0 ? 'video' : 'default'),
                ];
                if ($item['format_type'] != 'video') {
                    $item['content'] =
                        ($index % 3 == 0 ? Html::tag('p',
                            '[youtube-video]https://www.youtube.com/watch?v=SlPhMPnQ58k[/youtube-video]') : '') .
                        Html::tag('h2', $faker->realText(30)) .
                        Html::tag('p', $faker->realText(1000)) .
                        Html::tag('p',
                            Html::image(RvMedia::getImageUrl('news/news-' . $faker->numberBetween(1, 7) . '.jpg',
                                'medium_large'))
                                ->toHtml(), ['class' => 'text-center']) .
                        Html::tag('p', $faker->realText(500)) .
                        Html::tag('h2', $faker->realText(30)) .
                        Html::tag('p',
                            Html::image(RvMedia::getImageUrl('news/news-' . $faker->numberBetween(8, 15) . '.jpg',
                                'medium_large'))
                                ->toHtml(), ['class' => 'text-center']) .
                        Html::tag('p', $faker->realText(1000)) .
                        Html::tag('h2', $faker->realText(30)) .
                        Html::tag('h3', $faker->realText(30)) .
                        Html::tag('p', $faker->realText(500)) .
                        Html::tag('h3', $faker->realText(30)) .
                        Html::tag('p', $faker->realText(500)) .
                        Html::tag('h3', $faker->realText(30)) .
                        Html::tag('p', $faker->realText(500)) .
                        Html::tag('h3', $faker->realText(30)) .
                        Html::tag('p', $faker->realText(500)) .
                        Html::tag('h2', $faker->realText(30)) .
                        Html::tag('p',
                            Html::image(RvMedia::getImageUrl('news/news-' . $faker->numberBetween(15, 20) . '.jpg',
                                'medium_large'))
                                ->toHtml(), ['class' => 'text-center']) .
                        Html::tag('p', $faker->realText(500));

                }

                $post = Post::create($item);
                if (!empty($itemData['layout'])) {
                    MetaBox::saveMetaBoxData($post, 'layout', $itemData['layout']);
                }

                if (!empty($itemData['video_link'])) {
                    MetaBox::saveMetaBoxData($post, 'video_link', $itemData['video_link']);
                }

                if (!empty($itemData['video_embed_code'])) {
                    MetaBox::saveMetaBoxData($post, 'video_embed_code', $itemData['video_embed_code']);
                }

                if (!empty($itemData['video_upload_id'])) {
                    MetaBox::saveMetaBoxData($post, 'video_upload_id', $itemData['video_upload_id']);
                }

                MetaBox::saveMetaBoxData($post, 'time_to_read',rand(1, 20));

                MetaBox::saveMetaBoxData($post, 'comment_status', 1);

                shuffle($arrNumbers);

                $post->categories()->sync($faker->randomElements($arrNumbers, $faker->numberBetween(2,5)));

                $post->tags()->sync($locale == 'en_US' ? [1, 2, 3, 4, 5, 6, 7] : [8, 9, 10, 11, 12, 13, 14]);

                Slug::create([
                    'reference_type' => Post::class,
                    'reference_id'   => $post->id,
                    'key'            => Str::slug($post->name),
                    'prefix'         => SlugHelper::getPrefix(Post::class),
                ]);

                $originValue = null;

                if ($locale !== 'en_US') {
                    $originValue = LanguageMeta::where([
                        'reference_id'   => $index + 1,
                        'reference_type' => Post::class,
                    ])->value('lang_meta_origin');
                }

                LanguageMeta::saveMetaData($post, $locale, $originValue);
            }
        }
    }

    /**
     * @param array $item
     * @param string $locale
     * @param int $index
     * @param int $parentId
     * @param bool $isFeatured
     * @return
     */
    protected function createCategory(
        array $item,
        string $locale,
        int $index,
        int $parentId = 0,
        bool $isFeatured = false
    ) {
        $faker = Factory::create();

        $item['description'] = $faker->text();
        $item['author_id'] = 1;
        $item['parent_id'] = $parentId;
        $item['is_featured'] = $isFeatured;

        $category = Category::create($item);

        MetaBox::saveMetaBoxData($category, 'image', 'news/thumb-' . ($index + 1) . '.jpg');

        Slug::create([
            'reference_type' => Category::class,
            'reference_id'   => $category->id,
            'key'            => Str::slug($category->name),
            'prefix'         => SlugHelper::getPrefix(Category::class),
        ]);

        $originValue = null;

        if ($locale !== 'en_US') {
            $originValue = LanguageMeta::where([
                'reference_id'   => $index + 1,
                'reference_type' => Category::class,
            ])->value('lang_meta_origin');
        }

        LanguageMeta::saveMetaData($category, $locale, $originValue);

        return $category;
    }
}
