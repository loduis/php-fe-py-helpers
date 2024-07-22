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

const PERSON_NATURAL = 1;
const PERSON_LEGAL = 2;

const REGIME_TOURISM = 1;
const REGIME_IMPORTER = 2;
const REGIME_EXPORTER = 3;
const REGIME_MAQUILA = 4;
const REGIME_LAW_6090 = 5;
const REGIME_SMALL_PRODUCER = 6;
const REGIME_MEDIUM_PRODUCER = 7;
const REGIME_ACCOUNTING = 8;

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

const REGIME_TYPES = [
    REGIME_TOURISM => 'Régimen de Turismo',
    REGIME_IMPORTER => 'Importador',
    REGIME_EXPORTER => 'Exportador',
    REGIME_MAQUILA => 'Maquila',
    REGIME_LAW_6090 => 'Ley N° 60/90',
    REGIME_SMALL_PRODUCER => 'Régimen del Pequeño Productor',
    REGIME_MEDIUM_PRODUCER => 'Régimen del Mediano Productor',
    REGIME_ACCOUNTING => 'Régimen Contable',
];

function get_key(...$entries): string
{
    $key = implode('', $entries);

    $sum = 0;
    $factor = 2;
    foreach (str_split(strrev($key)) as $val) {
        if ($factor > 11) {
            $factor = 2;
        }
        $sum += $val * $factor;
        $factor ++;
    }
    $result = $sum % 11;
    if ($result > 1) {
        $result = 11 - $result;
    }

    return $key . $result;
}