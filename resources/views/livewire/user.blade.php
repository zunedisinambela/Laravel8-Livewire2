<div class="col-sm-12">
    <div class="card">
        <div class="card-header">Data User</div>
        <div class="card-body">
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
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($users as $index=>$item)
                        <tr>
                            <th scope="row">{{ $index + $users->firstItem() }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pull-right">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
