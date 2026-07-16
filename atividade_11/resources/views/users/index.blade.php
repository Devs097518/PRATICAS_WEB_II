<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Papel</th>
            @can('updateRole', $users->first() ?? new App\Models\User())
                <th>Ação</th>
            @endcan
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                @can('updateRole', $user)
                    <td>
                        <form action="{{ route('users.updateRole', $user) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select name="role" onchange="this.form.submit()">
                                <option value="admin" @selected($user->role === 'admin')>Admin</option>
                                <option value="bibliotecario" @selected($user->role === 'bibliotecario')>Bibliotecário</option>
                                <option value="client" @selected($user->role === 'client')>Cliente</option>
                            </select>
                        </form>
                    </td>
                @endcan
            </tr>
        @endforeach
    </tbody>
</table>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif