<?php

namespace Api\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Employee
{
    /**
     * @Assert\NotNull()
     * @var string
     */
    private $firstName;

    /**
     * @Assert\NotNull()
     * @var string
     */
    private $lastName;

    /**
     * @Assert\GreaterThan(value="18")
     * @var int
     */
    private $age;

    /**
     * @Assert\NotNull()
     * @var string
     */
    private $about;

    /**
     * @Assert\Count(min="1")
     * @var array
     */
    private $interests;

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     *
     * @return Employee
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAbout()
    {
        return $this->about;
    }

    /**
     * @param mixed $about
     *
     * @return Employee
     */
    public function setAbout($about)
    {
        $this->about = $about;

        return $this;
    }
    /**
     * @return mixed
     */
    public function getInterests()
    {
        return $this->interests;
    }

    /**
     * @param mixed $interests
     *
     * @return Employee
     */
    public function setInterests($interests)
    {
        $this->interests = $interests;

        return $this;
    }

    /**
     * @param string $firstName
     *
     * @return Employee
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $lastName
     *
     * @return Employee
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }
}