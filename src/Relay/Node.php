<?php
/**
 * Date: 10.05.16
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace Youshido\GraphQL\Relay;


class Node
{

    /**
     * @param $id
     *
     * @return array with type and id element
     */
    public static function fromGlobalId($id)
    {
        return explode(':', base64_decode($id));
    }

    /**
     * @param $typeName string name of type
     * @param $id       int local id
     *
     * @return string global id
     */
    public static function toGlobalId($typeName, $id)
    {
        return base64_encode(implode(':', [$typeName, $id]));
    }
}
