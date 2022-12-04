<?php

namespace App\Http\Controllers;

use App\Models\profil;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfilController extends Controller
{
    public function index()
{
    // On récupère tous les utilisateurs
    $users = profil::all();

    // On retourne les informations des utilisateurs en JSON
    return response()->json($users);
}
public function show($id)
{
    $user = profil::find($id);
    return response()->json($user, 200);

}
public function store(Request $request)
{
    // La validation de données
    $this->validate($request, [
        'nom' => 'required',
        'prenom' => 'required',
       
    ]);

    // On crée un nouvel utilisateur
    $user = profil::create([
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        
    ]);
    
    
    // On retourne les informations du nouvel utilisateur en JSON
    return response()->json($user, 201);
}
public function update(Request $request, profil $user)
{
    //La validation de données
    $this->validate($request, [
        'nom' => 'required',
        'prenom' => 'required',
       
    ]);

    // On modifie les informations de l'utilisateur

    $user->update([
        'nom' => $request->nom,
        'prenom' => $request->prenom,
    ]);

    // On retourne la réponse JSON
    return response()->json();
}

public function destroy(Profil $user)
{
    // On supprime l'utilisateur
    $user->delete();

    // On retourne la réponse JSON
    return response()->json();
}
}
