<?php

/*
 * This file is part of the PMD package.
 *
 * (c) Piotr Minkina <projekty@piotrminkina.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PMD\Bundle\StateMachineBundle\Process\Definition;

/**
 * Class Transition
 * 
 * @author Piotr Minkina <projekty@piotrminkina.pl>
 * @package PMD\Bundle\StateMachineBundle\Process\Definition
 */
class Transition implements TransitionInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var string
     */
    protected $method;

    /**
     * @var StateInterface
     */
    protected $sourceState;

    /**
     * @var StateInterface
     */
    protected $targetState;

    /**
     * @inheritdoc
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @inheritdoc
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @inheritdoc
     */
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @inheritdoc
     */
    public function setSourceState(StateInterface $sourceState)
    {
        $this->sourceState = $sourceState;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getSourceState()
    {
        return $this->sourceState;
    }

    /**
     * @inheritdoc
     */
    public function setTargetState(StateInterface $targetState)
    {
        $this->targetState = $targetState;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getTargetState()
    {
        return $this->targetState;
    }
}
