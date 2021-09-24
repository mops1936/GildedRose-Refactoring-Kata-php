<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function itemsDataProvider(): array
    {
        return [
            [[new Item('Conjured Mana Cake', 3, 6)], [4]],
            [[new Item('Conjured Mana Cake', 3, 2)], [0]],
            [[new Item('Conjured Mana Cake', 3, 1)], [0]],
            [[new Item('Conjured Mana Cake', -1, 6)], [2]],
            [[new Item('Conjured Mana Cake', -1, 2)], [0]],
            [[new Item('Conjured Mana Cake', -1, 0)], [0]]
        ];
    }

    /**
     * @dataProvider itemsDataProvider
     * @param $items Item[]
     * @param $expected array
     */
    public function testUpdateQuality(array $items, array $expected): void
    {
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame($expected, array_column($items, 'quality'));
    }
}
