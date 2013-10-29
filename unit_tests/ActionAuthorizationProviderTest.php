<?php

namespace CougarTutorial\UnitTests\Security;

use CougarTutorial\Models\State;
use CougarTutorial\Models\User;
use CougarTutorial\Security\ActionAuthorizationProvider;
use CougarTutorial\Security\ActionAuthorizationQuery;
use Cougar\Security\Identity;

require_once(__DIR__ . "/../init.php");

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2013-10-23 at 16:18:05.
 */
class ActionAuthorizationProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ActionAuthorizationProvider
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new ActionAuthorizationProvider();
    }

    /**
     * @covers CougarTutorial\Security\ApiAuthorizationProvider::authorize
     * @covers CougarTutorial\Security\apiAuthorizationProvider::authorizeState
     * @expectedException \Cougar\Exceptions\AccessDeniedException
     */
    public function testAuthorizeCreateState()
    {
        $identity = new identity();

        $query = new ActionAuthorizationQuery();
        $query->action = "create";
        $query->type = "state";
        $query->object = new State();

        $this->object->authorize($identity, $query);
    }

    /**
     * @covers CougarTutorial\Security\ApiAuthorizationProvider::authorize
     * @covers CougarTutorial\Security\apiAuthorizationProvider::authorizeState
     */
    public function testAuthorizeReadState()
    {
        $identity = new identity();

        $query = new ActionAuthorizationQuery();
        $query->action = "read";
        $query->type = "state";
        $query->object = new State();

        $auth = $this->object->authorize($identity, $query);
        $this->assertTrue($auth);
    }

    /**
     * @covers CougarTutorial\Security\ApiAuthorizationProvider::authorize
     * @covers CougarTutorial\Security\apiAuthorizationProvider::authorizeState
     */
    public function testAuthorizeReadStateWithIdentity()
    {
        $identity = new identity("nobody@example.com", array("admin" => false));

        $query = new ActionAuthorizationQuery();
        $query->action = "read";
        $query->type = "state";
        $query->object = new State();

        $auth = $this->object->authorize($identity, $query);
        $this->assertTrue($auth);
    }

    /**
     * @covers CougarTutorial\Security\ApiAuthorizationProvider::authorize
     * @covers CougarTutorial\Security\apiAuthorizationProvider::authorizeState
     */
    public function testAuthorizeReadStateWithAdminIdentity()
    {
        $identity = new identity("nobody@example.com", array("admin" => true));

        $query = new ActionAuthorizationQuery();
        $query->action = "read";
        $query->type = "state";
        $query->object = new State();

        $auth = $this->object->authorize($identity, $query);
        $this->assertTrue($auth);
    }

    /**
     * @covers CougarTutorial\Security\ApiAuthorizationProvider::authorize
     * @covers CougarTutorial\Security\apiAuthorizationProvider::authorizeState
     * @expectedException \Cougar\Exceptions\AccessDeniedException
     */
    public function testAuthorizeUpdateState()
    {
        $identity = new identity();

        $query = new ActionAuthorizationQuery();
        $query->action = "update";
        $query->type = "state";
        $query->object = new State();

        $auth = $this->object->authorize($identity, $query);
        $this->assertTrue($auth);
    }

    /**
     * @covers CougarTutorial\Security\ApiAuthorizationProvider::authorize
     * @covers CougarTutorial\Security\apiAuthorizationProvider::authorizeState
     * @expectedException \Cougar\Exceptions\AccessDeniedException
     */
    public function testAuthorizeUpdateStateWithIdentity()
    {
        $identity = new identity("nobody@example.com", array("admin" => false));

        $query = new ActionAuthorizationQuery();
        $query->action = "update";
        $query->type = "state";
        $query->object = new State();

        $auth = $this->object->authorize($identity, $query);
        $this->assertTrue($auth);
    }

    /**
     * @covers CougarTutorial\Security\ApiAuthorizationProvider::authorize
     * @covers CougarTutorial\Security\apiAuthorizationProvider::authorizeState
     */
    public function testAuthorizeUpdateStateWithAdminIdentity()
    {
        $identity = new identity("nobody@example.com", array("admin" => true));

        $query = new ActionAuthorizationQuery();
        $query->action = "update";
        $query->type = "state";
        $query->object = new State();

        $auth = $this->object->authorize($identity, $query);
        $this->assertTrue($auth);
    }

    /**
     * @covers CougarTutorial\Security\ApiAuthorizationProvider::authorize
     * @covers CougarTutorial\Security\apiAuthorizationProvider::authorizeState
     * @expectedException \Cougar\Exceptions\AccessDeniedException
     */
    public function testAuthorizeDeleteState()
    {
        $identity = new identity();

        $query = new ActionAuthorizationQuery();
        $query->action = "delete";
        $query->type = "state";
        $query->object = new State();

        $auth = $this->object->authorize($identity, $query);
    }

    /**
     * @covers CougarTutorial\Security\ApiAuthorizationProvider::authorize
     * @covers CougarTutorial\Security\apiAuthorizationProvider::authorizeState
     * @expectedException \Cougar\Exceptions\AccessDeniedException
     */
    public function testAuthorizeDeleteStateWithIdentity()
    {
        $identity = new identity("nobody@example.com", array("admin" => false));

        $query = new ActionAuthorizationQuery();
        $query->action = "delete";
        $query->type = "state";
        $query->object = new State();

        $auth = $this->object->authorize($identity, $query);
    }

    /**
     * @covers CougarTutorial\Security\ApiAuthorizationProvider::authorize
     * @covers CougarTutorial\Security\apiAuthorizationProvider::authorizeState
     * @expectedException \Cougar\Exceptions\AccessDeniedException
     */
    public function testAuthorizeDeleteStateWithAdminIdentity()
    {
        $identity = new identity("nobody@example.com", array("admin" => true));

        $query = new ActionAuthorizationQuery();
        $query->action = "delete";
        $query->type = "state";
        $query->object = new State();

        $auth = $this->object->authorize($identity, $query);
    }

    /**
     * @covers CougarTutorial\Security\ApiAuthorizationProvider::authorize
     * @covers CougarTutorial\Security\apiAuthorizationProvider::authorizeUser
     */
    public function testAuthorizeCreateUser()
    {
        $identity = new identity();

        $user = new User();
        $user->id = "somebody@example.com";

        $query = new ActionAuthorizationQuery();
        $query->action = "create";
        $query->type = "user";
        $query->object = $user;

        $auth = $this->object->authorize($identity, $query);
        $this->assertTrue($auth);
    }

    /**
     * @covers CougarTutorial\Security\ApiAuthorizationProvider::authorize
     * @covers CougarTutorial\Security\apiAuthorizationProvider::authorizeUser
     * @expectedException \Cougar\Exceptions\AccessDeniedException
     */
    public function testAuthorizeCreateUserWithIdentity()
    {
        $identity = new identity("nobody@example.com", array("admin" => false));

        $user = new User();
        $user->id = "nobody@example.com";

        $query = new ActionAuthorizationQuery();
        $query->action = "create";
        $query->type = "user";
        $query->object = $user;

        $auth = $this->object->authorize($identity, $query);
        $this->assertTrue($auth);
    }

    /**
     * @covers CougarTutorial\Security\ApiAuthorizationProvider::authorize
     * @covers CougarTutorial\Security\apiAuthorizationProvider::authorizeUser
     * @expectedException \Cougar\Exceptions\AccessDeniedException
     */
    public function testAuthorizeCreateUserWithWrongIdentity()
    {
        $identity = new identity("nobody@example.com", array("admin" => false));

        $user = new User();
        $user->id = "somebody@example.com";

        $query = new ActionAuthorizationQuery();
        $query->action = "create";
        $query->type = "user";
        $query->object = $user;

        $auth = $this->object->authorize($identity, $query);
    }

    /**
     * @covers CougarTutorial\Security\ApiAuthorizationProvider::authorize
     * @covers CougarTutorial\Security\apiAuthorizationProvider::authorizeUser
     */
    public function testAuthorizeCreateUserWithAdminIdentity()
    {
        $identity = new identity("nobody@example.com", array("admin" => true));

        $user = new User();
        $user->id = "somebody@example.com";

        $query = new ActionAuthorizationQuery();
        $query->action = "create";
        $query->type = "user";
        $query->object = $user;

        $auth = $this->object->authorize($identity, $query);
        $this->assertTrue($auth);
    }

    /**
     * @covers CougarTutorial\Security\ApiAuthorizationProvider::authorize
     * @covers CougarTutorial\Security\apiAuthorizationProvider::authorizeUser
     * @expectedException \Cougar\Exceptions\AccessDeniedException
     */
    public function testAuthorizeReadUser()
    {
        $identity = new identity();

        $user = new User();
        $user->id = "somebody@example.com";

        $query = new ActionAuthorizationQuery();
        $query->action = "read";
        $query->type = "user";
        $query->object = $user;

        $auth = $this->object->authorize($identity, $query);
    }

    /**
     * @covers CougarTutorial\Security\ApiAuthorizationProvider::authorize
     * @covers CougarTutorial\Security\apiAuthorizationProvider::authorizeUser
     */
    public function testAuthorizeReadUserWithIdentity()
    {
        $identity = new identity("nobody@example.com", array("admin" => false));

        $user = new User();
        $user->id = "nobody@example.com";

        $query = new ActionAuthorizationQuery();
        $query->action = "read";
        $query->type = "user";
        $query->object = $user;

        $auth = $this->object->authorize($identity, $query);
        $this->assertTrue($auth);
    }

    /**
     * @covers CougarTutorial\Security\ApiAuthorizationProvider::authorize
     * @covers CougarTutorial\Security\apiAuthorizationProvider::authorizeUser
     * @expectedException \Cougar\Exceptions\AccessDeniedException
     */
    public function testAuthorizeReadUserWithWrongIdentity()
    {
        $identity = new identity("nobody@example.com", array("admin" => false));

        $user = new User();
        $user->id = "somebody@example.com";

        $query = new ActionAuthorizationQuery();
        $query->action = "read";
        $query->type = "user";
        $query->object = $user;

        $auth = $this->object->authorize($identity, $query);
    }

    /**
     * @covers CougarTutorial\Security\ApiAuthorizationProvider::authorize
     * @covers CougarTutorial\Security\apiAuthorizationProvider::authorizeUser
     */
    public function testAuthorizeReadUserWithAdminIdentity()
    {
        $identity = new identity("nobody@example.com", array("admin" => true));

        $user = new User();
        $user->id = "somebody@example.com";

        $query = new ActionAuthorizationQuery();
        $query->action = "read";
        $query->type = "user";
        $query->object = $user;

        $auth = $this->object->authorize($identity, $query);
        $this->assertTrue($auth);
    }

    /**
     * @covers CougarTutorial\Security\ApiAuthorizationProvider::authorize
     * @covers CougarTutorial\Security\apiAuthorizationProvider::authorizeUser
     * @expectedException \Cougar\Exceptions\AccessDeniedException
     */
    public function testAuthorizeUpdateUser()
    {
        $identity = new identity();

        $user = new User();
        $user->id = "somebody@example.com";

        $query = new ActionAuthorizationQuery();
        $query->action = "update";
        $query->type = "user";
        $query->object = $user;

        $auth = $this->object->authorize($identity, $query);
    }

    /**
     * @covers CougarTutorial\Security\ApiAuthorizationProvider::authorize
     * @covers CougarTutorial\Security\apiAuthorizationProvider::authorizeUser
     */
    public function testAuthorizeUpdateUserWithIdentity()
    {
        $identity = new identity("nobody@example.com", array("admin" => false));

        $user = new User();
        $user->id = "nobody@example.com";

        $query = new ActionAuthorizationQuery();
        $query->action = "update";
        $query->type = "user";
        $query->object = $user;

        $auth = $this->object->authorize($identity, $query);
        $this->assertTrue($auth);
    }

    /**
     * @covers CougarTutorial\Security\ApiAuthorizationProvider::authorize
     * @covers CougarTutorial\Security\apiAuthorizationProvider::authorizeUser
     * @expectedException \Cougar\Exceptions\AccessDeniedException
     */
    public function testAuthorizeUpdateUserWithWrongIdentity()
    {
        $identity = new identity("nobody@example.com", array("admin" => false));

        $user = new User();
        $user->id = "somebody@example.com";

        $query = new ActionAuthorizationQuery();
        $query->action = "update";
        $query->type = "user";
        $query->object = $user;

        $auth = $this->object->authorize($identity, $query);
    }

    /**
     * @covers CougarTutorial\Security\ApiAuthorizationProvider::authorize
     * @covers CougarTutorial\Security\apiAuthorizationProvider::authorizeUser
     */
    public function testAuthorizeUpdateUserWithAdminIdentity()
    {
        $identity = new identity("nobody@example.com", array("admin" => true));

        $user = new User();
        $user->id = "somebody@example.com";

        $query = new ActionAuthorizationQuery();
        $query->action = "update";
        $query->type = "user";
        $query->object = $user;

        $auth = $this->object->authorize($identity, $query);
        $this->assertTrue($auth);
    }

    /**
     * @covers CougarTutorial\Security\ApiAuthorizationProvider::authorize
     * @covers CougarTutorial\Security\apiAuthorizationProvider::authorizeUser
     * @expectedException \Cougar\Exceptions\AccessDeniedException
     */
    public function testAuthorizeDeleteUser()
    {
        $identity = new identity();

        $user = new User();
        $user->id = "somebody@example.com";

        $query = new ActionAuthorizationQuery();
        $query->action = "delete";
        $query->type = "user";
        $query->object = $user;

        $auth = $this->object->authorize($identity, $query);
    }

    /**
     * @covers CougarTutorial\Security\ApiAuthorizationProvider::authorize
     * @covers CougarTutorial\Security\apiAuthorizationProvider::authorizeUser
     */
    public function testAuthorizeDeleteUserWithIdentity()
    {
        $identity = new identity("nobody@example.com", array("admin" => false));

        $user = new User();
        $user->id = "nobody@example.com";

        $query = new ActionAuthorizationQuery();
        $query->action = "delete";
        $query->type = "user";
        $query->object = $user;

        $auth = $this->object->authorize($identity, $query);
        $this->assertTrue($auth);
    }

    /**
     * @covers CougarTutorial\Security\ApiAuthorizationProvider::authorize
     * @covers CougarTutorial\Security\apiAuthorizationProvider::authorizeUser
     * @expectedException \Cougar\Exceptions\AccessDeniedException
     */
    public function testAuthorizeDeleteUserWithWrongIdentity()
    {
        $identity = new identity("nobody@example.com", array("admin" => false));

        $user = new User();
        $user->id = "somebody@example.com";

        $query = new ActionAuthorizationQuery();
        $query->action = "delete";
        $query->type = "user";
        $query->object = $user;

        $auth = $this->object->authorize($identity, $query);
    }

    /**
     * @covers CougarTutorial\Security\ApiAuthorizationProvider::authorize
     * @covers CougarTutorial\Security\apiAuthorizationProvider::authorizeUser
     */
    public function testAuthorizeDeleteUserWithAdminIdentity()
    {
        $identity = new identity("nobody@example.com", array("admin" => true));

        $user = new User();
        $user->id = "somebody@example.com";

        $query = new ActionAuthorizationQuery();
        $query->action = "delete";
        $query->type = "user";
        $query->object = $user;

        $auth = $this->object->authorize($identity, $query);
        $this->assertTrue($auth);
    }
}
?>
