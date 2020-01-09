<?php

namespace App\Security\Authenticator;

use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Guard\AuthenticatorInterface;
use Symfony\Component\Security\Guard\Token\PostAuthenticationGuardToken;

class Guard2 extends Guard1 implements AuthenticatorInterface
{
    public function createAuthenticatedToken(UserInterface $user, $providerKey)
    {
        return new PostAuthenticationGuardToken($user, $providerKey, ['ROLE_2']);
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        throw new Exception('Forbidden');
    }
}
