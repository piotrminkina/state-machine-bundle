<?php

/*
 * This file is part of the PMD package.
 *
 * (c) Piotr Minkina <projekty@piotrminkina.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PMD\Bundle\StateMachineBundle\Process\Decorator;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\SecurityContextInterface;
use PMD\Bundle\StateMachineBundle\Process\CoordinatorInterface;
use PMD\Bundle\StateMachineBundle\Process\TokenInterface;
use PMD\Bundle\StateMachineBundle\Security\Authorization\Voter\AbstractTokenVoter;
use PMD\Bundle\StateMachineBundle\StateMachineInterface;

/**
 * Class GuardCoordinatorDecorator
 * 
 * @author Piotr Minkina <projekty@piotrminkina.pl>
 * @package PMD\Bundle\StateMachineBundle\Process\Decorator
 */
class GuardCoordinatorDecorator extends AbstractCoordinatorDecorator
{
    /**
     * @var SecurityContextInterface
     */
    protected $security;

    /**
     * @param CoordinatorInterface $coordinator
     * @param SecurityContextInterface $security
     */
    public function __construct(
        CoordinatorInterface $coordinator,
        SecurityContextInterface $security
    ) {
        parent::__construct($coordinator);

        $this->security = $security;
    }

    /**
     * @inheritdoc
     */
    public function getTokens(StateMachineInterface $instance, $context)
    {
        $tokens = parent::getTokens($instance, $context);
        $limited = array();

        foreach ($tokens as $name => $token) {
            if ($this->security->isGranted(AbstractTokenVoter::CREATE, $token)) {
                $limited[$name] = $token;
            }
        }

        return $limited;
    }

    /**
     * @inheritdoc
     */
    public function consume(TokenInterface $token, Request $request)
    {
        if (!$this->security->isGranted(AbstractTokenVoter::CONSUME, $token)) {
            throw new AccessDeniedException();
        }

        return parent::consume($token, $request);
    }
}
