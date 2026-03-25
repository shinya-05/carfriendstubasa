<?php

namespace App\Mail;

use App\Models\Assessment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AssessmentReceivedMail extends Mailable
{
    use Queueable, SerializesModels;

    public Assessment $assessment;

    public function __construct(Assessment $assessment)
    {
        $this->assessment = $assessment;
    }

    public function build()
    {
        $mail = $this->subject('【査定依頼通知】サイトから査定依頼がありました')
            ->view('emails.assessment_received');

        if (!empty($this->assessment->email)) {
            $mail->replyTo($this->assessment->email, $this->assessment->name);
        }

        return $mail;
    }
}