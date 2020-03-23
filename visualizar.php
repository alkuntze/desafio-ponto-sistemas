<?php
/**
 * Description of visualizar.php
 *
 * @copyright (c) year, Alessandro Léo Kuntze
 * @author Alessandro Léo Kuntze
 *      Arquivo de apresentação dos dados de um usuário apenas.
 * 
 */
require_once './header.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$limit = 1;


$conn = new Conn();
$result_user = "SELECT * FROM Usuarios WHERE idUsuarios = :id LIMIT :limit";

$resultado_user = $conn->getConn()->prepare($result_user);

$resultado_user->bindParam(':id', $id, PDO::PARAM_INT);
$resultado_user->bindParam(':limit', $limit, PDO::PARAM_INT);

$resultado_user->execute();

$row_user = $resultado_user->fetch(PDO::FETCH_ASSOC);
?>
<table id="tabelaspec">
    <tr>
        <td colspan="2" class="cd"><h2>Visualizar Detalhes do Usuário</h2></td>    
    </tr>
    <tr>
        <td class="ce">ID</td>
        <td class="cd"><?php echo $row_user['idUsuarios']; ?></td>
    </tr>
    <tr>
        <td class="ce">Nome</td>
        <td class="cd"><?php echo $row_user['nome']; ?></td>
    </tr>
    <tr>
        <td class="ce">E-Mail</td>
        <td class="cd"><?php echo $row_user['email']; ?></td>
    </tr>
    <tr>
        <td class="ce">Idade</td>
        <td class="cd"><?php echo $row_user['idade']; ?></td>
    </tr>
    <tr>
        <td class="ce">Data de Criação</td>
        <td class="cd"><?php echo date('d/m/Y H:i:s', strtotime($row_user['created'])); ?></td>
    </tr>
<?php
if (!empty($row_user['modified'])) {
?>  
    <tr>
        <td class="ce">Data de Modificação</td>
        <td class="cd"><?php echo date('d/m/Y H:i:s', strtotime($row_user['modified'])); ?></td>
    </tr>
<?php
}
?>
    <tr>
        <td colspan="2">
            <table id="btnForm">
                <tr>
                    <td><input type="button" value="Voltar" name="Cancelar" onclick="cancelForm();"/></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<br>
<?php require_once './footer.php'; ?>