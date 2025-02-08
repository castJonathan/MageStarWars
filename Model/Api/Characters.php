<?php
namespace JCastillo\StarWars\Model\Api;

use JCastillo\StarWars\Api\CharactersInterface;
use JCastillo\StarWars\Model\ResourceModel\CharacterTable\CollectionFactory as CharacterCollectionFactory;
use Psr\Log\LoggerInterface;
class Characters implements CharactersInterface
{
    protected $characterCollectionFactory;
    protected $logger;

    public function __construct(
        CharacterCollectionFactory $characterCollectionFactory,
        LoggerInterface $logger
    ) {
        $this->characterCollectionFactory = $characterCollectionFactory;
        $this->logger = $logger;
    }


    public function getList()
    {
        try {
            $collection = $this->characterCollectionFactory->create();
            $collection->addFieldToSelect(['entity_id', 'name', 'height', 'mass', 'hair_color', 'skin_color', 'homeworld']);

            return $collection->getItems();
        } catch (\Exception $exception) {
            $this->logger->error('Error retrieving characters: ' . $exception->getMessage());
            throw new \Magento\Framework\Exception\LocalizedException(__('Error retrieving characters'));
        }
    }
}
