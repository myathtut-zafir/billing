<?php


namespace App\Factories;
class CreateUser
{
    private static CreateUser $instance;
    protected UserFactory $userFactory;

    private function __construct(UserFactory $userFactory)
    {
        $this->userFactory = $userFactory;
    }

    public static function getInstance(UserFactory $userFactory): CreateUser
    {
        if (empty(self::$instance)) {
            self::$instance = new CreateUser($userFactory);
        }

        return self::$instance;
    }

    public function getUser(array $attributes = [])
    {
        return $this->userFactory->getUser($attributes);
    }
}
