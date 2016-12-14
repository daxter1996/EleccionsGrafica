<?php
require_once "Election.php";

class HondtElection extends Election
{
    private $votes;
    private $numRepresentatives;

    public function __construct(array $arrayCandidates, int $blank, int $representatives)
    {
        parent::__construct($arrayCandidates);
        $this->votes = $this->addBlank($blank);
        $this->numRepresentatives = $representatives;
        $this->hondtMethod();
    }

    private function hondtMethod()
    {
        $candidates = $this->getArrayCandidates();
        $representatives = array();
        for ($i = 0; $i < $this->numRepresentatives; $i++) {
            $max = null;
            $maxValue = null;
            foreach ($candidates as $key => $value) {
                if ($value >= $this->votes * 3 / 100) {
                    if (array_key_exists($key, $representatives))
                        $value /= ($representatives[$key] + 1);
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
        $this->setResult($representatives);
    }
    public function addBlank(int $blank) {
        $this->votes = 0;
        foreach ($this->getArrayCandidates() as $key => $value)
            $this->votes += $value;
        $this->votes += $blank;
    }
    public function __toString()
    {
        $string = "";
        foreach ($this->getResult() as $key => $value) {
            $string .= $key . ": " . $value . "<br/>";
        }
        return $string;
    }
}