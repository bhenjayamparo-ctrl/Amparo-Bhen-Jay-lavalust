<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------
 * StudentController
 * ------------------------------------------------------------------
 *
 * Handles the public home page, the access-code verification endpoint,
 * and the protected student profile page.
 *
 * @package StudentProfileApp
 */
class StudentController extends Controller
{
    /**
     * Must match the key used in StudentMiddleware.
     *
     * @var string
     */
    const ACCESS_SESSION_KEY = 'bja_profile_unlocked';

    /**
     * GET /  and  GET /student
     * Public home / landing page.
     *
     * @return void
     */
    public function index()
    {
        $data['student']      = $this->student_data();
        $data['show_locked']  = isset($_GET['locked']) && $_GET['locked'] === '1';

        $this->call->view('landing', $data);
    }

    /**
     * GET /student/profile
     * Protected by StudentMiddleware - only reachable after a correct
     * access code has been submitted through verify_access().
     *
     * @return void
     */
    public function profile()
    {
        $data['student'] = $this->student_data();

        $this->call->view('profile', $data);
    }

    /**
     * POST /student/verify
     * Checks the 4-digit access code submitted from the "View Profile"
     * popup. On success it sets the session flag that StudentMiddleware
     * checks and returns the profile URL for the front-end to redirect to.
     *
     * @return void
     */
    public function verify_access()
    {
        header('Content-Type: application/json');

        $submitted = isset($_POST['code']) ? trim((string) $_POST['code']) : '';
        $expected  = (string) config_item('profile_access_code');

        $is_valid = ($submitted !== '')
            && preg_match('/^\d{4}$/', $submitted)
            && hash_equals($expected, $submitted);

        if ($is_valid) {
            $this->session->set_userdata(self::ACCESS_SESSION_KEY, true);

            echo json_encode([
                'success'  => true,
                'redirect' => site_url('student/profile'),
            ]);
            return;
        }

        echo json_encode([
            'success' => false,
            'message' => 'Incorrect access code. Please try again.',
        ]);
    }

    /**
     * Student information used across the home and profile views.
     *
     * @return array
     */
    private function student_data()
    {
        return [
            'student_id'   => 'MCC2024-00011',
            'name'         => 'Bhen Jay V. Amparo',
            'course'       => 'BS Information Technology',
            'year'         => 'Third Year',
            'section'      => '3-F1',
            'email'        => 'bhenjayamparo@gmail.com',
            'github'       => 'bhenjayamparo-ctrl',
            'hobbies'      => ['Gaming', 'Listening to Music'],
            'skills'       => [
                'Video Editing',
                'Publication Material Editing',
                'Social Media Management',
                'Sports Writing',
            ],
            'affiliations' => [
                [
                    'org'  => 'Builders Pandayan',
                    'role' => 'Associate Editor for Internal Affairs',
                ],
                [
                    'org'  => 'COMSELEC',
                    'role' => 'BSIT Representative',
                ],
            ],
        ];
    }
}
