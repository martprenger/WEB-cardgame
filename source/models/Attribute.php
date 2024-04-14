<?php

namespace Source\models;

#[Entity]
#[Table(name: 'attribute')]
class Attribute
{
    #[Column(name: 'set_name')]
    private string $setName;

    #[Column(name: 'type')]
    private string $type;

    #[Column(name: 'armor')]
    private int $armor;

    #[Column(name: 'color')]
    private string $color;

    #[Column(name: 'power')]
    private int $power;

    #[Column(name: 'reach')]
    private int $reach;

    #[Column(name: 'artist')]
    private string $artist;

    #[Column(name: 'rarity')]
    private string $rarity;

    #[Column(name: 'faction')]
    private string $faction;

    #[Column(name: 'related')]
    private string $related;

    #[Column(name: 'provision')]
    private int $provision;

    #[Column(name: 'faction_secondary')]
    private string $factionSecondary;

    #[ManyToOne(targetEntity: Card::class, inversedBy: 'attributes')]
    #[JoinColumn(name: 'card_id', referencedColumnName: 'id')]
    private Card $card;

    public function __construct(string $setName, string $type, int $armor, string $color, int $power, int $reach, string $artist, string $rarity, string $faction, string $related, int $provision, string $factionSecondary)
    {
        $this->setName = $setName;
        $this->type = $type;
        $this->armor = $armor;
        $this->color = $color;
        $this->power = $power;
        $this->reach = $reach;
        $this->artist = $artist;
        $this->rarity = $rarity;
        $this->faction = $faction;
        $this->related = $related;
        $this->provision = $provision;
        $this->factionSecondary = $factionSecondary;
    }

// getters for properties
    public function getSetName(): string
    {
        return $this->setName;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getArmor(): int
    {
        return $this->armor;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getPower(): int
    {
        return $this->power;
    }

    public function getReach(): int
    {
        return $this->reach;
    }

    public function getArtist(): string
    {
        return $this->artist;
    }

    public function getRarity(): string
    {
        return $this->rarity;
    }

    public function getFaction(): string
    {
        return $this->faction;
    }

    public function getRelated(): string
    {
        return $this->related;
    }

    public function getProvision(): int
    {
        return $this->provision;
    }

    public function getFactionSecondary(): string
    {
        return $this->factionSecondary;
    }
}