<?php

namespace App\Http\Controllers;

use App\Models\Voluntario;
use Illuminate\Http\Request;

class VoluntarioController extends Controller
{
      public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string|max:20',
            'cpf' => 'required|string|max:14',
            'email' => 'required|email',
            'instagram' => 'nullable|string|max:255',
            'nascimento' => 'required|date',
            'acessibilidade' => 'nullable|string',
            'curriculo' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('curriculo')) {
            $dados['curriculo'] = $request->file('curriculo')
                ->store('curriculos', 'public');
        }

        Voluntario::create($dados);

        return redirect()->back()->with('sucesso', 'Voluntário cadastrado com sucesso!');
    }
}

