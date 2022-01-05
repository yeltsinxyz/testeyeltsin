<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://kit.fontawesome.com/2f6743cd75.js" crossorigin="anonymous"></script>

    <?php wp_head(); ?>

</head>
<body>

    <!-- navbar -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-danger">

        <div class="container-fluid">

            <a href="#" class="navbar-brand">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a href="" class="nav-link">Casamento</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Decor</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Gourmet</a></li>
                    <li class="nav-item"><a href="" class="nav-link">Inspire-se</a></li>
                    <li class="nav-item">
                        <a href="" class="nav-link">           
                            <svg width="18" height="18" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 20L15.514 15.506L20 20ZM18 9.5C18 11.7543 17.1045 13.9163 15.5104 15.5104C13.9163 17.1045 11.7543 18 9.5 18C7.24566 18 5.08365 17.1045 3.48959 15.5104C1.89553 13.9163 1 11.7543 1 9.5C1 7.24566 1.89553 5.08365 3.48959 3.48959C5.08365 1.89553 7.24566 1 9.5 1C11.7543 1 13.9163 1.89553 15.5104 3.48959C17.1045 5.08365 18 7.24566 18 9.5V9.5Z" stroke="white" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </a>
                    </li>
                    <li class="nav-item">
                    <?php 
                        $link = get_field('button_header', 'option');
                        if( $link ): 
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                        <a href="<?php echo esc_url( $link_url ); ?>" class="store-button nav-link">
                            <?php echo esc_html( $link_title ); ?>
                            <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.54985 6.32584C1.57717 5.98537 1.73174 5.66768 1.98276 5.43605C2.23378 5.20441 2.56284 5.07583 2.9044 5.0759H11.0956C11.4372 5.07583 11.7662 5.20441 12.0172 5.43605C12.2683 5.66768 12.4228 5.98537 12.4502 6.32584L12.9956 13.119C13.0106 13.3059 12.9868 13.494 12.9256 13.6712C12.8643 13.8485 12.7671 14.0112 12.6399 14.149C12.5127 14.2868 12.3584 14.3969 12.1866 14.4721C12.0148 14.5474 11.8293 14.5863 11.6418 14.5863H2.35823C2.17069 14.5863 1.98519 14.5474 1.81341 14.4721C1.64163 14.3969 1.48729 14.2868 1.36011 14.149C1.23293 14.0112 1.13567 13.8485 1.07444 13.6712C1.01321 13.494 0.989351 13.3059 1.00435 13.119L1.54985 6.32584V6.32584Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9.71724 7.11385V3.71726C9.71724 2.9966 9.43096 2.30545 8.92138 1.79587C8.41179 1.28628 7.72064 1 6.99998 1C6.27932 1 5.58817 1.28628 5.07858 1.79587C4.569 2.30545 4.28271 2.9966 4.28271 3.71726V7.11385" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                    </li>
                </ul>
            </div>

        </div>

    </nav>

    <!-- float social icons -->
    <div class="float-social d-none d-xl-block d-xxl-none">
        <ul>
            <li><a href="<?php the_field('facebook', 'option'); ?>"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="<?php the_field('instagram', 'option'); ?>"><i class="fab fa-instagram"></i></a></li>
            <li><a href="<?php the_field('twitter', 'option'); ?>"><i class="fab fa-twitter"></i></a></li>
        </ul>
    </div>