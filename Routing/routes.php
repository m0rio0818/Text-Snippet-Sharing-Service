<?php

use Helpers\ValidationHelper;
use Response\HTTPRenderer;
use Response\Render\HTMLRenderer;

return [
    '' => function (): HTTPRenderer {
        $validTime = ValidationHelper::getExpirationTime();
        $syntaxHighLight = ValidationHelper::getSyntaxHighlight();
        return new HTMLRenderer('component/topPage', [
            'validTime' => $validTime,
            'syntaxHighLight' => $syntaxHighLight,
        ]);
    }
];
