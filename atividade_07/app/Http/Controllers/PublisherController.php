<?php
namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    // Exibe uma lista de editores
    public function index()
    {
        $publishers = Publisher::all();
        return view('publishers.index', compact('publishers'));
    }

    // Mostra o formulário para criar um novo editor
    public function create()
    {
        return view('publishers.create');
    }

    // Armazena um novo editor no banco de dados
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:publishers|max:255',
        ]);

        Publisher::create($request->all());

        return redirect()->route('publishers.index')->with('success', 'Editor criado com sucesso.');
    }

    // Exibe um editor específico
    public function show(Publisher $publisher)
    {
        return view('publishers.show', compact('publisher'));
    }

    // Mostra o formulário para editar um editor existente
    public function edit(Publisher $publisher)
    {
        return view('publishers.edit', compact('publisher'));
    }

    // Atualiza um editor no banco de dados
    public function update(Request $request, Publisher $publisher)
    {
        $request->validate([
            'name' => 'required|string|unique:publishers,name,' . $publisher->id . '|max:255',
        ]);

        $publisher->update($request->all());

        return redirect()->route('publishers.index')->with('success', 'Editor atualizado com sucesso.');
    }

    // Remove um editor do banco de dados
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();

        return redirect()->route('publishers.index')->with('success', 'Editor excluído com sucesso.');
    }
}