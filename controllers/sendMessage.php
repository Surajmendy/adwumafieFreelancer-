<?php
if(isset($_POST['send-message'])){
    //get message text and sanitize
    $message_body = checkValues($_POST['message']);
    $receiver_id = checkValues($_POST['receiver']);

    //save chat into db

    $save_chat_query = mysqli_query($con,"INSERT INTO message(sender_id,receiver_id,text)VALUES('$user_id','$receiver_id','$message_body')");

}