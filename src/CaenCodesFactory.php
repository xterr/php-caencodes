<?php

namespace Xterr\CaenCodes;

use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * Class CaenCodesFactory
 * @package Xterr\CaenCodes
 */
class CaenCodesFactory
{
    /**
     * @var string
     */
    private $baseDirectory;

    /**
     * @var TranslatorInterface
     */
    private $translator;

    public function __construct(string $baseDirectory = null, TranslatorInterface $translator = null)
    {
        $this->baseDirectory = $baseDirectory ?? __DIR__ . '/../Resources';
        $this->translator    = $translator;
    }

    public function getCodes(): CaenCodes
    {
        return new CaenCodes($this->baseDirectory, $this->translator);
    }

    public function getSections(): CaenSections
    {
        return new CaenSections($this->baseDirectory, $this->translator);
    }

    public function getDivisions(): CaenDivisions
    {
        return new CaenDivisions($this->baseDirectory, $this->translator);
    }

    public function getGroups(): CaenGroups
    {
        return new CaenGroups($this->baseDirectory, $this->translator);
    }
}
