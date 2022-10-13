<!DOCTYPE html>
<html>

<head>
    <title>Sistem Pendukung Keputusan Pemilihan Laptop</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="assets/css/materialize.css" media="screen,projection" />
    <link rel="stylesheet" href="assets/css/table.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="apple-touch-icon" sizes="76x76" href="assets/image/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/image/favicon.png">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--Import jQuery before materialize.js-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/materialize.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<body>
    <div class="navbar-fixed">
        <nav>
            <div class="container">

                <div class="nav-wrapper">
                    <ul class="left" style="margin-left: -52px;">
                        <li><a href="index.php">HOME</a></li>
                        <li><a class="active" href="rekomendasi.php">REKOMENDASI</a></li>
                        <li><a href="daftar_laptop.php">DAFTAR LAPTOP</a></li>
                    </ul>
                </div>

            </div>
        </nav>
    </div>
    <!-- Body Start -->

    <!-- Daftar Laptop Start -->
    <div style="background-color: #efefef">
        <div class="container">
            <div class="section-card" style="padding: 32px 0px 20px 0px">
                <ul>
                    <li>
                        <div class="row">
                            <div class="col s3">
                            </div>
                            <div class="col s6">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="row">
                                            <center>
                                                <h4>Masukan Bobot</h4>
                                            </center>
                                            <br>
                                            <form class="col s12" method="POST" action="hasil.php">
                                                <div class="row">
                                                    <div class="col s12">

                                                        <div class="col s6" style="margin-top: 10px;">
                                                            <b>Kriteria Harga</b>
                                                        </div>
                                                        <div class="col s6">
                                                            <select required name="harga">
                                                                <option value="" disabled selected style="color: #eceff1;"><i>Kriteria Harga</i></option>
                                                                <option value="5">
                                                                    < Rp. 1.000.000</option>
                                                                <option value="4">1.000.000 - 3.000.000</option>
                                                                <option value="3">3.000.000 - 5.000.000</option>
                                                                <option value="2">5.000.000 - 10.000.000</option>
                                                                <option value="1">> 10.000.000</option>
                                                            </select>
                                                        </div>

                                                        <div class="col s6" style="margin-top: 10px;">
                                                            <b>RAM</b>
                                                        </div>
                                                        <div class="col s6">
                                                            <select required name="ram">
                                                                <option value="" disabled selected>Kriteria RAM</option>
                                                                <option value="1">0 - 2 Gb</option>
                                                                <option value="2">2 - 4 Gb</option>
                                                                <option value="3">4 - 8 Gb</option>
                                                                <option value="4">8 - 12 Gb</option>
                                                                <option value="5">> 12 Gb</option>
                                                            </select>
                                                        </div>

                                                        <div class="col s6" style="margin-top: 10px;">
                                                            <b>Memori</b>
                                                        </div>
                                                        <div class="col s6">
                                                            <select required name="memori">
                                                                <option value="" disabled selected>Kriteria Penyimpanan</option>
                                                                <option value="1">0 - 64 Gb</option>
                                                                <option value="2">128 Gb</option>
                                                                <option value="3">234 Gb</option>
                                                                <option value="4">512 Gb</option>
                                                                <option value="5">> 512 Gb</option>
                                                            </select>
                                                        </div>

                                                        <div class="col s6" style="margin-top: 10px;">
                                                            <b>Processor</b>
                                                        </div>
                                                        <div class="col s6">
                                                            <select required name="processor">
                                                                <option value="" disabled selected>Kriteria Processor</option>
                                                                <option value="1">Intel</option>
                                                                <option value="3">Amd</option>
                                                            </select>
                                                        </div>

                                                        <div class="col s6" style="margin-top: 10px;">
                                                            <b>Berat</b>
                                                        </div>
                                                        <div class="col s6">
                                                            <select required name="kamera">
                                                                <option value="" disabled selected>Kriteria Berat</option>
                                                                <option value="1">
                                                                    < 1 Kg</option>
                                                                <option value="3">1 -2 Kg</option>
                                                                <option value="5">>2 Kg</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <center><button type="submit" class="waves-effect waves-light btn" style="margin-bottom:-46px;">Hitung</button></center>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s3">
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Rekomendasi Laptop End -->

    <script type="text/javascript">
        $(document).ready(function() {
            $('.parallax').parallax();
            $('select').material_select();
            $('.modal').modal();
        });
    </script>
</body>

</html>