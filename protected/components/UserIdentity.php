<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_id;

	public function authenticate()
	{
		$user= Users::model()->findByAttributes(array("username"=>$this->username, "password"=>$this->password));

		if($user===null)
        {
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        }
		else
        {
            $this->_id=$user->id;
            $this->errorCode=self::ERROR_NONE;
        }

		return !$this->errorCode;
	}

    public function getId()
    {
        return $this->_id;
    }
}