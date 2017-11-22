<?php

    class error
    {

        public function __construct()
        {}

        public function runError($error)
            {
                if ($error == "champ")
                {
                    echo "<h3>Champ manquant</h3>";
                }
            }
            
    }

?>