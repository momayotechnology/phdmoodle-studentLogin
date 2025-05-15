<?php
require('../../config.php');
require_once($CFG->libdir.'/authlib.php');

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

require_once(__DIR__ . '/vendor/autoload.php');

$token = required_param('token', PARAM_RAW);
$secret = 'xuzfdlsamtpsj43242342'; // Use env/config if possible

try {
    $payload = JWT::decode($token, new Key($secret, 'HS256'));
    $email = $payload->email;

    $user = $DB->get_record('user', ['email' => $email, 'deleted' => 0]);

    if (!$user) {
        // Auto-create user if not found (optional)
        // $user = new stdClass();
        // $user->auth = 'laravel';
        // $user->confirmed = 1;
        // $user->email = $email;
        // $user->username = $email;
        // $user->firstname = 'Laravel';
        // $user->lastname = 'User';
        // $user->mnethostid = $CFG->mnet_localhost_id;
        // $user->id = user_create_user($user, false);
        // $user = $DB->get_record('user', ['id' => $user->id]);
        throw new Exception("User not found!");
    }

    complete_user_login($user);
    redirect($CFG->wwwroot); // Redirect to Moodle homepage
} catch (Exception $e) {   
    throw new \moodle_exception('invalidtoken', 'auth_laravel');
}
