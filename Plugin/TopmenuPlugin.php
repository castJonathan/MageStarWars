<?php
namespace JCastillo\StarWars\Plugin;

class TopmenuPlugin
{
    public function afterGetHtml(\Magento\Theme\Block\Html\Topmenu $subject, $html)
    {
        $buttonHtml = '<li class="level0 nav-6 last level-top ui-menu-item"><a href="' . $subject->getUrl('starwars/index/characterspage') . '" class="level-top ui-corner-all" aria-haspopup="true" tabindex="-1"><span class="ui-menu-icon ui-icon ui-icon-carat-1-e"></span><span>Ver Página de Personajes</span></a></li>';
        return $html . $buttonHtml;
    }
}
