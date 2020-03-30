<?php
/**
 * Description of editar_cgi.php
 *
 * @copyright (c) year, Alessandro Léo Kuntze
 * @author Alessandro Léo Kuntze
 *      Arquivo que executa ação de edição.
 *      Chama a Classe Usuario, passa o ID e os demais campos 
 * do formulário do usuário e atualiza o registro.
 *      Passa uma mensagem ao sistema via SESSÃO indicando o 
 * sucesso ou falha da operação.
 * 
 */
session_start();
require_once './include/_classes/Conn.php'; 
require_once './include/_classes/Usuario.php';

// EDITANDO OS DADOS DO USUÁRIO
$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($Dados['SendEditUser'])) {
    unset($Dados['SendEditUser']);

    $usuario = new Usuario();
    $usuario->setId($Dados['idUsuarios']);
    $usuario->setNome($Dados['nome']);
    $usuario->setEmail($Dados['email']);
    $usuario->setIdade($Dados['idade']);
    
    $resultado = $usuario->EditaUsuario();
    

    if ($resultado) {
        $_SESSION['msg'] = "<h1 class='sucesso'>Registro editado com sucesso!</h1>";
        header('Location: index.php');
    } else {
        $_SESSION['msg'] = "<h1 class='falha'>Registro não foi editado com sucesso!</h1>";
        header('Location: index.php');
    }
}
?>

