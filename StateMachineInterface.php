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

/**
 * Interface StateMachineInterface
 * 
 * @author Piotr Minkina <projekty@piotrminkina.pl>
 * @package PMD\StateMachineBundle
 */
interface StateMachineInterface
{
    /**
     * @return DefinitionInterface
     */
    public function getDefinition();
}
