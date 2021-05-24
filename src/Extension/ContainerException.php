<?php

declare(strict_types=1);

namespace Mattsmithdev\FakerSmallEnglish\Extension;

use Psr\Container\ContainerExceptionInterface;

/**
 * @experimental This class is experimental and does not fall under our BC promise
 */
final class ContainerException extends \RuntimeException implements ContainerExceptionInterface
{
}
