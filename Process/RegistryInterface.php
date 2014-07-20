<?php

/*
 * This file is part of the PMDStateMachineBundle package.
 *
 * (c) Piotr Minkina <projekty@piotrminkina.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PMD\StateMachineBundle\Process;

/**
 * Interface RegistryInterface
 * 
 * @author Piotr Minkina <projekty@piotrminkina.pl>
 * @package PMD\StateMachineBundle\Process
 */
interface RegistryInterface
{
    /**
     * @param string $name
     * @return DefinitionInterface
     */
    public function getDefinition($name);

    /**
     * @param string $name
     * @return boolean
     */
    public function hasDefinition($name);
    
    /**
     * @param string $name
     * @return CoordinatorInterface
     */
    public function getCoordinator($name);

    /**
     * @param string $name
     * @return boolean
     */
    public function hasCoordinator($name);
}
