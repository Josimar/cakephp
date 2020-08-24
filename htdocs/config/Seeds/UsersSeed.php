<?php
declare(strict_types=1);

use Migrations\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $hash = new DefaultPasswordhasher();
        $data = [
            "name" => "Josimar",
            "lastname" => "Batista",
            "email" => "sjosimar@hotmail.com",
            "password" => $hash->hash("123456"),
            "phone" => "11996014567",
            "token" => ""
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
