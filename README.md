# ETH ecRecover package for Laravel based on [CryptoCurrencyPHP](https://github.com/tuaris/CryptoCurrencyPHP)

## Setup

`composer require pelieth/laravel-ecrecover`

## Usage

use Pelieth\LaravelEcrecover\EthSigRecover;

\$eth_sig_util = new EthSigRecover();

\$eth_sig_util->personal_ecRecover($message, $signature);