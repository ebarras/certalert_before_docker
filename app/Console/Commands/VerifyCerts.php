<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Cert;

class VerifyCerts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Certs:Verify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Loop Through All URLs and Verify SSL Cert Expiration Dates';

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
     * @return mixed
     */
    public function handle()
    {
        $certs = Cert::get();
        foreach ($certs as $cert) {
            $this->info('URL: ' . $cert->url);
        }
    }
}
