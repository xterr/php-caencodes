<?php

declare(strict_types=1);

namespace Xterr\CaenCodes;

use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * Class CaenSections
 * @package Xterr\CaenCodes
 */
class CaenSections extends AbstractDatabase
{
    public function __construct(string $baseDirectory, TranslatorInterface $translator = null)
    {
        parent::__construct($baseDirectory, CaenSection::class, $translator);
    }

    public function getByCodeAndVersion(string $code, float $version = CaenVersion::VERSION_2): ?CaenSection
    {
        $entries = $this->_find('code', [$code, $version]);

        return $entries[0] ?? null;
    }

    public function getAllByVersion(float $version = CaenVersion::VERSION_2): array
    {
        return $this->_find('version', $version);
    }

    protected function _getIndexDefinition(): array
    {
        return [
            'code'    => ['code', 'version'],
            'version' => ['version'],
        ];
    }
}
