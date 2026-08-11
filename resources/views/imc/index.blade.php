<x-layout title="IMC">
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

    </div>
  </x-layout>





