<?php

namespace MeetupBundle\Infrastructure\Symfony;

use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class MeetupBundle
 * @package MeetupBundle\Infrastructure\Symfony
 */
class MeetupBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass($this->buildMappingCompilerPass());
    }

    public function buildMappingCompilerPass()
    {
        $entityDir = realpath(__DIR__.'/../Persistence/Doctrine/ORM/Mapping/Entity');
        $entityMappings = 'MeetupBundle\Domain\Model\Entity';

        $valueObjectDir = realpath(__DIR__.'/../Persistence/Doctrine/ORM/Mapping/ValueObject');
        $valueObjectMappings = 'MeetupBundle\Domain\Model\ValueObject';

        return DoctrineOrmMappingsPass::createYamlMappingDriver(
            [$entityDir => $entityMappings, $valueObjectDir => $valueObjectMappings],
            [],
            false,
            ['Model' => 'MeetupBundle\Domain\Model\Entity']
        );
    }
}
