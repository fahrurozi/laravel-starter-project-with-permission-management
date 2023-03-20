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
                <button type="button" class="btn btn-primary" wire:click="$emit('confirmDelete', {{ $role->id }})">
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


    <script>
        document.addEventListener('livewire:load', function () {
                Livewire.on('confirmDelete', function (roleId) {
                    console.log(roleId)
                    Swal.fire({
                        title: 'Hapus Akses Role?',
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
    
                Livewire.on('itemDeleted', function () {
                    Swal.fire(
                        'Berhasil!',
                        'Item berhasil dihapus.',
                        'success'
                    )
                })
            })
    </script>
</div>