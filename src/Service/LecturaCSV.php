<?php
namespace App\Service;

class LecturaCSV {

    private $basePath = 'C:\Proyecto\ShoeComerce\\';

    public function organizarByOrderArray(string $filename, int $posicion): string
    {
        $filePath = realpath($this->basePath . $filename . '.csv');
        
        if (strpos($filePath, $this->basePath) !== 0 || !file_exists($filePath)) {
            return "Error: archivo no encontrado o fuera de la carpeta permitida.";
        }

        $file = fopen($filePath, 'r');
        $resultado = '';

        if ($file !== FALSE) {
            $filas = [];

            while (($datos = fgetcsv($file, 1000, ",")) !== FALSE) {
                $filas[] = $datos;
            }

            fclose($file);

            usort($filas, function($a, $b) use ($posicion) {
                return strcmp($a[$posicion], $b[$posicion]);
            });

            foreach ($filas as $index => $fila) {
                $resultado .= "Fila " . ($index + 1) . ":<br>";
                $resultado .= "<pre>" . print_r($fila, true) . "</pre>";
            }
        } else {
            $resultado = "Error al abrir el archivo CSV.";
        }

        return $resultado;
    }

    public function organizarByBubbleSort(string $filename, int $posicion): string
    {
        $filePath = realpath($this->basePath . $filename . '.csv');
        
        if (strpos($filePath, $this->basePath) !== 0 || !file_exists($filePath)) {
            return "Error: archivo no encontrado o fuera de la carpeta permitida.";
        }

        $file = fopen($filePath, 'r');
        $resultado = '';

        if ($file !== FALSE) {
            $filas = [];

            while (($datos = fgetcsv($file, 1000, ",")) !== FALSE) {
                $filas[] = $datos;
            }

            fclose($file);

            $n = count($filas);
            for ($i = 0; $i < $n; $i++) {
                for ($j = 0; $j < $n - $i - 1; $j++) {
                    if (strcmp($filas[$j][$posicion], $filas[$j + 1][$posicion]) > 0) {
                        $temp = $filas[$j];
                        $filas[$j] = $filas[$j + 1];
                        $filas[$j + 1] = $temp;
                    }
                }
            }

            foreach ($filas as $index => $fila) {
                $resultado .= "Fila " . ($index + 1) . ":<br>";
                $resultado .= "<pre>" . print_r($fila, true) . "</pre>";
            }
        } else {
            $resultado = "Error al abrir el archivo CSV.";
        }

        return $resultado;
    }
}