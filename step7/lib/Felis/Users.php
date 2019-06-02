<?php
/**
 * Created by PhpStorm.
 * User: Chang Ge
 * Date: 6/10/2018
 * Time: 4:12 PM
 */

namespace Felis;


class Users extends Table
{
    /**
     * Constructor
     * @param $site The Site object
     */
    public function __construct(Site $site) {
        parent::__construct($site, "user");
    }

    /**
     * Get a user based on the id
     * @param $id ID of the user
     * @returns User object if successful, null otherwise.
     */
    public function get($id) {
        $sql =<<<SQL
SELECT * from $this->tableName
where id=?
SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);

        $statement->execute(array($id));
        if($statement->rowCount() === 0) {
            return null;
        }

        return new User($statement->fetch(\PDO::FETCH_ASSOC));
    }

    /**
     * Modify a user record based on the contents of a User object
     * @param User $user User object for object with modified data
     * @return true if successful, false if failed or user does not exist
     */
    public function update(User $user) {

        $id=$user->getId();
        $sql =<<<SQL
SELECT * from $this->tableName
where id=?
SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($id));
        if($statement->rowCount() === 0) {
            return false;
        }
        $id=$user->getId();
        $email=$user->getEmail();
        $sql =<<<SQL
SELECT * from $this->tableName
where id<>? and email=?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($id,$email));
        if($statement->rowCount() !== 0) {
            return false;
        }

        $email=$user->getEmail();
        $name=$user->getName();
        $phone=$user->getPhone();
        $address=$user->getAddress();
        $note=$user->getNotes();
        $role=$user->getRole();
        $id=$user->getId();
        $joined=$user->getJoined();
        $sql2=<<<SQL
update $this->tableName
set name=? , phone=?, address=?, notes=?, role=?,joined=?,email=?
where id=?
SQL;
        $pdo = $this->pdo();
        $statement1 = $pdo->prepare($sql2);
        $statement1->execute(array($name,$phone,$address,$note,$role,$joined,$email,$id));

        return true;











    }






    /**
     * Test for a valid login.
     * @param $email User email
     * @param $password Password credential
     * @returns User object if successful, null otherwise.
     */
    public function login($email, $password) {

        $sql =<<<SQL
SELECT * from $this->tableName
where email=? and password=?
SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);

        $statement->execute(array($email, $password));
        if($statement->rowCount() === 0) {
            return null;
        }

        return new User($statement->fetch(\PDO::FETCH_ASSOC));

    }
}