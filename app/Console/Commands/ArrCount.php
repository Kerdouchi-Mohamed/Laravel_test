<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ArrCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:array_count {array}';

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

    private function array_count($array){
        if(is_array($array)){
            $val = array_shift($array);
            if(is_array($val) && !empty($val)){
                if(empty($array))
                    return 1 + $this->array_count($val);
                else
                    return 1 + $this->array_count($val) + $this->array_count($array);
            }elseif(!empty($array))
                return $this->array_count($array);
            return 0;
        }
        
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
        echo 'output '.(1 + $this->array_count($array))."\n";
        return 0;
    }
}
