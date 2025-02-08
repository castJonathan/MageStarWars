<?php

namespace JCastillo\StarWars\Model\ResourceModel\CharacterTable;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';
    /**
     * Define resource model and model
     */
    protected function _construct()
    {
        $this->_init(
            'JCastillo\StarWars\Model\CharacterTable',
            'JCastillo\StarWars\Model\ResourceModel\CharacterTable');
    }
}
