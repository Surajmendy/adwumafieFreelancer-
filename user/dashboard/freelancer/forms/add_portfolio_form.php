
<!--form class="ps-form--post-a-job"  enctype="multipart/form-data" id="fupForm"-->
<form class="ps-form--post-a-job"  method="post" action="../../../controllers/submit_portfolio_controller.php">
    <h3 align="left">Add Portfolio</h3>





    <div class="form-group">
        <p class="text-left">Title</p>
        <input class="form-control" type="text" name="title" id="title" placeholder="e.g Ecommerce Website"/>
    </div>
    <div class="form-group">
        <p align="left">Description</p>
        <textarea class="form-control" rows="6" name="description" id="description" placeholder="Enter portfolio description here"></textarea>
    </div>

    <div class="form-group">
        <p align="left">Link</p>
        <input class="form-control" type="text" name="link" id="link" placeholder="e.g https://github.com/eco" required/>
        <input  type="hidden" name="user_id" value="<?php echo $user_id; ?>"/>
    </div>

    <!--div class="form-group">
        <p align="left">Image</p>
        <input class="form-control" type="file" name="file"  id="file" />
    </div-->


    <div class="ps-form__submit">
        <button type="submitportfolio" name="submit" class="ps-btn ps-btn--gradient" id="submitBtn" >Add</button>

    </div>
</form>
