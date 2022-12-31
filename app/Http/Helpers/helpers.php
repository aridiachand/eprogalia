<?php

function format_uang($angka)
{
    return number_format($angka, 0, ',', '.');
}

function generate_kode_barang($value)
{
    $threshold = 8;
    return sprintf("%0" . $threshold . "s", $value);
}

function generate_kode_permintaan($value)
{
    $threshold = 8;
    return sprintf("%0" . $threshold . "s", $value);
}
