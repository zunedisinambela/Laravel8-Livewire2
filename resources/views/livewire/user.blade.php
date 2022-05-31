<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            Data User <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUser">Add
                User</button>
        </div>
        <div class="card-body">
            @if (session()->has('add'))
                <div class="alert alert-success">{{ session('add') }}</div>
            @endif

            @if (session()->has('edit'))
                <div class="alert alert-warning">{{ session('edit') }}</div>
            @endif

            @if (session()->has('hapus'))
                <div class="alert alert-danger">{{ session('hapus') }}</div>
            @endif
            <div class="row">
                <div class="col">
                    <select wire:model="paginate" name="" id="" class="form-control form-control-sm w-auto">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                    </select>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($users as $index=>$item)
                    <tr>
                        <th scope="row">{{ $index + $users->firstItem() }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->password }}</td>
                        <td>
                            <button wire:click.prevent="detailDataUser({{ $item->id }})" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editUser">Edit</button>
                            <button wire:click.prevent="detailDataUser({{ $item->id }})" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteUser">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pull-right">
                {{ $users->links() }}
            </div>
        </div>
    </div>

    <!-- Modal Add -->
    <div wire:ignore.self class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Nama</label>
                            <input name="name" wire:model="name" class="form-control" value="{{ old('name') }}">
                            @error('name')
                            <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" wire:model="email" class="form-control" value="{{ old('email') }}">
                            @error('email')
                            <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" wire:model="password" class="form-control" value="{{ old('password') }}">
                            @error('password')
                            <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" wire:click.prevent="saveDataUser()">Save</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Edit -->
    <div wire:ignore.self class="modal fade" id="editUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Nama</label>
                            <input name="name" wire:model="name" class="form-control" value="{{ old('name') }}">
                            @error('name')
                            <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" wire:model="email" class="form-control" value="{{ old('email') }}">
                            @error('email')
                            <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" wire:model="password" class="form-control" value="{{ old('password') }}">
                            @error('password')
                            <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning" wire:click.prevent="updateDataUser()">Update</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Delete -->
    <div wire:ignore.self class="modal fade" id="deleteUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Data User ({{ $name }})</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" wire:click.prevent="deleteDataUser()">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.livewire.on('addUser',()=>{
            $('#addUser').modal('hide');
        });

        window.livewire.on('editUser',()=>{
            $('#editUser').modal('hide');
        });

        window.livewire.on('deleteUser',()=>{
            $('#deleteUser').modal('hide');
        });
    </script>
</div>
