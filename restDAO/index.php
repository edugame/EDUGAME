<?php

require_once 'Template.php';

class Conexao {

    protected $mysqli;
    private $db_host = "localhost";
    private $db_name = "testemobile";
    private $db_username = "root";
    private $db_password = "";

    public function __construct() {
        $this->mysqli = new mysqli($this->db_host, $this->db_username, $this->db_password, $this->db_name) or die($this->mysqli->error);

        return $this->mysqli;
    }

    function init() {


        $Conexao = new Conexao();
        $tabelas = $Conexao->listarTabelas();


        echo"<div class='panel panel-default'> ";
        echo"<!-- Default panel contents --> ";
        echo"<div class='panel-heading'>" . utf8_encode('Serviços gerados') . "</div>";
        echo"<div class='panel-body'>";
        echo" </div>";


        echo"<ul class='list-group'>";

        // REALIZA A LEITURA DAS TABELAS
        while ($row = mysqli_fetch_assoc($tabelas)) {
            $tab = $row['Tables_in_testemobile'];
            @mkdir($tab . "/");

            fopen($tab . '/index.php', 'w');

            // REALIZA O REPLACE DAS TAGS
            $template = new Template('DAO.tpl');
            $template->set('table_name', ucfirst($Conexao->getVarName($tab)));
            $template->set('table_nameMin', $Conexao->getVarName($tab));
            $template->set('table_nameDAO', $Conexao->getClazzName($tab));
            $template->write($tab . '/index.php');

            $arquivo_origem = "Slim/.htaccess";
            $arquivo_destino = $tab . "/.htaccess";
            copy($arquivo_origem, $arquivo_destino);


            echo"<li class='list-group-item'>" . $tab . '/index.php' . "</li>";
        }

        echo"</ul>";
        echo"</div>";
    }

    function getClazzName($tableName) {
        $tableName = strtoupper($tableName[0]) . substr($tableName, 1);
        for ($i = 0; $i < strlen($tableName); $i++) {
            if ($tableName[$i] == '_') {
                $tableName = substr($tableName, 0, $i) . strtoupper($tableName[$i + 1]) . substr($tableName, $i + 2);
            }
        }
        return $tableName;
    }

    function getDTOName($tableName) {
        $name = getClazzName($tableName);
        if ($name[strlen($name) - 1] == 's') {
            $name = substr($name, 0, strlen($name) - 1);
        }
        return $name;
    }

    function getVarName($tableName) {
        $tableName = strtolower($tableName[0]) . substr($tableName, 1);
        for ($i = 0; $i < strlen($tableName); $i++) {
            if ($tableName[$i] == '_') {
                $tableName = substr($tableName, 0, $i) . strtoupper($tableName[$i + 1]) . substr($tableName, $i + 2);
            }
        }
        if ($tableName[strlen($tableName) - 1] == 's') {
            $tableName = substr($tableName, 0, strlen($tableName) - 1);
        }
        return $tableName;
    }

    function listarTabelas() {



        $query = "show tables";
        $result = mysqli_query($this->mysqli, $query);
        return $result;
    }

    function listarVariaveis($table) {



        $query = "SHOW COLUMNS FROM $table";
        $result = mysqli_query($this->mysqli, $query);
        return $result;
    }

}
