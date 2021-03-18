<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Minmax\Notify\Models\NotifyEmail;
use Minmax\Inbox\Models\InboxReceived;

class ContactAMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $notify;
    protected $received;
    protected $webData;

    /**
     * Create a new message instance.
     *
     * @param  NotifyEmail $notify
     * @param  InboxReceived $received

     * @return void
     */
    public function __construct(NotifyEmail $notify,$received)
    {
        $this->notify = $notify;
        $this->received = $received;
        $this->webData = webData();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        list($searches, $replaces) = array_divide([
            '{[serial]}' => $this->received->serial,
            '{[formDate]}' => $this->received->created_at->format('Y-m-d H:i:s'),

            '{[formServiceItem]}' => array_get($this->received->details, '諮詢服務'),
            '{[formParticipation]}' => array_get($this->received->details, '參加類別'),
            '{[formCountry]}' => array_get($this->received->details, '國家'),
            '{[formCompany]}' => array_get($this->received->details, '公司'),
            '{[formTitle]}' => array_get($this->received->details, '標題'),
            '{[formFirstName]}' => array_get($this->received->details, 'firstname'),
            '{[formLastName]}' => array_get($this->received->details, 'lastname'),
            '{[formAreacode]}' => array_get($this->received->details, '區碼'),
            '{[formTel]}' => array_get($this->received->details, '電話'),
            '{[formEmail]}' => array_get($this->received->details, 'email'),
            '{[formContactItem]}' => array_get($this->received->details, '產品'),
            '{[formContent]}' => array_get($this->received, 'content'),

            '{[receivedUrl]}' => langRoute('admin.inbox-received.show', ['id' => $this->received->id]),
            '{[websitePhone]}' => array_get($this->webData->contact ?? [], 'phone', ''),
            '{[websiteEmail]}' => array_get($this->webData->contact ?? [], 'email', ''),
            '{[websiteName]}' => $this->webData->website_name,
            '{[websiteUrl]}' => $this->webData->system_url,
            'src="/' => 'src="'.$this->webData->system_url.'/',
        ]);

        $subject = str_replace($searches, $replaces, $this->notify->admin_subject);
        $preheader = str_replace($searches, $replaces, $this->notify->admin_preheader);
        $editor = str_replace($searches, $replaces, $this->notify->admin_editor);

        return $this
            ->subject($subject)
            ->view('MinmaxNotify::email.layouts.default',[
                'notifyData' => [
                    'subject' => $subject,
                    'preheader' => $preheader,
                    'editor' => $editor,
                ],
            ]);
    }
}
