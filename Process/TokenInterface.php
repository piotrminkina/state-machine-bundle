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
 * Class Token
 *
 * @author Piotr Minkina <projekty@piotrminkina.pl>
 * @package PMD\StateMachineBundle\Process
 */
interface TokenInterface extends TokenReadInterface, TokenWriteInterface
{
}
