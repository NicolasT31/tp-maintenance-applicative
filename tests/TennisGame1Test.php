<?php

use PHPUnit\Framework\TestCase;
include_once '../TennisGame1.php';
class TennisGame1Test extends TestCase
{
    private $player1Name = "player1";
    private $player2Name = "player2";

    public function testWonPoint()
    {
        $tennisGame = new TennisGame1($this->player1Name, $this->player2Name);

        $tennisGame->wonPoint('player1');

        $this->assertEquals(1, $tennisGame->m_score1);
        $this->assertEquals(0, $tennisGame->m_score2);
    }

    public function testScoreIsEqual() {
        $tennisGame = new TennisGame1($this->player1Name, $this->player2Name);
        $tennisGame->wonPoint('player1');
        $tennisGame->wonPoint('player2');

        $this->assertEquals('Fifteen-All', $tennisGame->getScore());
    }

    public function testScorePlayer1IsGreatherThanScorePlayer2() {
        $tennisGame = new TennisGame1($this->player1Name, $this->player2Name);
        $tennisGame->wonPoint('player1');
        $tennisGame->wonPoint('player1');
        $tennisGame->wonPoint('player2');

        $this->assertEquals('Thirty-Fifteen', $tennisGame->getScore());
    }
}

