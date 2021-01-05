<?php 
 
    $server = 'LAPTOP-RYENG-VA\SQLEXPRESS';
    $dbName = 'QN';
    $uid = 'sa';
    $pwd = "root1234";

    $conn = new PDO("sqlsrv:server=$server; database = $dbName", $uid, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  

    try {
        $tableName = 'Answer';

        $query = "SELECT * FROM Answer ORDER BY StudentCode DESC";
        $stmt = $conn->query($query);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        print_r($result);
        for ($i=0; $i < count($result) ; $i++) { 
            $data = $result['StdInfoID'];
            print_r($data);
         }
        unset($stmt);
        unset($conn);
    } catch (Exception $e) {
        echo $e->getMessage();
    } 

?>