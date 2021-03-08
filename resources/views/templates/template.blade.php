<?php
/**
 * @var \Minmax\Ad\Models\Advertising $formData
 * @var \Minmax\Ad\Admin\AdvertisingPresenter|\Minmax\Ad\Administrator\AdvertisingPresenter $modelPresenter
 * @var string $guard
 */

?>
@inject('modelPresenter', 'App\Presenters\Admin\AdvertisingPresenter')

{!! $modelPresenter->getFieldMediaImage($formData, 'details', ['subColumn' => 'pic', 'label' => __('MinmaxAd::templates.product-category-admin.details.pic')]) !!}

{!! $modelPresenter->getFieldText($formData, 'details', ['subColumn' => 'topic', 'label' => __('MinmaxAd::templates.product-category-admin.details.topic')]) !!}

{!! $modelPresenter->getFieldTextarea($formData, 'details', ['subColumn' => 'description', 'label' => __('MinmaxAd::templates.product-category-admin.details.description')]) !!}

{!! $modelPresenter->getFieldProductSetList($formData, 'details', ['label' => '適用商品','subColumn' => 'product_sets', 'hint' => true, 'hintParam' => ['link' => langRoute('admin.product-set.index')]]) !!}
