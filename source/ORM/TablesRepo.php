<?php

namespace Source\ORM;

use SQLite3;

class TablesRepo
{
    private $db;

    public function __construct(SQLite3 $db)
    {
        $this->db = $db;
    }

    public function createTables()
    {
        $this->createUsersTable();
        $this->createDecksTable();
        $this->createCardsTable();
        $this->createDeckCardsTable();
    }

    private function createUsersTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS user (
            id INTEGER  PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            role VARCHAR(255) NOT NULL,
            remember_token VARCHAR(255),
            UNIQUE (name),
            UNIQUE (email)
        )";

        $this->db->exec($sql);
    }

    private function createDecksTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS decks (
            id INTEGER  PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            user_id INT NOT NULL,
            FOREIGN KEY (user_id) REFERENCES users(id)
        )";

        $this->db->exec($sql);
    }

    private function createCardsTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS Cards (
                        id INTEGER PRIMARY KEY,
                        name TEXT,
                        category TEXT,
                        ability TEXT,
                        flavor TEXT,
                        art TEXT)";

        $this->db->exec($sql);
    }

    private function createAtributes()
    {
        $sql = "CREATE TABLE IF NOT EXISTS Attributes (
                        card_id INTEGER PRIMARY KEY,
                        set_name TEXT,
                        type TEXT,
                        armor INTEGER,
                        color TEXT,
                        power INTEGER,
                        reach INTEGER,
                        artist TEXT,
                        rarity TEXT,
                        faction TEXT,
                        related TEXT,
                        provision INTEGER,
                        factionSecondary TEXT,
                        FOREIGN KEY (card_id) REFERENCES Cards (id)
                     )";

        $this->db->exec($sql);
    }

    private function createDeckCardsTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS deck_cards (
            id INTEGER PRIMARY KEY,
            deck_id INT NOT NULL,
            card_id INT NOT NULL,
            FOREIGN KEY (deck_id) REFERENCES decks(id),
            FOREIGN KEY (card_id) REFERENCES Cards(id)
        )";

        $this->db->exec($sql);
    }

    public function presetData()
    {
        $hashedPassword = password_hash('password', PASSWORD_DEFAULT);

        // Prepare the SQL statement
        $stmt = $this->db->prepare("INSERT INTO user (name, email, password, role) VALUES ('mart', 'mart@example.net', :password, 'admin')");
        $stmt->bindValue(':password', $hashedPassword, SQLITE3_TEXT);
        $result = $stmt->execute();

        $stmt = $this->db->prepare("INSERT INTO user (name, email, password, role) VALUES ('shane', 'mart@example.net', :password, 'premium')");
        $stmt->bindValue(':password', $hashedPassword, SQLITE3_TEXT);
        $result = $stmt->execute();

        $stmt = $this->db->prepare("INSERT INTO user (name, email, password, role) VALUES ('jorn', 'mart@example.net', :password, 'user')");
        $stmt->bindValue(':password', $hashedPassword, SQLITE3_TEXT);
        $result = $stmt->execute();

    }


}