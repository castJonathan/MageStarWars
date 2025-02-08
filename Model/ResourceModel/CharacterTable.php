<?php
namespace JCastillo\StarWars\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class CharacterTable extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('jcastillo_starwars_character', 'entity_id');
    }
}
