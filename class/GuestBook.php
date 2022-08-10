<?php 
require_once 'Message.php';
class GuestBook{
    private $file;

    public function __construct(string $file)

    {   $this->file = $file;
        $directory = dirname($file);
        if(!is_dir($directory)){
            mkdir($directory);
        }
        if(!file_exists($file)){
            touch($file);
        }

        
    }
    public function addMessage(message $message):void
    {
        file_put_contents($this->file, $message->toJSON(). PHP_EOL ,FILE_APPEND);
    }

    public function getMessages(): array
    {
        
        $content = trim(file_get_contents($this->file));
        $lines = explode(PHP_EOL,$content);
        $messages =[];
        foreach($lines as $line){
            $data = json_decode($line,true);
            $messages[] = new Message($data['username'], $data['message'], new DateTime('@'. $data['date']));
        }
        return array_reverse($messages);
    }
    
}

?>