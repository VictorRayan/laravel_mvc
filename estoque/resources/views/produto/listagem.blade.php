
@extends('../layouts/principal')
@section('conteudo')

        <h1>CRUD Laravel - Produtos</h1>


        <?php  
            $info = session()->get('info');
            if(isset($info)):
        ?>
                
                <div class="alert alert-success">
                    <strong><?=$info?></strong>
                </div>
        <?php endif ?> 


        <div class="container">
            <table class="table table-hover">

                <?php if(empty($produtos)):?>
                    <div class="alert alert-danger">
                        <p>Nenhum produto encontrado</p>
                    </div>
                <?php else: ?>
                    <?php foreach($produtos as $p):?>
                        <tr class="<?php echo($p->quantidade <= 1)? 'table-danger' : ''?>">
                            <td><?= $p->nome?></td> <!--- The command within ?= represents the shortcut of
                            php echo function ---> 
                            <td><?= $p->descricao?></td>
                            <td><?= $p->valor?></td>
                            <td><?= $p->quantidade?></td>
                            <td><a href="/lista/mostrar/<?= $p->id?>">Veja mais</td>
                            <td><a href="/produtos/remover/<?= $p->id?>">Excluir</td>
                            <td><a href="/produtos/alterar/<?= $p->id?>">Alterar</td>
                    <?php endforeach ?>

                    </tr>
                <?php endif ?>
            </table>
        </div>
           
@stop