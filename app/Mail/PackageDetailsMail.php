<?php
namespace App\Mail;

use App\Models\Package;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PackageDetailsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $package;

    public function __construct(Package $package)
    {
        $this->package = $package;
    }

    public function build()
    {
        return $this->subject('Package Details')
                    ->view('emails.package_details');
    }
}
