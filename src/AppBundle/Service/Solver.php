<?php
namespace AppBundle\Service;

class Solver
{
    private $answers = [];
    function getSolution($value)
    {
        if($value == 0 || $value == 1) {
            return $value;
        }
        if (empty($this->answers)) {
            $this->prepareAnswers();
        }
        $max = 0;
        foreach ($this->answers as $keyAnswers => $valueAnswers) {
            if($valueAnswers > $max) {
                $max = $valueAnswers;
            }
            if($keyAnswers == $value) {
                return $max;
            }
        }
    }

    private function prepareAnswers()
    {
        $this->answers[0] = 0;
        $this->answers[1] = 1;
        for($i = 2; $i <= 99999;  $i++) {
            $tempI = floor($i / 2);
            if($i % 2 == 0) {
                $this->answers[$i] = $this->answers[$tempI];
            } else {
                $this->answers[$i] = $this->answers[$tempI] + $this->answers[($tempI + 1)];
            }
        }
    }
}