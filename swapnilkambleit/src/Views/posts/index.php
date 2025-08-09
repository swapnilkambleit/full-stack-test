<?php global $APP_URL; ?>
<?php require_once __DIR__ . '/../components/header.php'; ?>

    <div class="p-3 mb-4 bg-light rounded-3">
        <a href="<?php echo $APP_URL;?>posts/create" class="float-end btn btn-primary" >Add New Post</a>
        <h1 class="h3">Posts</h1> 
    </div>


    <table class="table table-bordered table-hover">
      <thead class="table-light">
          <tr class="sticky-top">
              <th>#</th>
              <th>Title</th>
              <th>Status</th>
              <th>Date</th>
              <th>Action</th>
          </tr>
      </thead>
      <?php if(!empty($posts)) { ?>
      <tbody>
        <?php
          foreach($posts as $key => $row){
            $srNum = $key + 1;
            echo '<tr>';
            echo '<td>'.$srNum.'</td>';
            echo '<td>'.$row['title'].'</td>';
            echo '<td width="150">'.$row['status'].'</td>';
            echo '<td width="180">'.$row['created'].'</td>';
            
            $edit = '<a href="'.$APP_URL.'posts/edit/'.$row['id'].'" class="btn btn-sm btn-warning" >Edit</a> ';
            $delete = '<a href="'.$APP_URL.'posts/destroy/'.$row['id'].'" class="btn btn-sm btn-danger" >Delete</a> ';

            echo '<td width="150">'.$edit.' '.$delete.'</td>';
            echo '</tr>';

          } 
        ?>
      </tbody>
      <?php } ?>
    </table>`
    
      <?php if(empty($posts)) {
        echo '<h2 class="text-center">No Records Found</h2>';
      } ?>

<?php require_once __DIR__ . '/../components/footer.php'; ?>