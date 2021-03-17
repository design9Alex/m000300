<?php

namespace App\Repositories\Web;

use Minmax\Article\Web\ArticleColumnRepository as Repository;

class ArticleColumnRepository extends Repository
{
    public function getColumnsByCategory($key, $column = 'uri')
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
    public function getColumnsDataById($id){
        return $this->query()
            ->whereHas('articleCategories', function ($query) {
                /** @var \Illuminate\Database\Eloquent\Builder $query */
                $query->where('active', true);
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
            ->where('id',$id)
            ->with(['articleCategories' => function($query){
                $query->where('active',true);
            }])->first();
    }
}
