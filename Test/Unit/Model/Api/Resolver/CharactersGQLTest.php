<?php

use PHPUnit\Framework\TestCase;
use JCastillo\StarWars\Model\Api\Resolver\CharactersGQL;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\Resolver\ContextInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Authorization\Model\UserContextInterface;
use Psr\Log\LoggerInterface;
use JCastillo\StarWars\Model\CharacterTableFactory;

class CharactersGQLTest extends TestCase
{
    private $resolver;
    private $userContextMock;
    private $loggerMock;
    private $characterFactoryMock;
    private $fieldMock;
    private $contextMock;
    private $resolveInfoMock;

    protected function setUp(): void
    {
        $this->userContextMock = $this->createMock(UserContextInterface::class);
        $this->loggerMock = $this->createMock(LoggerInterface::class);
        $this->characterFactoryMock = $this->createMock(CharacterTableFactory::class);
        $this->fieldMock = $this->createMock(Field::class);
        $this->contextMock = $this->createMock(ContextInterface::class);
        $this->resolveInfoMock = $this->createMock(ResolveInfo::class);

        $this->resolver = new CharactersGQL(
            $this->characterFactoryMock,
            $this->userContextMock,
            $this->loggerMock
        );
    }

    public function testAccessDeniedForNonAdminUsers(): void
    {
        $this->userContextMock->method('getUserType')
            ->willReturn(UserContextInterface::USER_TYPE_CUSTOMER);

        $this->expectException(GraphQlAuthorizationException::class);

        $this->resolver->resolve(
            $this->fieldMock,
            $this->contextMock,
            $this->resolveInfoMock,
            null, // Replace with actual value if needed
            null  // Replace with actual value if needed
        );
    }

    // Más pruebas...
}
