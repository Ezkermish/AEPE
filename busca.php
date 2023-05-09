

<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Entrega de Paquetes Electorales</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Roboto:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <span>
              34 JDE
            </span>
          </a>
          <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Acerca de </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Consultas </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Contactanos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Login</a>
                </li>
              </ul>
            </div>
          </div>
          <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
            <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
          </form>
        </nav>
      </div>
    </header>
    <!-- end header section -->

    <!-- result section -->
    <?php

        $are=trim($_POST['are']);
        if (!$are) {
            echo 'Introduce un número de ARE válido. Por favor, intenta de nuevo.';
            exit;
        }

        // Archivo de conexión
	    include 'conexion.php';

	    // Variables de conexión
	    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	    // Verificación de la conexión
	    if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
	    }
        
        //Consultas
        $qrynomare = "SELECT NombreARE FROM pmdc WHERE ARE = '$are' LIMIT 1";
        $qrynumcas = "SELECT COUNT(*) AS totcas FROM pmdc WHERE ARE = '$are' AND NombrePMDC =''";
        $qrysecc = "SELECT Seccion FROM pmdc WHERE ARE = '$are'";
        $qrycasillas = "SELECT TipoCasilla FROM pmdc WHERE ARE = '$are'"; 
        $resultnom = mysqli_query($conn,$qrynomare);
        $resultncas = mysqli_query($conn,$qrynumcas);
        $resultsecc = mysqli_query($conn,$qrysecc);
        $resultcasillas = mysqli_query($conn,$qrycasillas);

        //Resultados de la consulta
        echo "<div class='custom_heading-container'>";
            echo "<h3 class=' '>";
                //Muestra el nombre del ARE que realizará la captura
                while ($renglon = $resultnom->fetch_array()) {
                    echo "<br><br><center>Hola  ". $renglon["NombreARE"]."</center>";
                }

                //Muestra el total de casillas a registrar
                while ($row = $resultncas->fetch_array()) {
                    echo "<br><center>Tus casillas por capturar son: <u>".$row["totcas"]."</u></center>";
                }
            echo "</h3>";
        echo "</div>";
        
        //Poblar las listas despeglables de Sección y casilla
        echo "<section class='contact_section layout_padding'>";
          echo "<div class='custom_heading-container'>";
            echo "<h3 class=' '>";
              echo "Elige la sección y casilla, e ingresa los datos solicitados.";
            echo "</h3>";
          echo "</div>";
          echo "<div class='container layout_padding2-top'>";
            echo "<div class='row'>";
              echo "<div class='col-md-6 mx-auto'>";
              echo "<form action='update.php' method='POST'>";
                //Listas desplegables
                echo "<div>";

                echo "</div>";
                //Cuadros de texto
                echo "<div>";
                  echo "<input type='text' placeholder='Nombre PMDC'>";
                echo "</div>";
                echo "<div>";
                  echo "<input type='email' placeholder='TELÉFONO'>";
                echo "</div>";
                echo "<div>";
                  echo "<input type='email' placeholder='CORREO ELECTRÓNICO'>";
                echo "</div>";
                echo "<div>";
                  echo "<input type='text' placeholder='DIRECCIÓN'>";
                echo "</div>";
                echo "<div>";
                  echo "<input type='text' placeholder='LUGAR DE ENTREGA'";
                echo "</div>";
                echo "<div>";
                  echo "<input type='text' placeholder='FECHA'";
                echo "</div>";
                echo "<div>";
                  echo "<input type='text' placeholder='HORA'";
                echo "</div>";
              echo "</form>";

              echo "</div>";
            echo "</div>";
          echo "</div>";
        echo "</section>";

    //<!-- end contact section -->

        $resultnom->free();
        $resultncas->free();
        $resultsecc->free();
        $resultcasillas->free();
        $conn->close();
    
    
    ?>
    

    <!-- info section -->
    <section class="info_section layout_padding">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="info-logo">
              <h2>
                34 JDE
              </h2>
              <p>
                Toluca de Lerdo
                .
                .
              </p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info-nav">
              <h4>
                Navegación
              </h4>
              <ul>
                <li>
                  <a href="index.html">
                    Home
                  </a>
                </li>
                <li>
                  <a href="#">
                    Acerca de
                  </a>
                </li>
                <li>
                  <a href="#">
                    Consultas
                  </a>
                </li>
                <li>
                  <a href="#">
                    Contactanos
                  </a>
                </li>
                <li>
                  <a href="#">
                    Login
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info-contact">
              <h4>
                Contacto
              </h4>
              <div class="location">
                <h6>
                  Dirección:
                </h6>
                <a href="">
                  <img src="images/location.png" alt="">
                  <span>
                    Av. México
                  </span>
                </a>
              </div>
              <div class="call">
                <h6>
                  Otros servicios:
                </h6>
                <a href="">
                  <img src="images/telephone.png" alt="">
                  <span>
                    ( 722  )
                  </span>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="discover">
              <h4>
                Descubre
              </h4>
              <ul>
                <li>
                  <a href="">
                    Ayuda
                  </a>
                </li>
                <li>
                  <a href="">
                    Cómo trabajamos

                  </a>
                </li>
                <li>
                  <a href="">
                    Suscribete
                  </a>
                </li>
                <li>
                  <a href="">
                    Contactanos
                  </a>
                </li>
              </ul>
              <div class="social-box">
                <a href="">
                  <img src="images/facebook.png" alt="">
                </a>
                <a href="">
                  <img src="images/twitter.png" alt="">
                </a>
                <a href="">
                  <img src="images/google-plus.png" alt="">
                </a>
                <a href="">
                  <img src="images/linkedin.png" alt="">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>



    <!-- end info_section -->

    <!-- footer section -->
    <section class="container-fluid footer_section">
      <p>
        Copyright &copy; 2023 All Rights Reserved By
        <a href="#">34 JDE</a>
      </p>
    </section>
    <!-- footer section -->

    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>