<?php

namespace App\Service;

class LecturaCSV {

    private $basePath = 'C:\Proyecto\ShoeComerce\\';

    private function eliminarDuplicados(array $filas): array
    {
        // Convertir cada fila en una cadena única para comparar duplicados
        $filasUnicas = array_unique(array_map('serialize', $filas));
        // Convertir de nuevo en arrays
        return array_map('unserialize', $filasUnicas);
    }

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

            // Eliminar filas duplicadas
            $filas = $this->eliminarDuplicados($filas);

            if (count($filas) > 1) {
                $primeraFila = array_shift($filas); // Extraer el primer array (encabezado)

                usort($filas, function($a, $b) use ($posicion) {
                    return strcmp($a[$posicion], $b[$posicion]);
                });

                // Generar el resultado en formato de columnas
                $resultado .= '<table border="1"><tr>';
                foreach ($primeraFila as $header) {
                    $resultado .= '<th>' . htmlspecialchars($header) . '</th>';
                }
                $resultado .= '</tr>';

                foreach ($filas as $fila) {
                    $resultado .= '<tr>';
                    foreach ($fila as $columna) {
                        $resultado .= '<td>' . htmlspecialchars($columna) . '</td>';
                    }
                    $resultado .= '</tr>';
                }
                $resultado .= '</table>';
            } else {
                // Si no hay más filas, solo mostrar el encabezado
                $primeraFila = array_shift($filas); // Extraer el primer array (encabezado)
                $resultado .= '<table border="1"><tr>';
                foreach ($primeraFila as $header) {
                    $resultado .= '<th>' . htmlspecialchars($header) . '</th>';
                }
                $resultado .= '</tr></table>';
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

            // Eliminar filas duplicadas
            $filas = $this->eliminarDuplicados($filas);

            if (count($filas) > 1) {
                $primeraFila = array_shift($filas); // Extraer el primer array (encabezado)

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

                // Generar el resultado en formato de columnas
                $resultado .= '<table border="1"><tr>';
                foreach ($primeraFila as $header) {
                    $resultado .= '<th>' . htmlspecialchars($header) . '</th>';
                }
                $resultado .= '</tr>';

                foreach ($filas as $fila) {
                    $resultado .= '<tr>';
                    foreach ($fila as $columna) {
                        $resultado .= '<td>' . htmlspecialchars($columna) . '</td>';
                    }
                    $resultado .= '</tr>';
                }
                $resultado .= '</table>';
            } else {
                // Si no hay más filas, solo mostrar el encabezado
                $primeraFila = array_shift($filas); // Extraer el primer array (encabezado)
                $resultado .= '<table border="1"><tr>';
                foreach ($primeraFila as $header) {
                    $resultado .= '<th>' . htmlspecialchars($header) . '</th>';
                }
                $resultado .= '</tr></table>';
            }
        } else {
            $resultado = "Error al abrir el archivo CSV.";
        }

        return $resultado;
    }
}