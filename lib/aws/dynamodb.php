<?php
require 'vendor/autoload.php';
use Aws\DynamoDb\DynamoDbClient;
function getItems($msg){

}

$client = new DynamoDbClient([
    'profile' => 'default',
    'region'  => 'us-east-2',
    'version' => '2012-08-10'
]);

$items = $client -> scan(['TableName'=>'TblEmployees']);
foreach($items as $item){
    echo $item['UID'];
}
?>