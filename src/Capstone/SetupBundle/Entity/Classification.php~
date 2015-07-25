<?php

namespace Capstone\SetupBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classification
 *
 * @ORM\Table(name="Classification")
 * @ORM\Entity
 */
class Classification
{
    /**
     * @var string
     *
     * @ORM\Column(name="Classification_IQ", type="string", length=20)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $classificationIq;

    /**
     * @var string
     *
     * @ORM\Column(name="Classify", type="string", length=30, nullable=true)
     */
    private $classify;



    /**
     * Get classificationIq
     *
     * @return string 
     */
    public function getClassificationIq()
    {
        return $this->classificationIq;
    }

    /**
     * Set classify
     *
     * @param string $classify
     * @return Classification
     */
    public function setClassify($classify)
    {
        $this->classify = $classify;

        return $this;
    }

    /**
     * Get classify
     *
     * @return string 
     */
    public function getClassify()
    {
        return $this->classify;
    }
}
