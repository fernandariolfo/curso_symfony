<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;
use App\Entity\Product;
use App\Entity\User;
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

     /**
     * @Rest\Post("/login", name="login")
     * @Rest\RequestParam(name="username")
     * @Rest\RequestParam(name="password")
     * @param Request $request
     * @return Response
     */

    Public function login(Request $request)
    {
        $username = $request->request->get('username');
        $password = $request->request->get('password');

        // $usuario = new User();
        // $usuario->setUsername($username);
        // $password_hash = password_hash($password, PASSWORD_DEFAULT);
        // $usuario->setPassword($password_hash);
        // $em = $this->getDoctrine()->getManager();
        // $em->persist($usuario);
        // $em->flush();

        $em = $this->getDoctrine()->getRepository(User::class);
        $usuario_logeado = $em->findOneBy([
            "username" => $username,
            "password" => $password
        ]);

        if(!empty($usuario_logeado)){
            $res = ["estado_acceso" => 'Usuario logueado'];
        }else{
            $res = ["estado_acceso" => 'Las credenciales ingresadas son incorrectas'];
        }

        return $this->render("respuesta_logueo.html.twig", $res);
       

       
    }

}