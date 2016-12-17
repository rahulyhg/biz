<?php

class Mailmodel extends CI_Model {

    public static function prepareAttachment($path) {
        $rn = "\r\n";

        if (file_exists($path)) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $ftype = finfo_file($finfo, $path);
            $file = fopen($path, "r");
            $attachment = fread($file, filesize($path));
            $attachment = chunk_split(base64_encode($attachment));
            fclose($file);

            $msg = 'Content-Type: \'' . $ftype . '\'; name="' . basename($path) . '"' . $rn;
            $msg .= "Content-Transfer-Encoding: base64" . $rn;
            $msg .= 'Content-ID: <' . basename($path) . '>' . $rn;
//            $msg .= 'X-Attachment-Id: ebf7a33f5a2ffca7_0.1' . $rn;
            $msg .= $rn . $attachment . $rn . $rn;
            return $msg;
        } else {
            return false;
        }
    }

    public static function sendMail($to, $subject, $content, $path = '') {
        $rn = "\r\n";
        $boundary = md5(rand());
        $boundary_content = md5(rand());

// Headers
        $headers = 'From:  contact@bizjumper.com' . $rn;
        $headers .= 'Mime-Version: 1.0' . $rn;
        $headers .= 'Content-Type: multipart/related;boundary=' . $boundary . $rn;
        $headers .= $rn;

// Message Body
        $msg = $rn . '--' . $boundary . $rn;
        $msg.= "Content-Type: multipart/alternative;" . $rn;
        $msg.= " boundary=\"$boundary_content\"" . $rn;

//Body Mode text
        $msg.= $rn . "--" . $boundary_content . $rn;
        $msg .= 'Content-Type: text/html; charset=ISO-8859-1' . $rn;
        $msg .= $content . $rn;

//if attachement
        if ($path != '' && file_exists($path)) {
            $conAttached = self::prepareAttachment($path);
            if ($conAttached !== false) {
                $msg .= $rn . '--' . $boundary . $rn;
                $msg .= $conAttached;
            }
        }

// Fin
        $msg .= $rn . '--' . $boundary . '--' . $rn;

// Function mail()
        mail($to, $subject, $msg, $headers);
    }

    public static function sendverificationMail($to, $subject, $content, $path = '') {
        $rn = "\r\n";
        $boundary = md5(rand());
        $boundary_content = md5(rand());

// Headers
        $headers = 'From:  info@logicshore.in' . $rn;
        $headers .= 'Mime-Version: 1.0' . $rn;
        $headers .= 'Content-Type: multipart/related;boundary=' . $boundary . $rn;
        $headers .= $rn;

// Message Body
        $msg = $rn . '--' . $boundary . $rn;
        $msg.= "Content-Type: multipart/alternative;" . $rn;
        $msg.= " boundary=\"$boundary_content\"" . $rn;

//Body Mode text
        $msg.= $rn . "--" . $boundary_content . $rn;
        $msg .= 'Content-Type: text/html; charset=ISO-8859-1' . $rn;
        $msg .= strip_tags($content) . $rn;

//if attachement
        if ($path != '' && file_exists($path)) {
            $conAttached = self::prepareAttachment($path);
            if ($conAttached !== false) {
                $msg .= $rn . '--' . $boundary . $rn;
                $msg .= $conAttached;
            }
        }

// Fin
        $msg .= $rn . '--' . $boundary . '--' . $rn;

// Function mail()
        mail($to, $subject, $msg, $headers);
    }

    public function sendemail($data) {
        $config = Array(
            'protocol' => 'sendmail',
            'smtp_host' => 'http://www.bizjumper.com',
            'smtp_port' => 25,
            'smtp_user' => 'bizjumper2016',
            'smtp_pass' => 'Biz@2016',
            'smtp_timeout' => '4',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'priority' => '1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('contact@bizjumper.com', 'bizjumper team');
        $to = $data['to'];
        $subject = $data['subject'];
        $link = $data['link'];
        $this->email->to($to);  // replace it with receiver mail id
        $this->email->subject($subject); // replace it with relevant subject
        $body = $this->load->view($link, $data, TRUE);
        $this->email->message($body);
        $this->email->send();
    }

}

?>