<?php

namespace App\Repositories\Web;

use Minmax\Article\Models\ArticleElement;
use Minmax\Article\Models\ArticleTeam;
use Minmax\Base\Web\Repository;

/**
 * Class ArticleTeamRepository
 * @property ArticleTeam $model
 * @method ArticleTeam find($id)
 * @method ArticleTeam one($column = null, $operator = null, $value = null, $boolean = 'and')
 * @method ArticleTeam[]|\Illuminate\Database\Eloquent\Collection all($column = null, $operator = null, $value = null, $boolean = 'and')
 * @method ArticleTeam create($attributes)
 * @method ArticleTeam save($model, $attributes)
 * @method ArticleTeam|\Illuminate\Database\Eloquent\Builder query()
 */
class ArticleTeamRepository extends Repository
{
    const MODEL = ArticleTeam::class;

    /**
     * Get table name of this model
     *
     * @return string
     */
    protected function getTable()
    {
        return 'article_team';
    }

    public function getTeamByCategory($key, $column = 'uri')
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
            ->orderBy('sort');
    }
}
