<?php

namespace App;

/**
 * Class Collection реализует
 * интерфейсы ArrayAccess и Iterator.
 * @package App
 */
class Collection
    implements \ArrayAccess, \Iterator
{

    use TCollection;

}