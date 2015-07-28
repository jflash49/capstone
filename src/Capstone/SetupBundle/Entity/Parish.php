<?php

namespace Capstone\SetupBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parish
 *
 * @ORM\Table(name="parish")
 * @ORM\Entity
 */
class Parish
{
    /**
     * @var integer
     *
     * @ORM\Column(name="parish_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $parishId;

    /**
     * @var string
     *
     * @ORM\Column(name="parish", type="string", length=255, nullable=true)
     */
    private $parish;



    /**
     * Get parishId
     *
     * @return integer 
     */
    public function getParishId()
    {
        return $this->parishId;
    }

    /**
     * Set parish
     *
     * @param string $parish
     * @return Parish
     */
    public function setParish($parish)
    {
        $this->parish = $parish;

        return $this;
    }

    /**
     * Get parish
     *
     * @return string 
     */
    public function getParish()
    {
        return $this->parish;
    }
    
    /**
     *
     *Get Parish
     *@return parish
     */
     public function __toString()
     {
		return (string) $this->getParish();
     }
}
