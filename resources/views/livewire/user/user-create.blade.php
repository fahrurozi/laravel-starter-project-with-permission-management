<div>
    <button type="button" class="btn btn-primary" wire:click="$emit('openModal')">Tambah Data</button>

    <div class="modal" tabindex="-1" role="dialog" id="modalCreate" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click="hideModal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                    <form>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" wire:model="name">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" wire:model="email">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Telepon</label>
                            <input type="text" class="form-control" id="phone" wire:model="phone">
                            @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        wire:click="hideModal()">Batal</button>
                    <button type="button" class="btn btn-primary" wire:click="store()">Simpan</button>
                </div>
            </div>
        </div>
    </div>



</div>

<script>
    document.addEventListener('livewire:load', function () {
  Livewire.on('showModal', () => {
    console.log('Event showModal terpanggil!');
    $('#modalCreate').modal('show');
  });

  Livewire.on('hideModal', () => {
    console.log('Event hideModal terpanggil!');
    $('#modalCreate').modal('hide');
  });
});

</script>