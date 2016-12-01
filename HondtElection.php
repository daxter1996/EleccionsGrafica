<?php
require_once "Election.php";
class HondtElection extends Election {
    //private $votes = [];
    public function __construct(array $arrayCandidates)
    {
        parent::__construct($arrayCandidates);
    }
    function getParties() {
        $parties = array();
        foreach ($this->getArrayCandidates() as $constituency) {
            foreach ($constituency as $key => $value) {
                if(!in_array($key, $parties) && is_string($key))
                    $parties[] = $key;
            }
        }
        return $parties;
    }
    function getRepresentatives($constituency)
    {
        $representatives = array();
        for ($i = 0; $i < $constituency[0]; $i++) {
            $max = null;
            $maxValue = null;
            foreach ($constituency as $key => $value) {
                if (is_string($key)) {
                    if (array_key_exists($key, $representatives)) {
                        $value /= ($representatives[$key] + 1);
                    }
                    if ($max == null || $maxValue < $value || ($maxValue == $value && $representatives[$key] > $representatives[$max])) {
                        $max = $key;
                        $maxValue = $value;
                    }
                }
            }
            if (array_key_exists($max, $representatives)) {
                $representatives[$max]++;
            } else {
                $representatives[$max] = 1;
            }
        }
        return $representatives;
    }
}