<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;

abstract class AbstractApiController extends AbstractController
{
    protected function buildForm(string $type, $data = null, array $options = []) : FormInterface
    {
        return $this->container->get('form.factory')->createNamed('', $type, $data, $options);
    }
}