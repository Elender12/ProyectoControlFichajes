<?php

class Main extends Controller{
    function __construct()  {
        //llamo al contructor del Controller
        parent::__construct();
        //call the object and the method
        $this->view->render("main/index");
       
    }


}


?>