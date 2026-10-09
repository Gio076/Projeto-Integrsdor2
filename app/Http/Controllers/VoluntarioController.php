<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Voluntario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class VoluntarioController extends Controller
{
    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string|max:20',
            'cpf' => 'required|string|max:14',
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],
            'senha' => 'required|string|min:8|confirmed',
            'instagram' => 'nullable|string|max:255',
            'nascimento' => 'required|date|before:today',
            'acessibilidade' => 'nullable|string|max:2000',
            'curriculo' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $caminhoCurriculo = null;

        if ($request->hasFile('curriculo')) {
            $caminhoCurriculo = $request->file('curriculo')
                ->store('curriculos', 'public');
        }

        try {
            DB::transaction(function () use (
                $dados,
                &$caminhoCurriculo
            ) {
                $usuario = User::create([
                    'user_id' => $usuario->id,
                    'telefone' => $dados['telefone'],
                    'foto' => null,
                    'cpf' => $dados['cpf'],
                    'instagram' => $dados['instagram'] ?? null,
                    'nascimento' => $dados['nascimento'],
                    'curriculo' => $caminhoCurriculo,
                    'status' => 'disponivel',
                ]);

                Voluntario::create([
                    'user_id' => $usuario->id,
                    'telefone' => $dados['telefone'],
                    'foto' => null,
                    'cpf' => $dados['cpf'],
                    'instagram' => $dados['instagram'] ?? null,
                    'nascimento' => $dados['nascimento'],
                    'curriculo' => $caminhoCurriculo,
                    'status' => 'disponivel',
                ]);
            });
        } catch (\Throwable $erro) {
            if ($caminhoCurriculo) {
                Storage::disk('public')->delete($caminhoCurriculo);
            }

            throw $erro;
        }

        return redirect()
            ->back()
            ->with('sucesso', 'Voluntário cadastrado com sucesso!');
    }
}
