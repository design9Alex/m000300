<?php
/**
 * @var \Illuminate\Database\Eloquent\Collection|\Minmax\Base\Models\WorldLanguage[] $languageActive
 * @var boolean $languageSwitch
 * @var \Minmax\Base\Models\AdminMenu $pageData
 */
?>
<div class="float-right">
    {{ $slot }}

    @if(isset($batchActions) && trim($batchActions) != '')
    <div class="btn-group btn-group-sm dropdown" role="group">
        <button class="btn dropdown-toggle btn-main" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="@lang('MinmaxBase::admin.grid.batch')" id="tableAction">
            <i class="icon-hammer"></i><span class="ml-1 d-none d-md-inline-block">@lang('MinmaxBase::admin.grid.batch')</span>
        </button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="tableAction">
            {{ $batchActions }}
        </div>
    </div>
    @endif

    @if(isset($draftForm) && !blank($draftForm))
    <div class="btn-group btn-group-sm dropdown draft-area" role="group" data-form-id="{{ $draftForm }}">
        <button type="button" id="draft-action" class="btn dropdown-toggle btn-main" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="icon-libreoffice"></i><span class="ml-1 d-none d-md-inline-block">@lang('MinmaxBase::admin.grid.draft')</span>
        </button>
        <div class="dropdown-menu dropdown-menu-right draft-menu" aria-labelledby="draft-action">
            <button type="button" class="dropdown-item store-btn" style="cursor: pointer">
                <i class="icon-rotate mr-2 text-muted"></i>@lang('MinmaxBase::admin.grid.draft_save')
            </button>
        </div>
        <input type="hidden" class="draft-url" value="{{ url()->current() }}" />
        <input type="hidden" class="draft-store-url" value="{{ langRoute('admin.system-draft.ajaxStore') }}" />
        <input type="hidden" class="draft-get-url" value="{{ langRoute('admin.system-draft.ajaxGet') }}" />
        <input type="hidden" class="draft-destroy-url" value="{{ langRoute('admin.system-draft.ajaxDestroy') }}" />
        <input type="hidden" class="draft-preview-url" value="{{ isset($pageData) && !blank(array_get($pageData->options, 'preview')) ? langRoute(array_get($pageData->options, 'preview'), ['id' => 'mockup']) : '' }}" />
    </div>
    @endif

    @if(isset($languageActive) && $languageActive->count() > 1)
    <div class="btn-group btn-group-sm dropdown" role="group">
        <button class="btn dropdown-toggle btn-secondary" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="@lang('MinmaxBase::admin.form.language')" id="tableLen">
            <i class="icon-globe"></i><span class="ml-1 d-none d-md-inline-block">{{ $languageActive->where('current', true)->first()->name }}</span>
        </button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="tableLen">

            @if(isset($languageSwitch))
            <li class="dropdown-item">
                @lang('MinmaxBase::admin.form.language_usage.label')
                <a id="form-local-switch" class="badge badge-pill {{ $languageSwitch ? 'badge-danger' : 'badge-secondary' }}" href="javascript:void(0);"
                   title="@lang('MinmaxBase::admin.form.language_usage.hint')"
                   data-id="{{ \Route::getCurrentRoute()->parameter('id') }}"
                   data-url="{{ langRoute("admin.{$pageData->uri}.ajaxLanguageSwitch") }}"
                   data-text-enable="@lang('MinmaxBase::admin.form.language_usage.1')"
                   data-text-disable="@lang('MinmaxBase::admin.form.language_usage.0')"
                   data-status="{{ intval($languageSwitch) }}">@lang('MinmaxBase::admin.form.language_usage.' . intval($languageSwitch))</a>
            </li>
            <div class="dropdown-divider"></div>
            @endif

            @foreach($languageActive as $language)
            @if($language->code != 'zh-Hant')
            <a class="form-local-option dropdown-item {{ $language->current  ? 'selected' : '' }}"
               data-code="{{ $language->code }}"
               data-url="{{ langRoute('admin.setFormLocal') }}"
               href="javascript:void(0);">{{ $language->name }}</a>
            @endIf
            @endforeach
        </div>
    </div>
    @endif
</div>
