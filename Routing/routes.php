<?php

use Helpers\DatabaseHelper;
use Helpers\ValidationHelper;
use Response\HTTPRenderer;
use Response\Render\HTMLRenderer;
use Response\Render\JSONRenderer;

return [
    'random/part' => function (): HTTPRenderer {

        return new HTMLRenderer('component/random-part', ['part' => $part]);
    }
];
