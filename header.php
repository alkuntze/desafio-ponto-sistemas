<?php
/**
 * Description of header.php
 *
 * @copyright (c) year, Alessandro Léo Kuntze
 * @author Alessandro Léo Kuntze
 *      Arquivo de cabeçalho da aplicação.
 * 
 */
session_start();
require './Conn.php';
//require_once './header.php';

$msg = "";
// Código do projeto
if (isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Desafio Ponto Sistemas</title>
        <link rel="stylesheet" type="text/css" href="include/_css/estilo.css"/>
        <script language="javascript" type="text/javascript" src="include/_js/functions.js"></script>
    </head>
    <body>
        <div id="interface">

            <header id="cabecalho">
                <hgroup>
                    <h1>Desafio</h1>
                    <h2>CRUD (Create - Read - Update - Delete)</h2>
                    <a href="https://www.pontosistemas.com.br/" target="_blank"><img id="icone" src="imagens/logomarcaPontoSistemas.png"/></a>
                </hgroup>        
            </header>
            <header id="cabecalho-artigo">
                <hgroup>
                    <?php echo $msg; ?>
                </hgroup>
            </header><br>
