<?php
session_start();
require 'autoload.php';

$mensagem = new Mensagens;
$mensagem->InitialMessage();
$tabela = $mensagem->tabela;

$tratar = new Tratar;
$validaçao = $tratar->tratarTabela($tabela);

while($validaçao == false){
    $tratar->tratarTabela($tabela);
        
    echo $_SESSION['tabelainvalida'];
    system('echo.');
    $tabela = readline();
    unset($_SESSION['tabelainvalida']);
            
     if($tratar->tratarTabela($tabela)){
            $validaçao = true;
            break;
        }
        
}

$mensagem->columnSelector($tabela);

$coluna = $mensagem->coluna;

$validaçao = $tratar->tratarColuna($coluna);

while($validaçao == false){
    $tratar->tratarColuna($coluna);

    echo $_SESSION['colunaInvalida'];
    system('echo.');
    $coluna = readline();
    unset($_SESSION['colunaInvalida']);
    
    if($tratar->tratarColuna($coluna)){
        $validaçao = true;
        break;
    }

}

$mensagem->finalMenssage($tabela, $coluna);


?>

