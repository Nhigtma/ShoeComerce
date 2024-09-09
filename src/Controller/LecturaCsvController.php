<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\LecturaCSV;

class LecturaCsvController extends AbstractController
{
    private $lecturaCSV;

    public function __construct(LecturaCSV $lecturaCSV)
    {
        $this->lecturaCSV = $lecturaCSV;
    }

    /**
     * @Route("/csv/ordenar/{filename}/{posicion}", name="csv_ordenar")
     */
    public function ordenar(string $filename, int $posicion): Response
    {
        $resultado = $this->lecturaCSV->organizarByOrderArray($filename, $posicion);
        return new Response($resultado);
    }

    /**
     * @Route("/csv/ordenar-burbuja/{filename}/{posicion}", name="csv_ordenar_burbuja")
     */
    public function ordenarBurbuja(string $filename, int $posicion): Response
    {
        $resultado = $this->lecturaCSV->organizarByBubbleSort($filename, $posicion);
        return new Response($resultado);
    }
}
