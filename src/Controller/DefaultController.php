<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    public function a(Request $request)
    {
        return new Response($request->attributes->get('role'));
    }

    public function b(Request $request)
    {
        return new Response($request->attributes->get('role'));
    }
}
