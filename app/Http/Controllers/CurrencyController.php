<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CurrencyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currency_field = (new Currency())->getField();

        $graph_arr = [];
        $result = Currency::all()->toArray();

        foreach ($result as $key => $item) {
            $graph_arr[] = floatval($item['AUD']);
        }

        $chart1 = \Chart::title([
            'text' => 'Курс валют',
        ])->chart([
            'type' => 'line', // pie , columnt ect
            'renderTo' => 'chart1', // render the chart into your div with id
        ])->colors([
            '#0c2959'
        ])->xaxis([
            'categories' => [
                'Date',
            ],
            'labels' => [
                'rotation' => 15,
                'align' => 'top',
                'formatter' => 'startJs:function(){return this.value + " (Footbal Player)"}:endJs',
            ],
        ])->yaxis([
            'text' => 'This Y Axis',
        ])->legend([
            'layout' => 'vertikal',
            'align' => 'right',
            'verticalAlign' => 'middle',
        ])->series(
            [
                [
                    'name' => 'AUD',
                    'data' => $graph_arr,
                    'color' => '#0c2959',
                ],

            ]
        )->display();

        return view('welcome', [
            'chart1' => $chart1,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'is create';
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(array $currency)
    {
        return Currency::create([
            'AUD' => $currency['AUD'],
            'GBP' => $currency['GBP'],
            'BYN' => $currency['BYN'],
            'DKK' => $currency['DKK'],
            'USD' => $currency['USD'],
            'EUR' => $currency['EUR'],
            'CAD' => $currency['CAD'],
            'CNY' => $currency['CNY'],
            'UAH' => $currency['UAH'],
            'CZK' => $currency['CZK'],
            'created_at' => Carbon::now(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'is show ' . $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
