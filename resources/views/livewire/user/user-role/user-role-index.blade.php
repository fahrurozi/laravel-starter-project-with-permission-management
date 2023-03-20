<div class="card p-4">
    <div class="card-header">
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <h3>Role</h3>
    </div>
    <div class="card-content">
        <form wire:submit.prevent="assignRole()">
            <div class="card-body">
                <div class="table-responsive ">
                    <div class="modal-body">
                        @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="name">Roles</label>
                            <select id="role" name="role" autocomplete="role-name" class="form-control " wire:model="role">
                                @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>