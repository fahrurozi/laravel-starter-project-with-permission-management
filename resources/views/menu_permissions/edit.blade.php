@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Menu Permission</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('menu_permissions.index') }}"> Back</a>
        </div>
    </div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('menu_permissions.update', $menuPermission->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Menu Name:</strong>
                <input type="text" name="menu_name" value="{{ $menuPermission->menu_name }}" class="form-control"
                    placeholder="Menu Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permission Name:</strong>
                <select class="form-control" name="permission_name">
                    <option value="">-- Select Permission --</option>
                    @foreach ($permissions as $permission)
                    <option value="{{ $permission->name }}" {{ $menuPermission->permission_name == $permission->name ?
                        'selected' : '' }}>{{ $permission->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection