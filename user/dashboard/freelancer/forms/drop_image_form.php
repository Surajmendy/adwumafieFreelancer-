
<!--form class="ps-form--post-a-job"  enctype="multipart/form-data" id="fupForm"-->
<form class="ps-form--post-a-job"  method="post" action="../../../controllers/upload_image.php" enctype="multipart/form-data">

   <p>Hey <?php echo $username; ?> </p> , our clients love to see images.

    <h3 align="left">Add Image</h3>





    <div class="form-group">
        <p align="left">Image</p>
        <input class="form-control" type="file" name="portfolio_image"  id="file" />

    </div>


    <div class="ps-form__submit">
        <button  name="portfolio_image" class="ps-btn ps-btn--gradient" id="submitBtn" >Add</button>

    </div>
</form>
