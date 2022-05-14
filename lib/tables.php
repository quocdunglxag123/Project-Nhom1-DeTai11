<?php
function getAllTablesName(){
    $URL_triggerGetAllTables = "https://sqs.us-east-1.amazonaws.com/477816458425/triggerGetAllTables";
    $URL_returnGetAllTables = "https://sqs.us-east-1.amazonaws.com/477816458425/returnGetAllTables";
    sendMessage("get tables", $URL_triggerGetAllTables);
    $res = json_decode(receiveAndDeleteMessage($URL_returnGetAllTables)["Body"], true);
    return $res;
}

function getAllTablesDetail(){
    $URL_triggerGetAllTablesDetail = "https://sqs.us-east-1.amazonaws.com/477816458425/TriggerGetAllTablesDetail";
    $URL_returnGetAllTablesDetail = "https://sqs.us-east-1.amazonaws.com/477816458425/ReturnGetAllTablesDetail";
    sendMessage("get tables detail", $URL_triggerGetAllTablesDetail);
    $res = json_decode(receiveAndDeleteMessage($URL_returnGetAllTablesDetail)["Body"], true);
    return $res;
}

function createTable($inp){
    $msg_body = json_encode($inp, JSON_UNESCAPED_UNICODE);
    $url = "https://sqs.us-east-1.amazonaws.com/477816458425/createTable";
    sendMessage($msg_body,$url);
}

function deleteTable($table_name){
    $URL_triggerDeleteTable = "https://sqs.us-east-1.amazonaws.com/477816458425/deleteTable";
    $inp = ["TableName" => $table_name];
    $msg_body = json_encode($inp, JSON_UNESCAPED_UNICODE);
    sendMessage($msg_body, $URL_triggerDeleteTable);
}

function getAllItemsByTableName($table_name){
    $URL_triggerGetAllItemsByTableName = "https://sqs.us-east-1.amazonaws.com/477816458425/triggerGetAllItemsByTableName";
    $URL_returnGetAllItemsByTableName = "https://sqs.us-east-1.amazonaws.com/477816458425/returnGetAllItemsByTableName";
    $inp = ["TableName" => $table_name];
    $msg_body = json_encode($inp, JSON_UNESCAPED_UNICODE);
    sendMessage($msg_body, $URL_triggerGetAllItemsByTableName);
    $res = json_decode(receiveAndDeleteMessage($URL_returnGetAllItemsByTableName)["Body"], true);
    return $res;
}

function createItem($inp){
    $URL_triggerCreateItem = "https://sqs.us-east-1.amazonaws.com/477816458425/triggerCreateItem";
    $msg_body = json_encode($inp,JSON_UNESCAPED_UNICODE);
    sendMessage($msg_body,$URL_triggerCreateItem);
}

function deleteItem($inp){
    $URL_triggerDeleteItem = "https://sqs.us-east-1.amazonaws.com/477816458425/triggerDeleteItem";
    $msg_body = json_encode($inp, JSON_UNESCAPED_UNICODE);
    sendMessage($msg_body,$URL_triggerDeleteItem);
}
?>