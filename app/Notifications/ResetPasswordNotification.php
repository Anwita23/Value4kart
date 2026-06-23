<?php

namespace App\Notifications;

use App\Notifications\Channel\AdminDatabaseChannel;
use App\Notifications\Channel\SmsChannel;
use App\Services\Mail\UserResetPasswordMailService;
use App\Traits\NotificationTrait;
use Illuminate\Bus\Queueable;

class ResetPasswordNotification extends Notification
{
    use NotificationTrait;
    use Queueable;

    private $request;

    /**
     * Notification Label
     */
    public static $label = 'Reset Password';

    public static $user;

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
     * Send only via the channel used for the request: email → mail only, phone → SMS only.
     *
     * @return array<int, string>
     */
    public function setVia($notifiable)
    {
        self::$user = $notifiable;

        $requestByEmail = $this->getRequestValue('email');
        $requestByPhone = $this->getRequestValue('phone');

        $baseChannels = ['database', AdminDatabaseChannel::class];

        if ($requestByPhone && ! $requestByEmail) {
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
        return (new UserResetPasswordMailService())->send($this->request);
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
            'message' => 'You have requested to reset the password of your account.',
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
            'message' => "The password for the account belonging to {$notifiable->name} has been requested to reset.",
        ];
    }

    /**
     * Get the SMS representation of the notification.
     */
    public function toSms(object $notifiable): array
    {
        return [
            'to' => $notifiable->phone,
            'message' => $this->getSmsData('reset-password'),
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
            '{logo}' => '',
            '{verification_url}' => route('site.password.reset', ['token' => $this->request->token]),
            '{company_name}' => preference('company_name'),
            '{verification_otp}' => $this->request->otp,
            '{support_mail}' => preference('company_email'),
            '{user_name}' => self::$user->name,
            '{otp_active}' => '',
            '{token_active}' => '',
            '{token_otp_active}' => '',
        ];

        return str_replace(array_keys($data), $data, $body);
    }
}
