<div>
    <div class="card-header">
        <input type="text" class="form-control" width="100%" placeholder="Escriba un nombre ..." wire:model="search"
            wire:keydown="limpiarPage">
    </div>
    <div class="card">
        @if (count($users) > 0)
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td width="10px">
                                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary">
                                        Editar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $users->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>No existe registros</strong>
            </div>
        @endif
    </div>
</div>
