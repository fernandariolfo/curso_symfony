<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;
use App\Entity\Product;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use FOS\RestBundle\Serializer\Serializer;


/**
 * @Rest\Route("/api")
 */

class ApiController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/productos", name="productos")
     */
    Public function prueba_usuarios(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $productos = $em->getRepository(Product::class)->findAll();

        foreach($productos as $producto) {
            $rawResponse['rows'][] = array(
                'id' => $producto->getId(),
                'nombre' => $producto->getNombre(),
                'categoria' => $producto->getCategoria()->getNombre(),
            );
        };
        
        return new JsonResponse($rawResponse['rows']);

    }

}