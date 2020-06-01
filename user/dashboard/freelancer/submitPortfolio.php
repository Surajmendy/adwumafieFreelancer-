<?php
$uploadDir = 'portfolio_images/';
$response = array(
    'status' => 0,
    'message' => 'Form submission failed, please try again.'
);

// If form is submitted
if(isset($_POST['title']) || isset($_POST['description']) || isset($_POST['file']) || isset($_POST['link']) ){
    // Get the submitted form data
    $description = checkValues($_POST['description']);
    $title = checkValues( $_POST['title']);
    $link = checkValues($_POST['link']);

    // Check whether submitted data is not empty
    if(!empty($title) && !empty($description)  && !empty($link) ){
        // Validate email

            $uploadStatus = 1;

            // Upload file
            $uploadedFile = '';
            if(!empty($_FILES["file"]["name"])){

                // File path config
                $fileName = basename($_FILES["file"]["name"]);
                $targetFilePath = $uploadDir . $fileName;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                // Allow certain file formats
                $allowTypes = array('jpg', 'png', 'jpeg');
                if(in_array($fileType, $allowTypes)){
                    // Upload file to the server
                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                        $uploadedFile = $fileName;
                    }else{
                        $uploadStatus = 0;
                        $response['message'] = 'Sorry, there was an error uploading your file.';
                    }
                }else{
                    $uploadStatus = 0;
                    $response['message'] = 'Sorry, only JPG, JPEG, & PNG files are allowed to upload.';
                }
            }

            if($uploadStatus == 1){
                // Include the database config file
               // include_once 'dbConfig.php';

                // Insert form data in the database
                $insert = mysqli_query($con,"INSERT INTO portfolio (title,description,link,image,user_id) VALUES ('".$title."','".$description."','".$link."','".$uploadedFile."','".$user_id."')");

                if($insert){
                    $response['status'] = 1;
                    $response['message'] = 'Form data submitted successfully!';
                }
            }

    }else{
        $response['message'] = 'Please fill all the mandatory fields (name and email).';
    }
}

// Return response
echo json_encode($response);