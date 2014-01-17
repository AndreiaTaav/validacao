<?php
    //INICIALIZAÇÂO
    require_once("menu.php");
    
    session_start();
    if(!isset($_SESSION["cadastros"])) {
        $_SESSION["cadastros"] = array();
    }
    
    //OBTER DADOS DO FORUMLARIO
    $nome = $_REQUEST["nome"];
    $estado = $_REQUEST["estado"];
    $observacoes = $_REQUEST["observacoes"];
    $telefone = $_REQUEST["telefone"];
    $cpf = $_REQUEST["cpf"];
    
    
    $sexo = null;
    if(isset($_REQUEST["sexo"])){
        $sexo = $_REQUEST["sexo"];
    }
    
    $aceito = false;
    if(isset($_REQUEST["aceito"])) {
        $aceito = true;
    }
    
    //VALIDAÇÃO
    $camposValidados = true;
    
    if($sexo == null){
        echo "Selecione uma opcao para o campo sexo <br/>";
        $camposValidados = false;
    }
    
    $estado= $_REQUEST["estado"];
    if($estado== -1){
        echo "Por favor , selecione uma opcao para o estado<br/>";
        $camposValidados = false;

    }
    //TRIM serve para juntar todos os espacos vazios
    $nome = trim($nome);
    if(empty($nome)){
        echo "Preencha o nome no campo <br/>";
        $camposValidados = false;
    }
    
    $observacoes = trim($observacoes);
    if(empty($observacoes)){
        echo "Preencha as observacoes no campo <br/>";
        $camposValidados = false;
    }
    
     $telefone = trim ($telefone);
    if(empty($telefone)){
        echo "Preencha o telefone no campo ! <br/>";
        $camposValidados = false;
    }
    //STRLEN SERVE PARA DIZER SE ER INVALIDO OU NAO O TAMANHO DE ACORDO COM NUMERO COLOCADO
    else if(strlen($telefone) != 8){
        echo "Tamanho inválido ! <br/>";
        $camposValidados = false;        
    }
    
    
    $cpf = trim ($cpf);
    if(empty($cpf)){
        echo "Preencha o cpf no campo ! <br/>";
        $camposValidados = false;
    }
    
        else if(strlen($cpf) != 11){
        echo "Tamanho inválido ! <br/>";
        $camposValidados = false;        
    }    
    if($camposValidados){
        $pessoa = array();
        $pessoa["nome"] = $nome;
        $pessoa["sexo"] = $sexo;
        $pessoa["aceito"] = $aceito;
        $pessoa["estado"] = $estado;
        $pessoa["observacoes"] = $observacoes;
        
        array_push($_SESSION["cadastros"], $pessoa);
        
        echo "Cadastro feito com sucesso.";
    }
    else{
        echo "<br/>";
        echo "<input type='button' value='Voltar' onclick='history.go(-1)' />";
    }
?>
