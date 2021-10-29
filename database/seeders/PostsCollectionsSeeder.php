<?php

namespace Database\Seeders;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\MetaBox as MetaBoxModel;
use Botble\Base\Supports\BaseSeeder;
use Botble\Language\Models\LanguageMeta;
use Botble\Page\Models\Page;
use Botble\PostCollection\Models\PostCollection;
use Botble\Slug\Models\Slug;
use Illuminate\Support\Str;
use SlugHelper;

class PostsCollectionsSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostCollection::truncate();
        Slug::where('reference_type', PostCollection::class)->delete();
        MetaBoxModel::where('reference_type', PostCollection::class)->delete();
        LanguageMeta::where('reference_type', PostCollection::class)->delete();

        $data = [
            'en_US' => [
                [
                    'name'    => "Editor's Picked",
                    'postIds' => [12, 3, 5, 1, 7, 9],
                ],
                [
                    'name'    => 'Recommended Posts',
                    'postIds' => [15, 4, 2, 1, 10],
                ],
            ],
            'vi'    => [
                [
                    'name'    => 'Bài viết hay',
                    'postIds' => [20, 19, 21, 31, 32],
                ],
                [
                    'name'    => 'Recommended Posts',
                    'postIds' => [22, 24, 25, 29, 30],
                ],
            ],
        ];

        foreach ($data as $locale => $postCollectionNames) {
            foreach ($postCollectionNames as $index => $item) {
                $postCollection = PostCollection::create([
                    'name'   => $item['name'],
                    'status' => BaseStatusEnum::PUBLISHED,
                ]);

                $postCollection->posts()->attach($item['postIds']);

                Slug::create([
                    'reference_type' => Page::class,
                    'reference_id'   => $postCollection->id,
                    'key'            => Str::slug($postCollection->name),
                    'prefix'         => SlugHelper::getPrefix(Page::class),
                ]);

                $originValue = null;

                if ($locale !== 'en_US') {
                    $originValue = LanguageMeta::where([
                        'reference_id'   => $index + 1,
                        'reference_type' => Page::class,
                    ])->value('lang_meta_origin');
                }

                LanguageMeta::saveMetaData($postCollection, $locale, $originValue);
            }
        }
    }
}
