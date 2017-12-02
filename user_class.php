<?php

	class User {

	    // Property declarations

	    private $firstname; // string
	    private $lastname; // string
	    private $password; // string
	    private $email; // string
	    private $id; // int

	    // Constructor
	    function __construct($firstname, $lastname, $password, $email, $id) {
	        $this->firstname = $firstname;
	        $this->lastname = $lastname;
	        $this->email = $email;
	        $this->password = $password;
	        $this->id = $id;
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

	    public function getEmail() { // string
	        return $this->email;
	    }

	    public function getPassword() { // string
	        return $this->password;
	    }

	    public function getId() { // Int
	    	return $this->id;
	    }
	}
?>