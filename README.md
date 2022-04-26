#BackEnd
##Per avviare il webServer dockerizzato utilizza il seguente comando:
docker run -d -p 8080:80 --name my-apache-php-app --rm  -v PercorsoCartellaServer:/var/www/html zener79/php:7.4-apache
##Per avviare il MySQL Server e importare di dati del dump utilizza il seguente comando:
docker run --name my-mysql-server --rm -v PercorsoCartellaMySQL:/var/lib/mysql -v PercorsoCartellaDump:/dump -e MYSQL_ROOT_PASSWORD=my-secret-pw -p 3306:3306 -d mysql:latest
###ottenere una bash dantro il container al fine di importare il dump:
docker exec -it my-mysql-server bash
###importare il dump:
mysql -u root -p < /dump/create_employee.sql; exit;
##Le volte successive sarà sufficiente avviare il container con Mysql tramite il seguente comando:
docker run --name my-mysql-server --rm -v PercorsoCartellaMySQL:/var/lib/mysql -e MYSQL_ROOT_PASSWORD=my-secret-pw -p 3306:3306 -d mysql:latest