<?php namespace Merahputih\Auth;

/**
 * Auth
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the MIT License.
 *
 * This source file is subject to the MIT License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://opensource.org/licenses/MIT
 *
 * @package    Auth
 * @version    1.0.0
 * @author     Abdul Hafidz A <aditans88@gmail.com>
 * @license    MIT License
 */

use Sentry;

class Auth 
{
	/**
	 * 
	 * @return void
	 */
	public function login(array $credentials, $remember = false)
	{
		try
		{
			// Try to authenticate the user
			$user = Sentry::authenticate($credentials, $remember);
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
			return 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
			return 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
			return 'Wrong password, try again.';
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			return 'User was not found.';
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
			return 'User is not activated.';
		}

		// The following is only required if throttle is enabled
		catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
		{
			return 'User is suspended.';
		}
		catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
		{
			return 'User is banned.';
		}

	}

	/**
	 * 
	 * @return void
	 */
	public function logout()
	{
		Sentry::logout();
	}
}