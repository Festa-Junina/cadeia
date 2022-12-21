<?php
    session_start();
    require 'dbcon.php';
?>
<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Categoria</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('mensagem.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Categorias
                        <?php 
                                    $query = "SELECT COUNT(IdCategoria) categorias FROM categoria;";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $categoria)
                                        {
                                            ?>
                                            <tr>
                                                <?php echo "(";?>
                                                <td><?= $categoria['categorias']; ?></td>
                                                <?php echo ")";?>
                                            <?php
                                        }
                                    }
                                    else{
                                        echo "<h5> 0 </h5>";}
                                    ?>

                            <a href="cadastrar.php" class="btn btn-primary float-end">Cadastrar categoria</a>
                        </h4>

                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Quantidade de perguntas</th>
                                    <th></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php 
                                    $query = "SELECT c.categ_nome, c.idCategoria, COUNT(p.IdPergunta)perguntas FROM categoria c LEFT JOIN pergunta p ON c.idCategoria = p.idCategoria GROUP BY c.idCategoria;";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $categoria)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $categoria['categ_nome']; ?></td>
                                                <td><?= $categoria['perguntas']; ?></td>
                                                <td>
                                                    <a href="editar.php?idCategoria=<?=$categoria['idCategoria']; ?>" class="btn btn-success btn-sm">Editar</a>
                                                    <a href="code.php?idCategoria=<?=$categoria['idCategoria']; ?>" class="btn btn-success btn-sm">Excluir</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> Nenhuma categoria foi cadastrada </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>