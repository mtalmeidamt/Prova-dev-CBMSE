<!DOCTYPE html>
<html lang="pt-br">
@includeIf('template.head')
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <a class="navbar-brand" href="{{ route('index') }}"><i class="fa fa-home" style="font-size: 35px"></i></a>
    </div>
</nav>
<br>
@include('flash::message')
<br>

<div class="container">
    <div class="col-12">
        <h2 style="text-align: center">Todas Pessoas</h2>
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
            <th>Sobrenome</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pessoas as $pessoa)
            <tr>
                <td>{{$pessoa->nome}}</td>
                <td>{{$pessoa->sobrenome}}</td>
                <td style="text-align: center">
                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#staticBackdrop2" title="Adicionar Contatos" onclick="pegarPessoa({{ $pessoa->id }})">
                        <i class="fa fa-plus"></i>
                    </button>
                    <a type="button" class="btn btn-outline-secondary" href="{{ route('contato.show', [$pessoa->id])}}" title="Listar Contatos"><i class="fa fa-list-alt"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Pessoa-->
<form method="post" action="{{ route('pessoa.store') }}">
    @csrf
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Nova Pessoa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col">
                                <label>Nome:</label>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Informe o Nome" required>
                            </div>
                            <div class="col">
                                <label>Sobrenome:</label>
                                <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Informe o Sobrenome" required>
                            </div>
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

<!-- Modal Contato-->
<form method="post" action="{{ route('contato.store') }}">
    @csrf
    <div class="modal fade" id="staticBackdrop2" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Novo Cadastro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" name="id_pessoa" value="" id="id_pessoa">
                        <div class="row">
                            <div class="col">
                                <label>Tipo Contato:</label>
                                <select name="tipos_contatos_id" class="form-control" id="selectOption" onchange="verifica(this.value)">
                                    <option value="" disabled selected>Selecione</option>
                                    @foreach($tiposContatos as $tiposContato)
                                        <option value="{{$tiposContato->id}}">{{$tiposContato->descricao}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="descricao">Descrição</label>
                                <input type="text" class="form-control" id="contato" name="contato" placeholder="Informe o contato" disabled required>
                            </div>
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
<!-- Fim Modal Contato-->

</body>
@includeIf('template.js')
<script>
    function pegarPessoa(id){
        var pessoa_id = document.getElementById('id_pessoa');
        pessoa_id.setAttribute('value', id);
    }
    function verifica(value){
        let contato = document.getElementById("contato");
        if(value >= 1 && value <= 4){
            contato.disabled = false;
        }else{
            contato.disabled = true;
        }
    }
</script>
</html>
