<div>
    <div class="card p-4">
        <div class="card-header">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary px-4 btn-lg" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Add
                </button>

                <div>
                    
                </div>

                @livewire('user.user-create')
            </div>
        </div>
        <div class="card-content">
            <div class="card-body">
                <!-- Table with outer spacing -->
                <div class="table-responsive">
                    <table class="table table-lg">
                        <thead>
                            <tr>
                                <th>NAME</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Permissions</th>
                                <th style="width:20%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td class="text-bold-500">{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td class="text-bold-500">- role -</td>
                                <td>- permission -</td>
                                <td>
                                    <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger px-4" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

