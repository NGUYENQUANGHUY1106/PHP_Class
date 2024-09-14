<?php
        $host = "localhost:3366";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "my_guitar_shop1";

        try {
            $db = new mysqli($host, $dbusername, $dbpassword, $dbname);
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include('database_error.php');
            exit();
        }
    ?>