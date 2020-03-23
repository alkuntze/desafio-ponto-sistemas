<?php
/**
 * Description of cadastrar.php
 *
 * @copyright (c) year, Alessandro Léo Kuntze
 * @author Alessandro Léo Kuntze
 *      Arquivo de apresentação do formulário de cadastro.
 * 
 */
require_once './header.php';
?>
<form name="CadUsuario" method="Post" action="cadastrar_cgi.php">
    <table id="tabelaspec">
        <tr>
            <td colspan="2" class="cd"><h2>Cadastro de Usuário</h2></td>    
        </tr>
        <tr>
            <td class="ce">Nome</td>
            <td class="cd"><input type="text" name="nome" placeholder="Nome completo"/></td>
        </tr>
        <tr>
            <td class="ce">E-Mail</td>
            <td class="cd"><input type="email" name="email" placeholder="Seu E-Mail"></td>
        </tr>
        <tr>
            <td class="ce">Idade</td>
            <td class="cd"><input type="text" name="idade" placeholder="Idade" size="2"></td>
        </tr>
        <tr>
            <td colspan="2">
                <table id="btnForm">
                    <tr>
                        <td><input type="button" value="Cancelar" name="Cancelar" onclick="cancelForm();"/></td>
                        <td><input type="submit" value="Salvar" name="SendCadUser" onclick="return verForm(document.CadUsuario);"/></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</form>
<br>
<?php require_once './footer.php'; ?>