<?php

namespace App\Mail;

use App\Task;
use App\User;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTasksInformation extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $tasks = $this->user->tasks()->where('status','!=','completed')->get();
        return $this->subject('Summary of your tasks')
            ->view('emails.send.mytasksinformation')
            ->with([
                'tasks' => $tasks,
                'user' => $this->user->first_name.' '.$this->user->last_name,
                'projects' => $this->user->projects()->get(),
                'idUser' => $this->user->id,

            ]);
    }
}
