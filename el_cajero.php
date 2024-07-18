<?php

$clientes = array(
    array("nombre" => "Juan", "saldo" => 1000),
    array("nombre" => "Ana",  "saldo" => 500),
    array("nombre" => "Pedro", "saldo" => 2000),
    array("nombre" => "jhon",  "saldo" => 6000)
);

function cajeroAutomatico(&$clientes) {
    echo "Cajero Automático\n";
    echo "1. Retirar efectivo\n";
    echo "2. Depositar efectivo\n";
    echo "3. Consultar saldo\n";
    echo "4. Salir\n";
    $opcion = trim(fgets(STDIN));

    switch ($opcion) {
        case 1:
            retirarEfectivo($clientes);
            break;
        case 2:
            depositarEfectivo($clientes);
            break;
        case 3:
            consultarSaldo($clientes);
            break;
        case 4:
            echo "Adiós!\n";
            break;
        default:
            echo "Opción no válida\n";
    }
}

function retirarEfectivo(&$clientes) {
    echo "Ingrese el nombre del cliente: ";
    $nombre = trim(fgets(STDIN));
    $encontrado = false;

    foreach ($clientes as &$cliente) {
        if ($cliente["nombre"] == $nombre) {
            $encontrado = true;
            echo "Ingrese el monto a retirar: ";
            $monto = (float) trim(fgets(STDIN));
            if ($monto > 0 && $cliente["saldo"] >= $monto) {
                $cliente["saldo"] -= $monto;
                echo "Retiro exitoso. Saldo actual: " . $cliente["saldo"] . "\n";
            } else {
                echo "Monto inválido o saldo insuficiente\n";
            }
            break;
        }
    }

    if (!$encontrado) {
        echo "Cliente no encontrado\n";
    }
}

function depositarEfectivo(&$clientes) {
    echo "Ingrese el nombre del cliente: ";
    $nombre = trim(fgets(STDIN));
    $encontrado = false;

    foreach ($clientes as &$cliente) {
        if ($cliente["nombre"] == $nombre) {
            $encontrado = true;
            echo "Ingrese el monto a depositar: ";
            $monto = (float) trim(fgets(STDIN));
            if ($monto > 0) {
                $cliente["saldo"] += $monto;
                echo "Depósito exitoso. Saldo actual: " . $cliente["saldo"] . "\n";
            } else {
                echo "Monto inválido\n";
            }
            break;
        }
    }

    if (!$encontrado) {
        echo "Cliente no encontrado\n";
    }
}

function consultarSaldo(&$clientes) {
    echo "Ingrese el nombre del cliente: ";
    $nombre = trim(fgets(STDIN));
    $encontrado = false;

    foreach ($clientes as $cliente) {
        if ($cliente["nombre"] == $nombre) {
            $encontrado = true;
            echo "Saldo actual: " . $cliente["saldo"] . "\n";
            break;
        }
    }

    if (!$encontrado) {
        echo "Cliente no encontrado\n";
    }
}

cajeroAutomatico($clientes);

?>
