<?php

declare(strict_types=1);

namespace Mattsmithdev\FakerSmallEnglish\Extension;

use Mattsmithdev\FakerSmallEnglish\Generator;

/**
 * @experimental This interface is experimental and does not fall under our BC promise
 */
interface GeneratorAwareExtension extends Extension
{
    /**
     * This method MUST be implemented in such a way as to retain the
     * immutability of the extension, and MUST return an instance that has the
     * new Generator.
     */
    public function withGenerator(Generator $generator): self;
}
