<?php
/**
 * Date: 03.12.15
 *
 * @author Portey Vasil <portey@gmail.com>
 */

namespace Youshido\GraphQL\Definition;

use Youshido\GraphQL\Schema;
use Youshido\GraphQL\Type\Config\TypeConfigInterface;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class SchemaType extends AbstractObjectType
{

    /** @var  Schema */
    public static $schema;

    /**
     * @param $schema Schema
     */
    public function setSchema($schema)
    {
        self::$schema = $schema;
    }

    /**
     * @return Schema
     */
    public function getSchema()
    {
        return self::$schema;
    }

    public function resolve($value = null, $args = [])
    {
        return $this->getSchema();
    }

    /**
     * @return String type name
     */
    public function getName()
    {
        return '__Schema';
    }

    protected function build(TypeConfigInterface $config)
    {
        $config
            ->addField('queryType', new QueryType())
            ->addField('mutationType', new MutationType())
            ->addField('types', new QueryListType())
            ->addField('directives', new DirectiveListType());
    }
}