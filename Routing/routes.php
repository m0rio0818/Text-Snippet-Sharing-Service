<?php

use Helpers\DatabaseHelper;
use Helpers\ValidationHelper;
use Response\HTTPRenderer;
use Response\Render\HTMLRenderer;
use Response\Render\JSONRenderer;

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
