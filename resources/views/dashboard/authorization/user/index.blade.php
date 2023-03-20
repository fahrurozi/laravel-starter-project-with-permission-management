@extends('layouts.app')

@section('breadcrumb')
{{ Breadcrumbs::render('user') }}
@endsection

@section('title')
User
@endsection

@section('content')
@livewire('user.user-index')
@endsection


@section('scripts')

@endsection