Yii2 wrap of Twilio sms PHP SDK
=========================
Yii2 wrap of [Twilio sms PHP SDK](https://www.twilio.com/docs/libraries/php)

>Note: This package is not supported properly

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist autoxloo/yii2-twilio "*"
```

or

```
composer require --prefer-dist autoxloo/yii2-twilio "*"
```

or add

```
"autoxloo/yii2-twilio": "*"
```

to the require section of your `composer.json` file.

Config
------

In your application config add:

```php
// ...
'components' => [
        // ...
        'twilioSms' => [
            'class' => \autoxloo\yii2\twilio\sms\TwilioSms::class,
            'sid' => 'ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',          // Your Account Sid from twilio.com/user/account
            'token' => 'your_auth_token',                           // Your Account Auth Token from twilio.com/user/account
        ],
],
```

Usage
-----

Once the extension is installed, simply use it in your code by:

```php
\Yii::$app->twilioSms->sendSms(
    '+15558675309',                                         // the number you'd like to send the message to
    [
        TwilioSms::OPTION_FROM => '+15017250604',                           // A Twilio phone number you purchased at twilio.com/console
        TwilioSms::OPTION_BODY => 'Hey Jenny! Good luck on the bar exam!',  // the body of the text message you'd like to send
    ]
);
```
