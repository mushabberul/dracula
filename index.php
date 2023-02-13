<?php
session_start();
require_once 'db.php';

$select_hero_query = "SELECT * FROM heros ORDER BY id DESC LIMIT 1";
$hero_from_db = mysqli_query($db_connect, $select_hero_query);

$select_service_query = "SELECT * FROM services ORDER BY id DESC LIMIT 6";
$service_from_db = mysqli_query($db_connect, $select_service_query);

$select_portfolio_query = "SELECT * FROM portfolios ORDER BY id DESC LIMIT 6";
$portfolio_from_db = mysqli_query($db_connect, $select_portfolio_query);

$select_about_query = "SELECT * FROM abouts ORDER BY id DESC LIMIT 4";
$about_from_db = mysqli_query($db_connect, $select_about_query);

$select_team_query = "SELECT * FROM teams ORDER BY id DESC LIMIT 6";
$team_from_db = mysqli_query($db_connect, $select_team_query);

$select_client_logo_query = "SELECT * FROM client_logos ORDER BY id DESC LIMIT 6";
$client_logo_from_db = mysqli_query($db_connect, $select_client_logo_query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dracula - Best service for ever</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="fronted_assets/assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="fronted_assets/css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top">Dracula</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <?php foreach ($hero_from_db as $hero) : ?>
        <!-- <header class="masthead" style="background-image: url(fronted_assets/assets/img/header-bg.jpg);"> -->
        <header class="masthead" style="background-image: url(uploads/hero/<?php echo $hero['image']; ?>);">
            <div class="container">
                <div class="masthead-subheading"><?php echo $hero['subtitle']; ?></div>
                <div class="masthead-heading text-uppercase"><?php echo $hero['title']; ?></div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#services"><?php echo $hero['button_text']; ?></a>
            </div>
        </header>
    <?php endforeach; ?>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Services</h2>
                <h3 class="section-subheading text-muted">Our core focus is serving the Web design,Development, and web security.we always try to give clients satisfaction through our best work and behavior.We have enough energetic, creative, and experience developer.</h3>
            </div>
            <div class="row text-center">
                <?php foreach ($service_from_db as $service) : ?>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>

                            <i class="<?php echo $service['icon']; ?> fa-stack-1x fa-inverse"></i>

                        </span>
                        <h4 class="my-3"><?php echo $service['title']; ?></h4>
                        <p class="text-muted"><?php echo $service['description']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Portfolio</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="row">
                <?php foreach ($portfolio_from_db as $portfolio) : ?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal<?php echo $portfolio['id']; ?>">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="uploads/portfolio/<?php echo $portfolio['image'] ?>" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"><?php echo $portfolio['client_name']; ?></div>
                                <div class="portfolio-caption-subheading text-muted"><?php echo $portfolio['category']; ?></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- About-->
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">About</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <ul class="timeline">
                <?php
                $flag = 1;
                foreach ($about_from_db as $about) :
                ?>
                    <li class="<?php $flag++;
                                echo ($flag % 2 == 0) ? '' : 'timeline-inverted'  ?>">
                        <div class="timeline-image"><img width="170" height="170" class="rounded-circle img-fluid" src="uploads/about/<?php echo $about['image'] ?>" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4><?php echo $about['month'] ?></h4>
                                <h4 class="subheading"><?php echo $about['title'] ?></h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted"><?php echo $about['description'] ?></p>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4>
                            Be Part
                            <br />
                            Of Our
                            <br />
                            Story!
                        </h4>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- Team-->
    <section class="page-section bg-light" id="team">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="row">
                <?php foreach ($team_from_db as $team) : ?>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="uploads/team/<?php echo $team['image'] ?>" alt="..." />
                            <h4><?php echo $team['name'] ?></h4>
                            <p class="text-muted"><?php echo $team['designation'] ?></p>
                            <?php
                            $twitter = $team['twitter'];
                            $facebook = $team['facebook'];
                            $linkedin = $team['linkedin'];
                            echo ($twitter) ? '<a target="_blank" class="btn btn-dark btn-social mx-2" href="' . "$twitter" . '"><i class="fab fa-twitter"></i></a>' : '';
                            echo ($facebook) ? '<a target="_blank" class="btn btn-dark btn-social mx-2" href=' . "$facebook" . '><i class="fab fa-facebook-f"></i></a>' : '';
                            echo ($linkedin) ? '<a target="_blank" class="btn btn-dark btn-social mx-2" href=' . "$linkedin" . '><i class="fab fa-linkedin-in"></i></a>' : '';
                            ?>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

        </div>
    </section>
    <!-- Clients-->
    <div class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <?php foreach ($client_logo_from_db as $client_logo) : ?>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="uploads/client_logo/<?php echo $client_logo['image']; ?>" alt="..." aria-label="Microsoft Logo" /></a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Contact Us</h2>
                <h3 class="section-subheading text-muted">We can't solve your problem if you don't tell us about it</h3>
            </div>
            <?php if (isset($_SESSION['contact_message_send_successfully'])) :
            ?>

                <div class="alert alert-info"><?php echo $_SESSION['contact_message_send_successfully']; ?></div>
            <?php
            endif;
            unset($_SESSION['contact_message_send_successfully']);
            ?>

            <form id="contactForm" method="post" action="store_guest_contact.php">
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- Name input-->
                            <input name="guest_name" class="form-control" id="name" type="text" placeholder="Your Name *" />
                            <?php if (isset($_SESSION['guest_name_err'])) : ?>
                                <small class="text-danger" role="alert"><?php echo $_SESSION['guest_name_err']; ?></small>
                            <?php
                            endif;
                            unset($_SESSION['guest_name_err']);
                            ?>
                        </div>
                        <div class="form-group">
                            <!-- Email address input-->
                            <input name="guest_email" class="form-control" id="email" type="email" placeholder="Your Email *" />
                            <?php if (isset($_SESSION['guest_email_err'])) : ?>
                                <small class="text-danger" role="alert"><?php echo $_SESSION['guest_email_err']; ?></small>
                            <?php
                            endif;
                            unset($_SESSION['guest_email_err']);
                            ?>
                            <?php if (isset($_SESSION['guest_valide_email_err'])) : ?>
                                <small class="text-danger" role="alert"><?php echo $_SESSION['guest_valide_email_err']; ?></small>
                            <?php
                            endif;
                            unset($_SESSION['guest_valide_email_err']);
                            ?>
                        </div>
                        <div class="form-group mb-md-0">
                            <!-- Phone number input-->
                            <input name="guest_phone" class="form-control" id="phone" type="tel" placeholder="Your Phone *" />
                            <?php if (isset($_SESSION['guest_phone_err'])) : ?>
                                <small class="text-danger" role="alert"><?php echo $_SESSION['guest_phone_err']; ?></small>
                            <?php
                            endif;
                            unset($_SESSION['guest_phone_err']);
                            ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <!-- Message input-->
                            <textarea name="guest_message" class="form-control" id="message" placeholder="Your Message *"></textarea>
                            <?php if (isset($_SESSION['guest_message_err'])) : ?>
                                <small class="text-danger" role="alert"><?php echo $_SESSION['guest_message_err']; ?></small>
                            <?php
                            endif;
                            unset($_SESSION['guest_message_err']);
                            ?>
                        </div>
                    </div>
                </div>

                <!-- Submit Button-->
                <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">Send Message</button></div>
            </form>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; Dracula <?= date("M, Y"); ?></div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Portfolio Modals-->
    <?php foreach ($portfolio_from_db as $portfolio) : ?>

        <!-- Portfolio item 1 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $portfolio['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="fronted_assets/assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase"><?php echo $portfolio['name']; ?></h2>
                                    <img class="img-fluid d-block mx-auto" src="uploads/portfolio/<?php echo $portfolio['image']; ?>" alt="..." />
                                    <p><?php echo $portfolio['description']; ?></p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            <?php echo $portfolio['client_name']; ?>
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            <?php echo $portfolio['category']; ?>
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- Portfolio item 2 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="fronted_assets/assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Project Name</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-fluid d-block mx-auto" src="fronted_assets/assets/img/portfolio/2.jpg" alt="..." />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Client:</strong>
                                        Explore
                                    </li>
                                    <li>
                                        <strong>Category:</strong>
                                        Graphic Design
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 3 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="fronted_assets/assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Project Name</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-fluid d-block mx-auto" src="fronted_assets/assets/img/portfolio/3.jpg" alt="..." />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Client:</strong>
                                        Finish
                                    </li>
                                    <li>
                                        <strong>Category:</strong>
                                        Identity
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 4 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="fronted_assets/assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Project Name</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-fluid d-block mx-auto" src="fronted_assets/assets/img/portfolio/4.jpg" alt="..." />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Client:</strong>
                                        Lines
                                    </li>
                                    <li>
                                        <strong>Category:</strong>
                                        Branding
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 5 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="fronted_assets/assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Project Name</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-fluid d-block mx-auto" src="fronted_assets/assets/img/portfolio/5.jpg" alt="..." />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Client:</strong>
                                        Southwest
                                    </li>
                                    <li>
                                        <strong>Category:</strong>
                                        Website Design
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 6 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="fronted_assets/assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Project Name</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-fluid d-block mx-auto" src="fronted_assets/assets/img/portfolio/6.jpg" alt="..." />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>
                                        <strong>Client:</strong>
                                        Window
                                    </li>
                                    <li>
                                        <strong>Category:</strong>
                                        Photography
                                    </li>
                                </ul>
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="fronted_assets/js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>