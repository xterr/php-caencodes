<?php

namespace Xterr\CaenCodes\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Xterr\CaenCodes\CaenCodesFactory;
use Xterr\CaenCodes\CaenGroup;
use Xterr\CaenCodes\CaenVersion;

class CaenGroupsTest extends TestCase
{
    public function testIterator(): void
    {
        $caenCodesFactory = new CaenCodesFactory();
        $caenGroups       = $caenCodesFactory->getGroups();

        foreach ($caenGroups as $caenGroup) {
            static::assertInstanceOf(
                CaenGroup::class,
                $caenGroup
            );
        }

        static::assertIsArray($caenGroups->toArray());
        static::assertGreaterThan(0, count($caenGroups));
    }

    public function testGetByCodeAndVersion(): void
    {
        $caenCodesFactory = new CaenCodesFactory();
        $caenGroup        = $caenCodesFactory->getGroups()->getByCodeAndVersion('011', CaenVersion::VERSION_2);

        static::assertInstanceOf(CaenGroup::class, $caenGroup);

        static::assertEquals('011', $caenGroup->getCode());
        static::assertEquals('011', $caenGroup->getRawCode());
        static::assertEquals(CaenVersion::VERSION_2, $caenGroup->getVersion());
        static::assertEquals('Cultivarea plantelor nepermanente', $caenGroup->getName());
    }

    public function testGetAllByVersion(): void
    {
        $caenCodesFactory = new CaenCodesFactory();

        static::assertCount(
            272,
            $caenCodesFactory->getGroups()->getAllByVersion(CaenVersion::VERSION_2)
        );

        static::assertCount(
            0,
            $caenCodesFactory->getGroups()->getAllByVersion(1)
        );
    }

    public function testCount(): void
    {
        $caenCodesFactory = new CaenCodesFactory();
        static::assertEquals(272, $caenCodesFactory->getGroups()->count());
    }
}
