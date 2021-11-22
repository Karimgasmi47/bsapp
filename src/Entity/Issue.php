<?php

namespace App\Entity;

use App\Repository\IssueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IssueRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class Issue
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=IssueType::class, inversedBy="issues")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=IssuePriority::class, inversedBy="issues")
     */
    private $priority;

    /**
     * @ORM\ManyToOne(targetEntity=IssueStatus::class, inversedBy="issues")
     */
    private $status;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity=IssueComment::class, mappedBy="issue")
     */
    private $issueComments;

    public function __construct()
    {
        $this->setUpdatedAt(new \DateTimeImmutable());
        $this->issueComments = new ArrayCollection();
    }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getType(): ?IssueType
    {
        return $this->type;
    }

    public function setType(?IssueType $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPriority(): ?IssuePriority
    {
        return $this->priority;
    }

    public function setPriority(?IssuePriority $priority): self
    {
        $this->priority = $priority;

        return $this;
    }

    public function getStatus(): ?IssueStatus
    {
        return $this->status;
    }

    public function setStatus(?IssueStatus $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updatedTimestamps(): void
    {
        $this->setUpdatedAt(new \DateTimeImmutable('now'));
        if ($this->getUpdatedAt() === null) {
            $this->setUpdatedAt(new \DateTime('now'));
        }
    }

    /**
     * @return Collection|IssueComment[]
     */
    public function getIssueComments(): Collection
    {
        return $this->issueComments;
    }

    public function addIssueComment(IssueComment $issueComment): self
    {
        if (!$this->issueComments->contains($issueComment)) {
            $this->issueComments[] = $issueComment;
            $issueComment->setIssue($this);
        }

        return $this;
    }

    public function removeIssueComment(IssueComment $issueComment): self
    {
        if ($this->issueComments->removeElement($issueComment)) {
            // set the owning side to null (unless already changed)
            if ($issueComment->getIssue() === $this) {
                $issueComment->setIssue(null);
            }
        }

        return $this;
    }
}
