<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;

class DatabaseSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->activateAllPlugins();

        $this->call(UserSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(AdsSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(GallerySeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(MemberSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(WidgetSeeder::class);
        $this->call(ThemeOptionSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(PostsCollectionsSeeder::class);
    }
}
