<?php
namespace JCastillo\StarWars\Api;

interface CharactersInterface
{
/**
 * Get characters list
 *
 * @return \JCastillo\StarWars\Api\Data\CharacterInterface[]
 */
public function getList();

}
