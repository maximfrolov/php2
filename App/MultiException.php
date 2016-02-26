<?php

namespace App;

/**
 * Class MultiException
 * @package App
 */
class MultiException
    extends \Exception
    implements \ArrayAccess, \Iterator
{

    use TCollection;

}