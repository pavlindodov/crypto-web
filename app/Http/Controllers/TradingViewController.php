<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TradingViewController extends Controller {
    
    public function show($symbol)
    {
        // Pasar el símbolo a la vista
        return view('tradingview', ['symbol' => $symbol]);
    }
}
