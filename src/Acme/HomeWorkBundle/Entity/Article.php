<?php

namespace Acme\HomeWorkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="Acme\HomeWorkBundle\Entity\ArticleRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Article
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createAt", type="datetime")
     */
    private $createAt;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="articles")
     * @ORM\JoinColumn(name="category", referencedColumnName="id")
     */
    protected $category;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="articles")
     * @ORM\JoinColumn(name="user", referencedColumnName="id")
     */
    protected $user;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

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
     * Set title
     *
     * @param string $title
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set createAt
     *
     * @ORM\PrePersist
     */
    public function setCreateAt()
    {
        $this->createAt = new \DateTime();
    }

    /**
     * Get createAt
     *
     * @return \DateTime
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Article
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set category
     *
     * @param \Acme\HomeWorkBundle\Entity\Category $category
     * @return Article
     */
    public function setCategory(\Acme\HomeWorkBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Acme\HomeWorkBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set user
     *
     * @param \Acme\HomeWorkBundle\Entity\User $user
     * @return Article
     */
    public function setUser(\Acme\HomeWorkBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Acme\HomeWorkBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}