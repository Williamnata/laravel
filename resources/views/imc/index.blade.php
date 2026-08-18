<x-layout title="IMC" nomePage="IMC">

    <div class="flex min-h-[70vh] items-center justify-center px-4 py-10">

        <div class="w-full max-w-lg">

            {{-- Card principal --}}
            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-xl">

                {{-- Cabeçalho --}}
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-6 text-white">
                    <h1 class="text-2xl font-bold">
                        Calculadora de IMC
                    </h1>

                    <p class="mt-1 text-sm text-blue-100">
                        Informe seu peso e sua altura para calcular seu IMC.
                    </p>
                </div>

                <div class="p-6">

                    {{-- Formulário de cálculo --}}
                    <form method="post" action="{{ route('imc.calcularimc') }}">
                        @csrf

                        <div class="space-y-5">

                            {{-- Peso --}}
                            <div>
                                <label
                                    for="peso"
                                    class="mb-2 block text-sm font-semibold text-gray-700">
                                    Peso
                                </label>

                                <div class="relative">
                                    <input
                                        type="text"
                                        id="peso"
                                        name="peso"
                                        placeholder="Ex: 70"
                                        class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3 text-gray-800 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200">

                                    <span class="absolute right-4 top-1/2 -translate-y-1/2 text-sm text-gray-400">
                                        kg
                                    </span>
                                </div>
                            </div>

                            {{-- Altura --}}
                            <div>
                                <label
                                    for="altura"
                                    class="mb-2 block text-sm font-semibold text-gray-700">
                                    Altura
                                </label>

                                <div class="relative">
                                    <input
                                        type="text"
                                        id="altura"
                                        name="altura"
                                        placeholder="Ex: 1.75"
                                        class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3 text-gray-800 outline-none transition focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200">

                                    <span class="absolute right-4 top-1/2 -translate-y-1/2 text-sm text-gray-400">
                                        m
                                    </span>
                                </div>
                            </div>

                            {{-- Botão calcular --}}
                            <button
                                type="submit"
                                class="w-full rounded-xl bg-blue-600 px-5 py-3 font-semibold text-white shadow-md transition duration-200 hover:bg-blue-700 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                                Calcular IMC
                            </button>

                        </div>
                    </form>


                    {{-- Resultado --}}
                    <div class="mt-8 rounded-xl border border-gray-200 bg-gray-50 p-5">

                        <h2 class="mb-4 text-lg font-bold text-gray-800">
                            Resultado
                        </h2>

                        <div class="space-y-3">

                            {{-- IMC --}}
                            <div class="flex items-center justify-between rounded-lg bg-white px-4 py-3 shadow-sm">
                                <span class="text-sm font-medium text-gray-500">
                                    IMC
                                </span>

                                <span class="font-bold text-blue-600">
                                    {{ $resultado["imc"] }}
                                </span>
                            </div>

                            {{-- Faixa --}}
                            <div class="flex items-center justify-between rounded-lg bg-white px-4 py-3 shadow-sm">
                                <span class="text-sm font-medium text-gray-500">
                                    Faixa
                                </span>

                                <span class="font-bold text-gray-800">
                                    {{ $resultado["faixa"] }}
                                </span>
                            </div>

                        </div>

                    </div>


                    {{-- Salvar resultado --}}
                    @if($resultado["imc"] != "Aguardando valores" && $resultado["faixa"] != "Aguardando valores")

                    <form method="post" action="{{ route('imc.salvar')}}" class="mt-5" enctype="multipart/form-data">
                        @csrf

                        <input
                            type="hidden"
                            name="imc"
                            value="{{ $resultado['imc'] }}">

                        <input
                            type="hidden"
                            name="faixa"
                            value="{{ $resultado['faixa'] }}">

                        <input
                            type="hidden"
                            name="peso"
                            value="{{ $resultado['peso'] }}">

                        <input
                            type="hidden"
                            name="altura"
                            value="{{ $resultado['altura'] }}">
                        <div>
                            <label for="formFile" class="form-label">Mande sua foto</label>
                            <input class="form-control" type="file" name="image" id="formFile">
                        </div>
                        <button
                            type="submit"
                            class="w-full rounded-xl bg-emerald-600 px-5 py-3 font-semibold text-white shadow-md transition duration-200 hover:bg-emerald-700 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:ring-offset-2">
                            Salvar resultado
                        </button>

                    </form>

                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                            </li>
                        </ul>
                    </div>
                    @endif
                </div>

            </div>

        </div>

    </div>

</x-layout>