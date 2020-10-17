<!DOCTYPE html>
<html lang="pt-br">
@includeIf('template.head')
<body>
@include('flash::message')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <a class="navbar-brand" href="{{ route('index') }}"><i class="fa fa-home" style="font-size: 35px"></i></a>
    </div>
</nav>
<br>

<div class="container">
    <div class="col-12">
        <h2 style="text-align: center">Seja Bem-Vindo ao Sistema de Agenda do CBM-SE</h2>
    </div>
</div>
<br>
<div class="container-fluid">
    <div style="text-align: center">
        <a type="button" class="btn btn-info btn-lg" href="{{ route('pessoa.create') }}"><i class="fa fa-users"></i> Pessoas</a>
    </div>
    <br>
    <div style="text-align: center">
        <a type="button" class="btn btn-secondary btn-lg" href="{{ route('tipocontato.create') }}"><i class="fa fa-book"></i> Tipos de Contatos</a>
    </div>
</div>

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
</script>
</html>
