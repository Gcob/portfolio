<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Page;

/**
 * PageContent
 *
 * @ORM\Table(name="page_content")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PageContentRepository")
 */
class PageContent
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="locale", type="string", length=2)
     */
    private $locale;

    /**
     * @var string
     *
     * @ORM\Column(name="varname", type="string", length=255)
     */
    private $varname;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=99999)
     */
    private $content;
	
	/**
	 * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Page")
	 * @ORM\JoinColumn(nullable=false)
	 */
	private $page;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set locale
     *
     * @param string $locale
     *
     * @return PageContent
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Get locale
     *
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set varname
     *
     * @param string $varname
     *
     * @return PageContent
     */
    public function setVarname($varname)
    {
        $this->varname = $varname;

        return $this;
    }

    /**
     * Get varname
     *
     * @return string
     */
    public function getVarname()
    {
        return $this->varname;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return PageContent
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
     * Set page
     *
     * @param \AppBundle\Entity\Page $page
     *
     * @return PageContent
     */
    public function setPage(\AppBundle\Entity\Page $page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return \AppBundle\Entity\Page
     */
    public function getPage()
    {
        return $this->page;
    }
}
