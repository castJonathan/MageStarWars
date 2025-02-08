<?php
namespace JCastillo\StarWars\Model;

use Magento\Framework\Model\AbstractModel;

class CharacterTable extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\JCastillo\StarWars\Model\ResourceModel\CharacterTable::class);
    }
}
