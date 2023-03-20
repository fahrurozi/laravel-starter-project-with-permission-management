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