<?php

namespace App\Http\Controllers;

use App\Http\Requests\TarifRequest;
use App\Models\Tarif;

class TarifController extends Controller
{
    // ===============================
    // INDEX
    // ===============================

    public function index()
    {
        $tarifs = Tarif::latest()->paginate(10);

        return view('tarifs.index', compact('tarifs'));
    }

    // ===============================
    // CREATE
    // ===============================

    public function create()
    {
        return view('tarifs.create');
    }

    // ===============================
    // STORE
    // ===============================

    public function store(TarifRequest $request)
    {
        Tarif::create($request->validated());

        return redirect()
            ->route('tarifs.index')
            ->with('success', 'Tarif créé avec succès.');
    }

    // ===============================
    // EDIT
    // ===============================

    public function edit(Tarif $tarif)
    {
        return view('tarifs.edit', compact('tarif'));
    }

    // ===============================
    // UPDATE
    // ===============================

    public function update(TarifRequest $request, Tarif $tarif)
    {
        $tarif->update($request->validated());

        return redirect()
            ->route('tarifs.index')
            ->with('success', 'Tarif modifié avec succès.');
    }

    // ===============================
    // DESTROY
    // ===============================

    public function destroy(Tarif $tarif)
    {
       try {
            $tarif->delete();

            return back()->with('success', 'tarif supprimé.');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }
}