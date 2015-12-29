<?php

namespace Odenktools\Stoplite;

use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

/**
 * @todo
 * @license MIT
 */
class StopliteUserProvider extends EloquentUserProvider implements UserProvider
{
    /**
     * @param array $credentials
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function retrieveByCredentials(array $credentials)
    {
        if (array_key_exists('identifier', $credentials)) {
            foreach (config('stoplite.identified_by') as $identified_by) {
                $query = $this->createModel()
                    ->newQuery()
                    ->where($identified_by, $credentials['identifier']);

                $this->appendQueryConditions($query, $credentials, ['password', 'identifier']);

                if ($query->count() !== 0) {
                    break;
                }
            }
        } else {
            $query = $this->createModel()->newQuery();
            $this->appendQueryConditions($query, $credentials);
        }

        return $query->first();
    }

    /**
     * @param $query
     * @param $conditions
     * @param array $exclude
     */
    protected function appendQueryConditions($query, $conditions, $exclude = ['password'])
    {
        foreach ($conditions as $key => $value) {
            if (!in_array($key, $exclude)) {
                $query->where($key, $value);
            }
        }
    }

    /**
     * @todo
     *
     * - If user has expired
     * - user has role
     *
     * @param UserContract $user
     * @param array $credentials
     * @return boolean
     */
    public function validateCredentials(UserContract $user, array $credentials)
    {
        $plain = $credentials['password'];

        return $this->hasher->check($plain, $user->getAuthPassword());
    }	
}