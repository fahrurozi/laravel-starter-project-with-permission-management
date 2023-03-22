@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Menu Permissions</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('menu_permissions.create') }}"> Create New Menu Permission</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
  <tr>
     <th>No</th>
     <th>Menu</th>
     <th>Permission</th>
     <th width="280px">Action</th>
  </tr>
  @foreach ($menuPermissions as $menuPermission)
  <?php $i=0; ?>
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $menuPermission->menu_name }}</td>
    <td>{{ $menuPermission->permission_name }}</td>
    <td>
        <form action="{{ route('menu_permissions.destroy', $menuPermission->id) }}" method="POST">
            <a class="btn btn-primary" href="{{ route('menu_permissions.edit', $menuPermission->id) }}">Edit</a>

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </td>
  </tr>
  @endforeach
</table>


@endsection