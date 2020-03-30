<?php
/**
 * Description of conn
 *
 * @copyright (c) year, Alessandro Léo Kuntze
 * @author Alessandro Léo Kuntze
 *    Classe que conecta ao banco de dados.
 * 
 */
class Conn {

    //put your code here
    public static $Host = "localhost";
    public static $User = "root";
    public static $Pass = "";
    public static $DbName = "desafio_pontosistemas";
    private static $Connect = null;

    private static function Conectar() {
        try {
            if (self::$Connect == null) {// se não tem conexão, abre uma nova
                self::$Connect = new PDO('mysql:host=' . self::$Host . '; dbname=' . self::$DbName, self::$User, self::$Pass);
            }
        } catch (Exception $ex) { // Se acontecer algum erro, apresenta a mensagem de erro
            echo 'Mensagem: ' . $ex->getMessage();
            die();
        }
        return self::$Connect;
    }

    public function getConn() {
        return self::Conectar();
    }

}
