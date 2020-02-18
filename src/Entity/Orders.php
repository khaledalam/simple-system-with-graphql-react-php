<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrdersRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Orders
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Buyer", inversedBy="orders")
     */
    private $buyer;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Product", inversedBy="orders")
     */
    private $products;

    /**
     * @var datetime $timeStamp
     * @ORM\Column(type="datetime")
     */
    protected $timeStamp;

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->createTimestamps();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBuyer(): ?Buyer
    {
        return $this->buyer;
    }

    public function setBuyer(?Buyer $buyer): self
    {
        $this->buyer = $buyer;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->contains($product)) {
            $this->products->removeElement($product);
        }

        return $this;
    }

    /**
     * @ORM\PrePersist()
     */
    public function createTimestamps(): void
    {
        $this->setTimestamp(new \DateTime('now'));
    }

    public function getTimestamp(): string
    {
        return $this->timeStamp->format('Y-m-d H:i:s');
    }

    public function setTimestamp(\DateTime $timeStamp): void
    {
        $this->timeStamp = $timeStamp;
    }


}
