<div>
    {{-- <button type="button" wire:click="$emit('openModal')">Open Modal</button> --}}
    <button type="button"
        wire:click="$emit('openModal', [{label: 'Name', name: 'name', type: 'text'}, {label: 'Email', name: 'email', type: 'email'}])">Open
        Modal</button>
    <div wire:ignore.self class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="submit">
                        @foreach($inputs as $input)
                        <div class="form-group">
                            <label for="{{ $input['name'] }}">{{ $input['label'] }}</label>
                            <input type="{{ $input['type'] }}" class="form-control" id="{{ $input['name'] }}"
                                name="{{ $input['name'] }}" wire:model="{{ $input['name'] }}">
                        </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        Livewire.on('openModal', (inputs) => {
            window.inputs = inputs;
            $('#myModal').modal('show');
        });
        Livewire.on('closeModal', () => {
            $('#myModal').modal('hide');
        });
    });

    Livewire.emit('openModal', data);
</script>