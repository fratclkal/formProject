<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class SendUpdateMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $form;

    public function __construct($form)
    {
        $this->form = $form;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {



        $array = [
            'form_no' => $this->form->id,
            'name' => $this->form->name,
            'surname' => $this->form->sur_name,
            'owner_name' => $this->form->getUser->name
        ];


        $users = User::where('role', 'Admin')->get();

        foreach ($users as $user){
            Mail::send('/mailtemplates/updated', $array, function ($message) use ($user){
                $message->from(env('MAIL_USERNAME'), 'Biskur');
                $message->subject("Form Güncellendi");
                $message->to($user->email);
            });
        }







    }
}
