<?php

namespace app\helpers;

use BitWasp\Bitcoin\Crypto\Random\Random;
use BitWasp\Bitcoin\Key\Factory\PrivateKeyFactory;
use BitWasp\Bitcoin\Address\PayToPubKeyHashAddress;

class GenerateString
{
    public function address()
    {
        $random = new Random();
        $privKeyFactory = new PrivateKeyFactory();
        $privateKey = $privKeyFactory->generateCompressed($random);
        $publicKey = $privateKey->getPublicKey();

        $address = new PayToPubKeyHashAddress($publicKey->getPubKeyHash());

        return $address->getAddress();
    }
}