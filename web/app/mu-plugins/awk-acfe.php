<?php

if ( 'advanced-custom-fields-pro' ) {
    if (! 'Отключить post-types и taxonomies' ) {
        add_filter( 'acf/settings/enable_post_types', '__return_false' );
    }
    if (! 'Отключить options-pages' ) {
        add_filter( 'acf/settings/enable_options_pages_ui', '__return_false' );
    }
}
if ( 'acf-extended-pro' ) {
    if('Настройка папок'){
        add_filter('acfe/settings/php_save', function($path) {
            return WPMU_PLUGIN_DIR . "/awk-acfe/php";
        });

        add_filter('acfe/settings/php_load', function($path) {
            return WPMU_PLUGIN_DIR . "/awk-acfe/php";
        });

        add_filter('acfe/settings/json_save', function($path) {
            return WPMU_PLUGIN_DIR . "/awk-acfe/json";
        });

        add_filter('acfe/settings/json_load', function($path) {
            return WPMU_PLUGIN_DIR . "/awk-acfe/json";
        });
    }
    if ( 'Модули' ) {
        add_action( 'acfe/init', function () {

            if(WP_ENV === 'development'){
                acfe_update_setting( 'dev', true );
            }

            acfe_update_setting( 'modules/performance', 'hybrid' );
            acfe_update_setting( 'modules/rewrite_rules', false );
            acfe_update_setting( 'modules/classic_editor', false );
            acfe_update_setting( 'modules/force_sync', true );
        } );
    }
}