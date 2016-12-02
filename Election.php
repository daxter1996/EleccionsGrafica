<?php

class Election
{
    private $arrayCandidates = [];
    private $result = [];

    public function __construct(array $arrayCandidates)
    {
        $this->arrayCandidates = $arrayCandidates;
    }

    public function getFirst()
    {
        return $this->result[0];
    }

    public function getResult()
    {
        return $this->result;
    }

    public function setArrayCandidates(array $array)
    {
        $this->arrayCandidates = $array;
    }

    public function setResult(array $result)
    {
        $this->result = $result;
    }

    public function getArrayCandidates()
    {
        return $this->arrayCandidates;
    }

    public function getLast()
    {
        return $this->result[count($this->result) - 1];
    }

    public function __toString()
    {
        $candidates = "";
        $res = "";
        foreach ($this->arrayCandidates as $num) {
            $candidates .= $num . ", ";
        }
        foreach ($this->result as $num) {
            $res .= $num . ", ";
        }
        return "Candidates: " . $candidates . "<br/>Result: " . $res;
    }
}