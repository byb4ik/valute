<?php

namespace App\Console\Commands;

use App\Http\Controllers\CurrencyController;
use Illuminate\Console\Command;
use mysql_xdevapi\Exception;

class Parser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return string
     */
    public static function parse()
    {
        $result = [];
        try {
            $result = json_decode(file_get_contents('https://www.cbr-xml-daily.ru/daily_json.js'), true)["Valute"];
        } catch (Exception $e) {
            echo 'не могу спарсить';
        }
        foreach($result as $key => $value) {
            $result[$key] = $value['Value'];
        }

        $currency = new CurrencyController();
        $currency->store($result);
    }
}
