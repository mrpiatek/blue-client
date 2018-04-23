# Client side package for the Blue application.

## Installation

### Set up a new Laravel 5.6 project

### Add GitHub repository to the composer.json file

```
"repositories": [
    {
        "type":"package",
        "package": {
          "name": "mrpiatek/blue-client",
          "version":"master",
          "source": {
              "url": "https://github.com/mrpiatek/blue-client.git",
              "type": "git",
              "reference":"master"
            }
        }
    }
]
```

### Run `composer require mrpiatek/blue-client`

### Run `php artisan vendor:publish --provider="MrPiatek\\BlueClient\\Providers\\GuzzleHttpServiceProvider"`

## Environment

You may provide API's (blue-server) base URI in the .env file using `BLUE_SERVER_BASE_URI` setting and set timeout
for API requests using `BLUE_SERVER_TIMEOUT`