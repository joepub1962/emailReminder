<?php
namespace model\db;
use model\db\EmailMessageData;
require_once '../../vendor/autoload.php';

class EmailInfoFromSessions
{
  static function getEmailInfo($allSessionsInArray){
    $emailMsgArray = [];

    foreach ($allSessionsInArray as $session) {
      $userId = $session -> userId;
      $emailData = new EmailMessageData($session); // create a new object

      if (!array_key_exists($userId, $emailMsgArray)){
        $emailMsgArray[$userId] = $emailData;
        array_push($emailMsgArray[$userId] -> dataArray, $emailData -> sessionData);
      } else {
        array_push($emailMsgArray[$userId] -> dataArray, $emailData -> sessionData);
      }
    }
    return $emailMsgArray;
  }

}
