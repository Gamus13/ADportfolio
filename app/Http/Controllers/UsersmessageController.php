<?php

namespace App\Http\Controllers;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersmessageController extends Controller
{
        // public function store(Request $request)
        // {
        //     $validatedData = $request->validate([
        //         'noms' => 'required',
        //         'prenoms' => 'required',
        //         'email' => 'required|email',
        //         'telephone' => 'required',
        //         'message' => 'required',
        //     ]);

        //     Information::create($validatedData);

        //     return response()->json(['message' => 'Informations enregistrées avec succès.']);
        // }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'noms' => 'required',
            'prenoms' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            'message' => 'required',
        ]);

        $validatedData['role'] = 'visiteur';

        Information::create($validatedData);

        return response()->json(['message' => 'Informations enregistrées avec succès.']);
    }
}
