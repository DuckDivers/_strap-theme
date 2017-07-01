<?php
/*
* Section Title: Navigation Section
*/ ?>

<nav id="site-navigation" class="main-navigation navbar navbar-default" role="navigation">
    <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'duck_diver_theme' ); ?></a>
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-main">
            <span class="sr-only"><?php _e('Toggle navigation', 'duck_diver_theme'); ?></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!--<a class="navbar-brand" href="#">Brand</a>-->
    </div>

    <div class="collapse navbar-collapse" id="navbar-collapse-main">
        <ul class="nav navbar-nav">
            <?php if( has_nav_menu( 'primary' ) ) :
                wp_nav_menu( array(
                        'theme_location'  => 'primary',
                        'container'       => false,
                        //'menu_class'      => 'nav navbar-nav',//  'nav navbar-right'
                        'walker'          => new Bootstrap_Nav_Menu(),
                        'fallback_cb'     => null,
                        'items_wrap'      => '%3$s',// skip the containing <ul>
                    )
                );
            else :
                wp_list_pages( array(
                        'menu_class'      => 'nav navbar-nav',//  'nav navbar-right'
                        'walker'          => new Bootstrap_Page_Menu(),
                        'title_li'        => null,
                    )
                );
            endif; ?>
        </ul>
        <?php if(get_theme_mod('navbar_search_toggle') == 1){get_search_form();} ?>
    </div><!-- /.navbar-collapse -->

</nav><!-- #site-navigation -->