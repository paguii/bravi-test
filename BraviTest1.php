<?php

class BraviTechTest {

    public function isBracketsValid($brackets){
        preg_match_all('/[\[\]\(\)\{\}]/', $brackets, $matches);
        
        $bracketsTotal = array();
        foreach (array_unique($matches)[0] as $bracket) { 
            $bracketsTotal[$bracket] = substr_count($brackets, $bracket);
        }

        $valid = false;
        if($bracketsTotal['['] == $bracketsTotal[']'] && $bracketsTotal['('] == $bracketsTotal[')'] && $bracketsTotal['{'] == $bracketsTotal['}']){
            $valid = true;
        }
        
        return $valid ? "Válida" : "Inválida";
    }
}

$braviTechTest = new BraviTechTest();
echo $braviTechTest->isBracketsValid("({[]}){()}[");