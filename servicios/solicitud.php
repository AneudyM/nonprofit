<?php

spl_autoload_register(
  function($class_name) {
    require_once('../app/pkgs/email/'.$class_name.'.php');
  }
);

include_once("../app/config/dbsettings.php");

// Queries
$qryProvinces = 'SELECT name FROM province';
$provinces = $mysqli->query($qryProvinces, MYSQLI_STORE_RESULT);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../favicon.ico">
        <title>Centro Dominicano de Desarrollo, Inc.</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
        <link href="../css/style.css" rel="stylesheet">
    </head>
    <body>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.11';
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));
        </script>
        <nav class="navbar navbar-toggleable-md fixed-top">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="material-icon"><i class="fa fa-bars" aria-hidden="true"></i> </span>
            </button>
            <a class="navbar-brand" href="../index.html">
                <img class="main-logo" src="../img/branding/centered_logo.png">
            </a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto main-menu">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.html">Inicio<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item main-menu__submenu">
                        <a class="nav-link" href="#">Nosotros <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <ul class="main-menu__submenu-content">
                            <li>
                                <a href="../nosotros/historia.html">Historia</a>
                            </li>
                            <li>
                                <a href="../nosotros/mision.html">Misión, visión, y valores</a>
                            </li>
                            <li>
                                <a href="../nosotros/responsabilidad.html">Responsabilidad Social</a>
                            </li>
                            <li>
                                <a href="../nosotros/capacitacion.html">Capacitación Clientes</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item main-menu__submenu">
                        <a class="nav-link" href="#">
                            Servicios <i class="fa fa-angle-down fa-1x"></i>
                        </a>
                        <ul class="main-menu__submenu-content">
                            <li>
                                <a href="../servicios/microcreditos.html">Microcréditos</a>
                            </li>
                            <li>
                                <a href="../servicios/solicitud.php">Solicitud de crédito</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item main-menu__submenu">
                        <a class="nav-link" href="#">
                            Institucional <i class="fa fa-angle-down fa-1x"></i>
                        </a>
                        <ul class="main-menu__submenu-content">

                            <li>
                                <a href="../institucional/directores.html">Consejo de Directores</a>
                            </li>


                            <li>
                                <a href="../institucional/gerencial.html">Staff Gerencial</a>
                            </li>


                            <li>
                                <a href="../institucional/memorias.html">Memorias anuales</a>
                            </li>


                            <li>
                                <a href="../institucional/relaciones.html"> Relaciones</a>
                            </li>


                            <li>
                                <a href="../institucional/reconocimientos.html">Reconocimientos</a>
                            </li>

                            <li>
                                <a href="../institucional/premios.html">Premios</a>
                            </li>

                            <li>
                                <a href="../institucional/trabajos.html">Trabaja con Nosotros</a>
                            </li>
                            <li>
                                <a href="/institucional/galeria.html">Galería</a>
                            </li>
                            <li>
                                <a href="../institucional/suggestion.php">Sugerencias</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../contacto.html">Contacto</a>
                    </li>
                    <li class=" login-button">
                        <a class="nav-link" href="../app/login.html">Acceso Clientes
                            <i class="fa fa-lock fa-1x"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="banner-cover">
            <div class="inner-cover">
                <h1>Solicitud de crédito</h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                      $email = new Email();
                      $request = new LoanRequest();
                      $to = "uditoriainterna@cdd.org.do, f.ramirez@cdd.org.do";
                      $sender = 'info@cdd.org.do';

                      $request->setFirstName($_POST['first_name']);
                      $request->setLastName($_POST['last_name']);
                      $request->setAddress($_POST['address']);
                      $request->setCountry($_POST['country']);
                      $request->setEmail($_POST['email']);
                      $request->setPhone($_POST['phone']);
                      $request->setProvince($_POST['province']);
                      $request->setMunicipality($_POST['municipality']);


                      /** Construct the Email report */
                      $message[] = '<html><body style="font-size: 16px">';
                      $message[] = '<img style="width: 400px;" src="http://cdd.org.do/img/branding/centered_logo.png" alt="Centro Dominicano de Desarrollo, Inc." />';
                      $message[] = '<hr>';
                      $message[] = '<table rules="all" style="border-color: #fff; width: 500px;" cellpadding="10">';
                      $message[] = '<caption><h1>Solicitud de Prestamo</h1></caption>';

                      // Full name row
                      $message[] = '<tr style="background-color: #baecac">';
                      $message[] = '<th align="right">Nombre:</th>';
                      $message[] = '<td>'.$request->FirstName()." ".$request->LastName().'</td>';
                      $message[] = '</tr>';

                      // Phone field
                      $message[] = '<tr>';
                      $message[] = '<th align="right">Tel&eacute;fono:</th>';
                      $message[] = '<td>'.$request->Phone().'</td>';
                      $message[] = '</tr>';

                      // Email field
                      $message[] = '<tr>';
                      $message[] = '<th align="right">Email:</th>';
                      $message[] = '<td>'.$request->Email().'</td>';
                      $message[] = '</tr>';

                      // Address field
                      $message[] = '<tr>';
                      $message[] = '<th align="right">Direcci&oacute;n:</th>';
                      $message[] = '<td>'.$request->Address().'</td>';
                      $message[] = '</tr>';

                      // Municipality field
                      $message[] = '<tr>';
                      $message[] = '<th align="right">Municipio:</th>';
                      $message[] = '<td>'.$request->Municipality().'</td>';
                      $message[] = '</tr>';

                      // Province field
                      $message[] = '<tr>';
                      $message[] = '<th align="right">Provincia:</th>';
                      $message[] = '<td>'.$request->Province().'</td>';
                      $message[] = '</th>';

                      // Country field
                      $message[] = '<tr>';
                      $message[] = '<th align="right">Pa&iacute;s:</th>';
                      $message[] = '<td>'.$request->Country().'</td>';
                      $message[] = '</tr>';

                      $message[] = '</body></html>';

                      $headers[] = 'MIME-Version: 1.0';
                      $headers[] = 'Content-type: text/html; charset=utf-8';
                      $headers[] = 'From: '.$sender.'';

                      $email->Headers($headers);
                      $email->To($to);
                      $email->Message($message);
                      $email->Subject("[Prueba] Solicitud de Prestamo");

                      mail($email->GetReceiver(), $email->GetSubject(), implode("\r\n", $email->GetMessage()), implode("\r\n", $email->GetHeaders()));
                        echo '<div class="form-success text-center">';
                        echo '    <img src="../img/checked.svg" alt="Checked" />';
                        echo '    <h1>Solicitud enviada exitosamente.</h1>';
                        echo '</div>';
                    } else {
                        print<<<_HTML_
                            <div class="col-lg-12">
                                <p>Todos los campos marcados con un asterisco (*) son obligatorios.</p>
                                <form class="cdd-form align-content-center" action="$_SERVER[PHP_SELF]" method="post">
                                    <div class="form-group row">
                                        <label for="firstname-input" class="col-2 col-form-label">Nombre*:</label>
                                        <div class="col-6">
                                            <input required type="text" name="first_name" class="form-control" placeholder="Nombre*" id="firstname-input">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="lastname-input" class="col-2 col-form-label">Apellido*:</label>
                                        <div class="col-6">
                                            <input required type="text" name="last_name" class="form-control" placeholder="Apellido*" id="lastname-input">
                                        </div>
                                    </div>
    
                                    <div class="form-group row">
                                        <label for="phone-input" class="col-2 col-form-label">Telefono/Movil*:</label>
                                        <div class="col-6">
                                            <input required type="tel" name="phone" class="form-control" placeholder="809-555-5555" id="phone-input">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="email-input" class="col-2 col-form-label">Email:</label>
                                        <div class="col-6">
                                            <input required type="email" name="email" class="form-control"  placeholder="micorreo@email.com" id="email-input">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="address-input" class="col-2 col-form-label">Dirección*:</label>
                                        <div class="col-6">
                                            <input required type="text" name="address" class="form-control" placeholder="Calle, Casa/Apt No." id="address-input">
                                        </div>
                                    </div>
_HTML_;
                      print<<<_HTML_
                                    <div class="form-group row">
                                        <label for="province-input" class="col-2 col-form-label">Provincia*:</label>
                                        <div class="col-6">
                                            <select required name="province" class="form-control" id="province-input">
_HTML_;

                      echo '                    <option disabled selected value="default">Seleccione una provincia</option>';
                      while (list($province) = $provinces->fetch_row()) {
                          echo '                <option>'.utf8_encode($province).'</option>';
                      }
                      print<<<_HTML_
                                            </select>
                                        </div>
                                     </div>
_HTML_;
                      print<<<_HTML_
                                     <div class="form-group row">
                                         <label for="municipality-input" class="col-2 col-form-label">Municipio*:</label>
                                         <div class="col-6">
                                             <select name="municipality" class="form-control" id="municipality-input">
_HTML_;
                      echo   '                   <option disabled selected value="default">Seleccione un municipio</option>';

                      print<<<_HTML_
                                             </select>
                                         </div>
                                     </div>
                                     
                                     <div class="form-group row">
                                         <label for="country-input" class="col-2 col-form-label">País*:</label>
                                         <div class="col-6">
                                             <select name="country" class="form-control" id="country-input">
                                                 <option>República Dominicana</option>
                                             </select>
                                         </div>
                                     </div>
                                    
                                     <button type="submit" class="btn btn-primary">Enviar</button>
                                     <button type="reset" class="btn btn-secondary">Limpiar</button>
                                 </form>
                             </div>
_HTML_;
                    }
                ?>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 footer-section">
                        <h5>dirección</h5>
                        <ul>
                            <li>
                                <div class="flex-container">
                                    <div class="flex-item-icon">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <div class="">
                                        <p style="padding-left: 6px" class="accent">Centro Comercial Isabel Aguiar</p>
                                        <span class="">
                                            <span style="padding-left: 6px">Ave. Isabel Aguiar, Esq. Ave. Las Palmas,</br></span>
                                            <span style="padding-left: 6px">Edif. B-2, Local B-3, 3er nivel,</br></span>
                                            <span style="padding-left: 6px">Herrera, Santo Domingo Oeste</span>
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="flex-container">
                                    <div class="flex-item-icon">
                                        <i class="fa fa-phone-square"></i>
                                    </div>
                                    <div class="">
                                        <span class="text-left">(809)560-3191</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="flex-container">
                                    <div class="flex-item-icon">
                                        <i class="fa fa-envelope-square"></i>
                                    </div>
                                    <div>
                                        <span>info@cdd.org.do</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-2 footer-section">
                        <h5>nosotros</h5>
                        <ul>
                            <li><a href="../institucional/trabajos.html">Trabaja con nosotros</a></li>
                            <li><a href="../institucional/suggestion.php">Buzón de sugerencias</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3">
                        <a class="twitter-timeline" data-lang="es" data-width="400" data-height="300" href="https://twitter.com/CDD_RD">Tweets by CDD_RD</a>
                        <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                    <div class="col-lg-4">
                        <div class="fb-page" data-href="https://www.facebook.com/CDDADM/"
                             data-tabs="timeline" data-width="400" data-height="300"
                             data-small-header="true" data-adapt-container-width="true"
                             data-hide-cover="true" data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/CDDADM/" class="fb-xfbml-parse-ignore">
                                <a href="https://www.facebook.com/CDDADM/">Centro Dominicano De Desarrollo, Inc.</a>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="social-banner-group">
                    <a href="#">
                        <i class="fa fa-google-plus-square"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-twitter-square"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-facebook-official"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-youtube-square"></i>
                    </a>
                </div>
                <div class="col-lg-12 text-center fb-like_section">
                    <div class="fb-like" data-href="http://facebook.com/cddadm"
                         data-width="200" data-layout="button_count"
                         data-action="like" data-size="large"
                         data-show-faces="true" data-share="true">
                    </div>
                </div>
                <div class="col-lg-12">
                    <p class="text-center"><a href="#">Privacidad</a> &middot; <a href="#">Terminos</a></p>
                </div>
                <div class="col-lg-12">
                    <p class="cdd-copyright text-center">&copy; 2017 Centro Dominicano de Desarrollo, Inc.</p>
                </div>
            </div>
        </footer>
        <script src="../js/request.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"
                integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n"
                crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
                integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
                crossorigin="anonymous"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
