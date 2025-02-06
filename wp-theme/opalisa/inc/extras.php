<?php

/* clear phone number */

function phone_clear($phone_num){
    $phone_num = preg_replace("![^0-9]+!",'',$phone_num);
    return($phone_num);
}

/* post ago */

function time_ago($post_id) {
    $post_time = get_the_time('U', $post_id);
    $current_time = current_time('timestamp');

    $time_diff = $current_time - $post_time;

    $minutes = 60;
    $hours = $minutes * 60;
    $days = $hours * 24;
    $weeks = $days * 7;
    $months = $days * 30;
    $years = $days * 365;

    if ($time_diff < $minutes) {
        return 'Just now';
    } elseif ($time_diff < $hours) {
        $minutes_ago = floor($time_diff / $minutes);
        return $minutes_ago . ' minute' . ($minutes_ago > 1 ? 's' : '') . ' ago';
    } elseif ($time_diff < $days) {
        $hours_ago = floor($time_diff / $hours);
        return $hours_ago . ' hour' . ($hours_ago > 1 ? 's' : '') . ' ago';
    } elseif ($time_diff < $weeks) {
        $days_ago = floor($time_diff / $days);
        return $days_ago . ' day' . ($days_ago > 1 ? 's' : '') . ' ago';
    } elseif ($time_diff < $months) {
        $weeks_ago = floor($time_diff / $weeks);
        return $weeks_ago . ' week' . ($weeks_ago > 1 ? 's' : '') . ' ago';
    } elseif ($time_diff < $years) {
        $months_ago = floor($time_diff / $months);
        return $months_ago . ' month' . ($months_ago > 1 ? 's' : '') . ' ago';
    } else {
        $years_ago = floor($time_diff / $years);
        return $years_ago . ' year' . ($years_ago > 1 ? 's' : '') . ' ago';
    }
}


/* excerpt */

add_filter( 'excerpt_length', function(){
    return 27;
} );

add_filter( 'excerpt_more', function( $more ) {
    return '';
} );

add_filter('wpcf7_autop_or_not', '__return_false');


function my_acf_google_map_api_key() {

    $key_map = get_field('google_map_api_key', 'options');

    acf_update_setting( 'google_api_key', $key_map );
}
add_action( 'acf/init', 'my_acf_google_map_api_key' );
