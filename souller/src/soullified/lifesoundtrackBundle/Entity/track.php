<?php

namespace soullified\lifesoundtrackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * track
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="soullified\lifesoundtrackBundle\Entity\trackRepository")
 */
class track
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="mood", type="integer")
     */
    private $mood;


    /**
     * @var string
     *
     * @ORM\Column(name="chosenlyrics", type="text",nullable=true)
     */
    private $chosenlyrics;

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=255,nullable=true)
     */
    private $date;

  /**
    * @ORM\OneToMany(targetEntity="soullified\lifesoundtrackBundle\Entity\commenttrack",mappedBy="track",cascade={"persist","remove"})
    * @ORM\JoinColumn(nullable=true)
    */

    private $commentstrack;


    /**
     * @var string
     *
     * @ORM\Column(name="songtitle", type="string", length=255,nullable=true)
     */
    private $songtitle;

  /**
    * @ORM\ManyToOne(targetEntity="soullified\profilBundle\Entity\profil",inversedBy="tracks",cascade={"persist"})
    * @ORM\JoinColumn(nullable=true)
    */

    private $profil;

  /**
    * @ORM\ManyToOne(targetEntity="soullified\profilBundle\Entity\profil",cascade={"persist"})
    * @ORM\JoinColumn(nullable=true)
    */

    private $sender;


    /**
    * @ORM\OneToMany(targetEntity="soullified\boardBundle\Entity\board",mappedBy="track",cascade={"persist"})
    * @ORM\JoinColumn(nullable=true)
    */

    private $board;

    /**
     * @var string
     *
     * @ORM\Column(name="tagtext", type="string", length=255,nullable=true)
     */
    private $tagtext;

  /**
    * @ORM\ManyToOne(targetEntity="soullified\lifesoundtrackBundle\Entity\songtrack",cascade={"persist"})
    * @ORM\JoinColumn(nullable=true)
    */

    private $songtrack;


  /**
    * @ORM\OneToMany(targetEntity="soullified\lifesoundtrackBundle\Entity\commentphoto",mappedBy="track",cascade={"persist","remove"})
    * @ORM\JoinColumn(nullable=true)
    */

    private $photos;


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
     * Set chosenlyrics
     *
     * @param string $chosenlyrics
     * @return track
     */
    public function setChosenlyrics($chosenlyrics)
    {
        $this->chosenlyrics = $chosenlyrics;
    
        return $this;
    }


    
    public function gethalfTitle()
    {
        $temparr=explode('-',$this->songtitle);
        return $temparr[0];
    }


    /**
     * Get chosenlyrics
     *
     * @return string 
     */
    public function getChosenlyrics()
    {
        return $this->chosenlyrics;
    }

    /**
     * Set date
     *
     * @param string $date
     * @return track
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    
    public function timeElapsed ($time)
    {

        $time = time() - $time; // to get the time since that moment

        $tokens = array (
            31536000 => 'year',
            2592000 => 'month',
            604800 => 'week',
            86400 => 'day',
            3600 => 'hr',
            60 => 'min',
            1 => 'sec'
        );

        foreach ($tokens as $unit => $text) {
            if ($time < $unit) continue;
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
        }

    }


    /**
     * Get date
     *
     * @return string 
     */
    public function getDate()
    {
        $time = strtotime($this->date);
        return $this->timeElapsed($time);
    }

    /**
     * Set songtrack
     *
     * @param \soullified\lifesoundtrackBundle\Entity\songtrack $songtrack
     * @return track
     */
    public function setSongtrack(\soullified\lifesoundtrackBundle\Entity\songtrack $songtrack = null)
    {
        $this->songtrack = $songtrack;
    
        return $this;
    }

    /**
     * Get songtrack
     *
     * @return \soullified\lifesoundtrackBundle\Entity\songtrack 
     */
    public function getSongtrack()
    {
        return $this->songtrack;
    }


       /**
     * Set songtitle
     *
     * @param string $songtitle
     * @return track
     */
    public function setSongtitle($songtitle)
    {
        $this->songtitle = $songtitle;
    
        return $this;
    }

    /**
     * Get songtitle
     *
     * @return string 
     */
    public function getSongtitle()
    {
        return $this->songtitle;
    }


     /**
     * Set tagtext
     *
     * @param string $tagtext
     * @return track
     */
    public function setTagtext($tagtext)
    {
        $this->tagtext = $tagtext;
    
        return $this;
    }

    /**
     * Get tagtext
     *
     * @return string 
     */
    public function getTagtext()
    {
        return $this->tagtext;
    }


    /**
     * Set sender
     *
     * @param \soullified\profilBundle\Entity\profil $sender
     * @return track
     */
    public function setSender(\soullified\profilBundle\Entity\profil $sender = null)
    {
        $this->sender = $sender;
    
        return $this;
    }

    /**
     * Get sender
     *
     * @return \soullified\profilBundle\Entity\profil 
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set profil
     *
     * @param \soullified\profilBundle\Entity\profil $profil
     * @return track
     */
    public function setProfil(\soullified\profilBundle\Entity\profil $profil = null)
    {
        $this->profil = $profil;
    
        return $this;
    }

    /**
     * Get profil
     *
     * @return \soullified\profilBundle\Entity\profil 
     */
    public function getProfil()
    {
        return $this->profil;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->commentstrack = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add commentstrack
     *
     * @param \soullified\lifesoundtrackBundle\Entity\commenttrack $commentstrack
     * @return track
     */
    public function addCommentstrack(\soullified\lifesoundtrackBundle\Entity\commenttrack $commentstrack)
    {
        $this->commentstrack[] = $commentstrack;
    
        return $this;
    }

    /**
     * Remove commentstrack
     *
     * @param \soullified\lifesoundtrackBundle\Entity\commenttrack $commentstrack
     */
    public function removeCommentstrack(\soullified\lifesoundtrackBundle\Entity\commenttrack $commentstrack)
    {
        $this->commentstrack->removeElement($commentstrack);
    }

    /**
     * Get commentstrack
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommentstrack()
    {
        return $this->commentstrack;
    }

    /**
     * Set mood
     *
     * @param integer $mood
     * @return track
     */
    public function setMood($mood)
    {
        $this->mood = $mood;
    
        return $this;
    }

    /**
     * Get mood
     *
     * @return integer 
     */
    public function getMood()
    {
        return $this->mood;
    }
    
    /**
     * Add photos
     *
     * @param \soullified\lifesoundtrackBundle\Entity\commentphoto $photos
     * @return commenttrack
     */
    public function addPhoto(\soullified\lifesoundtrackBundle\Entity\commentphoto $photos)
    {
        $this->photos[] = $photos;
    
        return $this;
    }

    /**
     * Remove photos
     *
     * @param \soullified\lifesoundtrackBundle\Entity\commentphoto $photos
     */
    public function removePhoto(\soullified\lifesoundtrackBundle\Entity\commentphoto $photos)
    {
        $this->photos->removeElement($photos);
    }

    /**
     * Get photos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * Set board
     *
     * @param \soullified\boardBundle\Entity\board $board
     * @return track
     */
    public function setBoard(\soullified\boardBundle\Entity\board $board = null)
    {
        $this->board = $board;
    
        return $this;
    }

    /**
     * Get board
     *
     * @return \soullified\boardBundle\Entity\board 
     */
    public function getBoard()
    {
        return $this->board;
    }
}