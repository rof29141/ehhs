<?php
$calendar='BEGIN:VCALENDAR
        VERSION:2.0
        PRODID:-//hacksw/handcal//NONSGML v1.0//EN
        CALSCALE:GREGORIAN
        BEGIN:VEVENT
        LOCATION:3805 Edwards Rd #100 Cincinnati\, OH 45244
        DESCRIPTION:Appointment with Wendy Flynn at 10/17/17
        DTSTART:20171017T160000Z
        DTEND:20171017T165900Z
        SUMMARY:Appointment with Wendy Flynn at 10/17/17
        URL;VALUE=URI:351face.com
        DTSTAMP:20171013T193124Z
        UID:59e0f86cd0c08
        END:VEVENT
        END:VCALENDAR';

header('Content-type: text/calendar; charset=utf-8');
header('Content-Disposition: attachment; filename=invite.ics');


//echo $calendar;

echo $calendar;
?>