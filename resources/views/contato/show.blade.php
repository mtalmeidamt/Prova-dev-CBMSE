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

<div class="container">
    <div class="col-12">
        <h2 style="text-align: center">Todos Contatos de {{$pessoa->nome}}</h2>
    </div>
    <div class="col-12">
        <div>
            <a type="button" class="btn btn-outline-danger" href="{{ route('pessoa.create') }}"><i class="fa fa-backward"></i> Voltar</a>
        </div>
    </div>
</div>
<br>

<div class="container-fluid col-10">
    <table id="dt" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>Tipo Contato</th>
            <th>Contato</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contatos as $contato)
            <tr>
                <td>{{$contato->tipoContato->descricao}}</td>
                <td>{{$contato->contato}}</td>
                <td style="text-align: center">
                    {{--                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#staticBackdrop2" title="Adicionar Contatos"">--}}
                    {{--                        <i class="fa fa-plus"></i>--}}
                    {{--                    </button>--}}

                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#staticBackdrop2_{{$contato->id}}" title="Editar Contatos">
                        <i class="fa fa-edit"></i>
                    </button>
                {{--                    <a type="button" class="btn btn-outline-secondary" href="#" title="Editar Contatos"><i class="fa fa-edit"></i></a>--}}

                <!-- Modal Excluir -->
                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#confirm_{{$contato->id}}">
                        <i class="fa fa-trash"></i></button>
                    <div class="modal fade" id="confirm_{{$contato->id}}" role="dialog" data-backdrop="static">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p>Quer realmente excluir?</p>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('contato.destroy', ['id' => $contato->id]) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" value="Delete" class="btn btn-danger">Excluir</button>
                                        <button type="submit" data-dismiss="modal" class="btn btn-default">Cancelar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Excluir -->

                    <!-- Modal Editar -->
                    <form method="post" action="{{ route('contato.update', ['id' => $contato->id]) }}">
                        @csrf
                        <div class="modal fade" id="staticBackdrop2_{{$contato->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Editar Cadastro</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('contato.update', ['id' => $contato->id]) }}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" name="id_pessoa" value="" id="id_pessoa">
                                            <div class="row">
                                                <div class="col">
                                                    <label for="descricao">Tipo Contato:</label>
                                                    <input type="text" value="{{$contato->tipoContato->descricao}}" class="form-control" id="conTipoContatoDescricao" name="conTipoContatoDescricao" placeholder="Informe o contato" disabled>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="descricao">Descrição</label>
                                                    <input type="text" value="{{$contato->contato}}" class="form-control" id="contato" name="contato" placeholder="Informe o contato" required>
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
                    <!-- Modal Editar -->
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
@includeIf('template.js')
</html>
