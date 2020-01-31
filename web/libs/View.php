<?php

    class View {
        function __construct(){
            //echo"<p>Vista base</p>";
        }
        function render($name){
            //it will call a file from views folder
            //antes era .php
            require "views/" .$name. ".php";
        }
    }



?>