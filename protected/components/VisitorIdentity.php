<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class VisitorIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
    public function authenticate()
    {
         $criteria=new CDbCriteria;
        $criteria->condition= " t.username = :username ";
        $criteria->params[':username'] = $this->username;
        $user = Visitors::model()->find($criteria);
        if(!$user)
        {
            $this->errorCode = 'username not found';
            return !$this->errorCode;
        }

        $token = $this->setAutoLoginToken($user);
        return $token;
    }
    public function setAutoLoginToken(Visitors $user)
    {
        $token = sha1(uniqid(rand(0, time()), true));

        ListingVisitorAutoLoginToken::class::model()->deleteAllByAttributes(array(
            'user_id' => (int)$user->id,
        ));

        $autologinToken             = new ListingVisitorAutoLoginToken();
        $autologinToken->user_id    = (int)$user->id;
        $autologinToken->token      = $token;
        $autologinToken->save();

        return $token;
    }
}