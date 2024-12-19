<?php

namespace Xterr\CaenCodes\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Xterr\CaenCodes\CaenCodesFactory;
use Xterr\CaenCodes\CaenDivision;
use Xterr\CaenCodes\CaenVersion;

class CaenDivisionsTest extends TestCase
{
    public function testIterator(): void
    {
        $caenCodesFactory = new CaenCodesFactory();
        $caenDivisions    = $caenCodesFactory->getDivisions();

        foreach ($caenDivisions as $caenDivision) {
            static::assertInstanceOf(
                CaenDivision::class,
                $caenDivision
            );
        }

        static::assertIsArray($caenDivisions->toArray());
        static::assertGreaterThan(0, count($caenDivisions));
    }

    public function testGetByCodeAndVersion(): void
    {
        $caenCodesFactory = new CaenCodesFactory();
        $caenDivision     = $caenCodesFactory->getDivisions()->getByCodeAndVersion('01', CaenVersion::VERSION_2);

        static::assertInstanceOf(CaenDivision::class, $caenDivision);

        static::assertEquals('01', $caenDivision->getCode());
        static::assertEquals(CaenVersion::VERSION_2, $caenDivision->getVersion());
        static::assertEquals(
            'Agricultura, vanatoare si servicii anexe',
            $caenDivision->getName()
        );
    }

    public function testGetAllByVersion(): void
    {
        $caenCodesFactory = new CaenCodesFactory();

        static::assertCount(
            88,
            $caenCodesFactory->getDivisions()->getAllByVersion(CaenVersion::VERSION_2)
        );

        static::assertCount(
            0,
            $caenCodesFactory->getDivisions()->getAllByVersion(1)
        );
    }

    public function testCount(): void
    {
        $caenCodesFactory = new CaenCodesFactory();
        static::assertEquals(88, $caenCodesFactory->getDivisions()->count());
    }
}
