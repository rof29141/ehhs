<?php
$arr_ical=array('location' => '3805 Edwards Rd #100 Cincinnati, OH 45244',
    'description' => $APT_Title,
    'dtstart' => $APT_Date.' '.$APT_Time,
    'dtend' => $APT_Date.' '.$APT_TimeEnd,
    'summary' => $APT_Title,
    'url' => '351face.com'
);

$ics = new ICS($arr_ical);
$calendar=$ics->to_string();


//header('Content-type: text/calendar; charset=utf-8');
//header('Content-Disposition: attachment; filename=Appointment_'.$APT_Date.'.ics');
//header("Content-type: application/octet-stream");
//header("Content-Type: application/force-download");
//$this->load->helper('download');
//$name = 'Appointment_'.$APT_Date.'.ics';
//force_download($name, $calendar, TRUE);//'./assets/upload/'.
echo  $calendar;
//ob_flush();
//header('location:ModalConfirmAppointment1.php');

class ICS
{
    const DT_FORMAT = 'Ymd\THis\Z';
    protected $properties = array();
    private $available_properties = array(
        'description',
        'dtend',
        'dtstart',
        'location',
        'summary',
        'url'
    );
    public function __construct($props) {
        $this->set($props);
    }
    public function set($key, $val = false) {
        if (is_array($key)) {
            foreach ($key as $k => $v) {
                $this->set($k, $v);
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
            'PRODID:-//hacksw/handcal//NONSGML v1.0//EN',
            'CALSCALE:GREGORIAN',
            'BEGIN:VEVENT'
        );
        // Build ICS properties - add header
        $props = array();
        foreach($this->properties as $k => $v) {
            $props[strtoupper($k . ($k === 'url' ? ';VALUE=URI' : ''))] = $v;
        }
        // Set some default values
        $props['DTSTAMP'] = $this->format_timestamp('now');
        $props['UID'] = uniqid();
        // Append properties
        foreach ($props as $k => $v) {
            $ics_props[] = "$k:$v";
        }
        // Build ICS properties - add footer
        $ics_props[] = 'END:VEVENT';
        $ics_props[] = 'END:VCALENDAR';
        return $ics_props;
    }
    private function sanitize_val($val, $key = false) {
        switch($key) {
            case 'dtend':
            case 'dtstamp':
            case 'dtstart':
                $val = $this->format_timestamp($val);
                break;
            default:
                $val = $this->escape_string($val);
        }
        return $val;
    }
    private function format_timestamp($timestamp) {
        $dt = new DateTime($timestamp);
        return $dt->format(self::DT_FORMAT);
    }
    private function escape_string($str) {
        return preg_replace('/([\,;])/','\\\$1', $str);
    }
}
?>
<script type="text/javascript">

    window.location.href = "ModalConfirmAppointment1.php";
    //$( location ).attr("href", 'ModalConfirmAppointment1.php');
    alert('hwgefuytefv');
    $(document).ready(function()
    {

    });

</script>
