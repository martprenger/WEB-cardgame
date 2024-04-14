<?php

namespace Source\models;

#[Entity]
#[Table(name: 'card')]
class Card {
    #[Column(name: 'id')]
    private int $id;

    #[Column(name: 'art_id')]
    private int $art_id;

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

    public function __construct(int $id, int $art_id, string $name, string $category, string $ability, string $flavor, array $attributes) {
        $this->id = $id;
        $this->art_id = $art_id;
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

    public function getArtId(): int {
        return $this->art_id;
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