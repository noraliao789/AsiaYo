<?php

namespace App\Http\Controllers;

use App\Http\Requests\CurrencyExchangeRequest;
use App\Http\Services\CurrencyExchangeService;
use Illuminate\Http\Request;

class CurrencyExchangeController extends Controller
{
    private CurrencyExchangeService $currencyExchangeService;

    public function __construct(CurrencyExchangeService $currencyExchangeService)
    {
        $this->currencyExchangeService = $currencyExchangeService;
    }

    public function index(CurrencyExchangeRequest $request)
    {

        $request = $request->validated();
        $target = $request['target'];
        $source = $request['source'];
        $amount = $request['amount'];
        $amount = str_replace(',', '', $amount);

        $result = $this->currencyExchangeService->changeCurrency($source, $target, $amount);

        ## 可封装到共用方法
        $result = number_format($result, 2, '.', ',');

        return response()->json(
            ['msg' => 'success', 'amount' => $result],
        );

    }
}
