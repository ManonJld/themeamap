

<footer class="footer mt-4">
    <nav class="navbar navbar-expand-md navbar-light footer-bg">
        <div class="container d-flex justify-content-between">
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
            <?php if (is_active_sidebar('footer-sidebar')): ?>
                <?php dynamic_sidebar('footer-sidebar'); ?>
            <?php endif; ?>
        </div>
    </nav>
</footer>
<?php wp_footer(); ?>
</body>
</html>