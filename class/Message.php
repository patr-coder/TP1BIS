<?php 
class Message {
    const LIMIT_USER = 3;
    const LIMIT_MESS = 10;
    private $username;
    private $message ;
    private $date;

    public function __construct(string $username, string $message, ?DateTime $date = null) 

    {
        $this->username = $username;
        $this->message = $message;
        $this->date = $date ?:new DateTime();
        
    }

    public function isvalid():bool
    {
    //    return strlen($this->username) >=3 && strlen($this->message) >= 10;
          return empty($this->getErrors());
    }

    public function getErrors(): array
    {
        $error = [];
        // if(strlen($this->username) < 3){
            if(strlen($this->username) < self::LIMIT_USER){
            $error['username'] = 'Your username is too short';
        }
        // if(strlen($this->message) < 10 ){
            if(strlen($this->message) < self::LIMIT_MESS){
            $error['message'] = 'Your message is too short';
        }
        return $error;
    }
    public function toHTML():string
    {
        $username = htmlentities($this->username);
        $message = nl2br(htmlentities($this->message));
        $this->date->setTimezone(new DateTimeZone('Asia/Tokyo'));
        $date =$this->date->format('Y-m-d a H:i');

        return <<<HTML
        <p>
            <strong>{$username}</strong><em>le{$date}</em><br>
            {$message}
        </p>
   
HTML;        

     
    }


    public function toJSON():string
    {
        return json_encode([
            'username'=>$this->username,
            'message'=>$this->message,
            'date'=>$this->date->getTimestamp()
        ]);
    }

}

?>