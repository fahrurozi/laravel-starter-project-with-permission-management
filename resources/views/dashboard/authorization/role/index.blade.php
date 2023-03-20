@extends('layouts.app')

@section('breadcrumb')
{{ Breadcrumbs::render('role') }}
@endsection

@section('title')
Role
@endsection

@section('content')
@livewire('role.role-index')
@endsection


@section('scripts')

@endsection