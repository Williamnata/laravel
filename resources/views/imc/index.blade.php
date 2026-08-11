<x-layout title="IMC" nomePage="IMC">
    <div class="container">

        <form method="post" action="{{route('imc.calcularimc')}}">
            @csrf
            <div>
                <link>Descubra seu peso</link>
                <p>Insira seu peso</p>
                <input type="text" name="peso">
                <p>Insira sua altura</p>
                <input type="text" name="altura">
                <button type="submit">Calcular</button>

            </div>
        </form>
        <label id="result">RESULTADO: </label><br>
        <label id="result">IMC: {{$resultado["imc"]}} </label><br>
        <label id="result">Faixa: {{$resultado["faixa"]}}</label><br>

   


    @if($resultado ["imc"]!= "Aguardando valores" && $resultado["faixa"] != "Aguardando valores")
    <form method="post" action="{{route('imc.salvar')}}">
        @csrf
        <input type="hidden" name="imc" value="{{ $resultado['imc'] }}">
        <input type="hidden" name="faixa" value="{{ $resultado['faixa'] }}">
        <input type="hidden" name="peso" value="{{ $resultado['peso'] }}">
        <input type="hidden" name="altura" value="{{ $resultado['altura'] }}">
 

        <div class="col-12"></div>
        <button type="submit" class="btn btn primary">Salvar</button>>
        </div>
    </form>
    @endif
</x-layout>