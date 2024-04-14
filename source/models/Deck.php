<?php

namespace Source\models;

class Deck {
    #[Column(name: 'deck_name')]
    private string $deckName;

    #[Column(name: 'creator')]
    private string $creator;

    public function __construct(string $deckName, string $creator) {
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
}