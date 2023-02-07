<?php

namespace Theme\API;

use WP_REST_Request as Request;
use WP_REST_Response as Response;
use Valitron\Validator;
use Theme\Helpers\MailTemplate;

/**
 * Contact form API endpoint
 */
class Contact
{

    /**
     * Holds the API arguments.
     *
     * @var array
     */
    protected array $args;

    /**
     * Holds the query parameters.
     *
     * @var array
     */
    protected array $query;

    /**
     * Set up the arguments as an array.
     *
     * @return void
     */
    public function __construct()
    {

        $this->args = array();

    }

    /**
     * Get the API arguments.
     *
     * @return array
     */
    public function get_arguments(): array
    {

        return $this->args;

    }

    /**
     * Define user permissions.
     *
     * @return true
     */
    public function get_permissions(): bool
    {

        return true;

    }

    /**
     * Run the search query.
     *
     * @param Request $request
     * @return Response
     */
    public function submit(Request $request): Response
    {

        $v = new Validator($request->get_params());

        // Validation data
        $v->rule('required', array('name', 'email', 'telephone', 'message'));
        $v->rule('numeric', 'telephone');
        $v->rule('email', 'email');

        // Don't proceed if fields are not valid
        if (!$v->validate()) {

            $res_data = array(
                'message' => 'There are errors with your form submission!',
                'errors' => $v->errors()
            );

            return new Response($res_data, 400);

        }

        $to = getenv('WP_ENV') === 'production' ? get_field('contact', 'option')['email'] : 'development@think3.co.uk';

        $subject = 'Contact Form Submission - ' . $request->get_param('name');

        $data['title'] = "New Contact Form Submission";
        $data['subtitle'] = "A submission has been made using the contact form.";

        $data['content'] = '<strong>Name:</strong> ' . $request->get_param('name') . "<br/>"
            . '<strong>Email Address:</strong> ' . $request->get_param('email') . "<br/>"
            . '<strong>Phone Number:</strong> ' . $request->get_param('telephone') . "<br/><br/>"
            . '<strong>Message:</strong> <br/><br/>'
            . nl2br($request->get_param('message'));

        // The body of the message
        $body = MailTemplate::get_body('default', $data);

        // The headers
        $headers = [
            'Content-Type: text/html; charset=UTF-8',
            'From: ' . $request->get_param('name') . ' <' . $request->get_param('email') . '>'
        ];

        // Send email
        $email_sent = \wp_mail($to, $subject, $body, $headers);

        // Don't proceed if email didn't send successfully
        if (!$email_sent) {

            $res_data = [
                'message' => 'Failed to dispatch email!'
            ];

            return new Response($res_data, 500);

        }

        // Success message
        $res_data = [
            'message' => 'Your message has successfully been sent.'
        ];

        return new Response($res_data);

    }

}
