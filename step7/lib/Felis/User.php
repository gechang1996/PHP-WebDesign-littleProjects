<?php
/**
 * Created by PhpStorm.
 * User: Chang Ge
 * Date: 6/10/2018
 * Time: 7:22 PM
 */

namespace Felis;


class User
{
    /**
     * Constructor
     * @param $row Row from the user table in the database
     */
    public function __construct($row) {
        $this->id = $row['id'];

        $this->email = $row['email'];
        $this->name = $row['name'];
        $this->phone = $row['phone'];
        $this->address = $row['address'];
        $this->notes = $row['notes'];
        $this->joined = strtotime($row['joined']);
        $this->role = $row['role'];
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @return mixed
     */
    public function getJoined()
    {
        return $this->joined;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }
    /**
     * Determine if user is a staff member
     * @return bool True if user is a staff member
     */
    public function isStaff() {
        return $this->role === self::ADMIN ||
            $this->role === self::STAFF;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param false|int $joined
     */
    public function setJoined($joined)
    {
        $this->joined = $joined;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }




    private $id;		///< The internal ID for the user
    private $email;		///< Email address
    private $name; 		///< Name as last, first
    private $phone; 	///< Phone number
    private $address;	///< User address
    private $notes;		///< Notes for this user
    private $joined;	///< When user was added
    private $role;		///< User role

    const ADMIN = "A";
    const STAFF = "S";
    const CLIENT = "C";

    const SESSION_NAME = 'user';
}