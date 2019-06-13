<?php
/*
 *
 * IITG-AppUser-Class.php
 * 
 * The IITG AppUser class can be used to perform the task of authenticating
 * users having valid credentials on the authenticating POP mail server.
 *
 * Written by: Nanu Alan Kachari, Department of CSE, IIT Guwahati
 * on 30 June 2017
 * 
 * Licesed under the GNU General Public License v3.0
 *
 */

class IITGAppUser
{
	
	/*
	 * login($theUsername,$thePassword,$theMailserver)
	 * validates the inputs from a login-form.
	 * Returns TRUE if all inputs are valid, FALSE otherwise.
	 */
	public function login($theUsername,$thePassword,$theMailserver)
	{
		/* check login credentials */
		if($this->authSecurePOP3($theMailserver,$theUsername,$thePassword) == 0)
		{
			/* Login successful, set PHP SESSION variables & return TRUE */
			$_SESSION['loggedin'] = true;
			$_SESSION['username'] = $theUsername;
			return true;
		}else{
			/* Login NOT successful, return FALSE */
			return false;
		}
	}

	/*
	 * logout() destroys the current session, logs out the current user
	 */
	public function logout()
	{
		session_destroy();
	}

	/*
	 * is_logged_in() checks whether the user is logged in
	 */
	public function is_logged_in()
	{
		if( isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true )
		{
			return true;
		}
	}

	/* authSecurePOP3($theMailserver, $theUsername, $thePassword)
	 * checks whether the given $theUsername has a POP account. If so,
	 * it verifies that the given password is valid for that user.
	 * If the user does not exist or if the passwords do not match, this
	 * function returns either 1 or 2 (error code). If success, it returns 0
	 */
	private function authSecurePOP3($theMailserver, $theUsername, $thePassword)
	{
		/* check if the input for $theMailserver is blank */
		if( $theMailserver!="" )
		{
			/* input for $theMailserver is not blank */
			
			/* imap_open(), check out http://php.net/manual/en/function.imap-open.php for more info  */
			$linkToIITGmailsrv=imap_open( "{".$theMailserver.":995/pop3/ssl/novalidate-cert}",$theUsername,$thePassword );
			
			/* check authentication status */
			if($linkToIITGmailsrv)
			{
				/* authentication was successful, close $linkToIITGmailsrv,  return 0 */
				imap_close($linkToIITGmailsrv);
				return 0;
			}
			else
			{
				/* authentication was NOT successful, close $linkToIITGmailsrv,  return 1 */
				imap_close($linkToIITGmailsrv);
				return 1;
			}
		}
		else
		{
			/* input for $theMailserver is blank, return 2 */
			return 2;
		}
	}
	
}
?>
