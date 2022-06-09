<?php

require_once('Crud.php');

 class LangManager {

    private Crud $crud;
    private $results =  array();

    public function __construct() {
        $this->crud = new Crud('root', '');
    }

    public function getContents($link) {
        if($_SESSION['lang'] == 'lang_nl') {
            $this->results = $this->crud->getLanguageContent('title_nl', 'text_nl', $link);
        } elseif($_SESSION['lang'] === 'lang_en') {
            $this->results = $this->crud->getLanguageContent('title_en', 'text_en', $link);
        }

        return $this->results;
    }

    public function getTexts() {
        $contents = array();
        foreach($this->results as $rows) {
            foreach($rows as $key=>$value) {
                if($key == 'text_nl' || $key == 'text_en')
                    array_push($contents, $value);
            }
        }
        return $contents;
    }

    public function getTitles() {
        $titles = array();
        foreach($this->results as $rows) {
            foreach($rows as $key=>$value) {
                if($key == 'title_nl' || $key == 'title_en')
                    array_push($titles, $value);
            }
        }
        return $titles;
    }
    

 }
?>