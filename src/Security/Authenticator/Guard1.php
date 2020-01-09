<?php

namespace App\Security\Authenticator;

use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\AuthenticatorInterface;
use Symfony\Component\Security\Guard\Token\PostAuthenticationGuardToken;

class Guard1 implements AuthenticatorInterface
{
    public function supports(Request $request)
    {
        return !$request->attributes->has('role');
    }

    public function getCredentials(Request $request)
    {
        return [];
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        return new User('Test user', null);
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        return true;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        $request->attributes->set('role', $token->getRoleNames()[0]);

        return null;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        return;
    }

    public function start(Request $request, AuthenticationException $authException = null)
    {
        throw new Exception('Unauthorized');
    }

    public function createAuthenticatedToken(UserInterface $user, $providerKey)
    {
        return new PostAuthenticationGuardToken($user, $providerKey, ['ROLE_1']);
    }

    public function supportsRememberMe()
    {
        return false;
    }
}
