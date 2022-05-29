<div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    Input Data Staf
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="save">
                        <div class="form-group">
                            <label>Nama</label>
                            <input wire:model="name" class="form-control" value="{{ old('name') }}">
                            @error('name')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input wire:model="email" class="form-control" value="{{ old('email') }}">
                            @error('email')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>No. Telepon</label>
                            <input wire:model="no_telp" class="form-control" value="{{ old('no_telp') }}">
                            @error('no_telp')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        {{ $success }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
