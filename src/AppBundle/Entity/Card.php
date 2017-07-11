<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Card
{
	private $name;
	/**
     * @Assert\Luhn(message = "Invalid Input.")
     */
	private $account;
	private $balance;
	private $limit = 2000;
	private $type = 'credit';

    public function getName() 
    {
    		return $this->name;
    }
    
    public function setName($value) 
    {
    		$this->name = $value;
    		return $this;
    }
    
    public function getAccount() 
    {
    		return $this->account;
    }
    
    public function setAccount($value) 
    {
    		$this->account = $value;
    		return $this;
    }
    
    public function getBalance() 
    {
    		return $this->balance;
    }
    
    public function setBalance($value) 
    {
    		$this->balance = $value;
    		return $this;
    }
    
    public function getLimit() 
    {
    		return $this->limit;
    }
    
    public function setLimit($value) 
    {
    		$this->limit = $value;
    		return $this;
    }
    
    public function getType() 
    {
    		return $this->type;
    }
    
    public function setType($value) 
    {
    		$this->type = $value;
    		return $this;
    }
    public function add(float $amount)
    {
        $balance = $this->getBalance();
        $this->setBalance($balance + $amount);
    }

    public function charge(float $amount)
    {
        if($this->getBalance() + $amount < $this->getLimit()) {
            $this->add($amount);
        }
    }

    public function credit(float $amount)
    {
        $balance = $this->getBalance();
        $this->setBalance($balance - $amount);
    }

    public function limit(float $amount)
    {
        $this->setLimit($amount);
    }

    public function reset()
    {
        $this->setBalance(0);
    }
}
