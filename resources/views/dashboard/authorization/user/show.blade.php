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
                <div class="table-responsive ">
                    <table class="table table-lg text-center table-bordered">
                        <tr>
                            <th>Name</th>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <th>Role</th>
                            <td style="align-content: space-between">
                                @foreach ($user->roles as $role)
                                <button type="button" class="btn btn-primary">
                                    {{$role->name}}
                                </button>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Permmission</th>
                            <td></td>
                        </tr>
                    </table>
                </div>
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