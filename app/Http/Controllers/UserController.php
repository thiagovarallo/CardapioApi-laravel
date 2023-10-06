<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    private $user;

    public function __construct(User $user)
    {
        $this->user  = $user;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all = $this->user->all();

        return response()->json($all);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $store = $this->user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rule' => $request->rule,
        ]);

        return response()->json(['mensagem' => 'Salvo com sucesso', $store], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $search = $this->user->find($id);

        if (!$search) {
            return response()->json(['mensagem' => 'usuario não encontrado'],404);
        }

        return response()->json([$search],200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
