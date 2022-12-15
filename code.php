<?php
session_start();
require 'dbcon.php';
include 'dbcon.php';


if(isset($_POST['delete_data'])){

    $token = $_POST['ref_token_delete'];

    $ref = "sessoes/".$token;
    $postdata = $database->getReference($ref)->remove();

    if($postdata){
        $_SESSION['status'] = "Data Deleted Successfully";
        header("Location: index.php");
    }else{
        $_SESSION['status'] = "Data Not Deleted. Something Went Wrong.!";
        header("Location: index.php");
    }
}

if(isset($_POST['delete_data_movie'])){

    $token = $_POST['ref_token_delete'];

    $ref = "filmes/".$token;
    $postdata = $database->getReference($ref)->remove();

    if($postdata){
        $_SESSION['status'] = "Data Deleted Successfully";
        header("Location: movie.php");
    }else{
        $_SESSION['status'] = "Data Not Deleted. Something Went Wrong.!";
        header("Location: movie.php");
    }
}


if(isset($_POST['update_sessao'])){

    $sala = $_POST['sala'];
    $tiposessao = $_POST['tiposessao'];
    $filme = $_POST['filme'];
    $sigla = $_POST['sigla'];
  $datasessao =  $_POST['datasessao'];
  $horario = $_POST['horario'];
    $token = $_POST['ref_token'];

    $data = [
        'sala' => $sala,
        'tiposessao' => $tiposessao,
        'filme' => $filme,
        'sigla' => $sigla,
        'datasessao'=> $datasessao,
        'horario'=>$horario,

    ];

    $ref = "sessoes/".$token;
    $postdata = $database->getReference($ref)->update($data);

    if($postdata){

        $_SESSION['status'] = "Sessão atualizada com sucesso!";
        header("Location: index.php");
        exit(0);
    }
    else{

        $_SESSION['status'] = "Sessão não atualizada";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['create_session'])){

    $sala = $_POST['sala'];
    $tiposessao = $_POST['tiposessao'];
    $filme = $_POST['filme'];
    $sigla = $_POST['sigla'];
    $datasessao =  $_POST['datasessao'];
    $horario = $_POST['horario'];
    $token = $_POST['ref_token'];

    $data = [
        'sala' => $sala,
        'tiposessao' => $tiposessao,
        'filme' => $filme,
        'sigla' => $sigla,
        'datasessao'=> $datasessao,
        'horario'=>$horario,

    ];

    $ref = "sessoes/".$token;
    $postdata = $database->getReference($ref)->push($data);

    if($postdata){
         $_SESSION['status'] = "Data Inserted Successfully";
         header("Location: index.php");
     }else{
         $_SESSION['status'] = "Data Not Inserted. Something Went Wrong.!";
         header("Location: index.php");
     }
   
}

if(isset($_POST['save_movie'])){


    $titulopt = $_POST['titulopt'];
    $tituloen =  $_POST['tituloen'];
    $anolancamento =  $_POST['anolancamento'];
    $sinopse = $_POST['sinopse'];
    $duracao = $_POST['duracao'];
    $datain =  $_POST['datain'];
    $dataf = $_POST['dataf'];
    $classificacao = $_POST['classificacao'];
    $iddiretor = $_POST['diretor'];
    $idpais =  $_POST['pais'];
    $idgenero = $_POST['genero'];
    $elenco = $_POST['elenco'];
    $token = $_POST['ref_token'];

    $data = [
      
        'titulopt' => $titulopt ,
        'tituloen'  => $tituloen ,
        'anolancamento' => $anolancamento, 
        'sinopse' => $sinopse, 
        'duracao' => $duracao,
         'datain' => $datain,
        'dataf' => $dataf,
        'classificacao' => $classificacao,
         'diretor' => $iddiretor,
         'pais' => $idpais,
        'genero' => $idgenero,
        'elenco' => $elenco,

    ];

    $ref = "filmes/".$token;
    $postdata = $database->getReference($ref)->push($data);

    if($postdata){
         $_SESSION['status'] = "Data Inserted Successfully";
         header("Location: movie.php");
     }else{
         $_SESSION['status'] = "Data Not Inserted. Something Went Wrong.!";
         header("Location: movie.php");
     }


}

if(isset($_POST['update_movie'])){

    $titulopt = $_POST['titulopt'];
    $tituloen =  $_POST['tituloen'];
    $anolancamento =  $_POST['anolancamento'];
    $sinopse = $_POST['sinopse'];
    $duracao = $_POST['duracao'];
    $datain =  $_POST['datain'];
    $dataf = $_POST['dataf'];
    $classificacao = $_POST['classificacao'];
    $diretor = $_POST['diretor'];
    $pais =  $_POST['pais'];
    $genero = $_POST['genero'];
    $elenco = $_POST['elenco'];
    $token = $_POST['ref_token'];

    $data = [
      
        'titulopt' => $titulopt ,
        'tituloen'  => $tituloen ,
        'anolancamento' => $anolancamento, 
        'sinopse' => $sinopse, 
        'duracao' => $duracao,
         'datain' => $datain,
        'dataf' => $dataf,
        'classificacao' => $classificacao,
         'diretor' => $diretor,
         'pais' => $pais,
        'genero' => $genero,
        'elenco' => $elenco,

    ];

    $ref = "filmes/".$token;
    $postdata = $database->getReference($ref)->update($data);

    if($postdata){

        $_SESSION['status'] = "Sessão atualizada com sucesso!";
        header("Location: movie.php");
        exit(0);
    }
    else{

        $_SESSION['status'] = "Sessão não atualizada";
        header("Location: movie.php");
        exit(0);
    }
    
}



if(isset($_POST['save_sala'])){

    $nomesala = mysqli_real_escape_string($con, $_POST['nomesala']);
    $capacidade = mysqli_real_escape_string($con, $_POST['capacidade']);

    $query = "INSERT INTO salas (nomesala,capacidade)
    VALUES ('$nomesala','$capacidade')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Sala Criada com Sucesso";
        header("Location: room-view.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Sala não criada";
        header("Location: room-view.php");
        exit(0);
    }
}

if(isset($_POST['save_country'])){

    $nomepais = mysqli_real_escape_string($con, $_POST['nomepais']);

    $query = "INSERT INTO paises (nomepais)
    VALUES ('$nomepais')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "País Cadastrado com Sucesso";
        header("Location: country-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "País não cadastrado";
        header("Location: country-create.php");
        exit(0);
    }
}



if(isset($_POST['save_director'])){

    $nomediretor = mysqli_real_escape_string($con, $_POST['nomediretor']);

    $query = "INSERT INTO diretores (nomediretor)
    VALUES ('$nomediretor')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Diretor Cadastrado com Sucesso";
        header("Location: director-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Diretor não cadastrado";
        header("Location: director-create.php");
        exit(0);
    }
}

