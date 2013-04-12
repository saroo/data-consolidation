<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
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
	  if($this->pop_authenticate($this->username, $this->password,"192.168.121.26"))
    {
			$this->errorCode=self::ERROR_NONE;
    }
    else
    {
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
    }
		return !$this->errorCode;
	}


  public function pop_authenticate( $username, $password, $auth_host )
  {
    $tcp_port = "110";    // POP Server port, usually 110

    $fp = fsockopen( "$auth_host",$tcp_port );  // connect to pop port
    if ( $fp > 0 )  // make sure that you get a response...
    {
      $user_info=fputs( $fp, "USER ".$username. "\r\n" ); //send username
      if ( !$user_info )
      {
        // print  "problem conversing with $auth_host!";


        return false;
      }
      else
      {

        $server_reply = fgets( $fp,128 );
        if ( ord($server_reply) == ord( "+" ))
        {
          // print "$server_reply......<br>";
        }

        $server_reply = fgets( $fp,128 );
        if ( ord( $server_reply ) == ord( "+" ))
        {
          // print "$server_reply.........<br>";
          fputs( $fp, "PASS ".$password. "\r\n" );
          $passwd_attempt = fgets( $fp,128 );
          if ( ord( $passwd_attempt ) == ord( "+" ))
          {
            // print "$passwd_attempt!"; //password accepted
            return true;
          }
          else
          {
            // print "$passwd_attempt!"; //password failed
            return false;
          }
        }
        fputs( $fp, "QUIT". "\r\n" );
        fclose( $fp );
      }
    }
    else //if you don't get a response, complain...
    {
      // print  "<BR>No response from $auth_host! is port $tcp_port open?....";
      return false;
    }
  }


}
