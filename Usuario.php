<?php
/**
 * Description of Usuario
 *
 * @copyright (c) year, Alessandro Léo Kuntze
 * @author Alessandro Léo Kuntze
 */
class Usuario extends Conn {

   
    /**
     * Atributo público que recebe o ID do usuário
     */
    public $Id;
    /**
     * Atributo público que recebe o NOME do usuário
     */
    public $Nome;
    /**
     * Atributo público que recebe o EMAIL do usuário
     */
    public $Email;
    /**
     * Atributo público que recebe a IDADE do usuário
     */
    public $Idade;

    /**
     * Mètodo público que seta o ID do usuário
     */
    public function setId($Id) {
        $this->Id = $Id;
    }

    /**
     * Mètodo público que seta o NOME do usuário
     */
    public function setNome($Nome) {
        $this->Nome = $Nome;
    }

    /**
     * Mètodo público que seta o EMAIL do usuário
     */    
    public function setEmail($Email) {
        $this->Email = $Email;
    }

    /**
     * Mètodo público que seta o IDADE do usuário
     */
    public function setIdade($Idade) {
        $this->Idade = $Idade;
    }

    /**
     * Mètodo público que INSERE um novo usuário no bando de dados
     * Caso operação tenha sucesso, retorna TRUE, senão, FALSE
     */
    public function InsereUsuario() {
        $conn = new Conn();
        $conn->getConn();

        try {

            $result_cadastrar = "INSERT INTO Usuarios (nome, email, idade, created) "
                    . "VALUES (:nome, :email, :idade, NOW())";

            $cadastrar = $conn->getConn()->prepare($result_cadastrar);

            $cadastrar->bindParam(':nome', $this->Nome, PDO::PARAM_STR);
            $cadastrar->bindParam(':email', $this->Email, PDO::PARAM_STR);
            $cadastrar->bindParam(':idade', $this->Idade, PDO::PARAM_STR);

            if ($cadastrar->execute()) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            
        }
    }

    /**
     * Mètodo público que EDITA um usuário do bando de dados.
     * Caso operação tenha sucesso, retorna TRUE, senão, FALSE
     */
    public function EditaUsuario() {
        $conn = new Conn();
        $conn->getConn();

        try {

            $result_editar = "UPDATE Usuarios SET nome = :nome, email = :email, idade = :idade, modified = NOW() "
                    . "WHERE idUsuarios = :id";
            $editar = $conn->getConn()->prepare($result_editar);

            $editar->bindParam(':id', $this->Id, PDO::PARAM_INT);
            $editar->bindParam(':nome', $this->Nome, PDO::PARAM_STR);
            $editar->bindParam(':email', $this->Email, PDO::PARAM_STR);
            $editar->bindParam(':idade', $this->Idade, PDO::PARAM_INT);


            if ($editar->execute()) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            
        }
    }

    /**
     * Mètodo público que DELETA um usuário no bando de dados
     * Caso operação tenha sucesso, retorna TRUE, senão, FALSE
     */
    public function DeletaUsuario() {
        $conn = new Conn();
        $conn->getConn();

        try {

            $result_deletar = "DELETE FROM Usuarios WHERE idUsuarios = :id";

            $deletar = $conn->getConn()->prepare($result_deletar);
            $deletar->bindParam(':id', $this->Id, PDO::PARAM_INT);

            if ($deletar->execute()) {
                return TRUE;
            } else {
                return FALSE; 
            }
        } catch (Exception $ex) {
            
        }
    }

}//END CLASS
