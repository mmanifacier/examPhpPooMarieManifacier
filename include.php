<?php

    spl_autoload_register(function ($fileName) {
        $directories = array(
            'Controller/',
            'Model/class/',
            'Model/manager/',
        );

        foreach($directories as $directory)
        {
            //see if the file exsists
            if(file_exists($directory.$fileName . '.php'))
            {
                require_once($directory.$fileName . '.php');

                return;
            }
        }
    });

?>