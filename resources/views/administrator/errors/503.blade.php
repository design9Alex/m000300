@extends('MinmaxBase::administrator.layouts.errors.normal')

@section('title', __('MinmaxBase::administrator.page_not_found.title'))
@section('code', '503')

@if(is_null($exception->getMessage()) || $exception->getMessage() === '')
    @section('message', __('MinmaxBase::administrator.page_not_found.message'))
@else
    @section('message', $exception->getMessage())
@endif
