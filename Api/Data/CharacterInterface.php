<?php
namespace JCastillo\StarWars\Api\Data;

interface CharacterInterface
{
    /**
     * Get entity ID
     *
     * @return int
     */
    public function getEntityId();

    /**
     * Get character name
     *
     * @return string
     */
    public function getName();

    /**
     * Get character height
     *
     * @return string
     */
    public function getHeight();

    /**
     * Get character mass
     *
     * @return string
     */
    public function getMass();

    /**
     * Get character hair color
     *
     * @return string
     */
    public function getHairColor();

    /**
     * Get character skin color
     *
     * @return string
     */
    public function getSkinColor();

    /**
     * Get character homeworld
     *
     * @return string
     */
    public function getHomeworld();
}
