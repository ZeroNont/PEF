<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Temporary Tag Permission System</title>
    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url(); ?>argon/assets/img/brand/denso.jpg" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>argon/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>argon/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css"
        type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>argon/assets/css/argon.css?v=1.2.0" type="text/css">
    <link rel="stylesheet" type="text/css" href="dt/jquery.dataTables.min.css">
    <script type="text/javascript" language="javascript" src="dt/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" language="javascript" src="dt/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
    <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">
    #printable {
        display: block;
    }

    @media print {
        #non-printable {
            display: none;
        }

        #printable {
            display: block;
        }

        #hid {
            display: none;
            /* ซ่อน  */
        }

        body {
            -webkit-print-color-adjust: exact;
        }

        /* กำหนดให้สีในหน้าเว็บสามารถพิมพ์ได้อย่างถูกต้อง */
        .hideWhenPrint {
            /* // เนื้อหาในคลาส hideWhenPrint จะถูกปิดตาทิ้งไปเมื่อพิมพ์บนกระดาษ */
            display: none;
        }



        @page {
            margin: 2.5cm;
            size: A3 landscape;
        }
    }
    </style>
</head>

<body>