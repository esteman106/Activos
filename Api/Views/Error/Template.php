<!DOCTYPE html>
<html lang="<?php echo LNG_CONTENT ?>">

<head>

    <meta charset="<?php echo FORMAT_CONTENT ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Activos - Error</title>

</head>

<body id="page-top">

                <div class="container-fluid">

                    <!-- 404 Error Text -->
                    <div class="text-center">
                        <div class="error mx-auto" data-text="404">404</div>
                        <p class="lead text-gray-800 mb-5"><?php echo $e->getMessage();?></p>
                        <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
                        <a href="<?php echo BASE_URL ?>">&larr; Back to Dashboard</a>
                    </div>

                </div>
</body>
</html>