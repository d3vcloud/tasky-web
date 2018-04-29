<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Invite;
use Auth;

class SendInvitation extends Mailable
{
    use Queueable, SerializesModels;

    protected $invite;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Invite $invite)
    {
        $this->invite = $invite;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $project = \App\Project::find($this->invite->project_id)->name;

        return $this->subject('Invitation to '.$project)
            ->from('tuemail')//personalizable
            ->markdown('emails.send.invitation',
                ['url'  => url('/').'/accept/'.$this->invite->token,
                 'user' => Auth::user()->first_name.' '.Auth::user()->last_name,
                 'project' => $project]);
    }
}
