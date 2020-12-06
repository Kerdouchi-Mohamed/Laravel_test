<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StrReplace extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:string_replace {pattern} {args*}';

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

    private function get_index_from_regex($var){
        return substr($var,1,strlen($var)-2);
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $pattern = $this->argument('pattern');
        $args = $this->argument('args');

        $vars = explode("_",$pattern);
        $output = $pattern;

        foreach($vars as $var){
            if(preg_match("/^{[0-9]+}$/",$var)){
                $i = $this->get_index_from_regex($var);
                $output = str_replace($var,$args[$i],$output);
            }
        }
        echo "output: ".$output."\n";
        return 0;
    }
}
