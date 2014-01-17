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
    
    if(empty($nome)){
        echo "Preencha o nome no campo <br/>";
        $camposValidados = false;
    }
    
    if(empty($observacoes)){
        echo "Preencha as observacoes no campo <br/>";
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
