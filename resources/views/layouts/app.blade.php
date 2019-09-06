<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Serenity - Modern bootstrap website template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/css/docs.css" rel="stylesheet">
    <link href="assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/color/default.css" rel="stylesheet">

    <!-- fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            width: 100%;
            height: 400px;
        }

    </style>
    <!-- =======================================================
      Theme Name: Serenity
      Theme URL: https://bootstrapmade.com/serenity-bootstrap-corporate-template/
      Author: BootstrapMade.com
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body data-spy="scroll" data-target=".bs-docs-sidebar">
<header>
    <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <!-- logo -->
                <a class="brand logo" href="index.html">
                    <h3>Prueba Sr. Pago</h3>
                </a>
                <!-- end logo -->
                <!-- top menu -->
                <div class="navigation">
                    <nav>
                        <ul class="nav topnav">
                            <li class="active">
                                <a href="">Punto 2</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- end menu -->
            </div>
        </div>
    </div>
</header>
<!-- Subhead
================================================== -->
<section id="subintro">
    <div class="jumbotron subhead" id="overview">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="centered">
                        <h3>Elaboro: ISC. Johnatan Ayala López</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="maincontent">
    <div class="container">
        <div class="row">
            <div class="span4">
                <aside>
                    <div class="widget">

                        <!---->
                        <h4>Get in touch with us</h4>
                        @yield('content')

                        <!---->

                    </div>
                    <div class="widget">  </div>
                </aside>
            </div>
            <div class="span8">

                <div id="map"></div>
                <script>
                    function initMap() {
                        var myLatLng = {lat: 20.71413, lng: -103.3042};

                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 8,
                            center: myLatLng
                        });

                        var marker = new google.maps.Marker({
                            position: myLatLng,
                            map: map,
                            title: 'Hello World!'
                        });
                    }
                </script>
                <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJzIpJ_xn8U6Hyv6F7UbGSZjBqRNiS9NU&callback=initMap">
                </script>

                <div class="spacer30"></div>

                <table class="table table-bordered table-striped responsive-utilities">
                    <thead>
                    <tr>
                        <th>
                            Estado
                        </th>
                        <th>
                            Municipio
                        </th>
                        <th>
                            Regular
                        </th>
                        <th>
                            Premium
                        </th>
                        <th>
                            Dieasel
                        </th>
                    </tr>
                    </thead>
                    <tbody id="tableBody">


                    </tbody>
                </table>

            </div>
        </div>
    </div>
</section>
<!-- Footer
================================================== -->
@include('common.footer')

<!-- JavaScript Library Files -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.easing.js"></script>
<script src="assets/js/google-code-prettify/prettify.js"></script>
<script src="assets/js/modernizr.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/jquery.elastislide.js"></script>
<script src="assets/js/sequence/sequence.jquery-min.js"></script>
<script src="assets/js/sequence/setting.js"></script>
<script src="assets/js/jquery.prettyPhoto.js"></script>
<script src="assets/js/application.js"></script>
<script src="assets/js/jquery.flexslider.js"></script>
<script src="assets/js/hover/jquery-hover-effect.js"></script>
<script src="assets/js/hover/setting.js"></script>

<!-- Template Custom JavaScript File -->
<script src="assets/js/custom.js"></script>

<!-- JavaScript Exam File -->
<script src="js/examen.js"></script>


</body>

</html>
