<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;
use App\Entity\Product;
use Symfony\Component\HttpFoundation\Request;



class HomeController extends AbstractController
{

    /**
     * @Route("/home", name="home")
     */ 

    public function index(): Response
    {

        return $this->render('home/index.html.twig', [
            'controller_name' => 'Index entregas',

        ]);
    }

    /**
     * @Route("/home/entrega_dos", name="home/entrega_dos")
     */ 

    public function entrega_dos(): Response
    {

        $variable_a_evaluar_numerica = 10;
        $valor_numerico = 20;

        return $this->render('home/entrega_dos.html.twig', [
            'controller_name' => 'Entrega 2 - Ejercicio 3',
            'variable_a_evaluar_numerica' => $variable_a_evaluar_numerica,
            'valor_numerico' => $valor_numerico
        ]);
    }

    
    /**
     * @Route("/home/vista_uno", name="home/vista_uno")
     */

    public function vista_uno(): Response
    {

        return $this->render('home/vista_uno.html.twig', [
            'controller_name' => 'Entrega 2 - Ejercicio 4 - Vista 1'
        ]);
    }

    /**
     * @Route("/home/vista_dos", name="home/vista_dos")
    */
    public function vista_dos(): Response
    {
        return $this->render('home/vista_dos.html.twig', [
            'controller_name' => 'Entrega 2 - Ejercicio 4 - Vista 2'
        ]);

    }

    /**
     * @Route("/home/entrega_tres", name="home/entrega_tres")
     */ 

    public function entrega_tres(): Response
    {
        $em = $this->getDoctrine()->getManager();

        $productos = $em->getRepository(Product::class)->findAll();
        $categorias = $em->getRepository(Category::class)->findAll();
        $productos_con_categoria_c = $em->getRepository(Product::class)->findByCategoria(3);

        return $this->render('home/entrega_tres.html.twig', [
            'controller_name' => 'Entrega 3 - Ejercicio 5',
            'productos' => $productos,
            'categorias' => $categorias,
            'productos_con_categoria_c' => $productos_con_categoria_c,

        ]);
    }

     /**
     * @Route("/home/entrega_cuatro", name="home/entrega_cuatro")
     */ 

    public function entrega_cuatro(): Response
    {
        $em = $this->getDoctrine()->getManager();

        $productos = $em->getRepository(Product::class)->findAll();

        return $this->render('home/entrega_cuatro.html.twig', [
            'controller_name' => 'Entrega 4 - Ejercicio 4',
            'productos' => $productos,

        ]);
    }

    /**
     * @Route("/home/entrega_integradora", name="home/entrega_integradora")
     */ 

     public function entrega_integradora(): Response
    {

        return $this->render('home/entrega_integradora.html.twig', [
            'controller_name' => 'Entrega integradora',

        ]);
    }





}

