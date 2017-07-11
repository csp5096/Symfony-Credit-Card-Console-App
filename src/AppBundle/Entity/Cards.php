<?php

namespace AppBundle\Entity;

class Cards
{
    private $cards = [];

    // Hold an instance of the class
    private static $instance;

    // The singleton method
    public static function singleton()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function setCard(Card $card) {
       // Luhn Validator
       /* $validator = $this->get('validator');
        $errors = $validator->validate($card);

        if (count($errors) > 0) {
            return;
        }
       */
        $cardFound = array_filter(
            $this->cards,
            function ($card) use (&$name) {
                return $card->getName() == $name;
            }
        );
        if(empty($cardFound)) {
           $this->cards[] = $card;
        }
    }

    public function getCard($name) {
        $cards = array_filter(
            $this->cards,
            function ($card) use (&$name) {
                return $card->getName() == $name;
            }
        );
        return array_shift($cards);
    }

    public function getCards() {
        return $this->cards;
    }

    public function add($parameters) {
        $card = $this->getCard($parameters[0]);
        if(empty($card)) {
            $card = new Card();
            $card->setName($parameters[0]);
            $card->setAccount($parameters[1]);
            $card->setBalance($parameters[2]);
            $this->setCard($card);
        }else{
            $card->add($parameters[2]);
        }
    }

    public function charge($parameters) {
        $card = $this->getCard($parameters[0]);
        if(empty($card)) {
            $card = new Card();
            $card->setName($parameters[0]);
            $card->setBalance($parameters[1]);
            $this->setCard($card);
        }else{
            $card->charge($parameters[1]);
        }
    }

    public function credit($parameters) {
        $card = $this->getCard($parameters[0]);
        if(empty($card)) {
            $card = new Card();
            $card->setName($parameters[0]);
            $card->setBalance($parameters[1]);
            $this->setCard($card);
        }else{
            $card->credit($parameters[1]);
        }
    }

    public function reset($parameters) {
        $card = $this->getCard($parameters[0]);
        if(empty($card)) {
            $card = new Card();
            $card->setName($parameters[0]);
            $card->setBalance(0);
            $this->setCard($card);
        }else{
            $card->reset();
        }
    }

    public function limit($parameters) {
        $card = $this->getCard($parameters[0]);
        if(empty($card)) {
            $card->setName($parameters[0]);
            $card->setLimit($parameters[1]);
            $this->setCard($card);
        }else{
            $card->limit($parameters[1]);
        }
    }
}
	