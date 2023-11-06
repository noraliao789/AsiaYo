<?php

namespace App\Http\Services;

use App\Http\Data\CurrencyData;

class CurrencyExchangeService
{
    private CurrencyData $currencyData;

    public function __construct(CurrencyData $currencyData)
    {
        $this->currencyData = $currencyData;
    }

    /**
     * Change currency
     * @param string $source
     * @param string $target
     * @param float $amount
     * @return float
     */
    public function changeCurrency(string $source, string $target, float $amount): float
    {
        $currenciesMap = $this->currencyData->getCurrencyData();
        $scale = 2;
        $amount = bcmul($amount, $currenciesMap[$source][$target], $scale + 1);
        return bcdiv(bcadd($amount, '0.005', $scale), '1', $scale);
    }
}
