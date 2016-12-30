<?php



function lat(string $str){


    $cyrl = explode(" ","ч ш щ э ю я а б в г д е ё ж з и й к л м н о п р с т у ф х х ц ы");

    $latn = explode(" ","ch sh sh e yu ya a b v g d e yo j z i y k l m n o p r s t u f h x ts i");

    $str = mb_strtolower($str);

    for($i = 0; $i < count($cyrl); $i++ )
        $str = str_replace($cyrl[$i],$latn[$i], $str);
    $str = str_replace('ь','', $str);
    $str = str_replace('ъ','', $str);

    return $str;

}


function cyr(string $str){


    $cyrl = explode(" ","о о г г ч ш ю я а б в г д е ё ж з и й л м н о п р с т у ф х х к к с");

    $latn = explode(" ","o` o' g` g' ch sh yu ya a b v g d e yo j z i y l m n o p r s t u f h x ck k с");

    $str = mb_strtolower($str);

    if($str[0] == 'e') $str[0] = 'э';
    $str = str_replace(' e',' э', $str);

    for($i = 0; $i < count($latn); $i++ )
        $str = str_replace($latn[$i],$cyrl[$i], $str);
    $str = str_replace("'", "", $str);

    return $str;

}



?>