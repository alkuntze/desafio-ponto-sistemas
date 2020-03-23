<?php
/**
 * Description of index.php
 *
 * @copyright (c) year, Alessandro Léo Kuntze
 * @author Alessandro Léo Kuntze
 *      Arquivo de apresentação da listagem dos dados do banco de dados.
 *      Carrega os dados do usuário e preenche uma tabela de apresentação.
 * 
 */
require_once './header.php';
?>
<table id="tabelaspec">
    <thead>
        <tr>
            <td colspan="5"><h2>Lista de Usuários</h2></td>
            <td colspan="2"><input type="button" value="Cadastrar" name="Cadastrar" onclick="cadastrarForm();"/></td>
        </tr>
    </thead>
    <tr>
        <td class="celu">ID</td>
        <td class="celu">Nome</td>
        <td class="celu">E-Mail</td>
        <td class="celu">Idade</td>
        <td class="celu">Criação</td>
        <td class="celu">Modificado</td>
        <td class="celu">Ação</td>
    </tr>
    <?php
    $conn = new Conn();
    $result_user = "SELECT * FROM Usuarios ";
    $resultado_user = $conn->getConn()->prepare($result_user);

    $resultado_user->execute();
    $rows = $resultado_user->fetchAll();

    $resultado_user->execute();
    if (count($rows) >= 1) {
        while ($row_user = $resultado_user->fetch(PDO::FETCH_ASSOC)) {
            //echo "<hr>";
            ?>
            <tr>
                <td class="cd"><?php echo $row_user['idUsuarios'] . "</br>"; ?></td>
                <td class="cd"><?php echo $row_user['nome'] . "</br>"; ?></td>
                <td class="cd"><?php echo $row_user['email'] . "</br>"; ?></td>
                <td class="cd"><?php echo $row_user['idade'] . "</br>"; ?></td>
                <td class="cd"><?php echo date('d/m/Y H:i:s', strtotime($row_user['created'])) . "</br>"; ?></td>
                <td class="cd">
                    <?php
                    if (!empty($row_user['modified'])) {
                        echo date('d/m/Y H:i:s', strtotime($row_user['modified'])) . "</br>";
                    }
                    ?>
                </td>
                <td class="cd">
                    <?php
                    echo "<a href='visualizar.php?id=" . $row_user['idUsuarios'] . "'>visualizar</a> - ";
                    echo "<a href='editar.php?id=" . $row_user['idUsuarios'] . "'>Editar</a> - ";
                    echo "<a href='apagar.php?id=" . $row_user['idUsuarios'] . "'>Apagar</a><br>";
                    ?>
                </td>
            </tr>
            <?php
        }
    } else { // Se retornar vazio
        ?>

        <tr><td colspan="7" class="cd">Não há registros no banco de dados!</td></tr>

        <?php
    }
    ?>

    <tr><td colspan="7" class="ce">&nbsp;</td></tr>
</table><br>
<?php require_once './footer.php'; ?>
