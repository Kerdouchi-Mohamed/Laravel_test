<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ArrSum extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:array_sum {array}';

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
    
    private function array_sum($array){
        if(is_array($array) && !empty($array)){
            $val = array_shift($array);
            if(is_numeric($val))
                return $val + $this->array_sum($array);
            elseif(is_array($val) && !empty($val))
                return $this->array_sum($val) + $this->array_sum($array);
        }
        return 0;
    }
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $array = $this->argument('array');
        $array = json_decode($array,true);
        echo "output :" . $this->array_sum($array)."\n";
        return 0;
    }
}
