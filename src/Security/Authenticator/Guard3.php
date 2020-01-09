<?php

namespace App\Security\Authenticator;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Guard\AuthenticatorInterface;

class Guard3 extends Guard2 implements AuthenticatorInterface
{
    public function checkCredentials($credentials, UserInterface $user)
    {
        return false;
    }
}
