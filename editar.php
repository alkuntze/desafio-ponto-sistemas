<?php
/**
 * Description of editar.php
 *
 * @copyright (c) year, Alessandro Léo Kuntze
 * @author Alessandro Léo Kuntze
 *      Arquivo de apresentação do formulário de edição.
 *      Carrega os dados do usuário e preenche os campos do formulário.
 * 
 */
require_once './header.php'; 

$conn = new Conn();

// PESQUISANDO OS DADOS DO USUÁRIO
$limit = 1;
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$result_user = "SELECT * FROM Usuarios WHERE idUsuarios = :id LIMIT :limit";
$resultado_user = $conn->getConn()->prepare($result_user);
$resultado_user->bindParam(':id', $id, PDO::PARAM_INT);
$resultado_user->bindParam(':limit', $limit, PDO::PARAM_INT);
$resultado_user->execute();

$row_user = $resultado_user->fetch(PDO::FETCH_ASSOC);
?>

<form name="EditUsuario" method="Post" action="editar_cgi.php">
    <input type="hidden" name="idUsuarios" value="<?php echo $row_user['idUsuarios']; ?>"></br>
    <table id="tabelaspec">
        <tr>
            <td colspan="2" class="cd"><h2>Editar Usuário</h2></td>    
        </tr>
        <tr>
            <td class="ce">Nome</td>
            <td class="cd"><input type="text" name="nome" placeholder="Nome completo" value="<?php echo $row_user['nome']; ?>"></td>
        </tr>
        <tr>
            <td class="ce">E-Mail</td>
            <td class="cd"><input type="email" name="email" placeholder="Seu E-Mail" value="<?php echo $row_user['email']; ?>"></td>
        </tr>
        <tr>
            <td class="ce">Idade</td>
            <td class="cd"><input type="text" name="idade" placeholder="Idade" size="2" value="<?php echo $row_user['idade']; ?>"></td>
        </tr>
        <tr>
            <td colspan="2">
                <table id="btnForm">
                    <tr>
                        <td><input type="button" value="Cancelar" name="Cancelar" onclick="cancelForm();"/></td>
                        <td><input type="submit" value="Salvar" name="SendEditUser" onclick="return verForm(document.EditUsuario);"/></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</form>
<br>
<?php require_once './footer.php'; ?>
