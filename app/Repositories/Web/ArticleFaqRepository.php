<?php

namespace App\Repositories\Web;

use Minmax\Article\Models\ArticleElement;
use Minmax\Article\Models\ArticleFaq;
use Minmax\Base\Web\Repository;

/**
 * Class ArticleFaqRepository
 * @property ArticleFaq $model
 * @method ArticleFaq find($id)
 * @method ArticleFaq one($column = null, $operator = null, $value = null, $boolean = 'and')
 * @method ArticleFaq[]|\Illuminate\Database\Eloquent\Collection all($column = null, $operator = null, $value = null, $boolean = 'and')
 * @method ArticleFaq create($attributes)
 * @method ArticleFaq save($model, $attributes)
 * @method ArticleFaq|\Illuminate\Database\Eloquent\Builder query()
 */
class ArticleFaqRepository extends Repository
{
    const MODEL = ArticleFaq::class;

    /**
     * Get table name of this model
     *
     * @return string
     */
    protected function getTable()
    {
        return 'article_faq';
    }

    public function getFaqByCategory($key, $column = 'uri')
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
            ->where('active', true)
            ->orderByDesc('start_at')
            ->orderByDesc('created_at');
    }
}
