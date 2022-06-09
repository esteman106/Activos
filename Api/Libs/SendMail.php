<?php
namespace Api\Libs;
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
require_once 'PHPMailer/src/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;

class SendMail
{
    private $ObjMail;

    public function __construct(){
        $this->ObjMail = new PHPMailer();
        self::configSMTP();
    }

    public function proccessMail(){
        $this->ObjMail->setFrom(TEST_EMAIL, 'No-Responder');
        $this->ObjMail->addAddress(NOTIFY_EMAIL, 'Manuel Romero');
        $this->ObjMail->Subject = SUBJECT_DEFAULT;
        if($this->ObjMail->send()){
            return array (true,"Notificación enviada por Email");
        }else{
            return array (false,$this->ObjMail->ErrorInfo);
        }
    }

    public function loadTemplate($html){
        $this->ObjMail->isHTML(true);
        $this->ObjMail->msgHTML($html);
    }

    private function configSMTP(){
        $this->ObjMail->isSMTP();
        $this->ObjMail->Host = HOST_EMAIL;
        $this->ObjMail->SMTPAuth = SMTP_AUTH;
        $this->ObjMail->Username = TEST_EMAIL;
        $this->ObjMail->Password = PASS_EMAIL;
        $this->ObjMail->SMTPSecure = PROTOCOL_EMAIL;
        $this->ObjMail->Port = PORT_EMAIL;
    }
}