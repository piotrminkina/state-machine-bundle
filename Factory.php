<?php

/*
 * This file is part of the PMDStateMachineBundle package.
 *
 * (c) Piotr Minkina <projekty@piotrminkina.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PMD\StateMachineBundle;

use PMD\StateMachineBundle\Model\StatefulInterface;

/**
 * Class Factory
 * 
 * @author Piotr Minkina <projekty@piotrminkina.pl>
 * @package PMD\StateMachineBundle
 */
class Factory implements FactoryInterface
{
    /**
     * @var ProcessRegistryInterface
     */
    protected $registry;

    /**
     * @param ProcessRegistryInterface $registry
     */
    public function __construct(ProcessRegistryInterface $registry)
    {
        $this->registry = $registry;
    }

    /**
     * @inheritdoc
     */
    public function create($name, StatefulInterface $object)
    {
        $definition = $this->createDefinition($name);
        $stateMachine = new StateMachine($object, $definition);

        return $stateMachine;
    }

    /**
     * @inheritdoc
     */
    public function createDefinition($name)
    {
        if (!$this->registry->hasDefinition($name)) {
            throw new \Exception(
                sprintf('Cannot create State Machine with definition named "%s", because definition is unknown', $name)
            );
        }

        return $this->registry->getDefinition($name);
    }
}
