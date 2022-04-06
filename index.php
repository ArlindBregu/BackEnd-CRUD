<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <?php
            require('pages/db.php');
            $_metodoClient = $_SERVER['REQUEST_METHOD'];
            $array = array(
                "_embedded" => "employees"
            );

            switch($_metodoClient){
                case 'GET':
                    $query = "SELECT * FROM employees ORDER BY id LIMIT 0,20";
                    $result = $mysqli->query($query);
                    while ($row= $result-> fetch_assoc()) {
                        $array = ["_embedded"]["employees"] = [
                                [
                                    'id' => $row["id"],
                                    'birthDate' => $row["birth_date"],
                                    'firstName' => $row["first_name"],
                                    'lastName' => $row["last_name"],
                                    'gender' => $row["gender"],
                                    'hireDate' => $row["hire_date"]
                                ]
                        ];
                    }
                    /*$array[
                        "_links"
                        => "first",
                        => "self",
                        => "next",
                        => "last",
                        => "profile"
                    ];
                    $array[
                        "page"
                        => "size",
                        => "totalElements",
                        => "totalPages",
                        => "number"
                    ];*/

                    echo json_encode($array);
                    break;
                case 'POST':
                    echo "è arrivato un POST";
                case 'PUt':
                    echo "è arrivato un PUT";
                case 'DELETE':
                    echo "è arrivato un DELETE";
            }
        ?>
    </body>
</html>

