<?php
namespace controller;
use model\db\EmailMessageData;
use \controller\ConfigEmail;
require_once '../vendor/autoload.php';

class EmailMessage
{
  static function createAndSendEmail($emailDataArray){
    $email_params = parse_ini_file("../model/db/emailParams.ini");
    foreach ($emailDataArray as $emailDataObject) {
      $objValues = get_object_vars($emailDataObject);
      $app = new EmailTemplateView();
      $msg = $app->generateView($objValues);
      $configEmail = new ConfigEmail($email_params['userName'] , $email_params['userPassword'],$email_params['fromName'], $email_params['sentTo']);
      //EmailSender::mailmsg($msg, $userEmailsAddress, $configEmail);
      EmailSender::mailmsg($msg, $emailDataObject, $configEmail);
    }
  }
}
