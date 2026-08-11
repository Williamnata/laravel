<x-layout title="Dashboard" namePage="Dasboard">

    <div class="titulo">
        <h1>HISTÓRICO DE IMC</h1>
    </div>

    <table class="table">
    </table>
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Peso</th>
            <th scope="col">Altura</th>
            <th scope="col">Faixa</th>
            <th scope="col">Ações</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($showImc as $imc)
        <tr>
            <th scope="row">{{$imc->id}}</th>
            <td>{{$imc->nome}}</td>
            <td>{{$imc->peso}}</td>
            <td>{{$imc->altura}}</td>
        </tr>
        @endforeach
    </tbody>


</x-layout>