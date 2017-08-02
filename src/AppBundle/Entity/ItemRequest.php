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
 * @ORM\Entity
 * @ORM\Table(name="item_request")
 */
class ItemRequest
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="MaterialRequest", inversedBy="itemRequests")
     * @ORM\JoinColumn(name="material_request_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $materialRequest;

    /**
     * @ORM\ManyToOne(targetEntity="Item", cascade={"persist"})
     */
    private $item;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\ManyToOne(targetEntity="Phase", cascade={"persist"})
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