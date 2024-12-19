<?php

namespace Xterr\CaenCodes\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Xterr\CaenCodes\CaenCodesFactory;
use Xterr\CaenCodes\CaenSection;
use Xterr\CaenCodes\CaenVersion;

class CaenSectionsTest extends TestCase
{
    public function testIterator(): void
    {
        $caenCodesFactory = new CaenCodesFactory();
        $caenSections     = $caenCodesFactory->getSections();

        foreach ($caenSections as $caenSection) {
            static::assertInstanceOf(
                CaenSection::class,
                $caenSection
            );
        }

        static::assertIsArray($caenSections->toArray());
        static::assertGreaterThan(0, count($caenSections));
    }

    public function testGetByCodeAndVersion(): void
    {
        $caenCodesFactory = new CaenCodesFactory();
        $caenSection      = $caenCodesFactory->getSections()->getByCodeAndVersion('A', CaenVersion::VERSION_2);

        static::assertInstanceOf(CaenSection::class, $caenSection);

        static::assertEquals('A', $caenSection->getCode());
        static::assertEquals(CaenVersion::VERSION_2, $caenSection->getVersion());
        static::assertEquals('Agricultura, Silvicultura si Pescuit', $caenSection->getName());
    }

    public function testGetAllByVersion(): void
    {
        $caenCodesFactory = new CaenCodesFactory();

        static::assertCount(
            21,
            $caenCodesFactory->getSections()->getAllByVersion(CaenVersion::VERSION_2)
        );

        static::assertCount(
            0,
            $caenCodesFactory->getSections()->getAllByVersion(1)
        );
    }

    public function testCount(): void
    {
        $caenCodesFactory = new CaenCodesFactory();
        static::assertEquals(21, $caenCodesFactory->getSections()->count());
    }
}
