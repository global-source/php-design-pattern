<?php

/**
 * Facade Design Pattern.
 */

/**
 * Interface SendMailInterface
 */
interface SendMailInterface
{
    /**
     * To Set Email Address.
     * @param $emailAddress
     * @return mixed
     */
    public function setSendToEmailAddress($emailAddress);

    /**
     * To Set Subject.
     * @param $subject
     * @return mixed
     */
    public function setSubjectName($subject);

    /**
     * To Set Email Contents.
     * @param $body
     * @return mixed
     */
    public function setTheEmailContents($body);

    /**
     * To Set Headers.
     * @param $headers
     * @return mixed
     */
    public function setTheHeaders($headers);

    /**
     * To Get Headers.
     * @return mixed
     */
    public function getTheHeaders();

    /**
     * To Get Header Text.
     * @return mixed
     */
    public function getTheHeadersText();

    /**
     * To Send Email.
     * @return mixed
     */
    public function sendTheEmailNow();
}


/**
 * Implementing that crappy interface
 */
class SendMail implements SendMailInterface
{
    /**
     * Email Body.
     * @var
     */
    public $body;

    /**
     * Email Subject.
     * @var
     */
    public $subject;

    /**
     * Receiver.
     * @var
     */
    public $to;

    /**
     * Email Header.
     * @var array
     */
    public $headers = array();

    /**
     * To Set Receiver Email Address.
     * @param string $emailAddress
     * @return false
     */
    public function setSendToEmailAddress($emailAddress)
    {
        $this->to = $emailAddress;
    }

    /**
     * To Set Subject Name.
     * @param $subject
     * @return false
     */
    public function setSubjectName($subject)
    {
        $this->subject = $subject;
    }

    /**
     * To Set Email Contents.
     * @param $body
     * @return false
     */
    public function setTheEmailContents($body)
    {
        $this->body = $body;
    }

    /**
     * To Set Headers.
     * @param $headers
     * @return false
     */
    public function setTheHeaders($headers)
    {
        $this->headers = $headers;
    }

    /**
     * To Get Headers.
     * @return array
     */
    public function getTheHeaders()
    {
        return $this->headers;
    }

    /**
     * To Get Header Text.
     */
    public function getTheHeadersText()
    {
        $headers = "";
        foreach ($this->getTheHeaders() as $header) {
            $headers .= $header . "\r\n";
        }
    }

    /**
     * To Send Email.
     */
    public function sendTheEmailNow()
    {
        mail($this->to, $this->subject, $this->body, $this->getTheHeadersText());
    }
}


/**
 * A facade wrapper around the crappy SendMail, to improve method names.
 */
class SendMailFacade
{
    /**
     * @var SendMailInterface
     */
    private $sendMail;

    /**
     * SendMailFacade constructor.
     * @param SendMailInterface $sendMail
     */
    public function __construct(SendMailInterface $sendMail)
    {
        $this->sendMail = $sendMail;
    }

    /**
     * To Set the Receiver.
     * @param $to
     * @return $this
     */
    public function setTo($to)
    {
        $this->sendMail->setSendToEmailAddress($to);
        return $this;
    }

    /**
     * To Set Subject.
     * @param $subject
     * @return $this
     */
    public function setSubject($subject)
    {
        $this->sendMail->setSubjectName($subject);
        return $this;
    }

    /**
     * To Set Body.
     * @param $body
     * @return $this
     */
    public function setBody($body)
    {
        $this->sendMail->setTheEmailContents($body);
        return $this;
    }

    /**
     * To Set Header.
     * @param $headers
     * @return $this
     */
    public function setHeaders($headers)
    {
        $this->sendMail->setTheHeaders($headers);
        return $this;
    }

    /**
     * To Send Mail.
     */
    public function send()
    {
        $this->sendMail->sendTheEmailNow();
    }
}

// Overall Parameters.
$to = "facade@pattern.com";
$subject = "Facade Design Pattern";
$body = "Simplified Facade Design Pattern.";
$headers = array(
    "From: php-design-patterns@github.com"
);

// Init Mail Process.
$sendMail = new sendMailFacade(new SendMail());
$sendMail->setTo($to);
$sendMail->setHeaders($headers);
$sendMail->setSubject($subject);
$sendMail->setBody($body);
$sendMail->send();