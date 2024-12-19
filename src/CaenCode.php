<?php

declare(strict_types=1);

namespace Xterr\CaenCodes;

/**
 * Class CaenCode
 * @package Xterr\CaenCodes
 */
class CaenCode
{
    /**
     * @var string
     */
    private $section;

    /**
     * @var string
     */
    private $division;

    /**
     * @var string
     */
    private $group;

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
    private $name;

    /**
     * @var float
     */
    private $version = CaenVersion::VERSION_2;

    public function getSection(): string
    {
        return $this->section;
    }

    public function getDivision(): string
    {
        return $this->division;
    }

    public function getGroup(): string
    {
        return $this->group;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getRawCode(): string
    {
        return $this->rawCode;
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
