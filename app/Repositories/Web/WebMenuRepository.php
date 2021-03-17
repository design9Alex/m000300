<?php

namespace App\Repositories\Web;

use Minmax\Base\Web\WebMenuRepository as Repository;
use Minmax\Base\Helpers\Tree as TreeHelper;

class WebMenuRepository extends Repository
{
    public function getMenu($parent = null)
    {
        return TreeHelper::getMenu(
            $this->query()
                ->where('active',true)
                ->where(function ($query) {
                    /** @var \Illuminate\Database\Eloquent\Builder $query */
                    $query
                        ->whereDoesntHave('languageUsages')
                        ->orWhereHas('languageUsages', function ($query) {
                            /** @var \Illuminate\Database\Eloquent\Builder $query */
                            $query->where('language_id', langId(app()->getLocale()));
                        });
                })
                ->orderBy('sort')
                ->get()
                ->toArray()
            ,$parent);
    }
}
