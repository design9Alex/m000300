<?php

namespace App\Repositories\Web;

use Minmax\Article\Models\ArticleElement;
use Minmax\Base\Web\Repository;

/**
 * Class ArticleElementRepository
 * @property ArticleElement $model
 * @method ArticleElement find($id)
 * @method ArticleElement one($column = null, $operator = null, $value = null, $boolean = 'and')
 * @method ArticleElement[]|\Illuminate\Database\Eloquent\Collection all($column = null, $operator = null, $value = null, $boolean = 'and')
 * @method ArticleElement create($attributes)
 * @method ArticleElement save($model, $attributes)
 * @method ArticleElement|\Illuminate\Database\Eloquent\Builder query()
 */
class ArticleElementRepository extends Repository
{
    const MODEL = ArticleElement::class;

    /**
     * Get table name of this model
     *
     * @return string
     */
    protected function getTable()
    {
        return 'article_element';
    }

    public function getElementByCategory($key, $column = 'uri')
    {
        return $this->query()
            ->whereHas('articleCategories', function ($query) use ($column, $key) {
                /** @var \Illuminate\Database\Eloquent\Builder $query */
                $query->whereIn($column, array_wrap($key))->where('active', true);
            })
            ->where(function ($query) {
                /** @var \Illuminate\Database\Eloquent\Builder $query */
                $query
                    ->whereDoesntHave('languageUsages')
                    ->orWhereHas('languageUsages', function ($query) {
                        /** @var \Illuminate\Database\Eloquent\Builder $query */
                        $query->where('language_id', langId(app()->getLocale()));
                    });
            })
            ->where(function ($query) {
                /** @var \Illuminate\Database\Eloquent\Builder $query */
                $query->whereNull('start_at')->orWhere('start_at', '<=', date('Y-m-d H:i:s'));
            })
            ->where(function ($query) {
                /** @var \Illuminate\Database\Eloquent\Builder $query */
                $query->whereNull('end_at')->orWhere('end_at', '>=', date('Y-m-d H:i:s'));
            })
            ->where('active', true)
            ->orderBy('sort')
            ->orderByDesc('start_at')
            ->orderByDesc('created_at');
    }
}
