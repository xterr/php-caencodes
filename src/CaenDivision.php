<?php

declare(strict_types=1);

namespace Xterr\CaenCodes;

/**
 * Class CaenDivision
 * @package Xterr\CaenCodes
 */
class CaenDivision
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
     * @var string
     */
    private $section;

    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $version = CaenVersion::VERSION_2;

    public function getCode(): string
    {
        return $this->code;
    }

    public function getRawCode(): string
    {
        return $this->rawCode;
    }

    public function getSection(): string
    {
        return $this->section;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getVersion(): float
    {
        return $this->version;
    }
}
