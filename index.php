<?php
    require_once ('admin/config/koneksi.php');
    require_once ('admin/models/dbase.php');
    $koneksi = new database($host, $user, $pass, $dbase);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="John Doe">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="demo_icon.gif" type="image/png">
    <!-- link logo web -->
    <link rel="icon" href="img/neutron.png">
    <!-- css utama -->
    <link rel="stylesheet" href="css/cssku.css">
    <!-- css bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- link footer -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="css/swiper-bundle.min.css"/>
    <!-- link aos -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <title>UI Designer</title>
</head>

<body>
    <nav class=" navbar navbar-expand-lg navbar-light text-dark fixed-top navq">
        <div class="container navq-logo">
            <a class="navbar-brand " href="#">
                <img class="lg-neut" src="img/lg-neut.png" alt="..." height="70">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="  navbar-nav ms-auto">
                    <li class="navq-menu">
                        <a class="nav-link navq-item active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="navq-menu">
                        <a class="nav-link navq-item" href="#">About</a>
                    </li>
                    <li class="navq-menu">
                        <a class="nav-link navq-item" href="#">Content</a>
                        </a>
                </ul>
                </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- SECTION 2 -->
    <section class="sec-2 ">
        <div class="container">
            <div class="sec-2-full ">
                <h1 class="h1-full"><span class="auto-input web"></span></h1>
            </div>
            <div class="sec-2-the">
                <div class="h3-the">The Way for Being Web Programmer from Beginner</div>
            </div>
        </div>
    </section>

    <!-- SECTION 3 -->
    <section class="container ">
        <div class="sec-3" >
            <div class="sec-3-sub1 col-md-4">
                <div class="row logoku" data-aos="fade-up"
                    data-aos-anchor-placement="center-center">
                    <img class="neut" src="img/neutron.png">
                </div>
                <div class="row juneut">
                    <h1> Neutrocode </h1>
                </div>
            </div>
            <div class="swiper mySwiper col-md-8">
                            <?php
                                include 'admin/models/m_news.php';
                                $news = new news ($koneksi);
                            ?>
                <div class="sec-3-sub2 swiper-wrapper ">
                    <?php 
                        $tampil = $news->tampilBerita();
                        while($data_news = $tampil->fetch_object()):
                    ?>
                    <div class=" swiper-slide col-md-12">
                        <div class="gblog">
                            <img src="admin/img/news/<?= $data_news->gambar ?>" width="200px" height="200px">
                        </div>
                        <div class="kete">
                            <a href="#"><h3><?= $data_news->judul ?></h3></a>
                            <h4><?= $data_news->tanggal ?></h4>
                        </div>
                    </div>
                    <?php
                        endwhile;
                    ?>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 4 -->
    <section class=" sec-4">
        <div class="container">
            <div class="card">
                <div class="face face1">
                    <div class="content">
                        <img src="img/bxl-html5-wrn.svg" class="sec3-lg" alt="">
                        <h3>HTML</h3>
                    </div>
                </div>
                <div class="face face2">
                    <div class="content">
                        <p class="kal-html"> The HyperText Markup Language, or HTML is the standard markup language for documents
                            designed to be displayed in a web browser. It can be assisted by technologies such as
                            Cascading Style Sheets (CSS) and scripting languages such as JavaScript.
                            -wikipedia-</p>
                        <a href="#" type="button">Read More</a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="face face1">
                    <div class="content">
                        <img src="img/bxl-css3-wrn.svg" class="sec3-lg" alt="">
                        <h3>CSS</h3>
                    </div>
                </div>
                <div class="face face2">
                    <div class="content">
                        <p class="kal-css"> Cascading Style Sheets (CSS) is a style sheet language used for describing the presentation
                            of a document written in a markup language such as HTML. CSS is a cornerstone technology of
                            the World Wide Web, alongside HTML and JavaScript. -wikipedia-</p>
                        <a href="#" type="button">Read More</a>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="face face1">
                    <div class="content">
                        <img src="img/bxl-javascript-wrn.svg" class="sec3-lg" alt="">
                        <h3>JavaScript</h3>
                    </div>
                </div>
                <div class="face face2">
                    <div class="content">
                        <p class="kal-js"> JavaScript often abbreviated as JS, is a programming language that conforms to the
                            ECMAScript specification. JavaScript is high-level, often just-in-time compiled and
                            multi-paradigm. It has dynamic typing, prototype-based object-orientation and first-class
                            functions. -wikipedia-</p>
                        <a href="#" type="button">Read More</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="face face1">
                    <div class="content">
                        <img src="img/bxl-php-wrn.svg" class="sec3-lg" alt="">
                        <h3>PHP</h3>
                    </div>
                </div>
                <div class="face face2">
                    <div class="content">
                        <p class="kal-php"> PHP is a general-purpose scripting language geared towards web development. It was
                            originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994. The PHP reference
                            implementation is now produced by The PHP Group. PHP originally stood for Personal Home
                            Page, but it now stands for the recursive initialism PHP: Hypertext Preprocessor.
                            -wikipedia-</p>
                        <a href="#" type="button">Read More</a>
                    </div>
                </div>
            </div>
    </section>

    <!-- footer -->
    <footer class="container-fluid bg-grey py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 ">
                    <div class="logo-part">
                        <img src="img/lg-neut.png" class="w-50 logo-footer" >
                        <p>Sawojajar - Malang - Jawa Timur (65139) </p>
                        <!-- <p>Use this tool as test data for an automated system or find your next pen</p> -->
                    </div>
                    </div>
                    <div class="col-md-6 px-4">
                    <h6> About Company</h6>
                    <p>Tempat belajar segala hal tentang web development</p>
                    <a href="#" class="btn-footer"> More Info </a><br>
                    <a href="#" class="btn-footer"> Contact Us</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 px-4">
                    <h6> Help us</h6>
                    <div class="row ">
                        <div class="col-md-6">
                            <ul>
                                <li> <a href="#"> Home</a> </li>
                                <li> <a href="#"> About</a> </li>
                                <li> <a href="#"> Service</a> </li>
                                <li> <a href="#"> Team</a> </li>
                                <li> <a href="#"> Help</a> </li>
                                <li> <a href="#"> Contact</a> </li>
                            </ul>
                        </div>
                        <div class="col-md-6 px-4">
                            <ul>
                                <li> <a href="#"> Cab Faciliy</a> </li>
                                <li> <a href="#"> Fax</a> </li>
                                <li> <a href="#"> Terms</a> </li>
                                <li> <a href="#"> Policy</a> </li>
                                <li> <a href="#"> Refunds</a> </li>
                                <li> <a href="#"> Paypal</a> </li>
                            </ul>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6 ">
                    <h6> Newsletter</h6>
                    <div class="social">
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </div>
                    <form class="form-footer my-3">
                        <input type="text"  placeholder="search here...." name="search">
                        <input type="button" value="Go" >
                    </form>
                    <p>That's technology limitation of LCD monitors</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- link footer -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- link typed -->
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script>
        var typed = new Typed(".auto-input",{
            strings: ["full stack web developer", "UI Designer"],
            typeSpeed: 100,
            backSpeed: 100,
            loop: true
        })
    </script>
    <!-- link tilt -->
    <script type="text/javascript" src="/js/vanilla-tilt.min.js"></script>
    <script type="text/javascript">
        VanillaTilt.init(document.querySelectorAll(".logoku"), {
            max: 25,
            speed: 400,
            scale: 1.5,
        });
    </script>
    <!-- link aos -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1500
        });
    </script>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
        direction: "vertical",
        slidesPerView: 1,
        spaceBetween: -150,
        // centeredSlide: true,
        // loop: true,
        // effect: "fade",
        autoplay: {
            delay: 2500,
        },
        pagination: {
        el: ".swiper-pagination",
        clickable: true,
        }
      });
    </script>
</script>
</body>

</html>