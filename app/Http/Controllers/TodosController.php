<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;


class TodosController extends Controller
{
    /**
     * index : muestra los datos
     * store: guarda un dato
     * edit: muestra el formulario para edición
     * delete: eliminar un dato
     * update: actualiza un dato
     */

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required | min:3'
        ]);

        $todo = new Todo();
        $todo->title = $request->title;
        $todo->save();

        return redirect()->route('todos')->with('success', 'Task Added');
    }

    public function index()
    {
        $todos = Todo::all();
        // con dd podemos obtener una especie de console log, excelente para debug
        return view('pages.index', compact('todos'));
    }

    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('pages.edit', compact('todo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required | min:3'
        ]);

        $todo = Todo::find($id);
        $todo->title = $request->title;
        $todo->save();

        return redirect()->route('todos')->with('success', 'Task Updated');
    }

    public function delete($id)
    {
        $todo = Todo::find($id);
        $todo->delete();

        return redirect()->route('todos')->with('success', 'Task Deleted');
    }

}
