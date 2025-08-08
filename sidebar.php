<aside id="kt-sidebar" <?php echo (is_single() || is_front_page() ?
    'style="margin-top:60px;"' : 'style="margin-top:60px;"');
?>>
    <?php if (!dynamic_sidebar('sidebar')): ?>
        <div class="pre-widget">
            <h3><?php _e('Widgetized Sidebar', 'greek-restaurant'); ?></h3>
            <p><?php _e('This panel is active and ready for you to add
            some widgets via the WP Admin', 'greek-restaurant'); ?></p>
        </div>
    <?php endif; ?>
</aside>