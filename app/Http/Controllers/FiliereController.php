<?php

namespace App\Http\Controllers;

use App\Http\Requests\FiliereRequest;
use App\Models\Filiere;

class FiliereController extends Controller
{
    public function index()
    {
        $filieres = Filiere::latest()->paginate(10);
        return view('filieres.index', compact('filieres'));
    }

    public function create()
    {
        return view('filieres.create');
    }

    public function store(FiliereRequest $request)
    {
        Filiere::create($request->validated());

        return redirect()
            ->route('filieres.index')
            ->with('success', 'Filière créée avec succès.');
    }

    public function edit(Filiere $filiere)
    {
        return view('filieres.edit', compact('filiere'));
    }

    public function update(FiliereRequest $request, Filiere $filiere)
    {
        $filiere->update($request->validated());

        return redirect()
            ->route('filieres.index')
            ->with('success', 'Filière modifiée avec succès.');
    }

    public function destroy(Filiere $filiere)
    {
        try {
            $filiere->delete();

            return back()->with('success', 'Filière supprimée.');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }
}