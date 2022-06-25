<?php

function get_view($view_name)
{
    $view = VIEWS . $view_name . 'View.php';
    if (!is_file($view)) {
        die('Vista no encontrada...');
    } else {
        require_once $view;
    }
}

function get_quote()
{
    if (!isset($_SESSION['new_quote'])) {
        return $_SESSION['new_quote'] =
            [
                'number'   => rand(111111, 999999),
                'name'     => '',
                'company'  => '',
                'email'    => '',
                'items'    => [],
                'subtotal' => 0,
                'taxes'    => 0,
                'shipping' => 0,
                'total'    => 0
            ];
    }
    recalculate_quote();
    return $_SESSION['new_quote'];
}

function recalculate_quote()
{
    $items    = [];
    $subtotal = 0;
    $taxes    = 0;
    $shipping = 0;
    $total    = 0;

    if (!isset($_SESSION['new_quote'])) {
        return false;
    }

    // Validar items
    $items = $_SESSION['new_quote']['items'];

    // Si la lista de items está vacía no es necesario calcular nada

    if (!empty($items)) {
        foreach ($items as $item) {
            $subtotal += $item['total'];
            $taxes    += $item['taxes'];
        }
    }

    $shipping = $_SESSION['new_quote']['shipping'];
    $total    = $subtotal + $taxes + $shipping;

    $_SESSION['new_quote']['subtotal'] = $subtotal;
    $_SESSION['new_quote']['taxes']    = $taxes;
    $_SESSION['new_quote']['shipping'] = $shipping;
    $_SESSION['new_quote']['total']    = $total;
    return true;
}

function restart_quote()
{
    $_SESSION['new_quote'] =
        [
            'number'   => rand(111111, 999999),
            'name'     => '',
            'company'  => '',
            'email'    => '',
            'items'    => [],
            'subtotal' => 0,
            'taxes'    => 0,
            'shipping' => 0,
            'total'    => 0
        ];
    return true;
}

function get_items()
{
    $items = [];

    // Si no existe la cotización y obviamente está vacio el array

    if (!isset($_SESSION['new_quote']['items'])) {
        return $items;
    }

    // La cotización existe, se asigna el valor
    $items = $_SESSION['new_quote']['items'];
    return $items;
}

function get_item($id)
{
    $items = get_items();

    // Si no hay items
    if (empty($items)) {
        return false;
    }

    // Si hay items iteramos
    foreach ($items as $item) {
        // Validar si existe con el mismo id pasado
        if ($item['id'] === $id) {
            return $item;
        }
    }

    // No hubo un match o resultados
    return false;
}

function delete_items()
{
    $_SESSION['new_quote']['items'] = [];

    recalculate_quote();

    return true;
}

function delete_item($id)
{
    $items = get_items();

    // Si no hay items
    if (empty($items)) {
        return false;
    }

    // Si hay items iteramos
    foreach ($items as $i => $item) {
        // Validar si existe con el mismo id pasado
        if ($item['id'] === $id) {
            unset($_SESSION['new_quote']['items'][$i]);
            return true;
        }
    }

    // No hubo un match o resultados
    return false;
}
