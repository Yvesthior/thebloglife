<?php

namespace Theme\UltraNews\Repositories\Eloquent;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Blog\Repositories\Eloquent\PostRepository as BasePostRepository;
use Botble\Blog\Repositories\Interfaces\PostInterface;

class PostRepository extends BasePostRepository implements PostInterface
{

    /**
     * {@inheritDoc}
     */
    public function getFilters(array $filters)
    {
        $this->model = $this->originalModel;

        if (!empty($filters['categories'])) {
            $categories = array_filter((array)$filters['categories']);

            $this->model = $this->model->whereHas('categories', function ($query) use ($categories) {
                $query->whereIn('categories.id', $categories);
            });
        }

        if (!empty($filters['categories_exclude'])) {
            $excludeCategories = array_filter((array)$filters['categories_exclude']);

            $this->model = $this->model->whereHas('categories', function ($query) use ($excludeCategories) {
                $query->whereNotIn('categories.id', $excludeCategories);
            });
        }

        if (!empty($filters['exclude'])) {
            $this->model = $this->model->whereNotIn('posts.id', array_filter((array)$filters['exclude']));
        }

        if (!empty($filters['include'])) {
            $this->model = $this->model->whereNotIn('posts.id', array_filter((array)$filters['include']));
        }

        if (!empty($filters['author'])) {
            $this->model = $this->model->whereIn('posts.author_id', array_filter((array)$filters['author']));
        }

        if (!empty($filters['author_exclude'])) {
            $this->model = $this->model->whereNotIn('posts.author_id', array_filter((array)$filters['author_exclude']));
        }

        if (!empty($filters['featured'])) {
            $this->model = $this->model->where('posts.is_featured', $filters['featured']);
        }

        if (!empty($filters['format_type'])) {
            $this->model = $this->model->where('posts.format_type', $filters['format_type']);
        }

        if (!empty($filters['search'])) {
            $this->model = $this->model->where('posts.name', 'like', '%' . $filters['search'] . '%')
                ->orWhere('posts.content', 'like', '%' . $filters['search'] . '%');
        }

        $orderBy = isset($filters['order_by']) ? $filters['order_by'] : 'updated_at';
        $order = isset($filters['order']) ? $filters['order'] : 'desc';

        $this->model = $this->model->where('posts.status', BaseStatusEnum::PUBLISHED)->orderBy($orderBy, $order);

        return $this->applyBeforeExecuteQuery($this->model)->limit($filters['limit'])->get();
    }
}
