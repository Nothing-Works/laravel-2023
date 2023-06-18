<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;
use function config;

class MailchimpNewsLetter implements INewsletter
{
    public function __construct(private readonly ApiClient $mailchimp)
    {
        $this->mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => config('services.mailchimp.server')
        ]);
    }

    public function subscribe(string $email, string $list = null)
    {
        $list ??= config('services.mailchimp.list_id');
        return $this->mailchimp->lists->addListMember($list, [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }
}
