<?php

include_once ROOT.'/models/News.php';

class NewsController{
    
    public function actionIndex(){
        $newsList=array();
        $newsList = News::getNewsList();
        
        var_dump($newsList);
                
        return true;
    }
    
    public function actionView($category,$id) {
        echo 'одна запись';
        return true;
        
    }
}

