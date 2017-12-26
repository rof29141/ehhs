<?php
/**
 * ICS.php
 * =======
 * Use this class to create an .ics file.
 *
 * Usage
 * -----
 * Basic usage - generate ics file contents (see below for available properties):
 *   $ics = new ICS($props);
 *   $ics_file_contents = $ics->to_string();
 *
 * Setting properties after instantiation
 *   $ics = new ICS();
 *   $ics->set('summary', 'My awesome event');
 *
 * You can also set multiple properties at the same time by using an array:
 *   $ics->set(array(
 *     'dtstart' => 'now + 30 minutes',
 *     'dtend' => 'now + 1 hour'
 *   ));
 *
 * Available properties
 * --------------------
 * description
 *   String description of the event.
 * dtend
 *   A date/time stamp designating the end of the event. You can use either a
 *   DateTime object or a PHP datetime format string (e.g. "now + 1 hour").
 * dtstart
 *   A date/time stamp designating the start of the event. You can use either a
 *   DateTime object or a PHP datetime format string (e.g. "now + 1 hour").
 * location
 *   String address or description of the location of the event.
 * summary
 *   String short summary of the event - usually used as the title.
 * url
 *   A url to attach to the the event. Make sure to add the protocol (http://
 *   or https://).
 */
class MT_ICS {
    const DT_FORMAT = 'Ymd\THis\Z';
    protected $properties = array();
    private $available_properties = array(
        'description',
        'location',
        'summary',
        'url',
        'dtend',
        'dtstart'
    );
    public function __construct($props='') {
        $this->set($props);
    }
    public function set($key, $val = false) {
        if (is_array($key)) {
            foreach ($key as $k => $v) {
                $this->set($k, $v);
                //print $v;
            }
        } else {
            if (in_array($key, $this->available_properties)) {
                $this->properties[$key] = $this->sanitize_val($val, $key);
            }
        }
    }
    public function to_string() {
        $rows = $this->build_props();
        return implode("\r\n", $rows);
    }
    private function build_props() {
        // Build ICS properties - add header
        $ics_props = array(
            'BEGIN:VCALENDAR',
            'VERSION:2.0',
            'PRODID:-//ZContent.net//Zap Calendar 1.0//EN',
            'CALSCALE:GREGORIAN',
            'METHOD:PUBLISH',
            'BEGIN:VEVENT',
            'TZID:America/New_York'
        );

        $props = array();
        $props['UID'] = uniqid();
        $props['SEQUENCE'] = '0';
        $props['STATUS'] = 'CONFIRMED';
        $props['TRANSP'] = 'TRANSPARENT';
        $props['RRULE'] = 'FREQ=YEARLY;INTERVAL=1;BYMONTH=2;BYMONTHDAY=12';
        $props['DTSTAMP'] = $this->format_timestamp('now');

        // Build ICS properties - add header

        foreach($this->properties as $k => $v) {
            $props[strtoupper($k . ($k === 'url' ? ';VALUE=URI' : ''))] = $v;
        }
        // Set some default values

        foreach ($props as $k => $v)
        {
            if($k=='DTSTART' || $k=='DTEND')
                $ics_props[] = "$k;TZID=America/New_York:$v";
            else
                $ics_props[] = "$k:$v";
        }

        $ics_props[] = 'BEGIN:VALARM';
        $ics_props[] = 'TRIGGER:-PT24H';
        $ics_props[] = 'REPEAT:1';
        $ics_props[] = 'DURATION:PT22H';
        $ics_props[] = 'ACTION:DISPLAY';
        $ics_props[] = 'DESCRIPTION:Reminder of Appointment / ACS.';
        $ics_props[] = 'END:VALARM';
        $ics_props[] = 'END:VEVENT';
        $ics_props[] = 'END:VCALENDAR';
        return $ics_props;
    }
    private function sanitize_val($val, $key = false) {
        switch($key)
        {
            case 'dtend':
                $val = $this->format_timestamp($val);
                break;

            case 'dtstart':
                $val = $this->format_timestamp($val);
                break;

            case 'dtstamp':
                $val = $this->format_timestamp($val);
                break;

            default:
                $val = $this->escape_string($val);
        }
        return $val;
    }
    private function format_timestamp($timestamp) {
        //$dt = new DateTime($timestamp);
        //return $dt->format(self::DT_FORMAT);
        return date('Ymd\THis', strtotime('+0 days',strtotime($timestamp)));
    }

    private function format_timestamp1($timestamp) {
        //$dt = new DateTime($timestamp);
        //return $dt->format(self::DT_FORMAT);
        return date('Ymd', strtotime('+0 days',strtotime($timestamp)));
    }
    private function escape_string($str) {
        return preg_replace('/([\,;])/','\\\$1', $str);
    }
}
?>