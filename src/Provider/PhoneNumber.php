<?php

namespace Mattsmithdev\FakerSmallEnglish\Provider;

use Mattsmithdev\FakerSmallEnglish\Calculator\Luhn;

class PhoneNumber extends Base
{
    protected static $formats = [
        '+44(0)##########',
        '+44(0)#### ######',
        '+44(0)#########',
        '+44(0)#### #####',
        '0##########',
        '0#########',
        '0#### ######',
        '0#### #####',
        '0### ### ####',
        '0### #######',
        '(0####) ######',
        '(0####) #####',
        '(0###) ### ####',
        '(0###) #######',
    ];

    /**
     * An array of en_GB mobile (cell) phone number formats
     *
     * @var array
     */
    protected static $mobileFormats = [
        // Local
        '07#########',
        '07### ######',
        '07### ### ###',
    ];

    protected static $e164Formats = [
        '+44##########',
    ];

    /**
     * Return a en_GB mobile phone number
     *
     * @return string
     */
    public static function mobileNumber()
    {
        return static::numerify(static::randomElement(static::$mobileFormats));
    }


    /**
     * @example '555-123-546'
     */
    public function phoneNumber()
    {
        return static::numerify($this->generator->parse(static::randomElement(static::$formats)));
    }

    /**
     * @example +11134567890
     *
     * @return string
     */
    public function e164PhoneNumber()
    {
        return static::numerify($this->generator->parse(static::randomElement(static::$e164Formats)));
    }

    /**
     * International Mobile Equipment Identity (IMEI)
     *
     * @see http://en.wikipedia.org/wiki/International_Mobile_Station_Equipment_Identity
     * @see http://imei-number.com/imei-validation-check/
     *
     * @example '720084494799532'
     *
     * @return int $imei
     */
    public function imei()
    {
        $imei = (string) static::numerify('##############');
        $imei .= Luhn::computeCheckDigit($imei);

        return $imei;
    }
}
