<?php

class Controller
{
    function View($view)
    {
        $filename = "../app/views/".$view.".view.php";

        if(file_exists($filename))
        {
            require $filename;
        }else{
            echo "could not find view file: ". $filename;
        }
    }
}