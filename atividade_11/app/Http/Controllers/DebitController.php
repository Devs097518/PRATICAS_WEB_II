<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DebitController extends Controller
{
    public function index(Request $request)
    {
        $this->authorizeLibrarian($request);

        $usuarios = User::where('debit', '>', 0)
            ->orderByDesc('debit')
            ->get();

        return view('librarian.debits', compact('usuarios'));
    }

    public function clear(Request $request, User $user)
    {
        $this->authorizeLibrarian($request);

        $user->clearDebit();

        return redirect()
            ->route('librarian.debits.index')
            ->with('success', "Débito de {$user->name} zerado com sucesso.");
    }

    private function authorizeLibrarian(Request $request): void
    {
        if ($request->user()->role !== 'bibliotecario') {
            abort(403, 'Acesso restrito a bibliotecários.');
        }
    }
}