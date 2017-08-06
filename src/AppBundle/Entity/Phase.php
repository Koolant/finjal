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
 * @orm\Table(name="phase")
 */
class Phase
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
    private $phaseNumber;

    /**
     * @orm\Column(type="string")
     */
    private $name;

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
    public function getPhaseNumber()
    {
        return $this->phaseNumber;
    }

    /**
     * @param mixed $phaseNumber
     */
    public function setPhaseNumber($phaseNumber)
    {
        $this->phaseNumber = $phaseNumber;
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

    public function __toString()
    {
        return $this->getPhaseNumber() . ' - ' . $this->getName();
    }
}