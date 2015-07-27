<?php

namespace Capstone\SetupBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * School
 *
 * @ORM\Table(name="school", indexes={@ORM\Index(name="parish_id", columns={"parish_id"})})
 * @ORM\Entity
 */
class School
{
    /**
     * @var integer
     *
     * @ORM\Column(name="school_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $schoolId;

    /**
     * @var string
     *
     * @ORM\Column(name="school", type="string", length=255, nullable=true)
     */
    private $school;

    /**
     * @var \Capstone\SetupBundle\Entity\Parish
     *
     * @ORM\ManyToOne(targetEntity="Capstone\SetupBundle\Entity\Parish")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parish_id", referencedColumnName="parish_ID")
     * })
     */
    private $parish;



    /**
     * Get schoolId
     *
     * @return integer 
     */
    public function getSchoolId()
    {
        return $this->schoolId;
    }

    /**
     * Set school
     *
     * @param string $school
     * @return School
     */
    public function setSchool($school)
    {
        $this->school = $school;

        return $this;
    }

    /**
     * Get school
     *
     * @return string 
     */
    public function getSchool()
    {
        return $this->school;
    }

    /**
     * Set parish
     *
     * @param \Capstone\SetupBundle\Entity\Parish $parish
     * @return School
     */
    public function setParish(\Capstone\SetupBundle\Entity\Parish $parish = null)
    {
        $this->parish = $parish;

        return $this;
    }

    /**
     * Get parish
     *
     * @return \Capstone\SetupBundle\Entity\Parish 
     */
    public function getParish()
    {
        return $this->parish;
    }
}
