<?php


    require_once('db.php');
    $db = connect_db();
    $sql = "SELECT productname FROM PRODUCTS";
    $results = mysqli_query($db,$sql);

$xml = new SimpleXMLElement('<products/>');

while($row = mysqli_fetch_assoc($results)) {

    $track = $xml->addChild('product');
    $track->addChild('name', $row['productname']);
}
Header('Content-type: text/xml');
print($xml->asXML());
?>