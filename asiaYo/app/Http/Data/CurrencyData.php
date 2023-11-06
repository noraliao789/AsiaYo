<?php
/**
 * @package App\Http\Data
 * Class CurrencyData
 * description
 * @author Rex
 * @date 2023/11/6 10:44 PM
 */

namespace App\Http\Data;

class CurrencyData
{
    private array $currencyData;

    public function __construct()
    {
        ## 可写于数据库做动态调整，读取后写入Redis做缓存优化
        $currenciesMap = [
            "TWD" => [
                "TWD" => 1,
                "JPY" => 3.669,
                "USD" => 0.03281
            ],
            "JPY" => [
                "TWD" => 0.26956,
                "JPY" => 1,
                "USD" => 0.00885
            ],
            "USD" => [
                "TWD" => 30.444,
                "JPY" => 111.801,
                "USD" => 1
            ]
        ];

        $this->setCurrency($currenciesMap);
    }

    private function setCurrency(array $currencyData = [])
    {
        $this->currencyData = $currencyData;
    }

    public function getCurrencyData()
    {
        return $this->currencyData;
    }

}
