<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SlackInviterController extends Controller
{
    /**
     * Show a form to invite the user to slack.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function showInviteForm(Request $request)
    {
        $slack_team_url = env('SLACK_HOST_NAME') . '.slack.com';

        return view('inviter.form', [
            'slack_team_url' => $slack_team_url,
        ]);
    }

    /**
     * Handle the form submission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function handleInvitation(Request $request)
    {
        // Validate user input.
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email',
        ]);

        // Get values from .env file.
        $slack_host_name = env('SLACK_HOST_NAME');
        $slack_auto_join_channels = env('SLACK_AUTO_JOIN_CHANNELS');
        $slack_auth_token = env('SLACK_AUTH_TOKEN');

        // Create a custom slack url to make the api calls.
        $slack_invite_url = 'https://' . $slack_host_name . '.slack.com/api/users.admin.invite?t=' . time();

        // Build an array to send to the api.
        $fields = [
            'email' => $request->email,
            'channels' => $slack_auto_join_channels,
            'first_name' => $request->name,
            'token' => $slack_auth_token,
            'set_active' => 'true',
            '_attempts' => '1'
        ];

        // Get a HTTP client.
        $client = new \GuzzleHttp\Client();

        // Status array to send back.
        $status = [];

        // Yes. Try catch in php. :P
        try {
            // Make api call.
            $response = $client->request('POST', $slack_invite_url, [
            'form_params' => $fields]);

            // Decode the response to an array.
            $status = json_decode($response->getBody());

            // Show view to user.
            return view('inviter.response', ['status' => $status, 'email' => $request->email]);

        } catch (Exception $e) {
            // Show error to user.
            return 'There was an error while communicating with slack. Please try again later.';
        }
    }
}
