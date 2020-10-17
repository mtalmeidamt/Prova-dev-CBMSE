<!DOCTYPE html>
<html lang="pt-br">
@includeIf('template.head')
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <a class="navbar-brand" href="{{ route('index')  }}"><i class="fa fa-home" style="font-size: 35px"></i></a>
    </div>
</nav>
<br>
@include('flash::message')
<br>

<div class="container">
    <div class="col-12">
        <h2 style="text-align: center">Tipos de Contatos</h2>
    </div>
    <div class="col-12">
        <div>
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#staticBackdrop" href="{{ route('pessoa.create') }}"><i class="fa fa-plus"></i> Adicionar</button>
            <a type="button" class="btn btn-outline-danger" href="{{ route('index') }}"><i class="fa fa-backward"></i> Voltar</a>
        </div>
    </div>
</div>
<br>

<div class="container-fluid col-10">
    <table id="dt" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tiposcontatos as $tiposcontato)
            <tr>
                <td>{{$tiposcontato->descricao}}</td>
                <td style="text-align: center">
                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#confirm_{{$tiposcontato->id}}">
                        <i class="fa fa-trash"></i></button>
                    <div class="modal fade" id="confirm_{{$tiposcontato->id}}" role="dialog" data-backdrop="static">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p>Quer realmente excluir?</p>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('tipocontato.destroy', ['id' => $tiposcontato->id]) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" value="Delete" class="btn btn-danger">Excluir</button>
                                        <button type="submit" data-dismiss="modal" class="btn btn-default">Cancelar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Pessoa-->
<form method="post" action="{{ route('tipocontato.store') }}">
    @csrf
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Novo Tipo de Contato</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_contato">
                        <div class="col">
                            <label for="descricao">Descrição</label>
                            <input type="text" class="form-control" id="descricao" name="descricao" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Fim Modal Pessoa-->



<!-- Modal Excluir-->
<!-- Fim Modal Excluir-->


</body>
@includeIf('template.js')
<script>
    function verifica(value){
        let contato = document.getElementById("contato");
        if(value >= 1 && value <= 4){
            contato.disabled = false;
        }else{
            contato.disabled = true;
        }
    }


    // $('#form_contato').on('submit', function (event){
    //     event.preventDefault();
    //     if($('descricao').val() == ""){
    //         $("#msg-error").html('<div class="alert alert-danger" role="alert">Preenchar o campo descrição!</div>');
    //     }
    // else {
    //     let dados = $('#form_contato').serialize();
    //     $.post(dados, function (retorna) {
    //         if(retorna){
    //             $("#msg").html('<div class="alert alert-succes" role="alert">Tipo de contato cadastrado com sucesso!</div>');
    //
    //             $('#form_contato')[0].reset();
    //
    //             $('add')
    //         }
    //     })
    // }
    })
</script>
</html>
