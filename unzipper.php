<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PHP ZIP Extractor</title>
    <link rel="icon" href="" type="image/gif" sizes="16x16">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style type="text/css">
        body {
            font-size: 14px;
            line-height: 24px;
        }
        .file-list {
            width: 100%;
            max-height: 200px;
            overflow-y: scroll;
            margin-bottom: 20px;
            border: 2px solid #b2b2b2;
        }
        .file-list li {
            margin: 1px;
            padding: 5px;
            border-radius: 3px;
            cursor: default;
        }
        .file-list li:hover {
            background: rgba(0, 0, 0, .1);
        }
        .warning {
            color: #ea4c55;
        }
        .author-info {
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="jumbotron text-center mt-4">
            <h2>PHP Unzip File</h2>
            <p>Effortlessly unzip your files with this simple PHP script. Try it now for a quick and reliable file extraction solution!</p>
        </div>

        <?php if(isset($_REQUEST['confirm'])) { ?>
            <div class="alert alert-info">
                <?php
                    $zip = new ZipArchive;
                    $ext_tar_path = $_REQUEST['target_path'];
                    $ext_tar_from_path = $_REQUEST['target_from_path'];
                    if ($zip->open($ext_tar_from_path) === TRUE) {
                        echo '<h3 class="text-success">Files extracted successfully:</h3>';
                        echo '<ul class="list-group file-list">';
                        for ($i = 0; $i < $zip->numFiles; $i++) {
                            echo '<li class="list-group-item">' . $zip->getNameIndex($i) . '</li>';
                        }
                        echo '</ul>';
                        $zip->extractTo($ext_tar_path);
                        $zip->close();
                        echo '<div class="alert alert-success mt-4">File has been extracted successfully!</div>';
                    } else {
                        echo '<div class="alert alert-danger">Oops! Something went wrong. Failed to extract the file.</div>';
                    }
                ?>
                <a href="" class="btn btn-primary mt-3">&#8592; Back to extract more items</a>
            </div>
        <?php } else {
            $ext_path = getcwd() . "/";
            $ext_path = str_replace("\\", "/", $ext_path);
        ?>

            <div class="card p-4">
                <div class="warning">
                    <p>Important Notice:</p>
                    <ul>
                        <li>Make sure you are extracting a zip file.</li>
                        <li>Directories will be created automatically if they don’t exist.</li>
                        <li>Please input correct information to avoid errors.</li>
                    </ul>
                </div>
                <form action="" method="post" class="mt-4">
                    <div class="form-group">
                        <label for="arc_file">Zip file (Replace <code>file_name.zip</code> with your existing zip file)</label>
                        <input type="text" id="arc_file" name="target_from_path" class="form-control" value="<?php echo $ext_path;?>file_name.zip" />
                    </div>
                    <div class="form-group">
                        <label for="ext_file">Extract (Extract here)</label>
                        <input type="text" id="ext_file" name="target_path" class="form-control" value="<?php echo $ext_path;?>" />
                    </div>
                    <input type="hidden" name="confirm" value="1" />
                    <button type="submit" class="btn btn-success">Extract</button>
                </form>
            </div>

            <div class="author-info mt-5">
                <p><strong>Agellls,</strong></p>
                <p>Mobile Developer</p>
                <p>Website: <a href="https://agellls.serv00.net/personal/" target="_blank">https://agellls.serv00.net/personal/</a></p>
            </div>

        <?php } ?>

        <footer class="footer_area mt-5 text-center">
            <p>&copy; <a href="https://agellls.serv00.net/personal/" target="_blank">Agellls</a> 2024. All Rights Reserved.</p>
        </footer>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
