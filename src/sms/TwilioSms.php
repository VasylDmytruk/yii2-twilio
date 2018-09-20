<?php

namespace autoxloo\yii2\twilio\sms;

use Twilio\Rest\Client;
use yii\base\Component;
use yii\base\InvalidConfigException;

/**
 * Class TwilioSms Yii2 wrap of Twilio sms PHP SDK
 * @see https://www.twilio.com/docs/libraries/php
 * Example:
 *
 * ```
 * $twilio->sendSms(
 *      '+15558675309',                 // The number you'd like to send the message to
 *      [
 *          'from' => '+15017250604',   // A Twilio phone number you purchased at twilio.com/console
 *          'body' => 'Hello',          // the body of the text message you'd like to send
 *      ]
 * );
 * ```
 */
class TwilioSms extends Component
{
    const OPTION_FROM = 'from';
    const OPTION_BODY = 'body';

    /**
     * @var string Your Account SID from twilio.com/console.
     */
    public $sid;
    /**
     * @var string Your Auth Token from twilio.com/console.
     */
    public $token;

    /**
     * @var Client
     */
    protected $twilioClient;


    /**
     * @inheritdoc
     * @throws InvalidConfigException
     * @throws \Twilio\Exceptions\ConfigurationException
     */
    public function init()
    {
        parent::init();

        if (empty($this->sid)) {
            throw new InvalidConfigException('Param "sid" is required');
        }
        if (empty($this->token)) {
            throw new InvalidConfigException('Param "token" is required');
        }

        $this->twilioClient = new Client($this->sid, $this->token);
    }

    /**
     * Sends sms via twilio. Example:
     *
     * ```
     * $twilio->sendSms(
     *      '+15558675309',                 // The number you'd like to send the message to
     *      [
     *          TwilioSms::OPTION_FROM => '+15017250604',   // A Twilio phone number you purchased at twilio.com/console
     *          TwilioSms::OPTION_BODY => 'Hello',          // the body of the text message you'd like to send
     *      ]
     * );
     * ```
     *
     * @param string $to The number you'd like to send the message to.
     * @param array $options Optional Arguments for \Twilio\Rest\Client
     * @see \Twilio\Rest\Api\V2010\Account\MessageList::create()
     *
     * @return \Twilio\Rest\Api\V2010\Account\MessageInstance
     */
    public function sendSms($to, array $options)
    {
        return $this->twilioClient->messages->create($to, $options);
    }
}
