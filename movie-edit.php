<?php
session_start();
require 'dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  <title>UDESC Cine</title>
</head>

<body class="bg-dark bg-gradient">

  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">UDESCine</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="session-create.php">Nova Sessão</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="movie.php">Filmes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="room-view.php">Salas</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-5">

    <?php include('message.php'); ?>



    <div class="row">
      <div class="col-md-12">
        <div class="card card bg-dark text-white">
          <div class="card-header">
            <h4> Editar Filme
              <a href="movie.php" class="btn btn-danger float-end">BACK</a>
            </h4>
          </div>
          <div class="card-body">

    
          <?php
            include('dbcon.php');
            $token = $_GET['token'];
            $ref = "filmes/";
            $getdata = $database->getReference($ref)->getChild($token)->getValue();
            
            $reference = $database->getReference('/pais');
            $snapshot = $reference->getSnapshot();
            $pais = $snapshot->getValue();
            
            $ref2 = $database->getReference('/generos');
            $snapshot2 = $ref2->getSnapshot();
            $generos = $snapshot2->getValue();

            $ref3 = $database->getReference('/diretores');
            $snapshot3 = $ref3->getSnapshot();
            $diretores = $snapshot3->getValue();
        
            ?>


                <form action="code.php" method="POST">
                   
                  <input type="hidden"  name="ref_token" value="<?php echo $token ?>">
                  

                  <div class="mb-3">
                    <label>Titulo em Português</label>
                    <input type="varchar" name="titulopt" value="<?php echo $getdata['titulopt']; ?>" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label>Titulo em Inglês</label>
                    <input type="varchar" name="tituloen" value="<?php echo $getdata['tituloen']; ?>" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label>Ano de lançamento</label>
                    <input type="int"  name="anolancamento" value="<?php echo $getdata['anolancamento']; ?>" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label>Sinopse</label>
                    <textarea type="varchar" name="sinopse" class="form-control"><?php echo $getdata['sinopse']; ?></textarea>
                  </div>
                  <div class="mb-3">
                    <label>Duração</label>
                    <input type="varchar" name="duracao" value="<?php echo $getdata['duracao']; ?>" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label>Classificação</label>
                    <input type="varchar"  name="classificacao" value="<?php echo $getdata['classificacao']; ?>" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label>Gênero</label>
                    
                    <select class="form-select" id="genero" name="genero" aria-label="Default select example">
                                <option ><?php echo $getdata['genero']; ?></option>
                                <?php foreach($generos as $key => $row){ ?>
                                <option value="<?php echo $row['nomegenero']?>"><?php echo $row['nomegenero']?></option>
                                <?php } ?>
                                </select>

                  </div>

                  <div class="mb-3">
                    <label>Data de início</label>
                    <input type="date" name="datain" value="<?php echo $getdata['datain']; ?>" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label>Data de fim</label>
                    <input type="date" name="dataf" value="<?php echo $getdata['dataf']; ?>" class="form-control">
                  </div>
                  
                  <div class="mb-3">
                    <label>Diretor</label>
                    
                    <select class="form-select" id="diretor" name="diretor" aria-label="Default select example">
                                <option ><?php echo $getdata['diretor']; ?></option>
                                <?php foreach($diretores as $key => $row){ ?>
                                <option value="<?php echo $row['nomediretor']?>"><?php echo $row['nomediretor']?></option>
                                <?php } ?>
                                </select>
                    </select>
                  </div>
                  
                  <div class="mb-3">
                    <label>Elenco</label>
                    <input type="varchar"  name="elenco" value="<?php echo $getdata['elenco']; ?>" class="form-control">
                  </div>

                  <div class="mb-3">
                    <label>País</label>
              

                    <select class="form-select" id="pais" name="pais" aria-label="Default select example">
                                <option ><?php echo $getdata['pais']; ?></option>
                                <?php foreach($pais as $key => $row){ ?>
                                <option value="<?php echo $row['nomepais']?>"><?php echo $row['nomepais']?></option>
                                <?php } ?>
                                </select>
                  
                  
                  </div>

                  <div class="mb-3 ">
                    <button type="submit" name="update_movie" class="btn btn-primary">Atualizar Filme</button>

                  </div>

                
          </div>
        </div>
      </div>
    </div>
  </div>