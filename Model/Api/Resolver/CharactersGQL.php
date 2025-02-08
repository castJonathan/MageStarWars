<?php
namespace JCastillo\StarWars\Model\Api\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Authorization\Model\UserContextInterface;
use JCastillo\StarWars\Model\CharacterTableFactory;
use Psr\Log\LoggerInterface;


class CharactersGQL implements ResolverInterface
{
    protected $characterFactory;
    protected $userContext;
    protected $logger;
    public function __construct(
        CharacterTableFactory $characterFactory,
        UserContextInterface $userContext,
        LoggerInterface $logger
    )
    {
        $this->characterFactory = $characterFactory;
        $this->userContext = $userContext;
        $this->logger = $logger;
    }
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        try {
            if ($this->userContext->getUserType() != UserContextInterface::USER_TYPE_ADMIN) {
                throw new \Magento\Framework\GraphQl\Exception\GraphQlAuthorizationException(
                    __('Access denied. You need administrative rights to access this.')
                );
            }
            $characters = $this->characterFactory->create()->getCollection()->getItems();
            $result = [];

            foreach ($characters as $character) {
                $result[] = [
                    'entity_id' => $character->getId(),
                    'name' => $character->getName(),
                    'height' => $character->getHeight(),
                    'mass' => $character->getMass(),
                    'hair_color' => $character->getHairColor(),
                    'sking_color' => $character->getSkinColor(),
                    'homeworld' => $character->getHomeworld(),
                ];
            }

            return $result;
        } catch (GraphQlNoSuchEntityException $e) {
            // Registrando el error en el log
            $this->logger->error($e->getMessage());

            // Enviar respuesta genérica de error
            throw new \Magento\Framework\GraphQl\Exception\GraphQlGenericException(
                __('An error occurred while processing your request.')
            );
        } catch (\Exception $e) {
            // Registrando el error en el log
            $this->logger->error($e->getMessage());

            // Enviar respuesta genérica de error
            throw new \Magento\Framework\Exception\LocalizedException(
                __('An error occurred while processing your request.')
            );
        }
    }
}
