<?php

namespace App\Repositories\Web;

use Minmax\Ad\Web\AdvertisingRepository as Repository;

class AdvertisingRepository extends Repository
{
    public function getAdvertisingData($id)
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
            ->where(function ($query) {
                /** @var \Illuminate\Database\Eloquent\Builder $query */
                $query->whereNull('start_at')->orWhere('start_at', '<=', date('Y-m-d H:i:s'));
            })
            ->where(function ($query) {
                /** @var \Illuminate\Database\Eloquent\Builder $query */
                $query->whereNull('end_at')->orWhere('end_at', '>=', date('Y-m-d H:i:s'));
            })
            ->where('id',$id)
            ->where('active', true)
            ->first();
    }
}
