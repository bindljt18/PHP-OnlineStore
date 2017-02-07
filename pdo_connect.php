
<?php

$user = 'bindljt18';
$pass = 'jb1035';
$db_info='mysql:host=washington.uww.edu; dbname=cs382-2167_bindljt18';
try {
    $db = new PDO($db_info, $user, $pass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}


?>
