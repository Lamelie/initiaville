<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Comment
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Project::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $project;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getCreatedAtFormat ()
    {
        return $this->formatTime($this->getCreatedAt());
    }

    private function formatTime(\DateTimeInterface $time): string
    {
        $date1 = new \DateTime("now");
        $date2 = $this->getCreatedAt();
        $interval = $date2->diff($date1);
        $days = $interval->format("d");
        $hours = $interval->format("h");
        $minutes = $interval->format("i");
        $formattedTime = "";

        if ($days > 0)
            $formattedTime = "$days jour" . (($days > 1) ? "s" : "");

        else {
            if ($hours > 0) {
                $formattedTime = "$hours heure" . (($hours > 1) ? "s" : "");
            }
            $formattedTime .= " ";
            if ($minutes > 0) {
                $formattedTime .= "$minutes minute" . (($minutes > 1) ? "s" : "");
            }
        }

        return $interval->format($formattedTime);
    }

    /**
     * @ORM\PrePersist()
     */
    public function prePersist() {
        $this->setCreatedAt(new \DateTime());
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): self
    {
        $this->project = $project;

        return $this;
    }

    public function __toString()
    {
        return $this->getUser() . " a écrit : " . $this->getTitle() . "/" . $this->getContent();
    }
}
