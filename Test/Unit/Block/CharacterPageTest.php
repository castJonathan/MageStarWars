<?php

namespace JCastillo\StarWars\Test\Unit\Block;

use JCastillo\StarWars\Block\CharactersPage;
use Magento\Framework\View\Element\Template\Context;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use JCastillo\StarWars\Model\ResourceModel\CharacterTable\CollectionFactory;

class CharacterPageTest extends TestCase
{
    private CharactersPage $object;

    private MockObject $context;
    private MockObject $characterCollectionFactory;

    protected function setUp(): void
    {
        $this->context = $this->getMockForAbstractClass(
            Context::class,
            [],
            '',
            false,
            false,
            true,
            []
        );

        $this->characterCollectionFactory = $this->getMockBuilder(CollectionFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $characterCollectionMock = $this->createMock(\JCastillo\StarWars\Model\ResourceModel\CharacterTable\Collection::class);
        $characterCollectionMock->method('load')->willReturnSelf();
        $characterCollectionMock->method('getItems')->willReturn([]);

        $this->characterCollectionFactory->method('create')->willReturn($characterCollectionMock);

        $this->object = new CharactersPage(
            $this->context,
            $this->characterCollectionFactory
        );
    }
    public function testGetCharacters(): void
    {
        $characters = $this->object->getCharacters();
        $this->assertEmpty($characters, 'Characters is empty.');
    }

}
