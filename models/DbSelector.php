<?php
class DbSelector extends Conexao{

    public function columnSelectorInDb($tabela){
        $sql = 'SHOW COLUMNS FROM ' . $tabela;
        $sql = Conexao::getConn()->prepare($sql);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $array[] = $row['Field'];
        }
        return $array;
    }

    public function selectAllFunction($tabela, $coluna){
        $sql = 'SELECT '.$coluna.' FROM '.$tabela;
        $sql = Conexao::getConn()->prepare($sql);
        $sql->execute();
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $row) {
            echo $row[$coluna];
        }
    }

}

?>