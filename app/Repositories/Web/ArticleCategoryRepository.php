<?php

namespace App\Repositories\Web;

use Minmax\Article\Web\ArticleCategoryRepository as Repository;

class ArticleCategoryRepository extends Repository
{
    /**
     * Grt categories by condition. (Arguments are pass to Eloquent where function)
     * @param  string $uri
     * @param  string $key
     * @return \Minmax\Article\Models\ArticleCategory|\Illuminate\Database\Eloquent\Builder query()
     */
    public function getCategoriesByKey($uri,$key = "uri")
    {
        return $this->query()
            ->where([['active','=', true],['parent_id','=', $this->one($key,$uri)->id]])
            ->orderBy('sort');
    }
    public function getCategoryDataByKey($key,$column = "uri"){
        return $this->query()
            ->where('active',true)->where($column,$key)->first();
    }

}
