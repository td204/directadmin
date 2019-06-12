<?php

/*
 * DirectAdmin API Client
 * (c) Omines Internetbureau B.V. - https://omines.nl/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Omines\DirectAdmin\Objects\Dns;

/**
 * DNSSEC
 */
class Dnssec extends DnsObject
{

    /**
     * Return the DNS Keys, if any
     */
    public function getKeys()
    {
        return $this->invokePost('DNS_ADMIN', 'dnssec', [
            'value' => 'get_keys',
        ]);
    }

    /**
     * Creates a new DNS key.
     */
    public function generateKeys()
    {
        return $this->invokePost('DNS_ADMIN', 'dnssec', [
            'generate_keys' => 'anything',
        ]);
    }

    /**
     * Sign the DNSSEC
     */
    public function sign()
    {
        return $this->invokePost('DNS_ADMIN', 'dnssec', [
            'sign_zone' => 'anything',
        ]);
    }

    /**
     * Returns the domain name.
     *
     * @return string
     */
    public function getDomainName()
    {
        return $this->domain;
    }

    /**
     * Allows the class to be used as a string representing the full domain name.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getDomainName();
    }
}
