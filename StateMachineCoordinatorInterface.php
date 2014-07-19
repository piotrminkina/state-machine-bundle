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

use PMD\StateMachineBundle\Process\DefinitionInterface;
use PMD\StateMachineBundle\Process\StateInterface;
use PMD\StateMachineBundle\Process\TransitionInterface;

/**
 * Interface StateMachineCoordinatorInterface
 * 
 * @author Piotr Minkina <projekty@piotrminkina.pl>
 * @package PMD\StateMachineBundle
 */
interface StateMachineCoordinatorInterface
{
    /**
     * @return DefinitionInterface
     */
    public function getDefinition();

    /**
     * @param string $name
     * @return StateInterface
     */
    public function getStateObject($name);

    /**
     * @param StateInterface $state
     * @param mixed $context
     * @return TransitionInterface[]
     */
    public function getAllowedTransitions(StateInterface $state, $context);

    /**
     * @param TransitionInterface $transition
     * @param mixed $context
     * @param mixed $data
     * @return mixed
     */
    public function complete(
        TransitionInterface $transition,
        $context,
        $data = null
    );

    /**
     * @return boolean
     */
    public function isCompleted();
}
