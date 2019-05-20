<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CapituloNew extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Capitulo Nuevo';
    public $novela_nombre;
    public $capitulo_num;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($novela_nombre, $capitulo_num)
    {
        $this->novela_nombre = $novela_nombre;
        $this->capitulo_num = $capitulo_num;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.capitulo.new');
    }
}
