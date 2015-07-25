<?php

namespace Capstone\SetupBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Schools
 *
 * @ORM\Table(name="schools")
 * @ORM\Entity
 */
class Schools
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="CLARENDON", type="string", length=44, nullable=true)
     */
    private $clarendon;

    /**
     * @var string
     *
     * @ORM\Column(name="TRELAWNY", type="string", length=32, nullable=true)
     */
    private $trelawny;

    /**
     * @var string
     *
     * @ORM\Column(name="SAINT_ST_THOMAS", type="string", length=42, nullable=true)
     */
    private $saintStThomas;

    /**
     * @var string
     *
     * @ORM\Column(name="SAINT_ST_MARY", type="string", length=33, nullable=true)
     */
    private $saintStMary;

    /**
     * @var string
     *
     * @ORM\Column(name="WESTMORELAND", type="string", length=37, nullable=true)
     */
    private $westmoreland;

    /**
     * @var string
     *
     * @ORM\Column(name="SAINT_ELIZABETH", type="string", length=32, nullable=true)
     */
    private $saintElizabeth;

    /**
     * @var string
     *
     * @ORM\Column(name="SAINT_JAMES", type="string", length=45, nullable=true)
     */
    private $saintJames;

    /**
     * @var string
     *
     * @ORM\Column(name="SAINT_CATHERINE", type="string", length=50, nullable=true)
     */
    private $saintCatherine;

    /**
     * @var string
     *
     * @ORM\Column(name="HANOVER", type="string", length=34, nullable=true)
     */
    private $hanover;

    /**
     * @var string
     *
     * @ORM\Column(name="KINGSTON_STANDREW", type="string", length=50, nullable=true)
     */
    private $kingstonStandrew;

    /**
     * @var string
     *
     * @ORM\Column(name="MANCHESTER", type="string", length=41, nullable=true)
     */
    private $manchester;

    /**
     * @var string
     *
     * @ORM\Column(name="PORTLAND", type="string", length=45, nullable=true)
     */
    private $portland;

    /**
     * @var string
     *
     * @ORM\Column(name="SAINT_ANN", type="string", length=45, nullable=true)
     */
    private $saintAnn;



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
     * Set clarendon
     *
     * @param string $clarendon
     * @return Schools
     */
    public function setClarendon($clarendon)
    {
        $this->clarendon = $clarendon;

        return $this;
    }

    /**
     * Get clarendon
     *
     * @return string 
     */
    public function getClarendon()
    {
        return $this->clarendon;
    }

    /**
     * Set trelawny
     *
     * @param string $trelawny
     * @return Schools
     */
    public function setTrelawny($trelawny)
    {
        $this->trelawny = $trelawny;

        return $this;
    }

    /**
     * Get trelawny
     *
     * @return string 
     */
    public function getTrelawny()
    {
        return $this->trelawny;
    }

    /**
     * Set saintStThomas
     *
     * @param string $saintStThomas
     * @return Schools
     */
    public function setSaintStThomas($saintStThomas)
    {
        $this->saintStThomas = $saintStThomas;

        return $this;
    }

    /**
     * Get saintStThomas
     *
     * @return string 
     */
    public function getSaintStThomas()
    {
        return $this->saintStThomas;
    }

    /**
     * Set saintStMary
     *
     * @param string $saintStMary
     * @return Schools
     */
    public function setSaintStMary($saintStMary)
    {
        $this->saintStMary = $saintStMary;

        return $this;
    }

    /**
     * Get saintStMary
     *
     * @return string 
     */
    public function getSaintStMary()
    {
        return $this->saintStMary;
    }

    /**
     * Set westmoreland
     *
     * @param string $westmoreland
     * @return Schools
     */
    public function setWestmoreland($westmoreland)
    {
        $this->westmoreland = $westmoreland;

        return $this;
    }

    /**
     * Get westmoreland
     *
     * @return string 
     */
    public function getWestmoreland()
    {
        return $this->westmoreland;
    }

    /**
     * Set saintElizabeth
     *
     * @param string $saintElizabeth
     * @return Schools
     */
    public function setSaintElizabeth($saintElizabeth)
    {
        $this->saintElizabeth = $saintElizabeth;

        return $this;
    }

    /**
     * Get saintElizabeth
     *
     * @return string 
     */
    public function getSaintElizabeth()
    {
        return $this->saintElizabeth;
    }

    /**
     * Set saintJames
     *
     * @param string $saintJames
     * @return Schools
     */
    public function setSaintJames($saintJames)
    {
        $this->saintJames = $saintJames;

        return $this;
    }

    /**
     * Get saintJames
     *
     * @return string 
     */
    public function getSaintJames()
    {
        return $this->saintJames;
    }

    /**
     * Set saintCatherine
     *
     * @param string $saintCatherine
     * @return Schools
     */
    public function setSaintCatherine($saintCatherine)
    {
        $this->saintCatherine = $saintCatherine;

        return $this;
    }

    /**
     * Get saintCatherine
     *
     * @return string 
     */
    public function getSaintCatherine()
    {
        return $this->saintCatherine;
    }

    /**
     * Set hanover
     *
     * @param string $hanover
     * @return Schools
     */
    public function setHanover($hanover)
    {
        $this->hanover = $hanover;

        return $this;
    }

    /**
     * Get hanover
     *
     * @return string 
     */
    public function getHanover()
    {
        return $this->hanover;
    }

    /**
     * Set kingstonStandrew
     *
     * @param string $kingstonStandrew
     * @return Schools
     */
    public function setKingstonStandrew($kingstonStandrew)
    {
        $this->kingstonStandrew = $kingstonStandrew;

        return $this;
    }

    /**
     * Get kingstonStandrew
     *
     * @return string 
     */
    public function getKingstonStandrew()
    {
        return $this->kingstonStandrew;
    }

    /**
     * Set manchester
     *
     * @param string $manchester
     * @return Schools
     */
    public function setManchester($manchester)
    {
        $this->manchester = $manchester;

        return $this;
    }

    /**
     * Get manchester
     *
     * @return string 
     */
    public function getManchester()
    {
        return $this->manchester;
    }

    /**
     * Set portland
     *
     * @param string $portland
     * @return Schools
     */
    public function setPortland($portland)
    {
        $this->portland = $portland;

        return $this;
    }

    /**
     * Get portland
     *
     * @return string 
     */
    public function getPortland()
    {
        return $this->portland;
    }

    /**
     * Set saintAnn
     *
     * @param string $saintAnn
     * @return Schools
     */
    public function setSaintAnn($saintAnn)
    {
        $this->saintAnn = $saintAnn;

        return $this;
    }

    /**
     * Get saintAnn
     *
     * @return string 
     */
    public function getSaintAnn()
    {
        return $this->saintAnn;
    }
}
