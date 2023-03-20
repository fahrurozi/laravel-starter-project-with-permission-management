@extends('layouts.app')

@section('breadcrumb')
{{ Breadcrumbs::render('role.show', $role) }}
@endsection

@section('title')
{{ucwords($role->name)}}
@endsection

@section('content')
@endsection


@section('scripts')

@endsection