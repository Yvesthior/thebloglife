<?php

namespace Database\Seeders;

use Botble\Ads\Models\Ads;
use Botble\Base\Supports\BaseSeeder;
use Str;

class AdsSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->uploadFiles('banners');

        Ads::truncate();

        $data = [
            [
                'name'       => 'Header ads',
                'expired_at' => now()->addYear()->toDateString(),
                'location'   => 'header-ads',
                'key'        => strtoupper(Str::random(10)),
                'url'        => 'https://thesky9.com/',
                'image'      => 'banners/image-3.jpg',
                'order'      => 1,
                'status'     => 'published',
            ],
            [
                'name'       => 'Panel ads',
                'expired_at' => now()->addYear()->toDateString(),
                'location'   => 'panel-ads',
                'key'        => strtoupper(Str::random(10)),
                'url'        => 'https://thesky9.com/',
                'image'      => 'banners/image-3.jpg',
                'order'      => 1,
                'status'     => 'published',
            ],
            [
                'name'       => 'Top sidebar ads',
                'expired_at' => now()->addYear()->toDateString(),
                'location'   => 'top-sidebar-ads',
                'key'        => strtoupper(Str::random(10)),
                'url'        => 'https://thesky9.com/',
                'image'      => 'banners/image-1.jpg',
                'order'      => 2,
                'status'     => 'published',
            ],
            [
                'name'       => 'Bottom sidebar ads',
                'expired_at' => now()->addYear()->toDateString(),
                'location'   => 'bottom-sidebar-ads',
                'key'        => strtoupper(Str::random(10)),
                'url'        => 'https://thesky9.com/',
                'image'      => 'banners/image-2.jpg',
                'order'      => 3,
                'status'     => 'published',
            ],
            [
                'name'       => 'Custom ads 1',
                'expired_at' => now()->addYear()->toDateString(),
                'location'   => 'custom-1',
                'key'        => strtoupper(Str::random(10)),
                'url'        => 'https://thesky9.com/',
                'image'      => 'banners/image-4.jpg',
                'order'      => 4,
                'status'     => 'published',
            ],
        ];

        foreach ($data as $item) {
            Ads::create($item);
        }
    }
}
