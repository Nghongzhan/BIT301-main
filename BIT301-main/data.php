<?php

    $connect = new PDO("mysql:host=localhost;dbname=bit301","root","");

    if(isset($_POST["action"])){
        if($_POST["action"]=='fetch'){
            $query = "
            SELECT *, COUNT(Quantity) AS Total 
            FROM purchasedb
            GROUP BY product_name
            ";

            $result = $connect->query($query);

            $data = array();

            foreach($result as $row){
                $data[] = array(
                    'product_name'=>$row["product"],
                    'total'=>$row["Total"],
                    'color'=>'#'.rand(100000,999999).''
                );
            }

            echo json_encode($data);
        }
    }
?>