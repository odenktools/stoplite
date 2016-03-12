<?php

namespace Odenktools\Stoplite;

use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Odenktools\Stoplite\Contracts\UserRepository as UserProviderInterface;
use Odenktools\Stoplite\StopliteUserProvider as UserProvider;
use Odenktools\Stoplite\Contracts\RoleRepository;

/**
 * Stoplite Facades class
 *
 */
class Stoplite
{
    /**
     * Laravel application
     *
     * @var \Illuminate\Foundation\Application
     */
    public $app;
	
	/**
	 * The user provider, used for retrieving objects
	 *
	 * @var \Odenktools\Stoplite\StopliteUserProvider
	 */
	protected $userProvider;
	
	/**
	 * The user provider, used for retrieving objects
	 *
	 * @var \Odenktools\Stoplite\StopliteUserProvider
	 */
	protected $roleRepository;
	
    public function __construct($app, UserProviderInterface $userProvider = null, RoleRepository $roleRepository  = null)
    {
        $this->app = $app;
		$this->userProvider     = $userProvider ?: new UserProvider($app['stoplite.hasher']);
		$this->roleRepository	= $roleRepository;
    }
	
	/**
     * Create a new instance of the User model.
     *
     * @param  string  $class
     * @return Object
     */
    protected function createModel($class)
    {
        $model = new $class;
        return $model;
    }
	
	/**
	 * Stoplite::addRole('superadmin');
	 */
	public function addRole($roleName)
	{
		return $this->userProvider->addRole($roleName);
	}

	/**
	 * Stoplite::addPermission('can edit');
	 */
	public function addPermission($permissionName, array $options = [])
	{
		return $this->userProvider->addPermission($permissionName, $options);
	}

    /**
     * Create a new role.
     * Uses a repository to actually create the role.
     *
     * @param string $roleName
     *
     */
    public function createRole($roleName)
    {
        return $this->roleRepository->create($roleName);
    }
	
	/**
	 * Generate MicroTimes
	 *
	 * @return String
	 */
	protected function microtimeToken()
	{
		$microtime = microtime();
		$microtime = str_replace('.', '', $microtime);
		$microtime = explode(' ', $microtime);
		$microtime = $microtime[1] . $microtime[0];
		$microtime = substr($microtime, 0, 17);
		
		return $microtime;
	}
	
    /**
	 * <code>
	 * echo Stoplite::generateToken();
	 * </code>
	 *
     * @param int $count
     * @return string
     */
	public function generateToken($count=15)
	{
		$token = sha1( $this->microtimeToken(). $this->_genRandomBytes($count));
		
		//$token = $this->microtimeToken();
		
		//$token = $this->_genRandomBytes($count);

		return $token;
	}
	
    /**
	 * Drupal Random Bytes
	 *
     * $token = base64_encode( $this->_genRandomBytes(32));
     * echo $token;
	 * OR
     * $token = md5( $this->_genRandomBytes(32));
	 * echo $token;
     * @param $count
     * @return string
     */
    protected function _genRandomBytes($count)
	{
        // $random_state does not use drupal_static as it stores random bytes.
        static $random_state, $bytes, $has_openssl;

        $missing_bytes = $count - strlen($bytes);

        if ($missing_bytes > 0)
		{
            // PHP versions prior 5.3.4 experienced openssl_random_pseudo_bytes()
            // locking on Windows and rendered it unusable.
            if (!isset($has_openssl))
			{
                $has_openssl = version_compare(PHP_VERSION, '5.3.4', '>=') && function_exists('openssl_random_pseudo_bytes');
            }

            // openssl_random_pseudo_bytes() will find entropy in a system-dependent
            // way.
            if ($has_openssl)
			{
                $bytes .= openssl_random_pseudo_bytes($missing_bytes);
            }

            // Else, read directly from /dev/urandom, which is available on many *nix
            // systems and is considered cryptographically secure.
            elseif ($fh = @fopen('/dev/urandom', 'rb'))
			{
                // PHP only performs buffered reads, so in reality it will always read
                // at least 4096 bytes. Thus, it costs nothing extra to read and store
                // that much so as to speed any additional invocations.
                $bytes .= fread($fh, max(4096, $missing_bytes));
                fclose($fh);
            }

            if (strlen($bytes) < $count)
			{
                // Initialize on the first call. The contents of $_SERVER includes a mix of
                // user-specific and system information that varies a little with each page.
                if (!isset($random_state)) {
                    $random_state = print_r($_SERVER, TRUE);
                    if (function_exists('getmypid')) {
                        // Further initialize with the somewhat random PHP process ID.
                        $random_state .= getmypid();
                    }
                    $bytes = '';
                }

                do {
                    $random_state = hash('sha256', microtime() . mt_rand() . $random_state);
                    $bytes .= hash('sha256', mt_rand() . $random_state, TRUE);
                }
                while (strlen($bytes) < $count);
            }
        }

        $output = substr($bytes, 0, $count);
        $bytes = substr($bytes, $count);
        return $output;

    }	

}