<?php

class TennisGame1 implements TennisGame
{
    public $m_score1 = 0;
    public $m_score2 = 0;
    private $player1Name = '';
    private $player2Name = '';

    public function __construct($player1Name, $player2Name)
    {
        echo "Il y a deux joueurs : " . $player1Name . ' et ' . $player2Name . "\n";
        $this->player1Name = $player1Name;
        $this->player2Name = $player2Name;
    }

    public function wonPoint($playerName)
    {
        if ('player1' == $playerName) {
            $this->m_score1++;
            echo "Le player 1 gagne un point \n";
        } else {
            $this->m_score2++;
            echo "Le player 2 gagne un point \n";
        }
    }

    public function getScore()
    {
        $score = "";
        if ($this->m_score1 == $this->m_score2) {
            echo "Les scores des deux joueurs sont égaux. \n";
            switch ($this->m_score1) {
                case 0:
                    $score = "Love-All";
                    break;
                case 1:
                    $score = "Fifteen-All";
                    break;
                case 2:
                    $score = "Thirty-All";
                    break;
                default:
                    $score = "Deuce";
                    break;
            }
        } elseif ($this->m_score1 >= 4 || $this->m_score2 >= 4) {
            $minusResult = $this->m_score1 - $this->m_score2;
            if ($minusResult == 1) {
                $score = "Advantage player1";
            } elseif ($minusResult == -1) {
                $score = "Advantage player2";
            } elseif ($minusResult >= 2) {
                $score = "Win for player1";
            } else {
                $score = "Win for player2";
            }

            echo " Score joueur 1 : " . $this->m_score1 . "\n";
            echo " Score joueur 2 : " . $this->m_score2 . "\n";
        } else {
            for ($i = 1; $i < 3; $i++) {
                if ($i == 1) {
                    $tempScore = $this->m_score1;
                } else {
                    $score .= "-";
                    $tempScore = $this->m_score2;
                }
                switch ($tempScore) {
                    case 0:
                        $score .= "Love";
                        break;
                    case 1:
                        $score .= "Fifteen";
                        break;
                    case 2:
                        $score .= "Thirty";
                        break;
                    case 3:
                        $score .= "Forty";
                        break;
                }

                echo " Score joueur 1 : " . $this->m_score1 . "\n";
                echo " Score joueur 2 : " . $this->m_score2 . "\n";
            }
        }
        return $score;
    }
}

