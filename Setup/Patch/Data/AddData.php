<?php
namespace JCastillo\StarWars\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Module\Setup\Migration;
use Magento\Framework\Setup\ModuleDataSetupInterface;
class AddData implements DataPatchInterface
{
    private $starWarsFactory;

    public function __construct(
        \JCastillo\StarWars\Model\CharacterTableFactory $starWarsFactory
    ) {
        $this->starWarsFactory = $starWarsFactory;
    }

    public function apply()
    {
        $sampleData = [
            [
                'name' => 'Luke Skywalker',
                'height' => '172',
                'mass' => '77',
                'hair_color' => 'blond',
                'skin_color' => 'fair',
                'homeworld' => 'Tatooine',
                'films' => 'A New Hope, The Empire Strikes Back, Return of the Jedi'
            ],
            [
                'name' => 'Darth Vader',
                'height' => '202',
                'mass' => '136',
                'hair_color' => 'none',
                'skin_color' => 'white',
                'homeworld' => 'Tatooine',
                'films' => 'A New Hope, The Empire Strikes Back, Return of the Jedi, Revenge of the Sith'
            ]
        ];
        foreach ($sampleData as $data) {
            $this->starWarsFactory->create()->setData($data)->save();
        }
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }

}
