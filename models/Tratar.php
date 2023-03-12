<?php
class Tratar {
    public function tratarTabela($tabela){
        $tabela = strtolower($tabela);
        $respostasCertas = ["usuario", "anuncios"];
        $isValid = false;
        foreach ($respostasCertas as $verify){
            if($tabela == $verify){
                $isValid = true;
                break;
            }
        }
        if($isValid){
            return true;
        }else{
            $_SESSION['tabelainvalida'] = 'Nome da tabela invalido, favor informe um valido';
            return false;
        }
    }

    public function tratarColuna($column){
        $column = strtolower($column);
        $columns = new DbSelector;
        $columnsUsuario = $columns->columnSelectorInDb('usuario');     
        $columnsAnuncios = $columns->columnSelectorInDb('anuncios');

        $isValid = false;
        foreach ($columnsUsuario as $verify){
            if($column == $verify){
                $isValid = true;
                break;
            }
        }
        foreach ($columnsAnuncios as $verify){
            if($column == $verify){
                $isValid = true;
                break;
            }
        }


        if($isValid){
            return true;
        }else{
            $_SESSION['colunaInvalida'] = 'Nome da coluna é invalido, favor informe um valido';
            return false;
        }
        

    }

}
?>