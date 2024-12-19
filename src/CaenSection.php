<?php

declare(strict_types=1);

namespace Xterr\CaenCodes;

/**
 * Class CaenSection
 * @package Xterr\CaenCodes
 */
class CaenSection
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $rawCode;

    /**
     * @var float
     */
    private $version = CaenVersion::VERSION_2;

    /**
     * @var string
     */
    private $name;

    public function getCode(): string
    {
        return $this->code;
    }

    public function getRawCode(): string
    {
        return $this->rawCode;
    }

    public function getVersion(): float
    {
        return $this->version;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
