<?php
/**
 * Created by PhpStorm.
 * User: koolan
 * Date: 8/1/17
 * Time: 9:49 PM
 */

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;


/**
 * @orm\Entity
 * @orm\Table(name="`user`")
 */
class User extends BaseUser
{
    /**
     * @orm\Id
     * @orm\GeneratedValue(strategy="AUTO")
     * @orm\Column(type="integer")
     */
    protected $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}