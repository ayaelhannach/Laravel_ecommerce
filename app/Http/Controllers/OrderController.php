<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Commande;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::with('commandes')->get();
        return view('clients.index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client = new Client();
        $client->nom = $request->nom;
        $client->telephone = $request->telephone;
        $client->adresse = $request->adresse;
        $client->ville = $request->ville;
        $client->code_postale = $request->code_postale;
        $client->pays = $request->pays;
        $client->save();

        return redirect()->route('clients.index')->with('success', 'Client ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $client = Client::with('commandes')->findOrFail($id);
        return view('clients.show', ['client' => $client]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', ['client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $client->nom = $request->nom;
        $client->telephone = $request->telephone;
        $client->adresse = $request->adresse;
        $client->ville = $request->ville;
        $client->code_postale = $request->code_postale;
        $client->pays = $request->pays;
        $client->save();

        return redirect()->route('clients.index')->with('success', 'Client mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $client = Client::with('commandes')->findOrFail($id);
        $client->commandes()->delete();
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client supprimé avec succès.');
    }
}