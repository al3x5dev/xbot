<?php

// Obtener el directorio de trabajo actual
$rootDir = getcwd();

// Ruta del archivo xbot que deseas copiar
$sourceFile = __DIR__ . '/xbot'; // Asegúrate de que xbot esté en la raíz de tu librería

// Ruta de destino
$destinationFile = $rootDir . '/xbot';

// Copiar el archivo
if (copy($sourceFile, $destinationFile)) {
    echo "Archivo xbot copiado a $destinationFile\n";
} else {
    echo "Error al copiar el archivo xbot\n";
}
