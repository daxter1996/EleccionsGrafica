<?php
require_once "Election.php";

class HondtElection extends Election
{
    private $votes;

    public function __construct(array $arrayCandidates, int $blank)
    {
        parent::__construct($arrayCandidates);
        $this->votes = $this->addBlank($blank);
        $this->hondtMethod();
    }

    private function hondtMethod()
    {
        $candidates = $this->getArrayCandidates();
        $representatives = array();
        for ($i = 0; $i < $candidates[0]; $i++) {
            $max = null;
            $maxValue = null;
            foreach ($candidates as $key => $value) {
                if (is_string($key) && $value >= $this->votes * 3 / 100) {
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
        foreach ($this->getArrayCandidates() as $key => $value) {
            if(is_string($key))
                $this->votes += $value;
        }
        $this->votes += $blank;
    }
}
$array = array(12, "PP" => 329000, "POD-C-EUPV" => 192165, "PSOE" => 187056, "Cs" => 138063, "PACMA" => 10600, "CM" => 2986, "VOX" => 1993, "UPyD" => 1939, "PCPE" => 1571, "RC-GV" => 1289, "SOMVAL" => 551, "P-LIB" => 399);
$a = new HondtElection($array, 52);
echo print_r($a->getResult());