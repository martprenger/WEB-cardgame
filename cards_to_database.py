import sqlite3
import requests

# Function to fetch JSON data from the API
def fetch_data():
    url = "https://api.gwent.one/?key=data&version=1.0.0.15"
    response = requests.get(url)
    if response.status_code == 200:
        return response.json()
    else:
        print("Failed to fetch data from API.")
        return None

# Function to create SQLite database and insert data
def create_database(json_data):
    if json_data and 'response' in json_data:
        # Connect to SQLite database
        conn = sqlite3.connect('database/database.db')
        c = conn.cursor()

        # Create tables
        c.execute('''CREATE TABLE IF NOT EXISTS Cards (
                        id INTEGER PRIMARY KEY,
                        name TEXT,
                        category TEXT,
                        ability TEXT,
                        flavor TEXT,
                        art TEXT
                     )''')

        c.execute('''CREATE TABLE IF NOT EXISTS Attributes (
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
                     )''')

        # Insert data into tables
        for card_id, card_data in json_data['response'].items():
            # Check if all required keys are present
            if 'name' in card_data and 'category' in card_data and 'ability' in card_data and 'flavor' in card_data and 'attributes' in card_data:
                try:
                    # Insert into Cards table

                    art_url = f"https://api.gwent.one/?key=data&id={card_data['id'].get('card')}&response=html&html=info&version=1.1.0"
                    print(art_url)
                    art = requests.get(art_url).text
                    print(art)
                    c.execute("INSERT INTO Cards (id, name, category, ability, flavor, art) VALUES (?, ?, ?, ?, ?, ?)",
                        (card_data['id'].get('card'), card_data['name'], card_data['category'], card_data['ability'], card_data['flavor'], art))


                    # Insert into Attributes table
                    attributes = card_data['attributes']
                    c.execute("INSERT INTO Attributes (card_id, set_name, type, armor, color, power, reach, artist, rarity, faction, related, provision, factionSecondary) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)",
                              (card_data['id'].get('card'), attributes.get('set'), attributes.get('type'), attributes.get('armor'), attributes.get('color'), attributes.get('power'), attributes.get('reach'), attributes.get('artist'), attributes.get('rarity'), attributes.get('faction'), attributes.get('related'), attributes.get('provision'), attributes.get('factionSecondary')))
                except sqlite3.IntegrityError:
                    print(f"Skipping duplicate card with ID {card_data['id'].get('card')}.")
            else:
                print(f"Skipping card with ID {card_data['id'].get('card')} due to missing required fields.")

        # Commit changes and close connection
        conn.commit()
        conn.close()

        print("Data inserted successfully into SQLite database.")
    else:
        print("No data fetched from API or missing 'response' key.")

# Fetch JSON data from the API
json_data = fetch_data()

# Create SQLite database and insert data
create_database(json_data)
