
<?php
class ImcController
{
    public function CalculoIMC($peso, $altura)
    {
        $resultado = [];

        if (isset($peso) && isset($altura)) {

            if ($peso > 0 && $altura > 0) {
                $imc = $peso / ($altura * $altura);

                $resultado["imc"] = $imc;

                if ($imc < 18.5) {
                    $resultado["faixa"] =  "Abaixo do peso.";
                } elseif ($imc >= 18.5 && $imc < 24.9) {
                    $resultado["faixa"] = "Peso normal";
                } elseif ($imc >= 25.0 && $imc < 29.9) {
                    $resultado["faixa"] = "Sobrepeso";
                } elseif ($imc >= 30.0 && $imc < 34.9) {
                    $resultado["faixa"] = "Obesidade grau 1";
                } elseif ($imc >= 35.0 && $imc < 39.9) {
                    $resultado["faixa"] = "Obesidade grau 2";
                } elseif ($imc >= 40.0) {
                    $resultado["faixa"] = "TaPoxa menor me ajuda YODA";
                }
            }
        }

        return $resultado;
    }
}