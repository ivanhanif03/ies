<!-- @version	1.0.0 -->
<!-- @author 	Muhamamd Ivan Hanif Vidiansyah -->
<!-- @nip       20057 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Portal IES | <?= ucfirst($menu); ?></title>
    <link rel="icon" href="<?= base_url('img/ies_icon.png') ?>">

    <!-- General CSS Files -->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?= base_url('stisla/fontawesome-free-5.15.4-web/css/all.css') ?>">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url('stisla/modules/bootstrap/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('stisla/modules/bootstrap/daterangepicker.css') ?>">
    <link rel="stylesheet" href="<?= base_url('stisla/modules/bootstrap/bootstrap-timepicker.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('stisla/modules/select2/select2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('stisla/modules/selectric/selectric.css') ?>">
    <link rel="stylesheet" href="<?= base_url('stisla/modules/datatables/datatables.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('stisla/modules/datatables/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('stisla/modules/datatables/select.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('stisla/modules/chocolat/dist/css/chocolat.css') ?>">
    <!--  <link rel="stylesheet" href="../node_modules/jqvmap/dist/jqvmap.min.css"> -->
    <!--  <link rel="stylesheet" href="../node_modules/summernote/dist/summernote-bs4.css"> -->
    <!-- <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css"> -->


    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('stisla/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('stisla/css/components.css') ?>">

    <!-- Custom CSS -->
    <style>
        .form-control::-webkit-input-placeholder {
            color: #c7c7c7;
        }

        /* 
Extra small devices (portrait phones, less than 544px) 
No media query since this is the default in Bootstrap because it is "mobile first"
*/
        h1 {
            font-size: 1rem;
        }

        /*1rem = 16px*/
        /*
####################################################
M E D I A  Q U E R I E S
####################################################
*/

        /*
::::::::::::::::::::::::::::::::::::::::::::::::::::
Bootstrap 4 breakpoints
*/
        /* Small devices (landscape phones, 544px and up) */
        @media (min-width: 544px) {
            h1 {
                font-size: 1.5rem;
            }

            /*1rem = 16px*/
        }

        /* Medium devices (tablets, 768px and up) The navbar toggle appears at this breakpoint */
        @media (min-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            /*1rem = 16px*/
        }

        /* Large devices (desktops, 992px and up) */
        @media (min-width: 992px) {
            h1 {
                font-size: 2.5rem;
            }

            /*1rem = 16px*/
        }

        /* Extra large devices (large desktops, 1200px and up) */
        @media (min-width: 1200px) {
            h1 {
                font-size: 3rem;
            }

            /*1rem = 16px*/
        }

        /*
::::::::::::::::::::::::::::::::::::::::::::::::::::
Custom media queries
*/

        /* Set width to make card deck cards 100% width */
        @media (min-width: 950px) and (max-width:1100px) {
            h1 {
                font-size: 2.75rem;
                color: red;
            }
        }
    </style>
</head>