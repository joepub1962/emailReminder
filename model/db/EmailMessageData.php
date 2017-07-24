<?php
namespace model\db;

class EmailMessageData{
	public function __construct($session)
  {
    $this -> dataArray = $dataArray = [];
    $this -> userName = $session -> userName;
    $this -> userEmailAddress = $session -> userEmail;
		$this -> sessionDate = $session -> sessionDate;
    $this -> sessionData =  [
                              $session -> coreEquipment,
                              $session -> sessionDate,
                              $session -> sessionStartTime,
                              $session -> sessionEndTime
                            ];
  }
/*  static function getEmailMessageData($session){
    $messageData = [];
    $userName = $session -> userName;
    $userEmailAddress = $session -> userEmail;
    $messageData =  [ $session -> coreEquipment,
                      $session -> userName,
                      $session -> sessionDate,
                      $session -> sessionStartTime,
                      $session -> sessionEndTime
                    ];

  }
*/

}
