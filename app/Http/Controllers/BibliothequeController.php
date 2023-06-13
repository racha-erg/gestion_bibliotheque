<?php

namespace App\Http\Controllers;
use App\Models\Livre;
use Illuminate\Http\Request;
use App\Models\Autheur;

class BibliothequeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livres = Livre::paginate(5);

        return view('livres.index', compact('livres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $livres = Livre::all();
    $autheurs = Autheur::all();

    return view('livres.create', compact('livres', 'autheurs'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        
        $request->validate([
            'titre' => 'required',
            'annee_publication' => 'required|date',
            'nb_pages' => 'required|integer|min:1',
            'auteur_id' => 'required|exists:autheurs,id',
        ]);
        //dd($request);
        
        Livre::create($request->all());

        return redirect()->route('livres.index')->with('success', 'Le livre a été créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $livre = Livre::findOrFail($id);

        return view('livres.show', compact('livre'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $livre = Livre::find($id);
    $autheurs = Autheur::all();

    return view('livres.edit', compact('livre', 'autheurs'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $livre = Livre::findOrFail($id);

        $validatedData = $request->validate([
            'titre' => 'required',
            'annee_publication' => 'required|date',
            'nb_pages' => 'required|integer|min:1',
            'auteur_id' => 'required|exists:autheurs,id',
        ]);
        

        $livre->update($validatedData);

        return redirect()->route('livres.index', $livre->id)->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $livre = Livre::findOrFail($id);
        $livre->delete();

        return redirect()->route('livres.index')->with('success', 'Book deleted successfully.');
    }
}
