<?php
namespace Tests;
use PHPUnit\Framework\TestCase;
use Sijad\LaravelEcrecover\EthSigRecover;

class EcRecoverTest extends TestCase
{
    public function testRecoverMessage()
    {
        $providedAddress = "0x583543e8A35E16884d794bc491D46a6349554D7C";
        $signature = "0x5aa21e7110f2015499ad0b16f4af8bf2ecf285c237594b21ffd656eaeff331065e7e54efe41d1b0c40a8a3f47bd77f3077436b0a54f44c8698f48ffe3b6cc4201b";
        $message = "Pelieth is awesome!";
        $eth_sig_util = new EthSigRecover();
        $recoveredAddress = $eth_sig_util->personal_ecRecover($message, $signature);
        $this->assertEquals(strtolower($recoveredAddress), strtolower($providedAddress));
    }

    
    public function testRecoverTypedMessage()
    {
    	$providedAddress = "0x583543e8A35E16884d794bc491D46a6349554D7C";
        $signature = "0x9fe7e8e2fc2ac6e24bfc0b9c04f1169ed8dafd7112677d373d991e8501f341111befe9fb1d924337f827933493b46a88168984ae7124d608bfc333bd841f92b31b";
        $message = "39d637793182423bd0174a8d1bb9c464dfca191cd50953942a0ef6f58e72d89d";
        $eth_sig_util = new EthSigRecover();
        $presha_str = hex2bin(substr($eth_sig_util->keccak256('string bannerstring confirmcode'), 2) . substr($eth_sig_util->keccak256("Pelieth".$message), 2));
        $hex = $eth_sig_util->keccak256($presha_str);
        $recoveredAddress = $eth_sig_util->ecRecover($hex, $signature);

        $this->assertEquals(strtolower($recoveredAddress), strtolower($providedAddress));
    }
}
