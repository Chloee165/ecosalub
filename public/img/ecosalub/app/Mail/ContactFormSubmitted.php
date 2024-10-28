<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class ContactFormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $request; 

    /**
     * Create a new message instance.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(Request $request) 
    {
        $this->request = $request; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to('info@ecosalub.ca') 
                    ->from('info@ecosalub.ca', 'Ecosalub')
                    ->view('emails.contact') 
                    ->with([ 
                        'prenom' => $this->request->input('prenom'),
                        'nom' => $this->request->input('nom'),
                        'courriel' => $this->request->input('courriel'),
                        'entreprise' => $this->request->input('entreprise'),
                        'zip' => $this->request->input('zip'),
                        'telephone' => $this->request->input('telephone'),
                        'sujet' => $this->request->input('sujet'),
                        'formMessage' => $this->request->input('message'), 
                        'newsletter' => $this->request->input('newsletter') ? 'Oui' : 'Non', 
                    ]);
    }

    /**
     * @return array<int, 
     */
    public function attachments(): array
    {
        return []; 
    }
}
