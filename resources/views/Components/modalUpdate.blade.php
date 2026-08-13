<div class="modal fade" id="myModal{{$id}}" tabindex="-1"
    aria-labelledby="exampleModalLabel{{$id}}" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel{{$id}}">Atualizar Nome</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dash.update', ['id' => $id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="novo_nome{{$id}}">Novo Nome:</label>
                        <input type="text" class="form-control" id="novo_nome{{$id}}" name="novo_nome"
                            value="{{$nome}}">
                    </div>
                    <div class="form-group">
                        <label for="novo_peso{{$id}}">Novo Peso:</label>
                        <input type="text" class="form-control" id="novo_peso{{$id}}"
                            name="novo_peso" value="{{$peso}}">
                    </div>
                    <div class="form-group">
                        <label for="novo_altura{{$id}}">Nova Altura:</label>
                        <input type="text" class="form-control" id="novo_altura{{$id}}"
                            name="novo_peso" value="{{$altura}}">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>