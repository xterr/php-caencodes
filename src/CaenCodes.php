<?php

declare(strict_types=1);

namespace Xterr\CaenCodes;

use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * Class CaenCodes
 * @package Xterr\CaenCodes
 */
class CaenCodes extends AbstractDatabase
{
    public function __construct(string $baseDirectory, TranslatorInterface $translator = null)
    {
        parent::__construct($baseDirectory, CaenCode::class, $translator);
    }

    public function getByCodeAndVersion(string $code, float $version = CaenVersion::VERSION_2): ?CaenCode
    {
        return $this->_find('code', [$code, $version])[0] ?? null;
    }

    public function getByRawCodeAndVersion(string $rawCode, float $version = CaenVersion::VERSION_2): ?CaenCode
    {
        return $this->_find('rawCode', [$rawCode, $version])[0] ?? null;
    }

    public function getAllByVersion(float $version = CaenVersion::VERSION_2): array
    {
        return $this->_find('version', $version);
    }

    protected function _getIndexDefinition(): array
    {
        return [
            'code'    => ['code', 'version'],
            'rawCode' => ['rawCode', 'version'],
            'version' => ['version'],
        ];
    }
}
