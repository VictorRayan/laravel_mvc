@extends('../layouts/principal')
@section('conteudo')

    <div id="div_form" class="container">

        <form id="form_new_prod" name="form_new_prod" method="post" action="/produtos/adiciona">
        
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">

            <div class="form-group">
                <label>Nome do Produto</label>
                <input type="text" id="inputProdName" name="inputProdName" class="form-control">
            </div>

            <div class="form-group">
                <label>Quantidade</label>
                <input type="number" id="inputProdQuant" name="inputProdQuant" class="form-control">
            </div>

            <div class="form-group">
                <label>Descrição</label>
                <input type="text" id="inputProdDesc" name="inputProdDesc" class="form-control">
            </div>

            <div class="form-group">
                <label>Valor</label>
                <input type="text" id="inputProdVal" name="inputProdVal" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
        </form>
    </div>

@stop