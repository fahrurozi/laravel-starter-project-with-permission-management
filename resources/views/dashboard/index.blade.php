@extends('layouts.app')

@section('breadcrumb')
{{ Breadcrumbs::render('dashboard') }}
@endsection


@section('content')
<h1>Test</h1>
@livewire('counter')
@endsection


@section('scripts')

@endsection