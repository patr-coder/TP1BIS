<?php
$title = "Livre d'or";
$error = null;
$succes = false;

require_once 'class/GuestBook.php';
 require_once 'elements/header.php';
 require_once 'class/Message.php';

 $guestbook = new GuestBook(__DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'messages');
 if(isset($_POST['username'], $_POST['message'])){
    $message = new Message($_POST['username'], $_POST['message']);
    if($message->isValid()){
        // var_dump($message->isvalid());
        // exit();
        $guestbook->addMessage($message);
    
      
        $succes = true;
        $_POST = [];
        // var_dump($guestbook->$message->addMessage());
        // die;
        // $error = " Your form is invalid";
      
    }else{
        $error = $message->getErrors();

    }
 }
 $messages = $guestbook->getMessages();
 
 ?>
<div class = "row">
    <div class = "col-md-8">
        <?php if(!empty($error)):?>
            <div class="alert alert-danger">
            Your form is invalid!!! 
            </div>
        <?php endif;?>
        <?php if($succes):?>
            <div class="alert alert-success">
                Thanks for your Message!!!
            </div>
        <?php endif;?>
        <h1 class= "text-center">Livre d'or </h1>
        <form action="" method="post">
            <div class ="form-group">
                <input type="text" value="<?=htmlentities($_POST['username']?? '')?>" name="username" class="form-control <?= isset($error['username'])? 'is-invalid': ''?>" placeholder="Enter your name please...">
                <?php if(isset($error['username'])):?>
                    <div class="invalid-feedback">
                        <?=$error['username'];?>
                    </div>
                <?php endif;?>    
            </div>
            <div class ="form-group">
                <textarea name="message" id=""  class="form-control <?=isset($error['message'])? 'is-invalid': ''?>" placeholder="Enter your message...."  ><?=htmlentities($_POST['message']?? '')?></textarea>
                <?php if(isset($error['message'])):?>
                    <div class="invalid-feedback">
                        <?=$error['message'];?>
                    </div>
                <?php endif;?>    
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
            <div class="md-4">
                <?php if(!empty($message)):?>
                    <h2>Vos Messages</h2>
                    <?php foreach($messages as $message):?>
                        <?=$message->toHTML();?>
                        <?php endforeach;?>
                        <?php endif;?>
            </div>
        </form>
       
    </div>
</div>

<?php require_once 'elements/footer.php';?>