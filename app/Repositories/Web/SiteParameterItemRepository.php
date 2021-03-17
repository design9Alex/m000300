<?php

namespace App\Repositories\Web;

use Minmax\Base\Web\SiteParameterItemRepository as Repository;

class SiteParameterItemRepository extends Repository
{
    public function getItemsByCategory($key)
    {
        return $this->query()
            ->where(function ($query) {
                /** @var \Illuminate\Database\Eloquent\Builder $query */
                $query
                    ->whereDoesntHave('languageUsages')
                    ->orWhereHas('languageUsages', function ($query) {
                        /** @var \Illuminate\Database\Eloquent\Builder $query */
                        $query->where('language_id', langId(app()->getLocale()));
                    });
            })
            ->whereIn('id', array_wrap($key))
            ->where('active', true)
            ->orderBy('sort');
    }

}
