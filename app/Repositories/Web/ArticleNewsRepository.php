<?php

namespace App\Repositories\Web;

use Minmax\Article\Web\ArticleNewsRepository as Repository;

class ArticleNewsRepository extends Repository
{
    public function getNewsDataById($id){
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
            ->where(function ($query) {
                /** @var \Illuminate\Database\Eloquent\Builder $query */
                $query->whereNull('start_at')->orWhere('start_at', '<=', date('Y-m-d H:i:s'));
            })
            ->where(function ($query) {
                /** @var \Illuminate\Database\Eloquent\Builder $query */
                $query->whereNull('end_at')->orWhere('end_at', '>=', date('Y-m-d H:i:s'));
            })
            ->where('active', true)
            ->where('id',$id)
            ->with(['articleCategories' => function($query){
                $query->where('active',true);
            }])->first();
    }
    public function getNewsByCategory($key, $column = 'uri')
    {
        return $this->query()
            ->whereHas('articleCategories', function ($query) use ($column, $key) {
                /** @var \Illuminate\Database\Eloquent\Builder $query */
                if($key !== null){
                    $query->whereIn($column, array_wrap($key));
                }
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
            ->where(function ($query) {
                /** @var \Illuminate\Database\Eloquent\Builder $query */
                $query->whereNull('start_at')->orWhere('start_at', '<=', date('Y-m-d H:i:s'));
            })
            ->where(function ($query) {
                /** @var \Illuminate\Database\Eloquent\Builder $query */
                $query->whereNull('end_at')->orWhere('end_at', '>=', date('Y-m-d H:i:s'));
            })
            ->where('active', true)
            ->with(['articleCategories' => function($query){
                $query->where('active',true);
            }])
            ->orderByRaw("ifnull(json_contains(`properties`, '\"top\"'),0) desc")
            ->orderByRaw('ifnull(`start_at`, `created_at`) desc');
    }
    public function getAllNews()
    {
        $categoryIds = (new ArticleCategoryRepository)->getCategoriesByKey('news')->get()->pluck('id')->toArray();

        return $this->query()
            ->whereHas('articleCategories', function ($query) use ($categoryIds) {
                $query->whereIn('id',$categoryIds)->where('active', true);
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
            ->with(['articleCategories' => function($query){
                $query->where('active',true);
            }])
            ->orderByRaw("ifnull(json_contains(`properties`, '\"top\"'),0) desc")
            ->orderByRaw('ifnull(`start_at`, `created_at`) desc');
    }
    public function getIndexNewsByCategory($categoryIds,$limit = 1)
    {
        return $this->query()
            ->whereHas('articleCategories', function ($query) use ($categoryIds){
                /** @var \Illuminate\Database\Eloquent\Builder $query */
                $query->where('active', true);
                $query->whereIn('id',$categoryIds);
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
            ->where([['properties', 'like', '%"index"%']])
            ->orderByRaw("ifnull(json_contains(`properties`, '\"top\"'),0) desc")
            ->orderByDesc('start_at')
            ->with(['articleCategories' => function($query){
                $query->where('active',true);
            }])
            ->take($limit);
    }
}
