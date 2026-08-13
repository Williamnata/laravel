<?php

namespace App\Http\Controllers;

use App\Models\ImcModel;
use Illuminate\Http\Request;

class DashboardController extends Controller

{
    public function index()
    {
        // $showImc = ImcModel::orderBy('id', 'asc')->get();

        // return view('imc.dashboard')->with('showImc', $showImc);
        $showImc = ImcModel::select('imc.*', 'faixas.categoria')
            ->join('faixas', 'imc.idFaixa', '=', 'faixas.idFaixa')
            ->orderBy('imc.id', 'asc')
            ->get();

        return view('imc.dashboard')->with('showImc', $showImc);
    }

    public function update(Request $request, $id)
    {
        $updateIMC = ImcModel::findOrFail($id);

        $updateIMC->nome = $request->novo_nome;
        $updateIMC->peso = $request->novo_peso;
        $updateIMC->altura = $request->novo_altura;

        $updateIMC->save();

        return redirect('/dashboard');
    }

    public function delete($id)
    {
        $deleteImc = ImcModel::findOrFail($id);

        $deleteImc->delete();

       return redirect('/dashboard');
    }
}
