<?php

namespace Theme\UltraNews\Http\Controllers;

use Auth;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Blog\Repositories\Interfaces\PostInterface;
use Botble\Member\Models\Member;
use Botble\Member\Repositories\Interfaces\MemberInterface;
use Botble\SeoHelper\SeoOpenGraph;
use Botble\Theme\Http\Controllers\PublicController;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use RvMedia;
use SeoHelper;
use SlugHelper;
use Theme;

class UltraNewsController extends PublicController
{
    /**
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function ajaxGetPanelInner(Request $request, BaseHttpResponse $response)
    {
        if (!$request->ajax()) {
            abort(404);
        }

        return $response->setData(Theme::partial('components.panel-inner'));
    }

    /**
     * @param string $slug
     * @param MemberInterface $authorRepository
     * @return \Response
     */
    public function getAuthor($slug, MemberInterface $authorRepository)
    {
        $slug = SlugHelper::getSlug($slug, SlugHelper::getPrefix(Member::class), Member::class);

        if (!$slug) {
            abort(404);
        }

        $condition = [
            'id' => $slug->reference_id,
        ];

        if (Auth::check() && request('preview')) {
            Arr::forget($condition, 'status');
        }

        $author = $authorRepository->getModel()
            ->where($condition)
            ->with(['slugable'])
            ->first();

        if (!$author) {
            abort(404);
        }

        SeoHelper::setTitle($author->name)->setDescription($author->description);

        $meta = new SeoOpenGraph;
        if ($author->avatar) {
            $meta->setImage(RvMedia::getImageUrl($author->avatar));
        }
        $meta->setDescription($author->description);
        $meta->setUrl($author->url);
        $meta->setTitle($author->name);
        $meta->setType('article');

        SeoHelper::setSeoOpenGraph($meta);
        Theme::breadcrumb()->add(__('Home'), url('/'))->add($author->name, $author->url);

        // do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, MEMBER_MODULE_SCREEN_NAME, $author);

        $posts = app(PostInterface::class)->advancedGet([
            'condition' => [
                'posts.status' => BaseStatusEnum::PUBLISHED,
                'author_id'    => $author->id,
                'author_type'  => Member::class,
            ],
            'paginate'  => [
                'per_page'      => 12,
                'current_paged' => (int)request()->input('page', 1),
            ],
            'order_by'  => ['created_at' => 'DESC'],
        ]);

        return Theme::scope('author', compact('author', 'posts'))->render();
    }

    /**
     * @return \Response
     */
    public function getNewsVideos()
    {
        SeoHelper::setTitle('Videos');
        Theme::breadcrumb()->add(__('Home'), url('/'))->add('Video');

        $posts = app(PostInterface::class)->advancedGet([
            'condition' => [
                'posts.format_type' => 'video',
            ],
            'paginate'  => [
                'per_page'      => 10,
                'current_paged' => (int)request()->input('page', 1),
            ],
            'order_by'  => ['created_at' => 'DESC'],
        ]);

        $postsLayout = 'metro';

        return Theme::scope('videos', compact('posts', 'postsLayout'))->render();
    }
}
