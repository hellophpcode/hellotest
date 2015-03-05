<?php
class ICalendar {
   private $version='2.0';
   
   public function render(){
    $output = "BEGIN:VCALENDAR\r\n
    VERSION:2.0\r\n
    PRODID:-//Deathstar-mailer//theforce/NONSGML v1.0//EN\r\n
    METHOD:REQUEST\r\n
    BEGIN:VEVENT\r\n
    UID:" . md5(uniqid(mt_rand(), true)) . "example.com\r\n
    DTSTAMP:" . gmdate('Ymd').'T'. gmdate('His') . "Z\r\n
    DTSTART:".$date."T".$startTime."00Z\r\n
    DTEND:".$date."T".$endTime."00Z\r\n
    SUMMARY:".$subject."\r\n
    ORGANIZER;CN=".$organizer.":mailto:".$organizer_email."\r\n
    LOCATION:".$location."\r\n
    DESCRIPTION:".$desc."\r\n
    ATTENDEE;CUTYPE=INDIVIDUAL;ROLE=REQ-PARTICIPANT;PARTSTAT=NEEDS-ACTION;RSVP=TRUE;CN".$participant_name_1.";X-NUM-GUESTS=0:MAILTO:".$participant_email_1."\r\n
    ATTENDEE;CUTYPE=INDIVIDUAL;ROLE=REQ-PARTICIPANT;PARTSTAT=NEEDS-ACTION;RSVP=TRUE;CN".$participant_name_2.";X-NUM-GUESTS=0:MAILTO:".$participant_email_2."\r\n
    END:VEVENT\r\n
    END:VCALENDAR\r\n";
   }
}
