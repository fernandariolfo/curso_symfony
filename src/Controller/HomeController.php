<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {

        $variable_a_evaluar_numerica = 10;
        $valor_numerico = 20;

        return $this->render('home/index.html.twig', [
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

}

