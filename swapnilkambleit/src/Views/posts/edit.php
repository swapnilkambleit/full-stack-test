<?php global  $APP_URL; ?>
<?php require_once __DIR__ . '/../components/header.php'; ?>

    <div class="p-3 mb-4 bg-light rounded-3">
      <a href="<?php echo $APP_URL;?>posts" class="float-end btn btn-warning" > Back </a>
      <h1 class="h3">Edit Post</h1> 
    </div>

    <div class=" p-3  justify-content-center  bg-light"> 
        
        <form method="post" action="<?php echo $APP_URL;?>posts/update" enctype="multipart/form-data" >

            <input type="hidden" name="id" value="<?php echo $id ??'';?>" />
            
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title"  value="<?php echo $title ??'';?>"  required />
            </div>
            
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="5"  required ><?php echo $description ??'';?></textarea>
                    </div> 
                </div>

                <div class="col-sm-6">
                    
                    <div class="mb-3">
                        <label for="status" class="form-label" >Category</label> 
                        <select class="form-control" name="category_id" id="category_id" required >
                            <?php
                            $category_ck = (string)$category_id;
                            if(!empty($categories)) {
                                foreach($categories as $cat){
                                    if($cat['status'] == 'Enable') {
                                        if($category_ck == $cat['id']) {
                                            echo '<option value="'.$cat['id'].'" selected="selected">'.$cat['title'].'</option>';
                                        } else {
                                            echo '<option value="'.$cat['id'].'">'.$cat['title'].'</option>';
                                        }
                                    }
                                }
                            }
                            ?> 
                        </select>
                    </div> 

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" name="image" id="image"  accept="image/png, image/jpeg"  />
                    </div>
            
                    <div class="mb-3">
                        <label for="status" class="form-label">Status </label> 
                        <select class="form-control" name="status" id="status" required >
                            <?php
                            $status_ck = (string)$status;
                            $stArr = array('Disable', 'Enable');
                            foreach($stArr as $state){
                                if($state === $status_ck) {
                                    echo '<option value="'.$state.'" selected="selected">'.$state.'</option>';
                                } else {
                                    echo '<option value="'.$state.'">'.$state.'</option>';
                                }
                            }
                            ?> 
                        </select>
                    </div> 
                </div> 
            </div> 
            <hr>

            <button type="submit" class="btn btn-primary float-end">Submit</button>
        </form>
        <br> 
    </div>
 

<?php require_once __DIR__ . '/../components/footer.php'; ?>