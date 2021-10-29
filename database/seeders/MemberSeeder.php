<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Blog\Models\Post;
use Botble\Comment\Models\Comment;
use Botble\Comment\Repositories\Interfaces\CommentInterface;
use Botble\Member\Models\Member;
use Botble\Member\Models\MemberActivityLog;
use Botble\Slug\Models\Slug;
use Faker\Factory;
use Illuminate\Support\Str;
use SlugHelper;

class MemberSeeder extends BaseSeeder
{
    public function run()
    {
        $faker = Factory::create();
        $files = $this->uploadFiles('authors');

        Slug::where('reference_type', Member::class)->delete();
        Member::truncate();
        Comment::truncate();
        MemberActivityLog::truncate();

        $member = Member::create([
            'first_name'   => 'John',
            'last_name'    => 'Smith',
            'email'        => 'user@thesky9.com',
            'password'     => bcrypt('12345678'),
            'dob'          => $faker->dateTime,
            'phone'        => $faker->phoneNumber,
            'description'  => $faker->realText(100),
            'avatar_id'    => $files[$faker->numberBetween(0, 9)]['data']->id,
            'confirmed_at' => now(),
        ]);

        Slug::create([
            'reference_type' => Member::class,
            'reference_id'   => $member->id,
            'key'            => Str::slug($member->name),
            'prefix'         => 'author',
        ]);

        for ($i = 0; $i < 10; $i++) {
            $member = Member::create([
                'first_name'   => $faker->firstName,
                'last_name'    => $faker->lastName,
                'email'        => $faker->email,
                'password'     => bcrypt('12345678'),
                'dob'          => $faker->dateTime,
                'phone'        => $faker->phoneNumber,
                'description'  => $faker->realText(100),
                'avatar_id'    => $files[$faker->numberBetween(0, 9)]['data']->id,
                'confirmed_at' => now(),
            ]);

            Slug::create([
                'reference_type' => Member::class,
                'reference_id'   => $member->id,
                'key'            => Str::slug($member->name),
                'prefix'         => 'author',
            ]);
        }

        foreach (Post::get() as $post) {
            $post->author_id = $faker->numberBetween(1, 10);
            $post->author_type = Member::class;
            $post->save();
        }

        $postIds = [1, 2, 3, 21, 22, 23];
        foreach ($postIds as $postId) {
            $commentIds = [];
            for ($i = 0; $i < 8; $i++) {
                $data = [
                    'ip_address'     => $faker->ipv4(),
                    'user_id'        => $faker->numberBetween(1, 10),
                    'reference_id'   => $postId,
                    'reference_type' => Post::class,
                    'comment'        => $faker->realText(100),
                    'created_at'     => $faker->dateTimeBetween('-1 months'),
                ];
                if ($i > 5) {
                    $data['parent_id'] = $faker->randomElement($commentIds);
                    $data['created_at'] = $faker->dateTimeBetween('-15 days');
                }
                $comment = app(CommentInterface::class)->storageComment($data);
                if ($i < 5) {
                    $commentIds[] = $comment->id;
                }
            }
        }
    }
}
