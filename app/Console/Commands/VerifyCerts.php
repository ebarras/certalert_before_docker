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

            $expirationDate = $this->getCertExpirationDate($cert->url);
            //$this->info($result);

            if ($expirationDate) {
                $this->info($expirationDate);
                $cert->expiration_datetime_verified = $expirationDate;
                $cert->last_good_verification_datetime = Carbon::now()->toDateTimeString();
            } else {
                $this->info('Scan Failed');
                $cert->expiration_datetime_verified = 'Scan Failed';
            }
            $cert->save();

            // try {
            //     $certificate = SslCertificate::createForHostName($cert->url, 5);
            //     //$this->info($certificate->expirationDate());
            //     $expirationDate = $certificate->expirationDate();
            //     $verified_date = Carbon::now()->toDateTimeString();
            // } catch(CouldNotDownloadCertificate $e) {
            //     //$this->info('Could Not Be Downloaded');
            //     $expirationDate = 'Cert Verification Failed';
            // } catch(\Exception $e) {
            //     //$this->info('Error Checking Cert');
            //     $expirationDate = 'Cert Verification Failed';
            // }

            // $this->info($expirationDate);
            // $cert->expiration_datetime_verified = $expirationDate;
            // if ($expirationDate != '' && $expirationDate != 'Cert Verification Failed') {
            //     $cert->last_good_verification_datetime = $verified_date;
            // }
            // $cert->save();
        }
    }

    function getCertExpirationDate($domain) {
        $expiry = false;
        try {
            $cmd = "curl --insecure -v https://" . $this->cleanUrl($domain) . " 2>&1 | awk 'BEGIN { cert=0 } /^\* Server certificate:/ { cert=1 } /^\*/ { if (cert) print }' | grep -i expire | head -1";
            $check = exec($cmd);
            
            $expiry_array = explode("date:", $check);
            $expiry = trim(end($expiry_array));
            $expiry = Carbon::createFromFormat("U", strtotime($expiry));
            return $expiry;
        } catch (\Exception $e) {
            return false;
        }
    }

    function cleanUrl($url) {
        $disallowed = array('http://', 'https://');
        foreach($disallowed as $d) {
            if(strpos($url, $d) === 0) {
                return str_replace($d, '', $url);
            }
        }
        return $url;
    }
}
