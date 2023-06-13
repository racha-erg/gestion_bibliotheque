<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Autheur;

class autheurController extends Controller
{
    public function index()
    {
        $autheurs = Autheur::all();
        return view('autheurs.index', compact('autheurs'));
    }

    public function create()
    {
        return view('autheurs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
         
        ]);

        Autheur::create($request->all());

        return redirect()->route('autheurs.index')->with('success', 'L\'auteur a été créé avec succès.');
    }

    public function edit($id)
    {
        $autheur = Autheur::findOrFail($id);
        return view('autheurs.edit', compact('autheur'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
           
        ]);

        $autheur = Autheur::findOrFail($id);
        $autheur->update($request->all());

        return redirect()->route('autheurs.index')->with('success', 'L\'auteur a été mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $autheur = Autheur::findOrFail($id);
        $autheur->delete();

        return redirect()->route('autheurs.index')->with('success', 'L\'auteur a été supprimé avec succès.');
    }
}
