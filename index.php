<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <?php
            // var_dump($_SERVER['REQUEST_METHOD']);
            $_metodoClient = $_SERVER['REQUEST_METHOD'];
            if($_metodoClient == "GET"){
                echo "è arrivato un GET";
            }else if($_metodoClient == "POST"){
                echo "è arrivato un POST";
            }else if($_metodoClient == "PUT"){
                echo "è arrivato un PUT";
            }else if($_metodoClient == "DELETE"){
                echo "è arrivato un DELETE";
            }
        ?>
    </body>
</html>

