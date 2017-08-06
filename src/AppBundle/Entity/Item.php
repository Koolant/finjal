<?php
/**
 * Created by PhpStorm.
 * User: koolan
 * Date: 7/29/17
 * Time: 11:02 PM
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @orm\Entity
 * @orm\Table(name="item")
 */
class Item
{
    /**
     * @orm\Id
     * @orm\Column(type="integer")
     * @orm\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @orm\Column(type="string")
     */
    private $name;

    /**
     * @orm\Column(type="string")
     */
    private $phase;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPhase()
    {
        return $this->phase;
    }

    /**
     * @param mixed $phase
     */
    public function setPhase($phase)
    {
        $this->phase = $phase;
    }


    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->getName();
    }
}