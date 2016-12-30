<?php

class Struct{

public $dir, $include, $allow, $title;

    public function __construct(string $dir, $include, int $allow, string $title){
        $this->dir = $dir;
        $this->include = $include;
        $this->allow = $allow;
        $this->title = $title;
    }

}

?>