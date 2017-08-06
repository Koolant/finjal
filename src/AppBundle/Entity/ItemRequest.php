<?php
/**
 * Created by PhpStorm.
 * User: koolan
 * Date: 7/29/17
 * Time: 10:45 PM
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @orm\Entity
 * @orm\Table(name="item_request")
 */
class ItemRequest
{
    /**
     * @orm\Id
     * @orm\Column(type="integer")
     * @orm\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @orm\ManyToOne(targetEntity="MaterialRequest", inversedBy="itemRequests")
     * @orm\JoinColumn(name="material_request_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $materialRequest;

    /**
     * @orm\ManyToOne(targetEntity="Item", cascade={"persist"})
     */
    private $item;

    /**
     * @orm\Column(type="integer")
     */
    private $quantity;

    /**
     * @orm\ManyToOne(targetEntity="Phase", cascade={"persist"})
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
    public function getMaterialRequest()
    {
        return $this->materialRequest;
    }

    /**
     * @param mixed $materialRequest
     */
    public function setMaterialRequest($materialRequest)
    {
        $this->materialRequest = $materialRequest;
    }

    /**
     * @return mixed
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param mixed $item
     */
    public function setItem($item)
    {
        $this->item = $item;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
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

}