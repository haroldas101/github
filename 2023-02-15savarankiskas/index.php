<?php
$fileLoc = 'json/urls.json';
    if (!file_exists($fileLoc)) {
        file_put_contents($fileLoc, json_encode([['url' => 'https://codeacademy.lt', 'id' => 'a4r3a']]));
    }
    $data = file_get_contents($fileLoc);
    $data = json_decode($data, true);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<style>
    body {
        margin-top: 20px;
    }
</style>

<body>
    <div class="container ">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">URL Shortener</h5>
            </div>
            <div class="card-body">
                <form id="create-form">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="url-input" class="col-form-label">URL to shorten</label>
                        </div>
                        <div class="col-auto">
                            <input type="url" class="form-control" name="url-input" id="url-input" required>
                        </div>
                        <div class="col-auto">
                            <button type="button" name="shorten-button" id="shorten-button" class="btn btn-primary">Shorten</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ShortLink</th>
                    <th scope="col">Short URL</th>
                    <th scope="col" colspan='2'>URL</th>
                </tr>
            </thead>
            <tbody id='tbody'>
                <!-- generate some trows -->
                <?php
                foreach ($data as $key => $value) {
                    echo '<tr>';
                    echo '<td scope="row">'. $key+1 .'</td>';
                    echo '<td><a href='.$value['url'].'>'.$value['id'].'</a></td>';
                    // echo '<td><a href="http://localhost/php/02-15/redirect.php?code='.$value['id'].'">'.$value['id'].'</a></td>';
                    echo '<td>"http://localhost/2023-02-15savarankiskas/redirect.php?code='.$value['id'].'></td>';
                    echo '<td>'.$value['url'].'</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="index.js" defer></script>
</body>

</html>