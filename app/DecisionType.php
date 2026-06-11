<?php

namespace App;

enum DecisionType: string
{
    case BINARY = "binary" ;
    case MULTI = "multi";

    public function label(): string 
    {
        return match($this) {
            self::BINARY => "",
            self::MULTI => "",
        };
    }

}
