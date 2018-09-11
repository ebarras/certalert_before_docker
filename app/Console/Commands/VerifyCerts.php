<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Spatie\SslCertificate\SslCertificate;

use App\Cert;

class VerifyCerts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'certs:verify';

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
        $expirationDate = '';
        $verified_date = '';
        foreach ($certs as $cert) {
            $this->info('URL: ' . $cert->url);

            try {
                $certificate = SslCertificate::createForHostName($cert->url, 5);
                //$this->info($certificate->expirationDate());
                $expirationDate = $certificate->expirationDate();
                $verified_date = Carbon::now()->toDateTimeString();
            } catch(CouldNotDownloadCertificate $e) {
                //$this->info('Could Not Be Downloaded');
                $expirationDate = 'Cert Verification Failed';
            } catch(\Exception $e) {
                //$this->info('Error Checking Cert');
                $expirationDate = 'Cert Verification Failed';
            }

            $this->info($expirationDate);
            $cert->expiration_datetime_verified = $expirationDate;
            if ($expirationDate != '' && $expirationDate != 'Cert Verification Failed') {
                $cert->last_good_verification_datetime = $verified_date;
            }
            $cert->save();
        }
    }
}
