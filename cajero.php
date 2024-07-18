    <?php

$clientes = array(
    array("nombre" => "Juan", "contraseña" => "123", "saldo" => 1000),
    array("nombre" => "Ana", "contraseña" => "123", "saldo" => 500),
    array("nombre" => "Pedro", "contraseña" => "123", "saldo" => 2000),
    array("nombre" => "jhon", "contraseña" => "123", "saldo" => 6000)
);

function cajeroAutomatico($clientes) {
    echo "Bienvenido al Cajero Automático\n";

    echo "Ingrese su nombre: ";
    $nombre = trim(fgets(STDIN));
    echo "Ingrese su contraseña: ";
    $contraseña = trim(fgets(STDIN));

    $clienteEncontrado = null;
    foreach ($clientes as $cliente) {
        if ($cliente["nombre"] == $nombre && $cliente["contraseña"] == $contraseña) {
            $clienteEncontrado = $cliente;
            break;
        }
    }

    if ($clienteEncontrado) {
        mostrarMenu($clienteEncontrado);
    } else {
        echo "Nombre de usuario o contraseña incorrectos. Saliendo...\n";
    }
}

function mostrarMenu($cliente) {
    while (true) {
        echo "\nMenú Principal\n";
        echo "1. Retirar efectivo\n";
        echo "2. Depositar efectivo\n";
        echo "3. Consultar saldo\n";
        echo "4. Salir\n";
        $opcion = trim(fgets(STDIN));

        switch ($opcion) {
            case 1:
                retirarEfectivo($cliente);
                break;
            case 2:
                depositarEfectivo($cliente);
                break;
            case 3:
                consultarSaldo($cliente);
                break;
            case 4:
                echo "Adiós!\n";
                return; 
            default:
                echo "Opción no válida\n";
        }
    }
}

function retirarEfectivo($cliente) {
    echo "Ingrese el monto a retirar: ";
    $monto = trim(fgets(STDIN));
    if ($cliente["saldo"] >= $monto) {
        $cliente["saldo"] -= $monto;
        echo "Retiro exitoso. Saldo actual: " . $cliente["saldo"] . "\n";
    } else {
        echo "Saldo insuficiente\n";
    }
}

function depositarEfectivo($cliente) {
    echo "Ingrese el monto a depositar: ";
    $monto = trim(fgets(STDIN));
    $cliente["saldo"] += $monto;
    echo "Depósito exitoso. Saldo actual: " . $cliente["saldo"] . "\n";
}

function consultarSaldo($cliente) {
    echo "Saldo actual: " . $cliente["saldo"] . "\n";
}
cajeroAutomatico($clientes);

?>
