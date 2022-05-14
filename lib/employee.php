<?php
function getEmployeesList(){
    $__TriggerURL__ = "https://sqs.us-east-1.amazonaws.com/092451480368/TriggerScanTblEmployees";
    $__ReturnURL__ = "https://sqs.us-east-1.amazonaws.com/092451480368/ScanTblEmployees";
    sendMessage("scan",$__TriggerURL__);
    $res = json_decode(receiveAndDeleteMessage($__ReturnURL__)["Body"], true);
    $emp_list = $res['Items'];
    return $emp_list;
}

?>