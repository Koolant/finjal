<?php
/**
 * Created by PhpStorm.
 * User: koolan
 * Date: 7/29/17
 * Time: 9:39 PM
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="material_request")
 */
class MaterialRequest
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Job")
     */
    private $job;

    /**
     * @ORM\Column(type="string")
     */
    private $requester;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateTime;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="ItemRequest", mappedBy="materialRequest", cascade={"persist"})
     */
    private $itemRequests;

    /**
     * MaterialRequest constructor.
     */
    public function __construct()
    {
        $this->itemRequests = new ArrayCollection();
    }

    /**
     * @param ItemRequest $itemRequest
     */
    public function addItemRequest(ItemRequest $itemRequest)
    {
        $itemRequest->setMaterialRequest($this);
        $this->itemRequests->add($itemRequest);
    }

    /**
     * @param ItemRequest $itemRequest
     */
    public function removeItemRequest(ItemRequest $itemRequest)
    {
        $this->itemRequests->remove($itemRequest);
    }

    /**
     * @return ArrayCollection|Collection
     */
    public function getItemRequests()
    {
        return $this->itemRequests;
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
    public function getJob()
    {
        return $this->job;
    }

    /**
     * @param mixed $job
     */
    public function setJob($job)
    {
        $this->job = $job;
    }

    /**
     * @return mixed
     */
    public function getRequester()
    {
        return $this->requester;
    }

    /**
     * @param mixed $requester
     */
    public function setRequester($requester)
    {
        $this->requester = $requester;
    }

    /**
     * @param mixed $dateTime
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;
    }

    /**
     * @return mixed
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
    * @ORM\PrePersist
    */
    public function onPrePersist()
    {
        $this->dateTime = new \DateTime("now");
    }
}