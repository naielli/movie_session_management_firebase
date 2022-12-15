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

  
          

  <div class="row ">
            <div class="col-md-12">
                <div class="card bg-dark text-white">
                    <div class="card-header">
                        <h4>Criar Sessão 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body ms-3">

                    <?php include('message.php'); ?>

                    <?php
                       include('dbcon.php');

                       $reference = $database->getReference('/salas');
                       $snapshot = $reference->getSnapshot();
                       $salas = $snapshot->getValue();
                       
                       $ref2 = $database->getReference('/filmes');
                       $snapshot2 = $ref2->getSnapshot();
                       $filmes = $snapshot2->getValue();

                       $ref3 = $database->getReference('/horarios');
                       $snapshot3 = $ref3->getSnapshot();
                       $horarios = $snapshot3->getValue();
                           
                      ?>

                        <form action="code.php" method="POST">

                            <div class="mb-3  " >
                                <label>Sala da Sessão</label>
                               

                                <select class="form-select" id="sala" name="sala" aria-label="Default select example">
                                <option >Selecione...</option>
                                <?php foreach($salas as $key => $row){ ?>
                                <option value="<?php echo $row['nomesala']?>"><?php echo $row['nomesala']?></option>
                                <?php } ?>
                                </select>


                            </div>
                            <div class="mb-3 ">
                                <label>Tipo Sessão</label>
                                <input type="varchar"  name="tiposessao"  class="form-control">
                            </div>
                            <div class="mb-3  ">
                                <label>Filme da Sessão</label> 
                                

                                <select class="form-select" id="filme" name="filme" aria-label="Default select example">
                                <option >Selecione...</option>
                                <?php foreach($filmes as $key => $row)
                           { ?>
                                <option value="<?php echo $row['titulopt']?>"><?php echo $row['titulopt']?></option>
                                <?php } ?>
                                </select>

                            </div>
                            <div class="mb-3 ">
                                <label>Sigla</label> 
                                <input type="varchar"  name="sigla"  class="form-control">
                            </div>
                            <div class="mb-3 ">
                                <label>Data Sessão</label>
                                <input type="date" name="datasessao" class="form-control">
                            </div>

                            <div class="mb-3 ">
                            <label>Horario</label>
                           
                            <select class="form-select" id="horario" name="horario" aria-label="Default select example">
                                <option >Selecione...</option>
                                <?php foreach($horarios as $key => $row){ ?>
                                <option value="<?php echo $row['horario']?>"><?php echo $row['horario']?></option>
                                <?php } ?>
                                </select>

                            </div>
                            
                            <div class="mb-3">
                                <button type="submit" name="create_session" class="btn btn-primary">Salvar Sessão</button>
                            </div>
                            

                        </form>
                        
                  

                    </div>
                </div>
            </div>
           
        </div>
        
  </div>
