<?php
/**
 * Description of cadastrar_cgi.php
 *
 * @copyright (c) year, Alessandro Léo Kuntze
 * @author Alessandro Léo Kuntze
 *      Arquivo que executa ação de cadastro.
 *      Chama a Classe Usuario, passa os campos do formulário 
 * do usuário e insere o registro.
 *      Passa uma mensagem ao sistema via SESSÃO indicando o 
 * sucesso ou falha da operação.
 * 
 */
session_start();
require_once './include/_classes/Conn.php';
require_once './include/_classes/Usuario.php';


$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($Dados['SendCadUser'])) {
    unset($Dados['SendCadUser']);

    $usuario = new Usuario();
    $usuario->setNome($Dados['nome']);
    $usuario->setEmail($Dados['email']);
    $usuario->setIdade($Dados['idade']);

    $resultado = $usuario->InsereUsuario();

    if ($resultado) {
        $_SESSION['msg'] = "<h1 class='sucesso'>Registro cadastrado com sucesso!</h1>";
        header('Location: index.php');
    } else {
        $_SESSION['msg'] = "<h1 class='falha'>Não foi possível cadastrar!</h1>";
        header('Location: index.php');
    }
}
?>

