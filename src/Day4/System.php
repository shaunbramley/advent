<?php

namespace Advent\Day4;

class System
{
    private $passphrases;
    
    public function __construct() {
        $this->passphrases = [];
    }
    
    public function getNumberOfPassphrases()
    {
        return count($this->passphrases);
    }

    public function getNumberOfValidPassphrases()
    {
        return count(
            array_filter(
                $this->passphrases,
                function(Passphrase $phrase) {
                    return $phrase->isValid();
                }
            )
        );
    }

    public function add(Passphrase $phrase)
    {
        $this->passphrases[] = $phrase;
        return $this;
    }

    public function getNumberOfValidAnagramChecks()
    {
        return count(
            array_filter(
                $this->passphrases,
                function (Passphrase $phrase) {
                    return !$phrase->hasAnagram();
                }
            )
        );
    }
}
