<?php
$content = get_option( 'phantom_site_content' );
?>
<!doctype html>
  <html class="no-js">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta class="foundation-mq">
        <!--- basic page needs
        ================================================== -->
        <meta charset="utf-8">
        <title><?php echo esc_html( $content['title'] ?? 'App 1.0' ) ?></title>
        <meta name="robots" content="noindex, nofollow">
        <meta name="description" content="<?php echo esc_html( $content['description'] ?? '' ) ?>">
        <meta name="author" content="<?php echo esc_html( $content['title'] ?? 'App 1.0' ) ?>">
        <meta name="theme-color" content="#26BFB5">
        <link rel="canonical" href="<?php echo esc_attr( $base_url ); ?>">
        
        <!--- apple pwa specific metas
        ================================================== -->
        <meta name="mobile-web-app-capable" content="yes" />
        <meta name="apple-touch-fullscreen" content="yes" />
        <meta name="apple-mobile-web-app-title" content="<?php echo esc_html( $content['title'] ?? 'App 1.0' ); ?>" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <link rel="apple-touch-icon" href="<?php echo plugin_dir_url( __FILE__ ); ?>favicon_square.png">
        
        <link rel="apple-touch-startup-image" media="screen and (device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="<?php echo plugin_dir_url( __FILE__ ); ?>images/apple-splash-828x1792.png" />
        <link rel="apple-touch-startup-image" media="screen and (device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)" href="<?php echo plugin_dir_url( __FILE__ ); ?>images/apple-splash-1242x2688.png" />
        <link rel="apple-touch-startup-image" media="screen and (device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)" href="<?php echo plugin_dir_url( __FILE__ ); ?>images/apple-splash-1125x2436.png" />
        <link rel="apple-touch-startup-image" media="screen and (device-width: 414px) and (device-height: 736px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)" href="<?php echo plugin_dir_url( __FILE__ ); ?>images/apple-splash-1242x2208.png" />
        <link rel="apple-touch-startup-image" media="screen and (device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="<?php echo plugin_dir_url( __FILE__ ); ?>images/apple-splash-750x1334.png" />
        <link rel="apple-touch-startup-image" media="screen and (device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="<?php echo plugin_dir_url( __FILE__ ); ?>images/apple-splash-2048x2732.png" />
        <link rel="apple-touch-startup-image" media="screen and (device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="<?php echo plugin_dir_url( __FILE__ ); ?>images/apple-splash-1668x2224.png" />
        <link rel="apple-touch-startup-image" media="screen and (device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="<?php echo plugin_dir_url( __FILE__ ); ?>images/apple-splash-640x1136.png" />
        <link rel="apple-touch-startup-image" media="screen and (device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="<?php echo plugin_dir_url( __FILE__ ); ?>images/apple-splash-1668x2388.png" />
        <link rel="apple-touch-startup-image" media="screen and (device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)" href="<?php echo plugin_dir_url( __FILE__ ); ?>images/apple-splash-1536x2048.png" />
        <!-- mobile specific metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="<?php echo esc_attr( $base_url ); ?>manifest.json">
        <!-- CSS
        ================================================== -->
        <link rel="stylesheet" href="<?php echo plugin_dir_url( __FILE__ ); ?>css/base.css">
        <link rel="stylesheet" href="<?php echo plugin_dir_url( __FILE__ ); ?>css/vendor.css">
        <link rel="stylesheet" href="<?php echo plugin_dir_url( __FILE__ ); ?>css/main.css">
        <!-- script
        ================================================== -->
        <script src="<?php echo plugin_dir_url( __FILE__ ); ?>js/modernizr.js"></script>
        <script src="<?php echo plugin_dir_url( __FILE__ ); ?>js/pace.min.js"></script>
        <script src="<?php echo esc_attr( $base_url ); ?>phantom-app.js"></script>
        <!-- favicons
        ================================================== -->
        <link rel="shortcut icon" href="<?php echo esc_attr( $plugin_base_url ); ?>home/favicon_square.png" type="image/x-icon">
        <style>
            .header-logo {
                z-index: 501;
                display: inline-block;
                margin: 0;
                padding: 0;
                position: absolute;
                left: 110px;
                top: 50%;
                -webkit-transform: translateY(-50%);
                -ms-transform: translateY(-50%);
                transform: translateY(-50%);
            }
            .header-logo a {
                display: block;
                padding: 0;
                outline: 0;
                border: none;
                -webkit-transition: all .3s ease-in-out;
                transition: all .3s ease-in-out;
                background-image: url(<?php echo esc_attr( $plugin_base_url ); ?>images/p4m-logo.png);
                background-repeat: no-repeat;
                background-size: 50px;
                background-position: left center;
                padding-left: 60px;
                font-size: 3em;
                font-weight: 900;
                color: #fff;
                font-family: 'times new roman';
            }
            @media only screen and (max-width: 1000px) {
                .header-logo a {
                    font-size: 1em;
                }
            }
        </style>
        <script>
            document.body.id = 'top'
        </script>
        <!-- header
        ================================================== -->
        <header class="s-header">
            <div class="header-logo">
                <a class="site-logo" href="/">
                    <?php echo esc_html( $content['title'] ?? '' ) ?>
                </a>
            </div> <!-- end header-logo -->
            <nav class="header-nav">
                <a href="#0" class="header-nav__close" title="close"><span>Close</span></a>
                <div class="header-nav__content">
                    <h3><?php echo esc_html( $content['title'] ?? '' ) ?></h3>
                    <ul class="header-nav__list">
                        <li class="current"><a class="smoothscroll" href="#home" title="home">Home</a></li>
                        <li><a class="smoothscroll" href="#about" title="about">About</a></li>
                        <li><a class="smoothscroll" href="#values" title="our-plan">Values</a></li>
                        <li><a class="smoothscroll" href="#contact" title="contact">Start today!</a></li>
                        <?php if ( $content['sample_section'] ?? 'yes' === 'yes' ) : ?>
                            <li><a class="smoothscroll" href="#works" title="works">Samples</a></li>
                        <?php endif; ?>
                    </ul>
                    <p>
                        <?php echo esc_html( $content['title'] ?? '' ) ?> is an 100% free math teaching network for anyone that wants to take their knowledge to another level.
                        Join our math classes by email, follow us on social media, or join us for a virtual classroom
                        with other people from <?php echo esc_html( $content['location'] ?? '' ) ?>. See math become a reality in your day to day life.
                    </p>
                    <ul class="header-nav__social">
                        <?php if ( ! empty( $content['facebook_url'] ?? '' ) ) : ?>
                            <li>
                                <a href="<?php echo esc_html( $content['facebook_url'] ?? '' ); ?>" target="_blank" rel="noreferrer noopener"><i class="fab fa-facebook"></i></a>
                            </li>
                        <?php endif; ?>
                        <?php if ( ! empty( $content['twitter_url'] ?? '' ) ) : ?>
                            <li>
                                <a href="<?php echo esc_html( $content['twitter_url'] ?? '' ); ?>" target="_blank" rel="noreferrer noopener"><i class="fab fa-twitter"></i></a>
                            </li>
                        <?php endif; ?>
                        <?php if ( ! empty( $content['instagram_url'] ?? '' ) ) : ?>
                            <li>
                                <a href="<?php echo esc_html( $content['instagram_url'] ?? '' ); ?>" target="_blank" rel="noreferrer noopener"><i class="fab fa-instagram"></i></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <p>
                        <a class="" href="/login" title="login" style="display: block;
                            color: #ffffff;
                            position: relative;
                            font-size: 1.6rem;">
                            Login
                        </a>
                    </p>
                </div> <!-- end header-nav__content -->
            </nav>
            <a class="header-menu-toggle" href="#0">
                <span class="header-menu-icon"></span>
            </a>
        </header> <!-- end s-header -->
        <!-- home
        ================================================== -->
        <section id="home" class="s-home target-section" data-parallax="scroll" data-image-src="<?php echo esc_html( $content['background_image_url'] ?? '' ) ?>" data-natural-width="3000" data-natural-height="2000" data-position-y="top">
            <div class="shadow-overlay"></div>
            <div class="home-content">
                <div class="row home-content__main">
                    <h1>
                        Reaching <?php echo esc_html( $content['location'] ?? '' ) ?> with <br>quality education.
                    </h1>
                    <h2 style="color:white;font-family: 'metropolis-light', 'sans-serif';font-size:3.8rem;margin-top:0;"><span style="color:#cc147f;">-</span> #<?php echo esc_html( $content['title'] ?? '' ) ?></h2>
                    <a href="#contact" class="smoothscroll"><button class="">Start today!</button></a>
                </div> <!-- end home-content__main -->
            </div> <!-- end home-content -->
            <ul class="home-sidelinks">
                <li><a class="smoothscroll" href="#about">About<span>who we are</span></a></li>
                <li><a class="smoothscroll" href="#values">Values<span>what we care about</span></a></li>
                <li><a class="smoothscroll" href="#contact">Start learning<span>today</span></a></li>
            </ul> <!-- end home-sidelinks -->
            <ul class="home-social">
                <li class="home-social-title">Start learning</li>
                <li>
                    <a href="#contact" class="smoothscroll">
                        <i class="fab fa-envelope"></i>
                        <span class="home-social-text">Email Math Classes</span>
                    </a>
                </li>
                <?php if ( ! empty( $content['facebook_url'] ?? '' ) ) : ?>
                <li><a href="<?php echo esc_html( $content['facebook_url'] ?? '' ) ?>" target="_blank" rel="noreferrer noopener">
                        <i class="fab fa-facebook"></i>
                        <span class="home-social-text">Facebook</span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if ( ! empty( $content['twitter_url'] ?? '' ) ) : ?>
                <li><a href="<?php echo esc_html( $content['twitter_url'] ?? '' ) ?>" target="_blank" rel="noreferrer noopener">
                        <i class="fab fa-twitter"></i>
                        <span class="home-social-text">Twitter</span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if ( ! empty( $content['instagram_url'] ?? '' ) ) : ?>
                <li><a href="<?php echo esc_html( $content['instagram_url'] ?? '' ) ?>" target="_blank" rel="noreferrer noopener">
                        <i class="fab fa-instagram"></i>
                        <span class="home-social-text">Instagram</span>
                    </a>
                </li>
                <li>
                    <a href="/login" target="_blank" rel="noreferrer noopener">
                        <i class="fab"></i>
                        <span class="home-social-text">Login</span>
                    </a>
                </li>
                <?php endif; ?>
            </ul> <!-- end home-social -->
            <a href="#about" class="home-scroll smoothscroll">
                <span class="home-scroll__text">Scroll Down</span>
                <span class="home-scroll__icon"></span>
            </a> <!-- end home-scroll -->
        </section> <!-- end s-home -->
        <!-- about
        ================================================== -->
        <section id="about" class="s-about">
            <div class="row section-header" data-aos="fade-up">
                <div class="col-full">
                    <h3 class="subhead">Who We Are</h3>
                    <h1 class="display-1">#<?php echo esc_html( $content['title'] . ' brings' ?? 'We bring' ) ?> quality level education to anyone in <?php echo esc_html( $content['location'] ?? 'the World' ) ?>. For free.</h1>
                </div>
            </div> <!-- end section-header -->
            <div class="row" data-aos="fade-up">
                <div class="col-full">
                    <p class="lead">
                        Join our email math classes, follow us on social media, or join us for a free math classes.
                        Above all, learn to solve every day problems with math.
                    </p>
                </div>
            </div> <!-- end about-desc -->
            <div class="row">
                <div class="about-process process block-1-2 block-tab-full">
                    <div class="process__vline-left"></div>
                    <div class="process__vline-right"></div>
                    <div class="col-block process__col" data-item="1" data-aos="fade-up">
                        <div class="process__text">
                            <h4>Math Classes by Email</h4>
                            <p>
                                We offer regular Math Classes through Email that will get you up to level with high school and even university level subjects. What are you waiting for? Subscribe to our Email Math Classes in <?php echo esc_html( $content['location'] ?? 'your area' ) ?> today!
                                <a href="#contact">Join our Email Math Classes</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-block process__col" data-item="2" data-aos="fade-up">
                        <div class="process__text">
                            <h4>Social Media</h4>
                            <p>
                                Get daily math motivation by following us on social media. Join our community of math enthusiasts.
                                <?php if ( ! empty( $content['facebook_url'] ?? '' ) ) : ?>
                                <a href="<?php echo esc_html( $content['facebook_url'] ?? '' ) ?>" target="_blank" rel="noreferrer noopener">Facebook</a>
                                <?php endif; ?>
                                <?php if ( ! empty( $content['twitter_url'] ?? '' ) ) : ?>
                                , <a href="<?php echo esc_html( $content['twitter_url'] ?? '' ) ?>" target="_blank" rel="noreferrer noopener">Twitter</a>
                                <?php endif; ?>
                                <?php if ( ! empty( $content['instagram_url'] ?? '' ) ) : ?>
                                  , and <a href="<?php echo esc_html( $content['instagram_url'] ?? '' ) ?>" target="_blank" rel="noreferrer noopener">Instagram</a>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-block process__col" data-item="3" data-aos="fade-up">
                        <div class="process__text">
                            <h4>One on One Math Tutors</h4>
                            <p>
                                One on one tutoring is key. Reading from a math book or watching a lesson video isn't enough. Math tutoring
                                in different sections of the city is available thanks to our volunteer teachers. <?php echo esc_html( $content['location'] ?? 'Your neighborhood' ) ?> is no different. Check out our
                                <a href="<?php echo esc_html( $content['facebook_events_url'] ?? '' ) ?>">Facebook Events</a>
                                page and find out when new classes are available in your area.
                            </p>
                        </div>
                    </div>
                    <div class="col-block process__col" data-item="4" data-aos="fade-up">
                        <div class="process__text">
                            <h4>Efficient Training</h4>
                            <p>
                                We use new teaching methods that will take your math learning to a new level. Every person is different and that's why we tailor math lessons to the way you learn the best. <a href="#contactform">Contact us</a> to learn more.
                            </p>
                        </div>
                    </div>
                </div> <!-- end process -->
            </div> <!-- end about-stats -->
        </section> <!-- end s-about -->
        <!-- stats
        ================================================== -->
        <section id="stats" class="s-stats">
            <div class="row stats block-1-4 block-m-1-2 block-mob-full" data-aos="fade-up">
                <div class="col-block stats__col ">
                    <div class="stats__static"><?php echo esc_html( $content['stats_population'] ?? '0' ) ?></div>
                    <h5>Million People</h5>
                </div>
                <div class="col-block stats__col">
                    <div class="stats__count"><?php echo esc_html( $content['stats_cities'] ?? '0' ) ?></div>
                    <h5>Cities</h5>
                </div>
                <div class="col-block stats__col">
                    <div class="stats__count"><?php echo esc_html( $content['stats_trainings'] ?? '0' ) ?></div>
                    <h5>Tutors Available</h5>
                </div>
                <div class="col-block stats__col">
                    <div class="stats__count"><?php echo esc_html( $content['stats_churches'] ?? '0' ) ?></div>
                    <h5>New Schools Needed</h5>
                </div>
            </div> <!-- end stats -->
        </section> <!-- end s-stats -->
        <!-- values
        ================================================== -->
        <section id="values" class="s-services light-gray">
            <div class="row section-header" data-aos="fade-up">
                <div class="col-full">
                    <h3 class="subhead">What We Care About</h3>
                    <h1 class="display-1">We know that every student's journey involves
                        study, practice, and hard work.</h1>
                </div>
            </div> <!-- end section-header -->
            <div class="row" data-aos="fade-up">
                <div class="col-full">
                    <p class="lead">
                        “The only way to learn mathematics is to do mathematics.” – Paul Hamos<br>
                        “God used beautiful mathematics in creating the world.” – Paul Dirac
                    </p>
                </div>
            </div> <!-- end about-desc -->
            <div class="row services-list block-1-3 block-m-1-2 block-tab-full">
                <div class="col-block service-item " data-aos="fade-up">
                    <div class="service-icon service-icon--brand-identity">
                        <i class="icon-tv"></i>
                    </div>
                    <div class="service-text">
                        <h3 class="h4">Studying</h3>
                        <p>#<?php echo esc_html( $content['title'] ?? '' ) ?> loves to study, loves practice, and helps students fulfill their potential
                            bringing math to an understandable level.
                        </p>
                    </div>
                </div>
                <div class="col-block service-item" data-aos="fade-up">
                    <div class="service-icon  service-icon--illustration">
                        <i class="icon-group"></i>
                    </div>
                    <div class="service-text">
                        <h3 class="h4">Practice</h3>
                        <p>#<?php echo esc_html( $content['title'] ?? '' ) ?> believes practice makes perfect. Without practice, one can never achieve his highest potential.
                        </p>
                    </div>
                </div>
                <div class="col-block service-item" data-aos="fade-up">
                    <div class="service-icon service-icon--mobile-dev">
                        <i class="icon-tv"></i>
                    </div>
                    <div class="service-text">
                        <h3 class="h4">Free</h3>
                        <p>#<?php echo esc_html( $content['title'] ?? '' ) ?> will never ask for funds or money to their students.you on behalf of others.
                            This community runs on the donations of generous people that want make mathematical education available to everyone.
                        </p>
                    </div>
                </div>
                <div class="col-block service-item" data-aos="fade-up">
                    <div class="service-icon service-icon--mobile-dev">
                        <i class="icon-lego-block"></i>
                    </div>
                    <div class="service-text">
                        <h3 class="h4">Open</h3>
                        <p>#<?php echo esc_html( $content['title'] ?? '' ) ?> welcomes collaboration of <strong>all</strong> tutors.
                            If you love math, we need you!
                        </p>
                    </div>
                </div>
                <div class="col-block service-item" data-aos="fade-up">
                    <div class="service-icon service-icon--mobile-dev">
                        <i class="icon-lego-block"></i>
                    </div>
                    <div class="service-text">
                        <h3 class="h4">Exponential Growth</h3>
                        <p>#<?php echo esc_html( $content['title'] ?? '' ) ?> wants you to keep the ball rolling.
                            If math has changed your life, share this link with someone that could use it.
                        </p>
                    </div>
                </div>
                <div class="col-block service-item" data-aos="fade-up">
                    <div class="service-icon  service-icon--ui-design">
                        <i class="icon-window"></i>
                    </div>
                    <div class="service-text">
                        <h3 class="h4">Down to Earth</h3>
                        <p>#<?php echo esc_html( $content['title'] ?? '' ) ?> knows what it's like to have a teacher that only speaks with abstract examples.
                            We bring mathematics down to Earth with real-life examples and applied mathematics.
                        </p>
                    </div>
                </div>
                <div class="col-block service-item" data-aos="fade-up">
                    <div class="service-icon  service-icon--web-design">
                        <i class="icon-earth"></i>
                    </div>
                    <div class="service-text">
                        <h3 class="h4">Mobilizing</h3>
                        <p>#<?php echo esc_html( $content['title'] ?? '' ) ?> asks everyone to not only study math but also to encourage others to learn as well.
                        </p>
                    </div>
                </div>
                <div class="col-block service-item" data-aos="fade-up">
                    <div class="service-icon service-icon--ui-design">
                        <i class="icon-window"></i>
                    </div>
                    <div class="service-text">
                        <h3 class="h4">Simple</h3>
                        <p>#<?php echo esc_html( $content['title'] ?? '' ) ?>  makes learning easy. Never give up, you can do it!
                        </p>
                    </div>
                </div>
                <div class="col-block service-item" data-aos="fade-up">
                    <div class="service-icon service-icon--mobile-dev">
                        <i class="icon-tv"></i>
                    </div>
                    <div class="service-text">
                        <h3 class="h4">For the people</h3>
                        <p>#<?php echo esc_html( $content['title'] ?? '' ) ?> is by the people, for the people. We know about the necesitty for math
                            want to share its importance with others.
                        </p>
                    </div>
                </div>
            </div> <!-- end services-list -->
        </section> <!-- end s-services -->
        <!-- contact
        ================================================== -->
        <section id="contact" class="s-contact">
            <div class="row section-header" data-aos="fade-up">
                <div class="col-full">
                    <h3 class="subhead subhead--light">Join Us</h3>
                    <h1 class="display-1 display-1--light">Sign up for our<br>Math Classes by Email</h1>
                    <?php if ( isset( $content['contact_form'] ) && ! empty( $content['contact_form'] ) ) : ?>
                        <?php echo esc_html( $content['contact_form'] ); ?>
                    <?php else : ?>
                        <form id="newsletter-form" action="">
                            <div id="section-name" class="section">
                                <label for="name" class="input-label label-name">First Name *
                                    <input type="text" id="newsletter-fname" name="name" class="input-text input-name" value="" required="required" ></label>
                                <span id="name-error" class="form-error">You're first name is required.</span>
                            </div>
                            <div id="section-name" class="section">
                                <label for="name" class="input-label label-name">Last Name *
                                    <input type="text" id="newsletter-lname" name="lname" class="input-text input-name" value="" required="required" ></label>
                                <span id="lname-error" class="form-error">You're last name is required.</span>
                            </div>
                            <div id="section-email" class="section">
                                <label for="email" class="input-label label-email">Email *
                                    <input type="email" id="newsletter-email" name="email" class="input-text input-email" value="" >
                                    <input type="email" id="newsletter-e2" name="email2" class="input-text email" value="" required="required" >
                                </label>
                                <span id="email-error" class="form-error">You're email is required.</span>
                            </div>
                            <div class="section" id="submit-button-container">
                                <span style="color:red" class="form-submit-error"></span>
                                <button type="button" class="submit-button ignore" id="submit-button-newsletter" disabled>Submit</button> <span class="loading-spinner"></span>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </div> <!-- end section-header -->
            <div class="row section-header" style="margin-top:150px;" data-aos="fade-up">
                <div class="col-full">
                    <h1 class="display-1 display-1--light">Follow <?php echo esc_html( $content['title'] ?? 'us' ); ?> on Social Media</h1>
                    <p>
                        <?php if ( ! empty( $content['facebook_url'] ?? '' ) ) : ?>
                        <button type="button" onclick="location.href = '<?php echo esc_html( $content['facebook_url'] ?? '' ) ?>'"><i class="fab fa-facebook"></i> Facebook</button>
                        <?php endif; ?>
                        <?php if ( ! empty( $content['twitter_url'] ?? '' ) ) : ?>
                        <button type="button" onclick="location.href = '<?php echo esc_html( $content['twitter_url'] ?? '' ) ?>'"><i class="fab fa-twitter"></i> Twitter</button>
                        <?php endif; ?>
                        <?php if ( ! empty( $content['instagram_url'] ?? '' ) ) : ?>
                        <button type="button" onclick="location.href = '<?php echo esc_html( $content['instagram_url'] ?? '' ) ?>'"><i class="fab fa-instagram"></i> Instagram</button>
                        <?php endif; ?>
                    </p>
                </div>
            </div> <!-- end section-header -->
            <span id="contactform" name="contactform"></span>
            <div class="row section-header" style="margin-top:150px;" data-aos="fade-up">
                <div class="col-full">
                    <h1 class="display-1 display-1--light">Get a call back</h1>
                    <h3 class="subhead">Leave us your phone number and we'll call you back!</h3>
                    <form id="contact-form" method="post">
                        <div id="section-name" class="section">
                            <label for="name" class="input-label label-name">Name *
                            <input type="text" id="contact-name" name="callback_name" class="input-text input-name" value=""></label>
                        </div>
                        <div id="section-phone" class="section">
                            <label for="phone" class="input-label">Phone *
                            <input type="tel" id="contact-phone" name="callback_phone" class="input-text input-phone" value="" required="required" ></label>
                            <span id="contact-phone-error" class="form-error">You're phone is required.</span>
                        </div>
                        <div class="section" id="submit-button-container">
                            <span style="color:red" class="form-submit-error"></span>
                            <button type="submit" class="submit-button ignore" id="submit-button-contact">Submit</button> <span class="loading-spinner"></span>
                        </div>
                    </form>
                </div>
            </div> <!-- end section-header -->
            <div class="row">
            </div> <!-- end row -->
        </section>
        <script>
            jQuery(document).ready(function(){
                // This is a form delay to discourage robots
                let counter = 5;
                let myInterval = setInterval(function () {
                    let button = jQuery('.submit-button')
                    button.html( 'Available in ' + counter)
                    --counter;
                    if ( counter === 0 ) {
                        clearInterval(myInterval);
                        button.html( 'Submit' ).prop('disabled', false)
                    }
                }, 1000);
                /* NEWSLETTER */
                let submit_button_newsletter = jQuery('#submit-button-newsletter')
                submit_button_newsletter.on('click', function(){
                    let spinner = jQuery('.loading-spinner')
                    spinner.addClass('active')
                    submit_button_newsletter.prop('disabled', true)
                    let honey = jQuery('#email').val()
                    if ( honey ) {
                        submit_button_newsletter.html('You can\'t fool me, you... you ROBOT!').prop('disabled', true )
                        spinner.removeClass('active')
                        return;
                    }
                    let fname_input = jQuery('#newsletter-fname')
                    let fname = fname_input.val()
                    if ( ! fname ) {
                        jQuery('#name-error').show()
                        submit_button_newsletter.removeClass('loading')
                        fname_input.focus(function(){
                            jQuery('#name-error').hide()
                        })
                        submit_button_newsletter.prop('disabled', false)
                        spinner.removeClass('active')
                        return;
                    }
                    let lname_input = jQuery('#newsletter-lname')
                    let lname = fname_input.val()
                    if ( ! fname ) {
                        jQuery('#name-error').show()
                        submit_button_newsletter.removeClass('loading')
                        lname_input.focus(function(){
                            jQuery('#name-error').hide()
                        })
                        submit_button_newsletter.prop('disabled', false)
                        spinner.removeClass('active')
                        return;
                    }
                    let email_input = jQuery('#newsletter-e2')
                    let email = email_input.val()
                    if ( ! email ) {
                        jQuery('#email-error').show()
                        submit_button_newsletter.removeClass('loading')
                        email_input.focus(function(){
                            jQuery('#email-error').hide()
                        })
                        submit_button_newsletter.prop('disabled', false)
                        spinner.removeClass('active')
                        return;
                    }
                    let form_data = {
                        fname: fname,
                        lname: lname,
                        email: email,
                        permission: permission
                    }
                    jQuery.ajax({
                        type: "POST",
                        data: JSON.stringify({ action: 'newsletter', parts: jsObject.parts, data: form_data }),
                        contentType: "application/json; charset=utf-8",
                        dataType: "json",
                        url: jsObject.root + jsObject.parts.root + '/v1/' + jsObject.parts.type,
                        beforeSend: function (xhr) {
                            xhr.setRequestHeader('X-WP-Nonce', jsObject.nonce )
                        }
                    })
                        .done(function(response){
                            jQuery('.loading-spinner').removeClass('active')
                            console.log(response)
                        })
                        .fail(function(e) {
                            console.log(e)
                            jQuery('#error').html(e)
                        })
                })
                /* CONTACT FORM */
                let submit_button_contact = jQuery('#submit-button-contact')
                submit_button_contact.on('click', function(){
                    let spinner = jQuery('.loading-spinner')
                    spinner.addClass('active')
                    submit_button_contact.prop('disabled', true)
                    let honey = jQuery('#contact-email').val()
                    if ( honey ) {
                        submit_button_contact.html('You can\'t fool me, you... you ROBOT!').prop('disabled', true )
                        spinner.removeClass('active')
                        return;
                    }
                    let name_input = jQuery('#contact-name')
                    let name = name_input.val()
                    if ( ! name ) {
                        jQuery('#name-error').show()
                        submit_button_contact.removeClass('loading')
                        name_input.focus(function(){
                            jQuery('#name-error').hide()
                        })
                        submit_button_contact.prop('disabled', false)
                        spinner.removeClass('active')
                        return;
                    }
                    let email_input = jQuery('#contact-e2')
                    let email = email_input.val()
                    if ( ! email ) {
                        jQuery('#email-error').show()
                        submit_button_contact.removeClass('loading')
                        email_input.focus(function(){
                            jQuery('#email-error').hide()
                        })
                        submit_button_contact.prop('disabled', false)
                        spinner.removeClass('active')
                        return;
                    }
                    let phone_input = jQuery('#contact-phone')
                    let phone = phone_input.val()
                    if ( ! phone ) {
                        jQuery('#phone-error').show()
                        submit_button_contact.removeClass('loading')
                        email_input.focus(function(){
                            jQuery('#phone-error').hide()
                        })
                        submit_button_contact.prop('disabled', false)
                        spinner.removeClass('active')
                        return;
                    }
                    let comment = jQuery('#contact-comment').html()
                    let form_data = {
                        name: name,
                        email: email,
                        phone: phone,
                        comment: comment
                    }
                    jQuery.ajax({
                        type: "POST",
                        data: JSON.stringify({ action: 'followup', parts: jsObject.parts, data: form_data }),
                        contentType: "application/json; charset=utf-8",
                        dataType: "json",
                        url: jsObject.root + jsObject.parts.root + '/v1/' + jsObject.parts.type,
                        beforeSend: function (xhr) {
                            xhr.setRequestHeader('X-WP-Nonce', jsObject.nonce )
                        }
                    })
                        .done(function(response){
                            jQuery('.loading-spinner').removeClass('active')
                            console.log(response)
                        })
                        .fail(function(e) {
                            console.log(e)
                            jQuery('#error').html(e)
                        })
                })
            })
        </script>
        <style>
            #contact-email {display:none;}
            #newsletter-email {display:none;}
            .form-error {
                display:none;
            }
            .input-label {
                font-family: sans-serif;
                font-size: 1.4rem;
                font-weight: normal;
                color: white;
                display: block;
            }
            input.input-text {
                display: block;
                padding: .5rem;
                border: 0;
                background-color: white;
                outline: none;
                color: #151515;
                font-family: metropolis-semibold, sans-serif;
                font-size: 1.5rem;
                line-height: 3rem;
                width: 50% !important;
                max-width: 100%;
                -webkit-transition: all 0.3s ease-in-out;
                transition: all 0.3s ease-in-out;
            }
            textarea.input-text {
                display: block;
                padding: .5rem;
                border: 0;
                background-color: white;
                outline: none;
                color: #151515;
                font-family: metropolis-semibold, sans-serif;
                font-size: 1.5rem;
                line-height: 3rem;
                width: 50% !important;
                max-width: 100%;
                -webkit-transition: all 0.3s ease-in-out;
                transition: all 0.3s ease-in-out;
            }
            body {
                background-color: rgb(17, 17, 17) !important;
            }
            .form-error {
                color: red;
            }
            /* begin spinner */
            @keyframes spin {
                0% {
                    transform: rotate(0deg);
                }
                100% {
                    transform: rotate(360deg);
                }
            }
            .loading-spinner.active {
                border-radius: 50%;
                width: 24px;
                height: 24px;
                border: 0.25rem solid #919191;
                border-top-color: black;
                animation: spin 1s infinite linear;
                display: inline-block;
            }
            /* end spinner */
            .section {
                padding-top: 10px;
            }
        </style>
        <?php if ( $content['sample_section'] ?? 'yes' === 'yes' ) : ?>
        <!-- works
        ================================================== -->
        <section id="works" class="s-works">
            <div class="row section-header" data-aos="fade-up">
                <div class="col-full">
                    <h3 class="subhead">Samples</h3>
                    <h1 class="display-1">These are some examples of the encouragements we'll send you.</h1>
                </div>
            </div> <!-- end section-header -->
            <div class="row masonry-wrap">
                <div class="masonry">
                    <div class="masonry__brick" data-aos="fade-up">
                        <div class="item-folio">
                            <div class="item-folio__thumb">
                                <a href="<?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>images/g-dmm1.jpg" class="thumb-link" title="Movement" data-size="800x800">
                                    <img src="<?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>images/dmm1.jpg" srcset="<?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>images/dmm1.jpg 1x, <?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>images/g-dmm1.jpg 2x" alt="">
                                </a>
                            </div>
                            <div class="item-folio__text">
                                <h3 class="item-folio__title">
                                    Path to growth
                                </h3>
                                <p class="item-folio__cat">
                                    Mathematical principles
                                </p>
                            </div>
                            <a href="https://www.behance.net/" class="item-folio__project-link" title="Project link">
                                Link
                            </a>
                            <div class="item-folio__caption">
                                <p>The biggest challenge in the face of personal education is not access to resources but the willingness to practice.</p>
                            </div>
                        </div> <!-- end item-folio -->
                    </div> <!-- end masonry__brick -->
                    <div class="masonry__brick" data-aos="fade-up">
                        <div class="item-folio">
                            <div class="item-folio__thumb">
                                <a href="<?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>images/g-math.jpg" class="thumb-link" title="Math" data-size="800x800">
                                    <img src="<?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>images/math.jpg" srcset="<?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>images/math.jpg 1x, <?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>images/g-math.jpg 2x" alt="">
                                </a>
                            </div>
                            <div class="item-folio__text">
                                <h3 class="item-folio__title">
                                    See where tutors are needed
                                </h3>
                                <p class="item-folio__cat">
                                    Volunteer
                                </p>
                            </div>
                            <a href="https://www.behance.net/" class="item-folio__project-link" title="Project link">
                                Link
                            </a>
                            <span class="item-folio__caption">
                                    <p>Volunteer in areas were tutors are needed.</p>
                                </span>
                        </div> <!-- end item-folio -->
                    </div> <!-- end masonry__brick -->
                    <div class="masonry__brick" data-aos="fade-up">
                        <div class="item-folio">
                            <div class="item-folio__thumb">
                                <a href="<?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>images/g-quote1.jpg" class="thumb-link" title="Woodcraft" data-size="800x800">
                                    <img src="<?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>images/quote1.jpg" srcset="<?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>images/quote1.jpg 1x, <?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>images/g-quote1.jpg 2x" alt="">
                                </a>
                            </div>
                            <div class="item-folio__text">
                                <h3 class="item-folio__title">
                                    We love math
                                </h3>
                                <p class="item-folio__cat">
                                    Study
                                </p>
                            </div>
                            <a href="#" class="item-folio__project-link" title="Project link">
                                Link
                            </a>
                            <span class="item-folio__caption">
                                    <p>Forget everything you thought you knew about math.</p>
                                </span>
                        </div> <!-- end item-folio -->
                    </div> <!-- end masonry__brick -->
                    <div class="masonry__brick" data-aos="fade-up">
                        <div class="item-folio">
                            <div class="item-folio__thumb">
                                <a href="<?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>images/g-scripture.jpg" class="thumb-link" title="Liberty" data-size="800x800">
                                    <img src="<?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>images/scripture1.jpg" srcset="<?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>images/scripture1.jpg 1x, <?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>images/g-scripture.jpg 2x" alt="">
                                </a>
                            </div>
                            <div class="item-folio__text">
                                <h3 class="item-folio__title">
                                    Math knows no barriers
                                </h3>
                                <p class="item-folio__cat">
                                    Math books
                                </p>
                            </div>
                            <a href="https://www.behance.net/" class="item-folio__project-link" title="Project link">
                                Link
                            </a>
                            <span class="item-folio__caption">
                                    <p>Study every day</p>
                                </span>
                        </div> <!-- end item-folio -->
                    </div> <!-- end masonry__brick -->

                    <div class="masonry__brick" data-aos="fade-up">
                        <div class="item-folio">
                            <div class="item-folio__thumb">
                                <a href="<?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>images/g-quote4.jpg" class="thumb-link" title="Fuji" data-size="800x800">
                                    <img src="<?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>images/quote4.jpg" srcset="<?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>images/quote4.jpg 1x, <?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>images/g-quote4.jpg 2x" alt="">
                                </a>
                            </div>
                            <div class="item-folio__text">
                                <h3 class="item-folio__title">
                                    Amazing Students
                                </h3>
                                <p class="item-folio__cat">
                                    Practice
                                </p>
                            </div>
                            <a href="https://www.behance.net/" class="item-folio__project-link" title="Project link">
                                Link
                            </a>
                            <span class="item-folio__caption">
                                    <p>Nobody can deny the usefulness of Mathematics</p>
                                </span>
                        </div> <!-- end item-folio -->
                    </div> <!-- end masonry__brick -->
                    <div class="masonry__brick" data-aos="fade-up">
                        <div class="item-folio">
                            <div class="item-folio__thumb">
                                <a href="<?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>images/g-quote3.jpg" class="thumb-link" title="" data-size="800x800">
                                    <img src="<?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>images/quote3.jpg" srcset="<?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>images/quote3.jpg 1x, <?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>images/g-quote3.jpg 2x" alt="">
                                </a>
                            </div>
                            <div class="item-folio__text">
                                <h3 class="item-folio__title">
                                    The Need to Learn More
                                </h3>
                                <p class="item-folio__cat">
                                    A mathematical lifestyle
                                </p>
                            </div>
                            <a href="https://www.behance.net/" class="item-folio__project-link" title="Project link">
                                Link
                            </a>
                            <span class="item-folio__caption">
                                    <p>Reach for the stars.</p>
                                </span>
                        </div> <!-- end item-folio -->
                    </div> <!-- end masonry__brick -->
                </div> <!-- end masonry -->
            </div> <!-- end masonry-wrap -->
            <div class="testimonials-wrap" data-aos="fade-up">
                <div class="row">
                    <div class="col-full testimonials-header">
                        <h2 class="h1">What Our Students Are Saying</h2>
                    </div>
                </div>
                <div class="row testimonials">
                    <div class="col-full testimonials__slider">
                        <div class="testimonials__slide">
                            <img src="<?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>images/user-02.jpg" alt="Author image" class="testimonials__avatar">
                            <p>I thought I wasn't smart enough to study math, until I learned about <?php echo esc_html( $content['title'] ?? 'this class' ) ?></p>
                            <div class="testimonials__author">
                                Hakim ~
                                <span>Student</span>
                            </div>
                        </div> <!-- end testimonials__slide -->
                        <div class="testimonials__slide">
                            <img src="<?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>images/user-01.jpg" alt="Author image" class="testimonials__avatar">
                            <p>You can also learn math in <?php echo esc_html( $content['location'] ?? 'your city' ) ?>! This class helped me find a good job and get things in order.</p>
                            <div class="testimonials__author">
                                Jamal ~
                                <span>Worker</span>
                            </div>
                        </div> <!-- end testimonials__slide -->
                        <div class="testimonials__slide">
                            <img src="<?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>images/user-03.jpg" alt="Author image" class="testimonials__avatar">
                            <p>Advanced mathematical concepts were finally easy for me to understand, and even more, I was applying them to my every day life!</p>
                            <div class="testimonials__author">
                                Ahmed ~
                                <span>Student</span>
                            </div>
                        </div> <!-- end testimonials__slide -->

                    </div> <!-- end testimonials__slider -->
                </div> <!-- end testimonials -->
            </div> <!-- end testimonials-wrap -->
        </section> <!-- end s-works -->
        <?php endif; ?>

        <!-- Footer -->
        <section id="footer" class="s-contact">
            <div class="row">
                <div class="col-full cl-copyright">
                        <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright ©<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="#" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $content['title'] ?? '' ) ?></a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
                </div>
            </div>
            <div class="cl-go-top">
                <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon-arrow-up" aria-hidden="true"></i></a>
            </div>
        </section> <!-- end s-contact -->

        <!-- photoswipe background
        ================================================== -->
        <div aria-hidden="true" class="pswp" role="dialog" tabindex="-1">
            <div class="pswp__bg"></div>
            <div class="pswp__scroll-wrap">
                <div class="pswp__container">
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                </div>
                <div class="pswp__ui pswp__ui--hidden">
                    <div class="pswp__top-bar">
                        <div class="pswp__counter"></div>
                        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                        <button class="pswp__button pswp__button--share" title="Share"></button>
                        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                        <div class="pswp__preloader">
                            <div class="pswp__preloader__icn">
                                <div class="pswp__preloader__cut">
                                    <div class="pswp__preloader__donut"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                        <div class="pswp__share-tooltip"></div>
                    </div>
                    <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                    <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                    <div class="pswp__caption">
                        <div class="pswp__caption__center"></div>
                    </div>
                </div>
            </div>
        </div> <!-- end photoSwipe background -->

        <!-- preloader
        ================================================== -->
        <div id="preloader">
            <div id="loader">
            </div>
        </div>
        <!-- /wp:html -->
        <!-- Java Script
        ================================================== -->
        <script src="<?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>js/jquery-3.2.1.min.js"></script>
        <script src="<?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>js/plugins.js"></script>
        <script src="<?php echo esc_attr( trailingslashit( plugin_dir_url( __FILE__ ) ) ); ?>js/main.js"></script>
        </div>  <!-- end .off-canvas-content -->
                </div> <!-- end .off-canvas-wrapper -->
            </body>
        </html> <!-- end page -->
        <?php exit; ?>