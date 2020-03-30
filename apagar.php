<?php
/**
 * Description of apagar.php
 *
 * @copyright (c) year, Alessandro Léo Kuntze
 * @author Alessandro Léo Kuntze
 *      Arquivo que executa ação de exclusão.
 *      Chama a Classe Usuario, passa o ID do usuário e 
 * deleta o registro.
 *      Passa uma mensagem ao sistema via SESSÃO indicando 
 * o sucesso ou falha da operação.
 * 
 */
session_start();
require_once './include/_classes/Conn.php';
require_once './include/_classes/Usuario.php';

$idUsuario = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (!empty($idUsuario)) {
   
    $usuario = new Usuario();
    $usuario->setId($idUsuario);
    $resultado = $usuario->DeletaUsuario();

    if ($resultado) {
        $_SESSION['msg'] = "<h1 class='sucesso'>Registro apagado com sucesso!</h1>";
        header('Location: index.php');
    } else {
        $_SESSION['msg'] = "<h1 class='falha'>Registro não foi apagado!</h1>";
        header('Location: index.php');
    }
} else {
    $_SESSION['msg'] = "<h1 class='falha'>Registro não encontrado!</h1>";
    header('Location: index.php');
}
?>
