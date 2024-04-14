<?php

namespace Source\models;

#[Entity]
#[Table(name: 'card')]
class Card {
    #[Column(name: 'id')]
    private int $id;

    #[Column(name: 'art')]
    private string $art;

    #[Column(name: 'name')]
    private string $name;

    #[Column(name: 'category')]
    private string $category;

    #[Column(name: 'ability')]
    private string $ability;

    #[Column(name: 'flavor')]
    private string $flavor;

    #[OneToMany(targetEntity: Attribute::class, mappedBy: 'card')]
    private array $attributes;

    public function __construct(int $id, string $name, string $category, string $ability, string $flavor, string $art, array $attributes) {
        $this->id = $id;
        $this->art = $art;
        $this->name = $name;
        $this->category = $category;
        $this->ability = $ability;
        $this->flavor = $flavor;
        $this->attributes = $attributes;
    }

    // getters for properties
    public function getId(): int {
        return $this->id;
    }

    public function getArt(): string {
        return $this->art;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getCategory(): string {
        return $this->category;
    }

    public function getAbility(): string {
        return $this->ability;
    }

    public function getFlavor(): string {
        return $this->flavor;
    }

    public function getAttributes(): array {
        return $this->attributes;
    }
}