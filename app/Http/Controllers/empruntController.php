<?php

namespace App\Http\Controllers;
use App\Models\Emprunt;
use Illuminate\Http\Request;
use App\Models\Livre;

    class empruntController extends Controller
    {
        public function index()
        {
            $emprunts = Emprunt::all();
            return view('emprunts.index', compact('emprunts'));
        }
    
        public function create()
        {
            $livres = Livre::all();
            return view('emprunts.create',compact('livres'));
        }
    
        public function store(Request $request)
        {
            $request->validate([
                'livre_id' => 'required|exists:livres,id',
                'date_emprunt' => 'required|date',
                'date_retour' => 'required|date',
            ]);
    
            Emprunt::create($request->all());
    
            return redirect()->route('emprunts.index')->with('success', 'The loan has been created successfully.');
        }
    
        public function edit($id)
        {
            $emprunt = Emprunt::findOrFail($id);
            $livres = Livre::all();
            return view('emprunts.edit', compact('emprunt', 'livres'));
        }
    
        public function update(Request $request, Emprunt $emprunt)
        {
            $request->validate([
                'livre_id' => 'required|exists:livres,id',
                'date_emprunt' => 'required|date',
                'date_retour' => 'required|date',
            ]);
    
            $emprunt->update($request->all());
    
            return redirect()->route('emprunts.index')->with('success', 'The loan has been updated successfully.');
        }
    
        public function destroy(Emprunt $emprunt)
        {
            $emprunt->delete();
    
            return redirect()->route('emprunts.index')->with('success', 'The loan has been deleted successfully.');
        }
    }
    