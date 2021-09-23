<?php

namespace Rbaskam\LaravelPCloud\Console;

use Illuminate\Console\Command;
use Rbaskam\LaravelPCloud\Facades\PCloud;

class CreateAuthorisationTokenCommand extends Command
{

    protected $signature = 'laravel-pcloud:token';

    protected $description = 'Create the Authorization token used to generate the access token';

    protected $pCloudApp;

    public function __construct()
    {
        parent::__construct();

        PCloud::setAppKey(config('laravel-pcloud.client_id'));
        PCloud::setAppSecret(config('laravel-pcloud.client_secret'));
    }

    public function handle()
    {        
        $codeUrl = PCloud::getAuthorizeCodeUrl();
        $this->newLine();
        $this->newLine();
        $this->info('Click this link! ' . $codeUrl);

        $accessCode = $this->ask('What is the access code?');
        $hostName = $this->anticipate('What is the Hostname?', ['eapi.pcloud.com', 'api.pcloud.com']);

        $locationId = 1;
        if ($hostName == 'eapi.pcloud.com') {
            $locationId = 2;
        }

        $accessDetails = PCloud::getTokenFromCode($accessCode, $locationId);
        $this->info('Copy this to the PCLOUD_ACCESS_TOKEN env! ' . $accessDetails['access_token']);
        $this->info('Copy this to the PCLOUD_LOCATION_ID env! ' . $accessDetails['locationid']);
    }
}
