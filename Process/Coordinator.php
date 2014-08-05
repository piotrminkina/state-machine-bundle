<?php

/*
 * This file is part of the PMD package.
 *
 * (c) Piotr Minkina <projekty@piotrminkina.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PMD\Bundle\StateMachineBundle\Process;

use Symfony\Component\HttpFoundation\Request;
use PMD\Bundle\StateMachineBundle\Process\Definition\TransitionInterface;
use PMD\Bundle\StateMachineBundle\StateMachineInterface;

/**
 * Class Coordinator
 * 
 * @author Piotr Minkina <projekty@piotrminkina.pl>
 * @package PMD\Bundle\StateMachineBundle\Process
 */
class Coordinator implements CoordinatorInterface
{
    /**
     * @var DefinitionInterface
     */
    protected $definition;

    /**
     * @param DefinitionInterface $definition
     */
    public function __construct(DefinitionInterface $definition)
    {
        $this->definition = $definition;
    }

    /**
     * @inheritdoc
     */
    public function getDefinition()
    {
        return $this->definition;
    }

    /**
     * @inheritdoc
     */
    public function getState($name)
    {
        $states = $this->definition->getStates();
        $state = $states[$name];

        return $state;
    }

    /**
     * @inheritdoc
     */
    public function getTokens(StateMachineInterface $instance, $context)
    {
        $tokens = array();
        $state = $instance->getState();

        foreach ($this->definition->getTransitions() as $transition) {
            if ($state === $transition->getSourceState()) {
                $name = $transition->getLabel();
                $tokens[$name] = $this->createToken(
                    $instance,
                    $transition,
                    $context
                );
            }
        }

        return $tokens;
    }

    /**
     * @inheritdoc
     */
    public function consume(TokenInterface $token, Request $request)
    {
        if ($token->isConsumed()) {
            throw new \Exception(
                sprintf(
                    'Token "%s" is consumed, cannot consume tokens twice',
                    $token->getName()
                )
            );
        }
        $token->setConsumed(true);

        return null;
    }

    /**
     * @param StateMachineInterface $instance
     * @param TransitionInterface $transition
     * @param mixed $context
     * @return Token
     */
    protected function createToken(
        StateMachineInterface $instance,
        TransitionInterface $transition,
        $context
    ) {
        $token = new Token();
        $token
            ->setName($transition->getName())
            ->setConsumed(false)
            ->setContext($context)
            ->setInstance($instance)
            ->setDefinition($this->definition)
            ->setTransition($transition)
            ->setTargetState($transition->getTargetState());

        return $token;
    }
}
