<div>
    {{-- <button type="button" class="btn btn-primary px-4 btn-lg" wire:click="$emit('openEditModal')">Tambah
        Data</button> --}}

    <div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="modalEdit" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click="$emit('closeModal')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form wire:submit.prevent="update()">
                    <div class="modal-body">
                        @if(!$isDataReady)
                        <div class="text-center">
                            <div class="spinner-border" role="status">
                            </div>
                        </div>
                        @else
                        <input type="hidden" name="userId" wire:model="userId">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" wire:model="name">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" wire:model="email">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Password</label>
                            <input type="text" class="form-control" id="password" name="password" wire:model="password">
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">password confirmation</label>
                            <input type="text" class="form-control" id="password_confirmation"
                                name="password_confirmation" wire:model="password_confirmation">
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        @endif

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            wire:click="$emit('closeModal')">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>