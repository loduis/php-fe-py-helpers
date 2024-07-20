<?php

namespace FEPY;

const ENV_TEST = 1;

const ENV_PROD = 2;

const EMISSION_NORMAL = 1;
const EMISSION_CONTINGENCY = 2;

const DOC_INVOICE_NORMAL = 1;
const DOC_INVOICE_EXPORTATION = 2;
const DOC_INVOICE_IMPORTATION = 3;
const DOC_INVOICE_AUTO = 4;
const DOC_CREDIT_NOTE = 5;
const DOC_DEBIT_NOTE = 6;
const DOC_REMISSION_NOTE = 7;
const DOC_WITHHOLDING = 8;

const EMISSION_TYPES = [
    EMISSION_NORMAL => 'Normal',
    EMISSION_CONTINGENCY => 'Contingencia'
];

const DOC_TYPES = [
    DOC_INVOICE_NORMAL => 'Factura electrónica',
    DOC_INVOICE_EXPORTATION => 'Factura electrónica de exportación',
    DOC_INVOICE_IMPORTATION => 'Factura electrónica de importación',
    DOC_INVOICE_AUTO => 'Autofactura electrónica',
    DOC_CREDIT_NOTE => 'Nota de crédito electrónica',
    DOC_DEBIT_NOTE => 'Nota de débito electrónica',
    DOC_REMISSION_NOTE => 'Nota de remisión electrónica',
    DOC_WITHHOLDING => 'Comprobante de retención electrónico'
];

function get_key(...$entries): string
{

    $key = implode('', $entries);

    $sum = 0;
    foreach (str_split(strrev($key)) as $i => $val) {
        if ($i % 6 === 0) {
            $factor = 2;
        }
        $sum += $val * $factor;
        $factor ++;
    }
    $result = 11 - ($sum % 11);
    if ($result > 9) {
        $result = 11 - $result;
    }

    return $key . $result;
}