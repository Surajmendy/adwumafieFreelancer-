<?php
if(isset($_POST['send-message'])){
    //get message text and sanitize
    $message_body = checkValues($_POST['message']);
    $receiver_id = checkValues($_POST['receiver']);
    $subject = checkValues($_POST['subject']);

    //save chat into db

    $save_chat_query = mysqli_query($con,"INSERT INTO message(sender_id,receiver_id,text,subject)VALUES('$user_id','$receiver_id','$message_body','$subject')");

    if($save_chat_query){
        echo '                
 <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>message was sent successfully to client</strong>
    <a href = "inbox.php">check Inbox</a>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
    </div>    
';

    }else{
        echo '                
 <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>sorry something went wrong! please try again</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
    </div>    
';

    }

}