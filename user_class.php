<?php

	class User {

	    // Property declarations

	    private $firstname; // string
	    private $lastname; // position
	    private $password;
	    private $email; // string

	    // Constructor
	    function __construct($firstname, $lastname, $password, $email) {
	        $this->firstname = $firstname;
	        $this->lastname = $lastname;
	        $this->email = $email;
	        $this->password = $password;
	    }

	    public function setFirstname($firstname) { // void
	        $this->firstname = $firstname;
	    }

	    public function setLastname($lastname) { // void
	        $this->lastname = $lastname;
	    }

	    public function setEmail($email) { // void
	        $this->email = $email;
	    }
	    public function setPassword($password) { // void
	        $this->password = $password;
	    }

	    // Accessors

	    public function getFirstname() { // string
	        return $this->firstname;
	    }

	    public function getLastname() { // string
	        return $this->lastname;
	    }

	    public function getEmail() { // position
	        return $this->email;
	    }

	    public function getPassword() { // string
	        return $this->password;
	    }
	}
?>