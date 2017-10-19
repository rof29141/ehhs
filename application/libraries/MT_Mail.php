<?php
class MT_Mail
{
    public function __construct()
    {

    }

    function EnviarEmail($from_email='', $from_name='', $email_to='', $reply_to_email='', $reply_to_name='', $subject='', $body='', $attachments='')
    {
        date_default_timezone_set('Etc/UTC');

        $my_instance =& get_instance();
        $my_instance->load->library('email');

        $body = utf8_decode($body);
        $my_instance->email->set_mailtype("html");
        $my_instance->email->from($from_email, $from_name);
        $my_instance->email->reply_to($reply_to_email, $reply_to_name);
        $my_instance->email->to($email_to);
        $my_instance->email->subject($subject);
        //echo $attachments;

        $attachments = explode("&", $attachments);

        if(count($attachments) != 0)
        {
            for ($i = 0; $i < count($attachments); next($attachments), $i++)
            {
                $attachment = current($attachments);

                $my_instance->email->attach($attachment);
                $img_cid = $my_instance->email->attachment_cid($attachment);
                $body = str_replace("img_cid_" . $i, $img_cid, $body);
            }
        }
        //echo $body;
        $my_instance->email->message($body);

        if($my_instance->email->send())
            return 'OK';
        else
            return 'ERROR';
    }
}
?>