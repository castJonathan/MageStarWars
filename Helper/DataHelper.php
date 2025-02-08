<?php

namespace JCastillo\StarWars\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use JCastillo\StarWars\Model\CharacterTableFactory as CharacterFactory;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\HTTP\Client\Curl;
class DataHelper extends AbstractHelper
{
    protected $characterFactory;
    protected $curl;
    protected $url="https://swapi.dev/api/people/";

    public function __construct(
        Context $context,
        CharacterFactory $characterFactory,
        Curl $curl
    ) {
        parent::__construct($context);
        $this->characterFactory = $characterFactory;
        $this->curl = $curl;
    }

    public function fetchAndStoreCharacters()
    {
        try {
            $this->curl->get($this->url);
            $response = json_decode($this->curl->getBody(), true);

            if (isset($response['results'])) {
                foreach ($response['results'] as $characterData) {
                    $character = $this->characterFactory->create();
                    $character->setData([
                        'name' => $characterData['name'],
                        'height' => $characterData['height'],
                        'mass' => $characterData['mass'],
                        'hair_color' => $characterData['hair_color'],
                        'skin_color' => $characterData['skin_color'],
                        'homeworld' => $this->getPlanetName($characterData['homeworld']),
                        'films' => implode(', ', $characterData['films'])
                    ]);
                    $character->save();
                }
                return true;
            } else {
                throw new \Exception("Sorry, we have some problem, please try again later.");
                return false;
            }
        } catch (\Exception $e) {
            $this->logger->critical('Error fetching Star Wars characters: ' . $e->getMessage());
            return false;
        }
    }

    private function getPlanetName($planetUrl)
    {
        $this->curl->get($planetUrl);
        $planetData = json_decode($this->curl->getBody(), true);
        return $planetData['name'] ?? 'Unknown';
    }
}
