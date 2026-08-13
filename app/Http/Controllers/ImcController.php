<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImcModel;
use App\Models\FaixaModel;
use Illuminate\Support\Facades\Validator;

class ImcController extends Controller
{
    public function index()
    {
        $resultado = [
            "imc" =>  "Aguardando valores ",
            "faixa" =>  "Aguardando valores"
        ];
        return view('imc.index')->with('resultado', $resultado);
    }

    public function calcularimc(Request $request)
    {
        $post = $request->all();

        $resultado["peso"] = $post["peso"];
        $resultado["altura"] = $post["altura"];

        $imc = $resultado["peso"] / ($resultado["altura"] ** 2);

        $resultado["imc"] = round($imc, 2);
        if ($imc < 18.5) {
            $resultado["faixa"] =  "abaixo";
        } elseif ($imc >= 18.5 && $imc < 24.9) {
            $resultado["faixa"] = "normal";
        } elseif ($imc >= 25.0 && $imc < 29.9) {
            $resultado["faixa"] = "obesidade grau 1";
        } elseif ($imc >= 30.0 && $imc < 34.9) {
            $resultado["faixa"] = "obesidade grau 2";
        } elseif ($imc >= 35.0 && $imc < 39.9) {
            $resultado["faixa"] = "obesidade grau 3";
        } elseif ($imc >= 40.0) {
            $resultado["faixa"] = "TaPoxa menor me ajuda YODA";
        }


        return view('imc.index')
            ->with('resultado', $resultado);
    }

    public function store(Request $request)
    {
        $data = $request->all();


        $peso = $data["peso"];
        $altura = $data["altura"];
        $faixa = $data["faixa"];

        $idFaixa = FaixaModel::where('categoria', $faixa)->value('idFaixa');

        $imcModel = new ImcModel();

        $imcModel->altura = $altura;
        $imcModel->peso = $peso;
        $imcModel->idFaixa = $idFaixa;

        $imcModel->save();

        return to_route('imc.index');

        $imcModel = new ImcModel();

        $validador = validador::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validador->fails()) {
            return redirect()
                ->route('imc.index')
                ->withErrors($validador)
                ->withInput();
        }


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $nome . '_' . time() . '.' . $image->getClientOriginalExtension();

            $image->storeAs('images/user', $imageName, 'local');

            $imcModel->url = 'storge/app/private/images/user/' . $imageName;
        } else {
            return redirect()
                ->route('imc.index')
                ->with('error', 'Falha ao carregar a imagem.');
        }
    }
}
