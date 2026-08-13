<x-layout title="Dashboard" namePage="Dashboard">

    <div class="mx-auto w-full max-w-6xl px-4 py-8">

        {{-- Título --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-800">
                HISTÓRICO DE IMC
            </h1>

            <p class="mt-2 text-sm text-gray-500">
                Consulte e gerencie seus registros de IMC.
            </p>
        </div>

        {{-- Tabela --}}
        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-lg">

            <div class="overflow-x-auto">

                <table class="w-full text-left text-sm text-gray-600">

                    {{-- Cabeçalho --}}
                    <thead class="bg-gray-50 text-xs uppercase tracking-wider text-gray-600">
                        <tr>

                            <th scope="col" class="px-6 py-4 font-semibold">
                                ID
                            </th>

                            <th scope="col" class="px-6 py-4 font-semibold">
                                Nome
                            </th>

                            <th scope="col" class="px-6 py-4 font-semibold">
                                Peso
                            </th>

                            <th scope="col" class="px-6 py-4 font-semibold">
                                Altura
                            </th>

                            <th scope="col" class="px-6 py-4 text-center font-semibold">
                                Ações
                            </th>

                        </tr>
                    </thead>

                    {{-- Corpo --}}
                    <tbody class="divide-y divide-gray-100">

                        @foreach($showImc as $imc)

                        <tr class="transition duration-200 hover:bg-gray-50">

                            {{-- ID --}}
                            <th
                                scope="row"
                                class="whitespace-nowrap px-6 py-5 font-semibold text-gray-800"
                            >
                                #{{ $imc->id }}
                            </th>

                            {{-- Nome --}}
                            <td class="px-6 py-5 font-medium text-gray-700">
                                {{ $imc->nome }}
                            </td>

                            {{-- Peso --}}
                            <td class="px-6 py-5">
                                <span class="rounded-lg bg-blue-50 px-3 py-1.5 font-medium text-blue-700">
                                    {{ $imc->peso }} kg
                                </span>
                            </td>

                            {{-- Altura --}}
                            <td class="px-6 py-5">
                                <span class="rounded-lg bg-purple-50 px-3 py-1.5 font-medium text-purple-700">
                                    {{ $imc->altura }} m
                                </span>
                            </td>

                            {{-- Ações --}}
                            <td class="px-6 py-5">

                                <div class="flex items-center justify-center gap-2">

                                    {{-- Excluir --}}
                                    <form
                                        id="deleteForm{{ $imc->id }}"
                                        action="{{ route('dash.delete', ['id' => $imc->id]) }}"
                                        method="POST"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            title="Excluir"
                                            class="flex h-10 w-10 items-center justify-center rounded-lg bg-red-50 text-red-600 transition duration-200 hover:bg-red-600 hover:text-white"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="18"
                                                height="18"
                                                fill="currentColor"
                                                viewBox="0 0 16 16"
                                            >
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4H1.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3v1h11V3h-11z"/>
                                            </svg>
                                        </button>
                                    </form>

                                    {{-- Atualizar --}}
                                    <button
                                        type="button"
                                        title="Atualizar"
                                        class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-50 text-blue-600 transition duration-200 hover:bg-blue-600 hover:text-white"
                                        data-bs-toggle="modal"
                                        data-bs-target="#myModal{{ $imc->id }}"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="18"
                                            height="18"
                                            fill="currentColor"
                                            viewBox="0 0 16 16"
                                        >
                                            <path d="M11 5.466V4H5a4 4 0 0 0-3.584 5.777.5.5 0 1 1-.896.446A5 5 0 0 1 5 3h6V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192"/>
                                            <path d="M13.81 6.552a.5.5 0 0 1 .225.67A5 5 0 0 1 11 10.534V12h-6a.25.25 0 0 1-.192-.41l1.966-2.36a.25.25 0 0 1 .384 0l1.966 2.36a.25.25 0 0 1-.192.41V10.534a4 4 0 0 0 3.584-5.777.5.5 0 0 1 .225-.67z"/>
                                        </svg>
                                    </button>

                                </div>

                            </td>

                        </tr>

                        {{-- Modal --}}
                        <x-modalUpdate
                            id="{{ $imc->id }}"
                            nome="{{ $imc->nome }}"
                            peso="{{ $imc->peso }}"
                            altura="{{ $imc->altura }}"
                        />

                        @endforeach

                    </tbody>

                </table>

            </div>

            {{-- Rodapé --}}
            <div class="border-t border-gray-100 bg-gray-50 px-6 py-4">
                <p class="text-sm text-gray-500">
                    Total de registros:
                    <span class="font-semibold text-gray-700">
                        {{ $showImc->count() }}
                    </span>
                </p>
            </div>

        </div>

    </div>

</x-layout>