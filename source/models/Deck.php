<?php

namespace Source\models;

class Deck {
    #[Column(name: 'id')]
    private int $id;
    #[Column(name: 'deck_name')]
    private string $deckName;

    #[Column(name: 'creator')]
    private string $creator;

    public function __construct(int $id, string $deckName, string $creator) {
        $this->id = $id;
        $this->deckName = $deckName;
        $this->creator = $creator;
    }

    // getter for deck name
    public function getDeckName(): string {
        return $this->deckName;
    }

    // getter for creator
    public function getCreator(): string {
        return $this->creator;
    }

    public function getId(): int {
        return $this->id;
    }
}