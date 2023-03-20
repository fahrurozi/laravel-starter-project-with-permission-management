<div>
    <div class="card p-4">
        <div class="card-header">
            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            <div class="d-flex justify-content-end">
                @livewire('role.role-create')
            </div>
        </div>
        <div class="card-content">
            <div class="card-body">
                <!-- Table with outer spacing -->
                <div class="table-responsive">
                    <table class="table table-lg">
                        <thead>
                            <tr>
                                <th>Role</th>
                                <th style="width:25%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                            <tr >
                                <td class="text-bold-500">{{$role->name}}</td>
                                <td>
                                    <button type="button" wire:click=""
                                        class="btn btn-outline-success px-4" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Permission
                                    </button>
                                    <button type="button" wire:click="getRole({{$role->id}})"
                                        class="btn btn-primary px-4" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Edit
                                    </button>
                                    {{-- <button wire:click="$emit('deleteItem')" class="btn btn-danger">Hapus</button>
                                    --}}
                                    <button type="button" wire:click="$emit('confirmDelete', {{ $role->id }})"
                                        class="btn btn-danger">Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                            @livewire('role.role-delete')
                            @livewire('role.role-edit')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:load', function () {
                Livewire.on('confirmDelete', function (roleId) {
                    console.log(roleId)
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
                            Livewire.emit('deleteItemConfirmed', roleId);
                        }
                    })
                })
    
                Livewire.on('roleDeleted', function () {
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
            Livewire.on('roleUpdated', () => {
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