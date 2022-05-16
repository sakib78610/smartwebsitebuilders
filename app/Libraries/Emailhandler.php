<?php

namespace App\Libraries;

class Emailhandler{

    public static function sendEmail($to, $subject, $message, $data){
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: ".$data['name']."<".$data['email'].">" . "\r\n"."Reply-To: ".$data['email']."\r\n" . "X-Mailer: PHP/" . phpversion();

        mail($to, $subject, $message, $headers);
    }

    public static function contactEmail($data){
        $message = '<div style="width: 100%;">
                        <h4>Hi Admin,</h4>
                        <p>Enquiry generated from contact form:</p>
                        <p><strong>Name: </strong>'.$data['name'].'</p>
                        <p><strong>Email: </strong>'.$data['email'].'</p>
                        <p><strong>Phone: </strong>'.$data['phone'].'</p>
                        <p><strong>Subject: </strong>'.$data['subject'].'</p>
                        <p><strong>Message: </strong>'.$data['message'].'</p>
                    </div>';
        self::sendEmail('info@gnecmedia.com', 'GNEC MEDIA | Enquiry Requested by '.$data['name'], $message, $data);
    }

    public static function letsTaklEmail($data){
        $message = '<div style="width: 100%;">
                        <h4>Hi Admin,</h4>
                        <p>Discuss on Project generated:</p>
                        <p><strong>Name: </strong>'.$data['name'].'</p>
                        <p><strong>Email: </strong>'.$data['email'].'</p>
                        <p><strong>Phone: </strong>'.$data['phone'].'</p>
                    </div>';
        self::sendEmail('info@gnecmedia.com', 'GNEC MEDIA | Discuss Requested by '.$data['name'], $message, $data);
    }
    
    public static function promotionEmail($data){
        $message = '<div style="width: 100%;">
                        <h4>Hi Admin,</h4>
                        <p>Discuss on SMS - Lead:</p>
                        <p><strong>Name: </strong>'.$data['name'].'</p>
                        <p><strong>Email: </strong>'.$data['email'].'</p>
                        <p><strong>Phone: </strong>'.$data['phone'].'</p>
                    </div>';
        self::sendEmail('info@gnecmedia.com', 'GNEC MEDIA | Discuss on SMS Requested by '.$data['name'], $message, $data);
    }

    public static function serviceEmail($data){
        $text = 'Enquiry generated for service:';
        $subject = 'Enquiry for service by '.$data['name'];
        if($data['service'] == 'sms'){
            $text = 'Enquiry generated for SMS service:';
            $subject = 'Enquiry for SMS service by '.$data['name'];
        }
        $message = '<div style="width: 100%;">
                        <h4>Hi Admin,</h4>
                        <p>'.$text.'</p>
                        <p><strong>Name: </strong>'.$data['name'].'</p>
                        <p><strong>Email: </strong>'.$data['email'].'</p>
                        <p><strong>Phone: </strong>'.$data['phone'].'</p>
                    </div>';
        self::sendEmail('info@gnecmedia.com', 'GNEC MEDIA | '.$subject, $message, $data);
    }
} 