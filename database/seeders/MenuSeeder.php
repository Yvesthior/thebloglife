<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Blog\Models\Post;
use Botble\Language\Models\LanguageMeta;
use Botble\Menu\Models\Menu as MenuModel;
use Botble\Menu\Models\MenuLocation;
use Botble\Menu\Models\MenuNode;
use Botble\Page\Models\Page;
use Illuminate\Support\Arr;
use Menu;

class MenuSeeder extends BaseSeeder
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
                    'name'     => 'Main menu',
                    'slug'     => 'main-menu',
                    'location' => 'main-menu',
                    'items'    => [
                        [
                            'title'    => 'Home',
                            'url'      => '/',
                            'children' => [
                                [
                                    'title' => 'Home default',
                                    'url'   => '/',
                                ],
                                [
                                    'title' => 'Home 2',
                                    'url'   => '/home-2?header=style-2',
                                ],
                                [
                                    'title' => 'Home 3',
                                    'url'   => '/home-3?header=style-3',
                                ],
                            ],
                        ],
                        [
                            'title' => 'Galleries',
                            'url'   => '/galleries',
                        ],
                        [
                            'title'          => 'Category layouts',
                            'reference_id'   => 6,
                            'reference_type' => Page::class,
                            'children'       => [
                                [
                                    'title'          => 'List',
                                    'reference_id'   => 5,
                                    'reference_type' => Page::class,
                                ],
                                [
                                    'title'          => 'Grid',
                                    'reference_id'   => 6,
                                    'reference_type' => Page::class,
                                ],
                                [
                                    'title'          => 'Metro',
                                    'reference_id'   => 7,
                                    'reference_type' => Page::class,
                                ],
                            ],
                        ],
                        [
                            'title'          => 'Post layouts',
                            'reference_id'   => 1,
                            'reference_type' => Post::class,
                            'children'       => [
                                [
                                    'title'          => 'Default',
                                    'reference_id'   => 1,
                                    'reference_type' => Post::class,
                                ],
                                [
                                    'title'          => 'Full top',
                                    'reference_id'   => 2,
                                    'reference_type' => Post::class,
                                ],
                                [
                                    'title'          => 'Inline',
                                    'reference_id'   => 3,
                                    'reference_type' => Post::class,
                                ],
                            ],
                        ],
                        [
                            'title'          => 'About',
                            'reference_id'   => 9,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title'          => 'Contact',
                            'reference_id'   => 8,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title'    => 'Pages',
                            'children' => [
                                [
                                    'title'          => 'Cookie Policy',
                                    'reference_id'   => 10,
                                    'reference_type' => Page::class,
                                ],
                                [
                                    'title' => '404',
                                    'url'   => 'page-not-found',
                                ],
                                [
                                    'title' => 'Login',
                                    'url'   => '/login',
                                ],
                                [
                                    'title' => 'Signup',
                                    'url'   => '/register',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'name'  => 'Quick links',
                    'slug'  => 'quick-links',
                    'items' => [
                        [
                            'title' => 'Homepage',
                            'url'   => '/',
                        ],
                        [
                            'title'          => 'Contact',
                            'reference_id'   => 8,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title'          => 'Blog',
                            'reference_id'   => 4,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title' => 'Galleries',
                            'url'   => '/galleries',
                        ],
                    ],
                ],
            ],
            'vi'    => [
                [
                    'name'     => 'Menu chính',
                    'slug'     => 'menu-chinh',
                    'location' => 'main-menu',
                    'items'    => [
                        [
                            'title'    => 'Trang chủ',
                            'url'      => '/',
                            'children' => [
                                [
                                    'title' => 'Trang chủ mặc định',
                                    'url'   => '/',
                                ],
                                [
                                    'title' => 'Trang chủ 2',
                                    'url'   => '/trang-chu-2?header=style-2',
                                ],
                                [
                                    'title' => 'Trang chủ 3',
                                    'url'   => '/trang-chu-3?header=style-3',
                                ],
                            ],
                        ],
                        [
                            'title' => 'Thư viện ảnh',
                            'url'   => '/galleries',
                        ],
                        [
                            'title'          => 'Danh mục',
                            'reference_id'   => 16,
                            'reference_type' => Page::class,
                            'children'       => [
                                [
                                    'title'          => 'Style cột',
                                    'reference_id'   => 15,
                                    'reference_type' => Page::class,
                                ],
                                [
                                    'title'          => 'Style danh sách',
                                    'reference_id'   => 16,
                                    'reference_type' => Page::class,
                                ],
                                [
                                    'title'          => 'Style danh sách 2',
                                    'reference_id'   => 17,
                                    'reference_type' => Page::class,
                                ],
                            ],
                        ],
                        [
                            'title'          => 'Bài viết',
                            'reference_id'   => 21,
                            'reference_type' => Post::class,
                            'children'       => [
                                [
                                    'title'          => 'Default',
                                    'reference_id'   => 21,
                                    'reference_type' => Post::class,
                                ],
                                [
                                    'title'          => 'Full top',
                                    'reference_id'   => 22,
                                    'reference_type' => Post::class,
                                ],
                                [
                                    'title'          => 'Inline',
                                    'reference_id'   => 23,
                                    'reference_type' => Post::class,
                                ],
                            ],
                        ],
                        [
                            'title'          => 'Liên hệ',
                            'reference_id'   => 18,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title'          => 'Về chúng tôi',
                            'reference_id'   => 19,
                            'reference_type' => Page::class,
                        ],
                    ],
                ],
                [
                    'name'  => 'Liên kết',
                    'slug'  => 'lien-ket',
                    'items' => [
                        [
                            'title' => 'Trang chủ',
                            'url'   => '/',
                        ],
                        [
                            'title'          => 'Liên hệ',
                            'reference_id'   => 19,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title'          => 'Tin tức',
                            'reference_id'   => 14,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title' => 'Thư viện ảnh',
                            'url'   => '/galleries',
                        ],
                    ],
                ],
            ],
        ];

        MenuModel::truncate();
        MenuLocation::truncate();
        MenuNode::truncate();
        LanguageMeta::where('reference_type', MenuModel::class)->delete();
        LanguageMeta::where('reference_type', MenuLocation::class)->delete();

        foreach ($data as $locale => $menus) {
            foreach ($menus as $index => $item) {
                $menu = MenuModel::create(Arr::except($item, ['items', 'location']));

                if (isset($item['location'])) {
                    $menuLocation = MenuLocation::create([
                        'menu_id'  => $menu->id,
                        'location' => $item['location'],
                    ]);

                    $originValue = LanguageMeta::where([
                        'reference_id'   => $locale == 'en_US' ? 1 : 2,
                        'reference_type' => MenuLocation::class,
                    ])->value('lang_meta_origin');

                    LanguageMeta::saveMetaData($menuLocation, $locale, $originValue);
                }

                foreach ($item['items'] as $menuNode) {
                    $this->createMenuNode($index, $menuNode, $locale, $menu->id);
                }

                $originValue = null;

                if ($locale !== 'en_US') {
                    $originValue = LanguageMeta::where([
                        'reference_id'   => $index + 1,
                        'reference_type' => MenuModel::class,
                    ])->value('lang_meta_origin');
                }

                LanguageMeta::saveMetaData($menu, $locale, $originValue);
            }
        }

        Menu::clearCacheMenuItems();
    }

    /**
     * @param int $index
     * @param array $menuNode
     * @param string $locale
     * @param int $menuId
     * @param int $parentId
     */
    protected function createMenuNode(int $index, array $menuNode, string $locale, int $menuId, int $parentId = 0): void
    {
        $menuNode['menu_id'] = $locale == 'en_US' ? $index + 1 : $index + 3;
        $menuNode['parent_id'] = $parentId;

        if (Arr::has($menuNode, 'children')) {
            $children = $menuNode['children'];
            $menuNode['has_child'] = true;

            unset($menuNode['children']);
        } else {
            $children = [];
            $menuNode['has_child'] = false;
        }

        $createdNode = MenuNode::create($menuNode);

        if ($children) {
            foreach ($children as $child) {
                $this->createMenuNode($index, $child, $locale, $menuId, $createdNode->id);
            }
        }
    }
}
