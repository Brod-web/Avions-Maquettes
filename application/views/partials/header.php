<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=$title?></title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- css -->
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/normalize.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/mobile-style.css"> 
    <!-- fonts -->
    <script src="https://kit.fontawesome.com/bb539bd9a1.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Leckerli+One&family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Patrick+Hand+SC&display=swap" rel="stylesheet">
</head>

<body>
    <header class="entete">
        <div class="container">
            <div class="flex-between">
                <div class="logo">
                    <strong>AVIONS <i class="fas fa-plus-circle"></i><span> Maquettes</span></strong>
                </div>
                
                <? require_once (APPPATH."views/partials/nav_$title.php");?>

            </div>
        </div>
    </header>

    <main>