<?php
namespace controller;

require_once '../vendor/autoload.php';

class EmailSender
{
  static function mailmsg($msg, $useremailAddress)
  {
    // Create the Transport
    $transport = (new \Swift_SmtpTransport('outgoing.ccny.cuny.edu', 587, 'tls'))
      -> setUsername('cjob')
      -> setPassword('')
    ;
    // Create the Mailer using your created Transport
    $mailer = new \Swift_Mailer($transport);

    // Create a message
    $message = (new \Swift_Message('Core Facilities Equipment Use'))
      -> setFrom(['cjob@ccny.cuny.edu' => 'Chris Job'])
      //-> setTo($useremailAddress) // users email addresses
      -> setTo('joepub1962@gmail.com')
      ->setContentType("text/html")
      -> setBody($msg);

    // Send the message
    $numSent = $mailer->send($message, $failures);

    // Note that often that only the boolean equivalent of the
    //return value is of concern (zero indicates FALSE)
/*
    if ($mailer->send($message))
    {
      $totalEmails = $totalEmails + $numSent;
      //echo "Sent\n";
    }
    else
    {
      echo "Failed\n";
    }
    printf("Total Emails messages %d sent\n", $totalEmails);
*/
  }
}
