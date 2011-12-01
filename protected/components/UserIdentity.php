<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    private $_id;
    public $email;

    /**
     * Constructor.
     * @param string $email username
     * @param string $password password
     */
    public function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }

    public function authenticate() {
        $record = User::model()->findByAttributes(array('email' => $this->email));
        if ($record === null || $record->password != $record->hashPassword($this->password)) {
            $this->errorCode = self::ERROR_UNKNOWN_IDENTITY;
        } else {
            $this->_id = $record->id;
            $this->errorCode = self::ERROR_NONE;
        }
        return!$this->errorCode;
    }

    public function getId() {
        return $this->_id;
    }
    
    public function getName() {        
        return $this->email;
    }

}