<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo TEMPLATE_PATH.'bootstrap-4.3.1-dist/css/bootstrap.min.css'; ?>" />

    <title>Hello, world!</title>
  </head>
  <body>

    <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand" href="<?php echo '/'.SITE_PATH ?>">Lysenko Alex</a>
    </nav>
    <div class="container">
      <div class="col-sm-12">
        <h1>File Manager</h1>
        
        <?php foreach ($messages as $message) { ?>
          <?php if ( $message['type'] == 'error' ) { ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $message['value'] ?>
            </div> 
          <?php } else if ( $message['type'] == 'success' ) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $message['value'] ?>
            </div> 
          <?php } ?>
        <?php } ?>

        <form class="form-inline" enctype="multipart/form-data" action="" method="POST">

          <div class="form-group mx-sm-3 mb-2">
            <label for="upload-file-form" class="sr-only">Upload file input</label>
            <input type="file" class="form-control-file" id="upload-file-form" name="upload-file-form" />
          </div>
          <button type="submit" name="upload_submit_but" class="btn btn-primary mb-2">Upload</button>
        </form>

        <?php if ( is_array($list_of_file) && count($list_of_file) > 0 ){ ?> 
          <h2>List of files</h2>
          <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">File name</th>
              <th scope="col">Size</th>
              <th scope="col">&nbsp;</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($list_of_file as $file) { ?>
            <tr>
              <th scope="row"><?php echo $file['num'] ?></th>
              <td><a href="<?php echo '/'.SITE_PATH.UPLOADS_PATH.$file['file_name'] ?>" target="_blank"><?php echo $file['file_name'] ?></td>
              <td><?php echo $file['file_size'] ?></td>
              <td>
                <form action="<?php echo '/'.SITE_PATH ?>" method="POST">
                  <input type="hidden" name="deleteFile" value="<?php echo $file['file_name'] ?>" />
                  <button type="submit" name="submitDeleteFile" class="btn btn-danger btn-sm">DELETE</button>
                </form>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
        <?php } else { ?>
          <h2>No files in folder</h2>
        <?php } ?>

      </div>
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo '/'.SITE_PATH.TEMPLATE_PATH.'bootstrap-4.3.1-dist/js/jquery-3.3.1.slim.min.js'; ?>"></script>
    <script src="<?php echo '/'.SITE_PATH.TEMPLATE_PATH.'bootstrap-4.3.1-dist/js/popper.min.js'; ?>"></script>
    <script src="<?php echo '/'.SITE_PATH.TEMPLATE_PATH.'bootstrap-4.3.1-dist/js/bootstrap.min.js"'; ?>"></script>
  </body>
</html>
