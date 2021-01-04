

<footer class="footer">
    <nav class="navbar fixed-bottom navbar-expand-md navbar-light bg-light">
        <div class="container d-flex justify-content-around">
            <?php if (has_nav_menu('menu-footer')): ?>
                <?php
            wp_nav_menu([
                    'theme_location'    => 'menu-footer',
                    'container'         => 'div',
                    'menu_class'        => 'nav navbar-nav',
                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'            => new WP_Bootstrap_Navwalker(),
            ])
                ; ?>

            <?php endif; ?>
        </div>
    </nav>
</footer>
<?php wp_footer(); ?>
</body>
</html>