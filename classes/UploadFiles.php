<?php


class UploadFiles extends DbOperations
{

    public  $user_id;

    function __construct(){

        //   session_start();
    }

    private function check_the_login(){
        if(isset($_SESSION['email'])){
            $this->user_id = $_SESSION['id'];
        }
    }




    private $supporttedformats = array('.png','.jpg','.jpeg','.PNG','.JPG');



    public function uploadFile($file){

        //$filename = $_FILES["file"]["name"];


        $user_id =  $this->user_id = $_SESSION['id'];

        $target_dir = "porfolio_images/";
        $target_file = $target_dir.basename($_FILES["file"]["name"]);


        $file_basename = substr($target_file, 0, strripos($target_file, '.')); // get file extention
        $file_ext = substr($target_file, strripos($target_file, '.')); // get file name
        $filesize = $_FILES["file"]["size"];

        if(is_array($file)){

            //continue


            if(in_array($file_ext,$this->supporttedformats)){

                // rename file

                $newfilename = md5($file_basename) . $file_ext;


                //continue to upload file
                if(file_exists("porfolio_images/".$newfilename)){

                    echo '<div class="alert alert-danger" role="alert">
  Sorry! File already exist.
</div>' ;

                }else{
                    move_uploaded_file($_FILES["file"]["tmp_name"], "porfolio_images/" . $newfilename);

                    $file_link =  $target_dir.$newfilename;
                    //save link to db
                    $db = $this->connect();

                   // $updateChapter = mysqli_query($conn,"UPDATE tp_projects SET tp_chapter_one = '$file_link ' WHERE tp_project_students = '$user_id' ");

                      $insert_image = $db->insert(
                          'portfolio_images',
                          array(
                              'user_id'=>$user_id,
                              'image'=>$file_link



                          )
                      );

                    echo '<div class="alert alert-success" role="alert">
  File has been uploaded.
</div>' ;
                }


            }else{

                echo '<div class="alert alert-danger" role="alert">
  Sorry! File format not supported
</div>' ;

            }


        } else{
            echo '<div class="alert alert-danger" role="alert">
  No file was uploaded
</div>' ;

        }


    }



}