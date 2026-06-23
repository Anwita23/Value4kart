<?php

namespace App\Notifications;

use App\Notifications\Channel\AdminDatabaseChannel;
use App\Notifications\Channel\SmsChannel;
use App\Services\Mail\UserSetPasswordMailService;
use App\Traits\NotificationTrait;
use Illuminate\Bus\Queueable;

class UserPasswordSetNotification extends Notification
{
    use NotificationTrait;
    use Queueable;

    private $request;

    /**
     * Notification Label
     */
    public static $label = 'User Password Set';

    /**
     * Image
     *
     * @var string
     */
    public static $image = 'public/frontend/img/password.png';

    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Get the notification's delivery channels.
     * Send only via the channel used for password reset: email → mail only, phone → SMS only.
     *
     * @return array<int, string>
     */
    public function setVia($notifiable)
    {
        $resetVia = $this->getRequestValue('reset_via');

        $baseChannels = ['database', AdminDatabaseChannel::class];

        if ($resetVia === 'phone') {
            return array_merge([SmsChannel::class], $baseChannels);
        }

        return array_merge(['mail'], $baseChannels);
    }

    /**
     * Get a value from the request (supports object or array).
     *
     * @param  string  $key
     * @return mixed
     */
    private function getRequestValue(string $key)
    {
        if (is_array($this->request)) {
            return $this->request[$key] ?? null;
        }

        return $this->request->{$key} ?? null;
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable)
    {
        return (new UserSetPasswordMailService())->send($this->request);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'id' => $notifiable->id,
            'label' => static::$label,
            'url' => '',
            'message' => 'Your password has been reset successfully.',
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toAdmin(object $notifiable): array
    {
        return [
            'id' => $notifiable->id,
            'label' => static::$label,
            'url' => route('users.edit', ['id' => $notifiable->id]),
            'message' => "The password for {$notifiable->name} has been reset successfully.",
        ];
    }

    /**
     * Get the SMS representation of the notification.
     */
    public function toSms(object $notifiable): array
    {
        return [
            'to' => $notifiable->phone,
            'message' => $this->getSmsData('new-password-set'),
        ];
    }

    /**
     * Replace SMS variables in the given SMS body.
     *
     * @param  string  $body
     * @return string
     */
    public function replaceSmsVariables($body)
    {
        $data = [
            '{user_name}' => $this->request->user_name,
            '{user_id}' => $this->request->email,
            '{company_url}' => route('site.login'),
            '{company_name}' => preference('company_name'),
            '{support_mail}' => preference('company_email'),
            '{logo}' => '',
        ];

        return str_replace(array_keys($data), $data, $body);
    }
}
