<?php

namespace Project\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrderMovie
 */
class OrderMovie
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $completedAt;

    /**
     * @var string
     */
    private $number;

    /**
     * @var string
     */
    private $items;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set completedAt
     *
     * @param \DateTime $completedAt
     * @return OrderMovie
     */
    public function setCompletedAt($completedAt)
    {
        $this->completedAt = $completedAt;

        return $this;
    }

    /**
     * Get completedAt
     *
     * @return \DateTime 
     */
    public function getCompletedAt()
    {
        return $this->completedAt;
    }

    /**
     * Set number
     *
     * @param string $number
     * @return OrderMovie
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set items
     *
     * @param string $items
     * @return OrderMovie
     */
    public function setItems($items)
    {
        $this->items = $items;

        return $this;
    }

    /**
     * Get items
     *
     * @return string 
     */
    public function getItems()
    {
        return $this->items;
    }
    /**
     * @var integer
     */
    private $items_number;


    /**
     * Set items_number
     *
     * @param integer $itemsNumber
     * @return OrderMovie
     */
    public function setItemsNumber($itemsNumber)
    {
        $this->items_number = $itemsNumber;

        return $this;
    }

    /**
     * Get items_number
     *
     * @return integer 
     */
    public function getItemsNumber()
    {
        return $this->items_number;
    }
}
