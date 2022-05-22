<?php 
define("DEFAULT_PAGE", "home");

function getPage($page){
    $page = trim($page);
    $page = $page ? $page : DEFAULT_PAGE;
    $files = scandir(__DIR__."/../pages");
    $pages = array();
    foreach ($files as $file) {
        if(is_dir(__DIR__."/../pages/".$file) && $file != "." && $file != ".."){
            $pages[] = $file;
        }
    }
    if (!in_array($page, $pages)) {
        $page = "404";
    }
    return $page;
}