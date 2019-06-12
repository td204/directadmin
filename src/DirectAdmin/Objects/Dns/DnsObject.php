<?php

namespace Omines\DirectAdmin\Objects\Dns;

use Omines\DirectAdmin\Context\UserContext;
use Omines\DirectAdmin\Objects\BaseObject;

abstract class DnsObject extends BaseObject
{
    /**
     * @var string
     */
    protected $domain;

    /**
     * @var UserContext
     */
    protected $userContext;

    /**
     * Construct the object.
     *
     * @param string $domain The containing domain
     * @param UserContext $userContext
     */
    public function __construct($domain, UserContext $userContext)
    {
        $this->domain = $domain;
        parent::__construct($domain, $userContext);
    }

    /**
     * Invokes a POST command on a domain object.
     *
     * @param string $command Command to invoke
     * @param string $action Action to execute
     * @param array $parameters Additional options for the command
     * @param bool $clearCache Whether to clear the domain cache on success
     * @return array Response from the API
     */
    public function invokePost($command, $action, $parameters = [], $clearCache = true)
    {
        $response = $this->getContext()->invokeApiPost($command, array_merge([
            'action' => $action,
            'domain' => $this->domain
        ], $parameters));
        if ($clearCache) {
            $this->clearCache();
        }
        return $response;
    }

}
