<?php global  $APP_URL; ?>
<?php require_once __DIR__ . '/../components/header.php'; ?>

    <div class="p-3 mb-4 bg-light rounded-3">
      <a href="<?php echo $APP_URL;?>categories" class="float-end btn btn-warning" > Back </a>
      <h1 class="h3">Create New Category</h1> 
    </div>

    <div class=" p-3  justify-content-center  bg-light"> 
        
        <form method="post" action="<?php echo $APP_URL;?>categories/store" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required />
            </div>
            
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="5" required ></textarea>
                    </div> 
                </div>

                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" name="image" id="image" accept="image/png, image/jpeg"   />
                    </div>
            
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" name="status" id="status" required >
                            <option value="Enable">Enable</option>
                            <option value="Disable">Disable</option>
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