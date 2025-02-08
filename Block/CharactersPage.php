<?php
namespace JCastillo\StarWars\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use JCastillo\StarWars\Model\ResourceModel\CharacterTable\CollectionFactory;

class CharactersPage extends Template
{
    protected $_characterCollectionFactory;

    public function __construct(
        Context $context,
        CollectionFactory $characterCollectionFactory,
        array $data = []
    ) {
        $this->_characterCollectionFactory = $characterCollectionFactory;
        parent::__construct($context, $data);
    }

    public function getCharacters()
    {
        $collection = $this->_characterCollectionFactory->create();
        $collection->load();
        return $collection;
    }
}
