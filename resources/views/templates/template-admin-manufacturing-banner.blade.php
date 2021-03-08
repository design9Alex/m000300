<?php
/**
 * @var \Minmax\Ad\Models\Advertising $formData
 * @var \Minmax\Ad\Admin\AdvertisingPresenter|\Minmax\Ad\Administrator\AdvertisingPresenter $modelPresenter
 * @var string $guard
 */

$modelPresenter->setParameter('options.target', systemParam('target'));
?>

{!! $modelPresenter->getFieldMediaImage($formData, 'details', [
    'subColumn' => 'pic',
    'label' => '電腦版圖片 (w1920 * h540)',
    ]) !!}

{!! $modelPresenter->getFieldMediaImage($formData, 'details', [
    'subColumn' => 'pic2',
    'label' => '手機版圖片 (w768 * h768)',
    ]) !!}

{!! $modelPresenter->getFieldText($formData, 'details', [
    'subColumn' => 'topic',
    'label' => __('MinmaxAd::templates.normal-admin.details.topic')
    ]) !!}

{!! $modelPresenter->getFieldTextarea($formData, 'details', [
    'subColumn' => 'description',
    'label' => __('MinmaxAd::templates.normal-admin.details.description')
    ]) !!}

{!! $modelPresenter->getFieldEditor($formData, 'details', [
    'subColumn' => 'editor',
    'label' => __('MinmaxAd::templates.normal-admin.details.editor')
    ]) !!}

{!! $modelPresenter->getFieldText($formData, 'details', [
    'subColumn' => 'link',
    'label' => __('MinmaxAd::templates.normal-admin.details.link')
    ]) !!}

{!! $modelPresenter->getFieldRadio($formData, 'options', [
    'subColumn' => 'target',
    'inline' => true,
    'required' => true,
    'label' => __('MinmaxAd::templates.normal-admin.options.target')
    ]) !!}
