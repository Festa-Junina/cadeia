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

    <title>Editar categoria</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('mensagem.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar categoria 
                            <a href="index.php" class="btn btn-danger float-end">VOLTAR</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['idCategoria']))
                        {
                            $idCategoria = mysqli_real_escape_string($con, $_GET['idCategoria']);
                            $query = "SELECT * FROM categoria WHERE idCategoria = {$_GET['idCategoria']}";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $categoria = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                        <input type="hidden" name="idCategoria" value="<?=$categoria['idCategoria'];?>" class="form-control">

                                    <div class="mb-3">
                                        <label>Nome</label>
                                        <input type="text" name="categ_nome" value="<?=$categoria['categ_nome'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        
                                        <button type="submit" name="editarcategoria" class="btn btn-primary">
                                            Atualizar categoria
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>Nenhum ID encontrado</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>