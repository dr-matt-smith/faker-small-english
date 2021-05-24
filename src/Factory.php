<?php

namespace Mattsmithdev\FakerSmallEnglish;

class Factory
{
    protected static $defaultProviders = ['Address', 'Barcode', 'Biased', 'Color', 'Company', 'DateTime', 'File', 'HtmlLorem', 'Image', 'Internet', 'Lorem', 'Medical', 'Miscellaneous', 'Payment', 'Person', 'PhoneNumber', 'Text', 'UserAgent', 'Uuid'];

    /**
     * Create a new generator
     *
     * @param string $locale
     *
     * @return Generator
     */
    public static function create()
    {
        $generator = new Generator();

        foreach (static::$defaultProviders as $provider) {
            $providerClassName = self::getProviderClassname($provider);
            $generator->addProvider(new $providerClassName($generator));
        }

        return $generator;
    }

    /**
     * @param string $provider
     *
     * @return string
     */
    protected static function getProviderClassname($provider)
    {
        if ($providerClass = self::findProviderClassname($provider)) {
            return $providerClass;
        }
        // fallback to default locale
        if ($providerClass = self::findProviderClassname($provider)) {
            return $providerClass;
        }
        // fallback to no locale
        if ($providerClass = self::findProviderClassname($provider)) {
            return $providerClass;
        }

        throw new \InvalidArgumentException(sprintf('Unable to find provider "%s"', $provider));
    }

    /**
     * @param string $provider
     *
     * @return string|null
     */
    protected static function findProviderClassname($provider)
    {
        $providerClass = 'Mattsmithdev\\FakerSmallEnglish\\' . sprintf('Provider\%s', $provider);

        if (class_exists($providerClass, true)) {
            return $providerClass;
        }

        return null;
    }
}
