<?php
            require('pages/dataBaseLayer.php');
            header("Content-Type:application/json");
            $_metodoClient = $_SERVER['REQUEST_METHOD'];
            $array = array();
            $page = @$_GET['page'] ?? 0;
            $size = @$_GET['size'] ?? 20;
            $last = countR();
            $baseurl = "http://localhost:8080/";

            $array['_embedded'] = array(
                "employees" => array()
            );

            $array['_links'] = links($page, $size, $last, $baseurl);

            $array['pages']=[
                'size' => $size,
                'totalElements' => $last,
                'totalPages' => ceil($last/$size),
                'number' => $page
            ];

            switch($_metodoClient){
                case 'GET':
                    $array['_embedded']['employees'] = GET($page*$size, $size);
                    echo json_encode($array);
                    break;
                case 'POST':
                    echo "è arrivato un POST";
                case 'PUt':
                    echo "è arrivato un PUT";
                case 'DELETE':
                    echo "è arrivato un DELETE";
            }

            function href($url, $page, $size){
                $href = $url. "?page=" .$page ."&size=" .$size;
                return $href;
            }

            function links($page, $size, $last, $baseurl){
                $links = array();
                $links['first']['href']=href($baseurl, $page, $size);
                if($page>0){
                    $links['prev']['href']=href($baseurl, ($page-1), $size); 
                }
                if($page<ceil($last/$size)){
                    $links['next']['href']=href($baseurl, ($page+1), $size);
                }
                $links['last']['href']=href($baseurl, ceil($last/$size), $size);

                return $links;
            }
        ?>
