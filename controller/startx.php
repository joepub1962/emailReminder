<?php
require_once('../vendor/autoload.php');

use \model\db\DBConnect;
use \model\db\SessionDAO;
use \model\db\EmailInfoFromSessions;
use \controller\EmailTemplateView;
use \controller\EmailMessage;
use \controller\EmailSender;
use \model\db\EmailMsgData;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

//CONNECT TO DATABASE
try{
  $connectToDb  = DBConnect::getConnection();
  }catch(Exception $e){
  $log->error($e->getMessage());
  echo "Database connection failed\r\n";
  die();
}

//RETRIEVE VALID SESSION DATA FROM DATABASE
try{
  $allSessionsInArray = SessionDAO::getSessionData($connectToDb);
  }catch(Exception $e){
  $log->error($e->getMessage());
  die("Query failed!!\r\n");
}


//
try{
  $emailDataArray = EmailInfoFromSessions::getEmailInfo($allSessionsInArray);
  }catch(Exception $e){
  $log->error($e->getMessage());
  echo "Somethin aint working". $e -> getMessage();
}

try{
  EmailMessage::createAndSendEmail($emailDataArray);
  }catch(Exception $e){
  $log->error($e->getMessage());
  echo "Somethin aint working". $e -> getMessage();

}
