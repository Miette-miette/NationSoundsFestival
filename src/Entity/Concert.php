<?php

namespace App\Entity;

use App\Repository\ConcertRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;

use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Serializer\Attribute\MaxDepth;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: ConcertRepository::class)]
#[Vich\Uploadable]
class Concert
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['api_event'])]
    private ?int $id = null;

    #[Groups(['api_event'])]
    #[ORM\Column(length: 30)]
    private ?string $name = null;

    #[Groups(['api_event'])]
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $begin_datetime = null;

    #[Groups(['api_event'])]
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $end_datetime = null;

    #[Groups(['api_event'])]
    #[ORM\Column(length: 6000)]
    private ?string $content = null;

    // NOTE: This is not a mapped field of entity metadata, just a simple property.
    #[Vich\UploadableField(mapping: 'ns_img', fileNameProperty: 'imageName' )]
    private ?File $imageFile = null;

    #[Groups(['api_event'])]
    #[ORM\Column(nullable: true)]
    private ?string $img = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[Groups(['api_event'])]
    #[ORM\ManyToOne(inversedBy: 'concerts')]
    #[ORM\JoinColumn(name:"location_id",referencedColumnName:"id", nullable: true)]
    #[MaxDepth(1)]
    private ?Location $location = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getBeginDatetime(): ?\DateTimeInterface
    {
        return $this->begin_datetime;
    }

    public function setBeginDatetime(\DateTimeInterface $begin_datetime): static
    {
        $this->begin_datetime = $begin_datetime;

        return $this;
    }

    public function getEndDatetime(): ?\DateTimeInterface
    {
        return $this->end_datetime;
    }

    public function setEndDatetime(\DateTimeInterface $end_datetime): static
    {
        $this->end_datetime = $end_datetime;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $img): void
    {
        $this->img = $img;
    }

    public function getImageName(): ?string
    {
        return $this->img;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): static
    {
        $this->location = $location;

        return $this;
    }
}
