<?php

/*
 * This file is part of the PMDStateMachineBundle package.
 *
 * (c) Piotr Minkina <projekty@piotrminkina.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PMD\StateMachineBundle\Process\Registry;

use PMD\StateMachineBundle\Process\DefinitionInterface;

/**
 * Interface DefinitionRegistryInterface
 * 
 * @author Piotr Minkina <projekty@piotrminkina.pl>
 * @package PMD\StateMachineBundle
 */
interface DefinitionRegistryInterface
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
}
