<?php
namespace controller;
use model\db\EmailMessageData;
require_once '../vendor/autoload.php';

class EmailMessage
{
  static function createAndSendEmail($emailDataArray){
    foreach ($emailDataArray as $EmailDataObject) {
      $objValues = get_object_vars($EmailDataObject);
      $app = new EmailTemplateView();
      $userEmailsAddress = $objValues['userEmailAddress']; //email addresses
      $msg = $app->generateView($objValues);
      EmailSender::mailmsg($msg,$userEmailsAddress);
    }
  }
}
