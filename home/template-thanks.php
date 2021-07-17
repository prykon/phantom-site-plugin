<?php
    $content = get_option( 'phantom_site_content' );

if ( isset( $_POST['callback_phone'] ) && isset( $_POST['phantom_site_phone_nonce'] ) ) {
    if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['phantom_site_phone_nonce'] ) ), 'phantom_site_callback_phone' ) ) {
        return;
    }
    $phone = esc_sql( trim( $phone ) );
    $phantom_workers = get_option( 'phantom_workers' );

    if ( empty( $phantom_workers ) || in_array( $phone, $phantom_workers ) ) {
        ?>
            <script>
                document.body.id = 'top'
            </script>
            <section id="about" class="s-about">

                <div class="row section-header" data-aos="fade-up">
                    <div class="col-full">
                        <h3 class="subhead">Thanks!</h3>
                        <h1 class="display-1">One of our volunteers will contact you as soon as possible.</h1>
                    </div>
                </div> <!-- end section-header -->

                <div class="row" data-aos="fade-up">
                    <div class="col-full">
                        <p class="lead">
                            If you haven't heard back in a few days, please re-submit this form.
                        </p>
                    </div>
                </div> <!-- end about-desc -->
                <div class="row" data-aos="fade-up">
                    <div class="section">
                        <span style="color:red" class="form-submit-error"></span>
                        <button class="submit-button ignore"><a href="/">Home</a></button> <span class="loading-spinner"></span>
                    </div>
                </div>


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
        <?php
    } else {
        ?>
            <h1>Do stuff...</h1>
        <?php
    }
}