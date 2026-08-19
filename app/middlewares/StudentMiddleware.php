<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------
 * StudentMiddleware
 * ------------------------------------------------------------------
 *
 * Guards the /student/profile route.
 *
 * Access is granted only when the session flag below has been set to
 * TRUE, which only happens inside StudentController::verify_access()
 * after the visitor submits the correct 4-digit access code from the
 * "View Profile" popup on the home page.
 *
 * Typing /student/profile directly into the address bar - without ever
 * going through the access-code flow - will NOT have this session flag
 * set, so the request is redirected back to the home page instead of
 * being allowed through.
 *
 * @package StudentProfileApp
 */
class StudentMiddleware
{
    /**
     * Session key toggled on after a correct access code submission.
     * Unique to this project so it doesn't collide with any other
     * session data used elsewhere in the app.
     *
     * @var string
     */
    const ACCESS_SESSION_KEY = 'bja_profile_unlocked';

    /**
     * Handle the incoming request.
     *
     * @param Closure $next
     * @return mixed
     */
    public function handle($next)
    {
        // The url helper is normally autoloaded on controller construction,
        // but middleware runs BEFORE the controller is instantiated, so we
        // make sure redirect()/site_url() are available here regardless.
        if (!function_exists('redirect')) {
            require_once SYSTEM_DIR . 'helpers/url_helper.php';
        }

        // Same reasoning for the session library: load (or reuse the
        // already-loaded) instance directly instead of relying on
        // controller-level autoload timing.
        $session = load_class('session', 'libraries');

        if ($session->has_userdata(self::ACCESS_SESSION_KEY)
            && $session->userdata(self::ACCESS_SESSION_KEY) === true) {
            // Access granted - continue on to StudentController::profile()
            return $next();
        }

        // No valid session flag - block the request and bounce back home.
        redirect('student?locked=1');
        return;
    }
}
