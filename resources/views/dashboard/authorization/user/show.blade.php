@extends('layouts.app')

@section('breadcrumb')
{{ Breadcrumbs::render('user.show', $user) }}
@endsection

@section('title')
{{ucwords($user->name)}}
@endsection

@section('content')


<div>
    <div class="card p-4">
        <div class="card-header">
            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
        </div>
        <div class="card-content">
            <div class="card-body">
                @livewire('user.user-show', ['user' => $user])
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            @livewire('user.user-role.user-role-index', ['user' => $user])
        </div>
    </div>


</div>

@endsection


@section('scripts')

@endsection