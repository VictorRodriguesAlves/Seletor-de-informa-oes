<?php
class Mensagens {

    public $tabela;
    public $coluna;

    public function InitialMessage(){
        echo 'Consultor de Banco de dados';
        system('echo.');
        system('echo.');
        echo 'Em qual tabela gostaria de fazer sua consulta?';
        system('echo.');
        system('echo.');
        echo '[1] Usuario';
        system('echo.');
        echo '[2] Anuncios';
        system('echo.');
        system('echo.');

         $this->tabela = readline();
    }

    public function columnSelector($tabela){
        system('echo.');
        echo 'qual coluna da tabela '.$tabela.' voce gostaria de acessar?';
        system('echo.');
        $columns = new DbSelector;
        $columns = $columns->columnSelectorInDb($tabela);   


        system('echo.');
        for($i = 1; $i <= count($columns); $i++){
            echo '['.$i.']'.$columns[$i-1];
            system('echo.');

        }
        system('echo.');
        $this->coluna = readline();

    }

    public function finalMenssage($tabela, $coluna){
        system('echo.');
        echo 'Aqui estão as informaçoes solicitadas';
        system('echo.');
        system('echo.');
        $select = new DbSelector;
        $select->selectAllFunction($tabela, $coluna);
    }
}
?> 