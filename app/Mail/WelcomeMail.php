<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Symfony\Component\HttpFoundation\Request;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $data)
    {
        
        $address = 'hugoresende29@gmail.com';
        $subject = 'Welcome to Omega Blog';
        $name = 'Omega Blog Admin';

        $name_reg = $data->name;
        $pass_reg = $data->password;

        
        // dd(get_defined_vars());
        
        return $this->view('welcome_email')
                    ->from($address, $name)
                    ->cc($address, $name)
                    ->bcc($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->with(['name' => $name_reg,
                            'pass'=> $pass_reg]);
                    
        // return $this->subject('Email de registo Blog Omega')
        // ->markdown('welcome_email');
    }
}
