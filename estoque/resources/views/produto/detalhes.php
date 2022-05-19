<!doctype html>
<html lang="en">

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.20.0/dist/bootstrap-table.min.css">

    </head>
    <body>
        
        <h1>Detalhes do Produto <?= $produtos->nome ?>:</h1>
        <div class='container'>
            <ul>
                <li>Quantidade <?= $produtos->quantidade ?></li>
                <li>Valor <?= $produtos->valor ?></li>
                <li>Descrição <?= $produtos->descricao ?></li>

            </ul>
        </div>
        

    </body>

</html>