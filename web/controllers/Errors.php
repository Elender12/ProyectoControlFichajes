<?php
//main class to show when something goes wrong
class Errors extends Controller{
    //custom msg error
    function __construct($msg){
        parent::__construct();
        //sens a general msg to html error page
        $this->view->msg = $msg;
        $this->view->render("error/index");
    }    
}

?>