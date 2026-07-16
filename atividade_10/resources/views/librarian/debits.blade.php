@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Usuários com débitos pendentes</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Débito (R$)</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ number_format($usuario->debit, 2, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('librarian.debits.clear', $usuario) }}" method="POST" onsubmit="return confirm('Confirmar pagamento e zerar débito de {{ $usuario->name }}?');">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">Zerar débito (pago)</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nenhum usuário com débito pendente.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection