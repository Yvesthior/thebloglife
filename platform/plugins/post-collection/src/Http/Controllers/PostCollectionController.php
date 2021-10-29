<?php

namespace Botble\PostCollection\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Forms\FormBuilder;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Blog\Repositories\Interfaces\PostInterface;
use Botble\PostCollection\Forms\PostCollectionForm;
use Botble\PostCollection\Http\Requests\PostCollectionRequest;
use Botble\PostCollection\Repositories\Interfaces\PostCollectionInterface;
use Botble\PostCollection\Tables\PostCollectionTable;
use Exception;
use Illuminate\Http\Request;

class PostCollectionController extends BaseController
{
    /**
     * @var PostCollectionInterface
     */
    protected $postCollectionRepository;

    /**
     * @param PostCollectionInterface $postCollectionRepository
     */
    public function __construct(PostCollectionInterface $postCollectionRepository)
    {
        $this->postCollectionRepository = $postCollectionRepository;
    }

    /**
     * @param PostCollectionTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(PostCollectionTable $table)
    {
        page_title()->setTitle(trans('plugins/post-collection::post-collection.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/post-collection::post-collection.create'));

        \Assets::addScripts([
            'jquery-ui',
            'blockui',
        ])
            ->addScriptsDirectly([
                'vendor/core/plugins/post-collection/js/main.js',
            ]);

        return $formBuilder->create(PostCollectionForm::class)->renderForm();
    }

    /**
     * @param PostCollectionRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(PostCollectionRequest $request, BaseHttpResponse $response)
    {
        $postCollection = $this->postCollectionRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(POST_COLLECTION_MODULE_SCREEN_NAME, $request, $postCollection));

        if ($request->has('related_posts')) {
            $relatedPostIds = explode(',', preg_replace('/\s+/', '', $request->input('related_posts')));
            $relatedPostIds = array_filter($relatedPostIds);
            $postCollection->posts()->detach();
            $postCollection->posts()->attach($relatedPostIds);
        }

        return $response
            ->setPreviousUrl(route('post-collection.index'))
            ->setNextUrl(route('post-collection.edit', $postCollection->id))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    /**
     * @param int $id
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function edit($id, FormBuilder $formBuilder, Request $request)
    {
        $postCollection = $this->postCollectionRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $postCollection));

        page_title()->setTitle(trans('plugins/post-collection::post-collection.edit') . ' "' . $postCollection->name . '"');

        \Assets::addScripts([
            'jquery-ui',
            'blockui',
        ])
            ->addScriptsDirectly([
                'vendor/core/plugins/post-collection/js/main.js',
            ]);

        return $formBuilder->create(PostCollectionForm::class, ['model' => $postCollection])->renderForm();
    }

    /**
     * @param int $id
     * @param PostCollectionRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, PostCollectionRequest $request, BaseHttpResponse $response)
    {
        $postCollection = $this->postCollectionRepository->findOrFail($id);

        $postCollection->fill($request->input());

        $postCollection = $this->postCollectionRepository->createOrUpdate($postCollection);

        event(new UpdatedContentEvent(POST_COLLECTION_MODULE_SCREEN_NAME, $request, $postCollection));

        if ($request->has('related_posts')) {
            $relatedPostIds = explode(',', preg_replace('/\s+/', '', $request->input('related_posts')));
            $relatedPostIds = array_filter($relatedPostIds);
            $postCollection->posts()->detach();
            $postCollection->posts()->attach($relatedPostIds);
        }

        return $response
            ->setPreviousUrl(route('post-collection.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    /**
     * @param int $id
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function destroy(Request $request, $id, BaseHttpResponse $response)
    {
        try {
            $postCollection = $this->postCollectionRepository->findOrFail($id);

            $this->postCollectionRepository->delete($postCollection);

            event(new DeletedContentEvent(POST_COLLECTION_MODULE_SCREEN_NAME, $request, $postCollection));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage($exception->getMessage());
        }
    }

    /**
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @throws Exception
     */
    public function deletes(Request $request, BaseHttpResponse $response)
    {
        $ids = $request->input('ids');
        if (empty($ids)) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.no_select'));
        }

        foreach ($ids as $id) {
            $postCollection = $this->postCollectionRepository->findOrFail($id);
            $this->postCollectionRepository->delete($postCollection);
            event(new DeletedContentEvent(POST_COLLECTION_MODULE_SCREEN_NAME, $request, $postCollection));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }

    /**
     * @param Request $request
     * @param PostInterface $postRepository
     * @param BaseHttpResponse $response
     * @return mixed
     */
    public function getListForSelect(Request $request, PostInterface $postRepository, BaseHttpResponse $response)
    {
        $posts = $postRepository->getSearch($request->input('keyword', ''));

        return $response->setData(
            view('plugins/post-collection::panel-search-data', compact('posts'))->render()
        );
    }

    /**
     * @param Request $request
     * @param PostInterface $postRepository
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function getRelationBoxes(Request $request, PostInterface $postRepository, BaseHttpResponse $response)
    {
        $relatedPosts = $postRepository->getModel()
            ->join('post_collections_posts', 'post_collections_posts.post_id', '=', 'posts.id')
            ->where('post_collections_posts.post_collection_id', $request->input('collection_id'))
            ->select([
                'posts.*',
            ])
            ->get();

        $dataUrl = route('list-post-for-search');

        return $response->setData(view('plugins/post-collection::related-posts',
            compact('relatedPosts', 'dataUrl'))->render());
    }
}
