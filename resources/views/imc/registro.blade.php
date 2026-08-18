<x-layout title="Registro" nomePage="Registro de Usuário">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="post">
        @csrf
        <div class="from-group">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="name" id="nome" class="form-control">
        </div>

        <div class="from-group">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="from-group">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <div class="from-group">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password_confirmation" id="password" class="form-control">
        </div>
        <br>
        <div class="from-group">
            <select class="form-select" aria-label="Default select example" name="nivel" required>
                <option selected>Nível de acesso</option>
                <option value="1">Usuário Comum</option>
                <option value="2">Colaborador</option>
                <option value="3">Gerente</option>
            </select>
        </div>
        <button class="btn btn-primary mt-3">Cadastrar</button>
    </form>

</x-layout>