<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="utf-8">
  <title><?= ($html_title) ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">

  <link rel = "stylesheet" type="text/css" href = "../public/css/card-list.css">

</head>

<body style="width: 100%; box-sizing: border-box; text-align: center;">
  <div class="container-fluid">
    <div class="row content">
      <div>
        <?php echo $this->render($content,NULL,get_defined_vars(),0); ?>
      </div>
    </div>
  </div>
</body>

</html>
