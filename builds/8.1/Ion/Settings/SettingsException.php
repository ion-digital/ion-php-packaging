<?php
/*
 * See license information at the package root in LICENSE.md
 */
namespace Ion\Settings;

/**
 * Description of PackageException
 *
 * @author Justus
 */
use Exception;
use Throwable;
use Ion\PackageException;
class SettingsException extends PackageException implements SettingsExceptionInterface
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}