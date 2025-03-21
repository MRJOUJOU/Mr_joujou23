<?php
namespace App\Http\Controllers;

use App\Models\Oeuvre;
use App\Models\Categorie;
use Illuminate\Http\Request;

class OeuvreController extends Controller {
    public function index() {
        $oeuvres = Oeuvre::with('categorie')->get();
        return view('oeuvres.index', compact('oeuvres'));
    }

    public function create() {
        $categories = Categorie::all();
        return view('oeuvres.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'titre' => 'required|string|max:255',
            'artiste' => 'required|string|max:255',
            'annee_fabrication' => 'required|integer',
            'date_acquisition' => 'required|date',
            'prix_estime' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('oeuvres', 'public');
            $data['image'] = $imagePath;
        }

        Oeuvre::create($data);
        return redirect()->route('oeuvres.index')->with('success', 'Œuvre ajoutée avec succès.');
    }

    public function show(Oeuvre $oeuvre) {
        return view('oeuvres.show', compact('oeuvre'));
    }

    public function edit(Oeuvre $oeuvre) {
        $categories = Categorie::all();
        return view('oeuvres.edit', compact('oeuvre', 'categories'));
    }

    public function update(Request $request, Oeuvre $oeuvre) {
        $request->validate([
            'titre' => 'required|string|max:255',
            'artiste' => 'required|string|max:255',
            'annee_fabrication' => 'required|integer',
            'date_acquisition' => 'required|date',
            'prix_estime' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('oeuvres', 'public');
            $data['image'] = $imagePath;
        }

        $oeuvre->update($data);
        return redirect()->route('oeuvres.index')->with('success', 'Œuvre mise à jour.');
    }

    public function destroy(Oeuvre $oeuvre) {
        $oeuvre->delete();
        return redirect()->route('oeuvres.index')->with('success', 'Œuvre supprimée.');
    }
}
