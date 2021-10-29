<?php

namespace TheSky\ProPosts\Http\Controllers;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Blog\Repositories\Interfaces\PostInterface;
use TheSky\ProPosts\Repositories\Interfaces\FavoritePostsInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use SeoHelper;
use Theme;

class PublicController extends Controller
{
    public function getRecentlyViewedPosts()
    {
        SeoHelper::setTitle(__('Your currently viewed posts'));

        $cookieName = \App::getLocale() . '_recently_viewed_posts';

        $jsonRecentlyViewedPosts = null;
        if (isset($_COOKIE[$cookieName])) {
            $jsonRecentlyViewedPosts = $_COOKIE[$cookieName];
        }
        $postIds = collect(json_decode($jsonRecentlyViewedPosts, true))->flatten()->all();

        if ($postIds) {
            $posts = app(PostInterface::class)->advancedGet([
                'condition' => [
                    'posts.status' => BaseStatusEnum::PUBLISHED,
                    'posts.id'     => [
                        'posts.id',
                        'IN',
                        $postIds
                    ],
                ],
                'paginate'  => [
                    'per_page'      => 9,
                    'current_paged' => (int)request()->input('page', 1),
                ],
                'order_by'  => ['created_at' => 'DESC'],
            ]);

            Theme::breadcrumb()->add('Total: ' . $posts->total());
        } else {
            $posts = null;
        }

        $postsLayout = 'metro';

        return Theme::scope('videos', compact('posts', 'postsLayout'))->render();
    }

    public function getListFavorite()
    {
        SeoHelper::setTitle(__('My Favorite Posts'));

        $favoritePostIds = json_decode(auth()->guard('member')->user()->favorite_posts, true);
        if ($favoritePostIds) {
            $posts = app(PostInterface::class)->advancedGet([
                'condition' => [
                    'posts.status' => BaseStatusEnum::PUBLISHED,
                    'posts.id'     => [
                        'posts.id',
                        'IN',
                        $favoritePostIds
                    ],
                ],
                'paginate'  => [
                    'per_page'      => 10,
                    'current_paged' => (int)request()->input('page', 1),
                ],
                'order_by'  => ['created_at' => 'DESC'],
            ]);

            Theme::breadcrumb()->add('Total: ' . $posts->total());
        } else {
            $posts = null;
        }

        $postsLayout = 'metro';

        return Theme::scope('videos', compact('posts', 'postsLayout'))->render();
    }

    public function getListBookmark()
    {
        SeoHelper::setTitle(__('My Bookmark Posts'));

        $bookmarkedPostIds = json_decode(auth()->guard('member')->user()->bookmark_posts, true);
        if ($bookmarkedPostIds) {
            $posts = app(PostInterface::class)->advancedGet([
                'condition' => [
                    'posts.id' => [
                        'posts.id',
                        'IN',
                        $bookmarkedPostIds
                    ],
                ],
                'paginate'  => [
                    'per_page'      => 10,
                    'current_paged' => (int)request()->input('page', 1),
                ],
                'order_by'  => ['created_at' => 'DESC'],
            ]);

            Theme::breadcrumb()->add('Total: ' . $posts->total());
        } else {
            $posts = null;
        }

        $postsLayout = 'metro';

        return Theme::scope('videos', compact('posts', 'postsLayout'))->render();
    }

    /**
     * @param Request          $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function favoritePost(Request $request, FavoritePostsInterface $favoritePostsRepository, BaseHttpResponse $response): BaseHttpResponse
    {
        $postId = $request->input('post_id');

        if ($postId) {
            $type = $request->input('type');
            $userLogin = auth()->guard('member')->user();
            $userId = $userLogin->id;
            $userFavoritePosts = json_decode($userLogin->favorite_posts, true);
            if (empty($userFavoritePosts)) {
                $userFavoritePosts = [];
            }

            if ($type == 'add') {
                $favoritePostsRepository->create([
                    'post_id' => $postId,
                    'user_id' => $userId,
                    'type'    => 'favorite'
                ]);

                $userFavoritePosts[] = $postId;
                $userLogin->favorite_posts = array_unique($userFavoritePosts);
                $userLogin->save();

                return $response->setMessage(__('Add this post to favorite successfully!'));
            } else {
                $favoritePostsRepository->deleteBy([
                    'post_id' => $postId,
                    'user_id' => $userId,
                    'type'    => 'favorite'
                ]);

                if (in_array($postId, $userFavoritePosts)) {
                    unset($userFavoritePosts[array_search($postId, $userFavoritePosts)]);
                }

                $userLogin->favorite_posts = $userFavoritePosts;
                $userLogin->save();

                return $response->setMessage(__('Remove this post to favorite list successfully!'));
            }
        }

        return $response->setError(true)
            ->setMessage(__('Before you can add this post to your favorites, you must first log in!'));
    }

    /**
     * @param Request          $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function bookmarkPost(Request $request, FavoritePostsInterface $favoritePostsRepository, BaseHttpResponse $response): BaseHttpResponse
    {
        $postId = $request->input('post_id');

        if ($postId) {
            $type = $request->input('type');
            $userLogin = auth()->guard('member')->user();
            $userId = $userLogin->id;
            $userBookmarkPosts = json_decode($userLogin->bookmark_posts, true);
            if (empty($userBookmarkPosts)) {
                $userBookmarkPosts = [];
            }

            if ($type == 'add') {
                $favoritePostsRepository->create([
                    'post_id' => $postId,
                    'user_id' => $userId,
                    'type'    => 'bookmark'
                ]);

                $userBookmarkPosts[] = $postId;
                $userLogin->bookmark_posts = array_unique($userBookmarkPosts);
                $userLogin->save();

                return $response->setMessage(__('Bookmark this post successfully!'));
            } else {
                $favoritePostsRepository->deleteBy([
                    'post_id' => $postId,
                    'user_id' => $userId,
                    'type'    => 'bookmark'
                ]);

                if (in_array($postId, $userBookmarkPosts)) {
                    unset($userBookmarkPosts[array_search($postId, $userBookmarkPosts)]);
                }

                $userLogin->bookmark_posts = $userBookmarkPosts;
                $userLogin->save();

                return $response->setMessage(__('Remove this post to bookmark successfully!'));
            }
        }

        return $response->setError(true)
            ->setMessage(__('Before you can add this post to your bookmark, you must first log in!'));
    }
}
