<?php
defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir.'/authlib.php');

class auth_plugin_laravel extends auth_plugin_base {
    public function __construct() {
        $this->authtype = 'laravel';
        $this->config = get_config('auth/laravel');
    }

    public function loginpage_hook() {
        // Could add a button on the login page if needed
    }
}
