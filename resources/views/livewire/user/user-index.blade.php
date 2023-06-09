<div>
    <div class="card p-4">
        <div class="card-header">
            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            <div class="d-flex justify-content-end">
                @livewire('user.user-create')
            </div>
        </div>
        <div class="card-content">
            <div class="card-body">
                <!-- Table with outer spacing -->
                <div class="table-responsive">
                    <table class="table table-lg text-center">
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
                                    <a href="{{route('admin.user.show', $user->id)}}" class="btn btn-outline-success px-4">Role</a>
                                    <button type="button" wire:click="getUser({{$user->id}})"
                                        class="btn btn-primary px-4" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Edit
                                    </button>
                                    {{-- <button wire:click="$emit('deleteItem')" class="btn btn-danger">Hapus</button>
                                    --}}
                                    <button type="button" wire:click="$emit('confirmDelete', {{ $user->id }})"
                                        class="btn btn-danger">Hapus</button>

                                    {{-- <button type="button" class="btn btn-danger px-4" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Delete
                                    </button> --}}
                                </td>
                            </tr>
                            @endforeach
                            @livewire('user.user-delete')
                            @livewire('user.user-edit')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:load', function () {
                Livewire.on('confirmDelete', function (userId) {
                    console.log(userId)
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Anda tidak akan bisa mengembalikan tindakan ini!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus saja!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Livewire.emit('deleteItemConfirmed', userId);
                        }
                    })
                })
    
                Livewire.on('itemDeleted', function () {
                    Swal.fire(
                        'Berhasil!',
                        'Item berhasil dihapus.',
                        'success'
                    )
                })


            Livewire.on('openEditModal', () => {
                $('#modalEdit').modal('show');
            });
            Livewire.on('closeModal', () => {
                $('#modalEdit').modal('hide');
            });
            Livewire.on('userUpdated', () => {
                $('#modalEdit').modal('hide');
            });

            const modalEdit = document.getElementById('modalEdit');
            const modalCreate = document.getElementById('modalCreate');

            modalEdit.addEventListener('hidden.bs.modal', function () {
                Livewire.emit('closeModal');
            });

            modalCreate.addEventListener('hidden.bs.modal', function () {
                Livewire.emit('closeModal');
            });


        })
    </script>
</div>