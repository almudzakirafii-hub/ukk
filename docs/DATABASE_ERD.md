# 📊 Entity Relationship Diagram (ERD) - Garuda Hustler

**Database Name:** garuda_hustler  
**Version:** 1.0  
**Last Updated:** December 2024

---

## 1. ERD Visual Representation

```
┌────────────────────────────────────────────────────────────────────────────────┐
│                      GARUDA HUSTLER DATABASE STRUCTURE                        │
└────────────────────────────────────────────────────────────────────────────────┘


                         ┌─────────────────────┐
                         │      USERS (8)      │
                         ├─────────────────────┤
                         │ id (PK) [BIGINT]    │
                         │ name [VARCHAR]      │ ◄─────┐
                         │ email [VARCHAR]     │       │
                         │ password [VARCHAR]  │       │ 1:N
                         │ role [ENUM]         │       │
                         │ created_at          │       │
                         │ updated_at          │       │
                         └─────────────────────┘       │
                                                       │
                                 ┌─────────────────────┴───────────────┐
                                 │                                     │
                    ┌────────────▼──────────┐         ┌────────────────▼────────────┐
                    │       NEWS (7)        │         │   (USER AUTHOR RELATION)    │
                    ├──────────────────────┤         │                             │
                    │ id (PK)   [BIGINT]   │         │ Users can author multiple   │
                    │ team_id   [BIGINT] ◄─┼────┐    │ articles, but each article  │
                    │ user_id   [BIGINT] ◄─┼────┤    │ has one author              │
                    │ title     [VARCHAR]  │     │    │                             │
                    │ slug      [VARCHAR]  │     │    └─────────────────────────────┘
                    │ content   [LONGTEXT] │     │
                    │ featured_image [VAR] │     │
                    │ category  [VARCHAR]  │     │
                    │ status    [ENUM]     │     │
                    │ created_at           │     │
                    │ updated_at           │     │
                    │ deleted_at (soft)    │     │
                    └──────────────────────┘     │


                         ┌─────────────────────┐     │
                         │    TEAMS (1)        │     │
                         ├─────────────────────┤     │
                         │ id (PK) [BIGINT]    │     │
                         │ name [VARCHAR]      │     │
                         │ description [TEXT]  │     │
                         │ logo [VARCHAR]      │     │
                         │ founded_year [INT]  │     │
                         │ achievements [TEXT] │     │
                         │ created_at          │◄────┘
                         │ updated_at          │
                         └────┬────────────┬───┴──────┬──────────────┬──────────────┐
                              │            │          │              │              │
                    1:N    ┌───▼───┐ ┌────▼────┐ ┌───▼────┐ ┌──────▼──────┐ ┌────▼────┐
                          │       │ │         │ │        │ │             │ │         │
                    ┌─────▼──────┐│ │┌────────▼─▼─┐┌────▼──▼──┐┌────────────▼─▼───┐┌─▼──────┐
                    │ PLAYERS(6) ││ ││ GAMES (5) │││EVENTS(4)│││ GALLERIES (3)    ││NEWS(7)││
                    ├────────────┤│ │├───────────┤││         ││├──────────────────┤├───────┤│
                    │ id(PK)     ││ ││ id(PK)    │││id(PK)   │││ id(PK)           ││ ...   ││
                    │ team_id(FK)├┘ │├team_id(FK)│││team_id( ││├team_id(FK)       │└───────┘│
                    │ name       │  ││           │││FK)      │││ image            │         │
                    │ position   │  ││ opponent_ │││ name    │││ description      │         │
                    │ jersey_no  │  ││ name      │││ date    │││ created_at       │         │
                    │ height(cm) │  ││ location  │││ type    │││ updated_at       │         │
                    │ weight(kg) │  ││ scheduled│││ location││└deleted_at(soft)──┘         │
                    │ photo      │  ││ _date    │││ desc    │                             │
                    │ bio        │  ││ score_   │││ created_│                             │
                    │ created_at │  ││ home/away│││ at      │                             │
                    │ updated_at │  ││ status   │││ updated_│                             │
                    │ deleted_at │  ││ created_ │││ at      │                             │
                    │ (soft)     │  ││ at       │││ deleted_│                             │
                    └────────────┘  ││ deleted_ │││ at(soft)│                             │
                                    ││ at(soft) │││         │                             │
                                    │└──────────┘│└─────────┘                             │
                                    │            └──────────────────────────────────────────┘
                                    └─────────────────────────────────────────────────────
```

---

## 2. Detailed Table Structures

### TABLE: users
**Primary Key:** id  
**Indexes:** email (UNIQUE), role  
**Soft Delete:** No  

| Column | Type | Constraints | Default | Description |
|--------|------|-------------|---------|-------------|
| id | BIGINT | PRIMARY KEY, AUTO_INCREMENT | - | User ID |
| name | VARCHAR(255) | NOT NULL | - | User's full name |
| email | VARCHAR(255) | UNIQUE, NOT NULL | - | Email address (login credential) |
| password | VARCHAR(255) | NOT NULL | - | Hashed password (bcrypt) |
| role | ENUM('admin','member') | NOT NULL | member | User role for authorization |
| created_at | TIMESTAMP | - | CURRENT_TIMESTAMP | Record creation time |
| updated_at | TIMESTAMP | - | CURRENT_TIMESTAMP | Last update time |

**Sample Data:**
```sql
INSERT INTO users VALUES
(1, 'Admin User', 'admin@example.com', '$2y$12$...', 'admin', NOW(), NOW()),
(2, 'Rudi Member', 'member@example.com', '$2y$12$...', 'member', NOW(), NOW());
```

---

### TABLE: teams
**Primary Key:** id  
**Soft Delete:** No  
**Note:** Core entity for all relationships

| Column | Type | Constraints | Default | Description |
|--------|------|-------------|---------|-------------|
| id | BIGINT | PRIMARY KEY, AUTO_INCREMENT | - | Team ID |
| name | VARCHAR(255) | NOT NULL | - | Team name (e.g., "Garuda Hustler") |
| description | LONGTEXT | NULLABLE | - | Detailed team description |
| logo | VARCHAR(255) | NULLABLE | - | Path to logo file |
| founded_year | INT | NULLABLE | - | Year team was founded |
| achievements | LONGTEXT | NULLABLE | - | List of achievements |
| created_at | TIMESTAMP | - | CURRENT_TIMESTAMP | Record creation time |
| updated_at | TIMESTAMP | - | CURRENT_TIMESTAMP | Last update time |

**Sample Data:**
```sql
INSERT INTO teams VALUES
(1, 'Garuda Hustler', 'Tim basket SMK Negeri 1 Garut...', 'logo.png', 2020, '...', NOW(), NOW());
```

---

### TABLE: players
**Primary Key:** id  
**Foreign Keys:** team_id → teams(id)  
**Soft Delete:** Yes (deleted_at)  
**Indexes:** team_id, name  

| Column | Type | Constraints | Default | Description |
|--------|------|-------------|---------|-------------|
| id | BIGINT | PRIMARY KEY, AUTO_INCREMENT | - | Player ID |
| team_id | BIGINT | NOT NULL, FOREIGN KEY | - | Reference to teams table |
| name | VARCHAR(255) | NOT NULL | - | Player's full name |
| position | VARCHAR(100) | NULLABLE | - | Player position (Guard, Forward, etc) |
| jersey_number | INT | NULLABLE | - | Jersey number (1-99) |
| height | INT | NULLABLE | - | Player height in cm |
| weight | INT | NULLABLE | - | Player weight in kg |
| photo | VARCHAR(255) | NULLABLE | - | Path to player photo |
| bio | LONGTEXT | NULLABLE | - | Player biography |
| created_at | TIMESTAMP | - | CURRENT_TIMESTAMP | Record creation time |
| updated_at | TIMESTAMP | - | CURRENT_TIMESTAMP | Last update time |
| deleted_at | TIMESTAMP | NULLABLE | NULL | Soft delete timestamp |

**Sample Data:**
```sql
INSERT INTO players VALUES
(1, 1, 'Rudi Hermawan', 'Guard', 10, 185, 80, 'rudi.jpg', 'Bio...', NOW(), NOW(), NULL),
(2, 1, 'Bambang Irawan', 'Forward', 23, 195, 95, 'bambang.jpg', 'Bio...', NOW(), NOW(), NULL);
```

---

### TABLE: games
**Primary Key:** id  
**Foreign Keys:** team_id → teams(id)  
**Soft Delete:** Yes (deleted_at)  
**Indexes:** team_id, scheduled_date, status  

| Column | Type | Constraints | Default | Description |
|--------|------|-------------|---------|-------------|
| id | BIGINT | PRIMARY KEY, AUTO_INCREMENT | - | Game ID |
| team_id | BIGINT | NOT NULL, FOREIGN KEY | - | Reference to teams table |
| opponent_name | VARCHAR(255) | NOT NULL | - | Opponent team name |
| location | VARCHAR(255) | NULLABLE | - | Game location/venue |
| scheduled_date | DATETIME | NOT NULL | - | Game date and time |
| score_home | INT | NULLABLE | - | Garuda Hustler score (after match) |
| score_away | INT | NULLABLE | - | Opponent score (after match) |
| status | ENUM('scheduled','completed','cancelled') | NOT NULL | scheduled | Current game status |
| created_at | TIMESTAMP | - | CURRENT_TIMESTAMP | Record creation time |
| updated_at | TIMESTAMP | - | CURRENT_TIMESTAMP | Last update time |
| deleted_at | TIMESTAMP | NULLABLE | NULL | Soft delete timestamp |

**Sample Data:**
```sql
INSERT INTO games VALUES
(1, 1, 'Tim Basket SMAN 2', 'Lapangan SMAN 2', '2024-12-15 15:00:00', 85, 78, 'completed', NOW(), NOW(), NULL);
```

---

### TABLE: events
**Primary Key:** id  
**Foreign Keys:** team_id → teams(id)  
**Soft Delete:** Yes (deleted_at)  
**Indexes:** team_id, date  

| Column | Type | Constraints | Default | Description |
|--------|------|-------------|---------|-------------|
| id | BIGINT | PRIMARY KEY, AUTO_INCREMENT | - | Event ID |
| team_id | BIGINT | NOT NULL, FOREIGN KEY | - | Reference to teams table |
| name | VARCHAR(255) | NOT NULL | - | Event name (e.g., "Training") |
| date | DATETIME | NOT NULL | - | Event date and time |
| type | VARCHAR(100) | NULLABLE | - | Event type (training, competition, etc) |
| location | VARCHAR(255) | NULLABLE | - | Event location |
| description | LONGTEXT | NULLABLE | - | Detailed event description |
| created_at | TIMESTAMP | - | CURRENT_TIMESTAMP | Record creation time |
| updated_at | TIMESTAMP | - | CURRENT_TIMESTAMP | Last update time |
| deleted_at | TIMESTAMP | NULLABLE | NULL | Soft delete timestamp |

---

### TABLE: galleries
**Primary Key:** id  
**Foreign Keys:** team_id → teams(id)  
**Soft Delete:** Yes (deleted_at)  
**Indexes:** team_id, created_at  

| Column | Type | Constraints | Default | Description |
|--------|------|-------------|---------|-------------|
| id | BIGINT | PRIMARY KEY, AUTO_INCREMENT | - | Gallery ID |
| team_id | BIGINT | NOT NULL, FOREIGN KEY | - | Reference to teams table |
| image | VARCHAR(255) | NOT NULL | - | Path to image file |
| description | LONGTEXT | NULLABLE | - | Image caption/description |
| created_at | TIMESTAMP | - | CURRENT_TIMESTAMP | Record creation time |
| updated_at | TIMESTAMP | - | CURRENT_TIMESTAMP | Last update time |
| deleted_at | TIMESTAMP | NULLABLE | NULL | Soft delete timestamp |

---

### TABLE: news
**Primary Key:** id  
**Foreign Keys:** team_id → teams(id), user_id → users(id)  
**Soft Delete:** Yes (deleted_at)  
**Indexes:** team_id, user_id, slug (UNIQUE), status, created_at  

| Column | Type | Constraints | Default | Description |
|--------|------|-------------|---------|-------------|
| id | BIGINT | PRIMARY KEY, AUTO_INCREMENT | - | Article ID |
| team_id | BIGINT | NOT NULL, FOREIGN KEY | - | Reference to teams table |
| user_id | BIGINT | NOT NULL, FOREIGN KEY | - | Author (reference to users) |
| title | VARCHAR(255) | NOT NULL | - | Article title |
| slug | VARCHAR(255) | UNIQUE, NOT NULL | - | URL-friendly slug (auto-generated) |
| content | LONGTEXT | NOT NULL | - | Article body (HTML allowed) |
| featured_image | VARCHAR(255) | NULLABLE | - | Path to featured image |
| category | VARCHAR(100) | NULLABLE | - | Article category/tag |
| status | ENUM('draft','published') | NOT NULL | draft | Publication status |
| created_at | TIMESTAMP | - | CURRENT_TIMESTAMP | Record creation time |
| updated_at | TIMESTAMP | - | CURRENT_TIMESTAMP | Last update time |
| deleted_at | TIMESTAMP | NULLABLE | NULL | Soft delete timestamp |

---

### TABLE: cache
**Primary Key:** key  
**Note:** System table for caching

| Column | Type | Constraints |
|--------|------|-------------|
| key | VARCHAR(255) | PRIMARY KEY |
| value | LONGTEXT | NOT NULL |
| expiration | INT | NOT NULL |

---

### TABLE: jobs
**Primary Key:** id  
**Indexes:** queue  
**Note:** System table for job queue

| Column | Type | Constraints |
|--------|------|-------------|
| id | BIGINT | PRIMARY KEY, AUTO_INCREMENT |
| queue | VARCHAR(255) | NOT NULL |
| payload | LONGTEXT | NOT NULL |
| exception | LONGTEXT | NULLABLE |
| failed_at | TIMESTAMP | NULLABLE |
| created_at | TIMESTAMP | NOT NULL |

---

## 3. Relationship Types & Cardinality

### One-to-Many Relationships

```
teams (1) ───────────────→ (N) players
  • Each team has many players
  • Each player belongs to one team
  • Foreign Key: players.team_id

teams (1) ───────────────→ (N) games
  • Each team plays many games
  • Each game involves one team
  • Foreign Key: games.team_id

teams (1) ───────────────→ (N) events
  • Each team organizes many events
  • Each event belongs to one team
  • Foreign Key: events.team_id

teams (1) ───────────────→ (N) galleries
  • Each team has many photos
  • Each photo belongs to one team
  • Foreign Key: galleries.team_id

teams (1) ───────────────→ (N) news
  • Each team publishes many articles
  • Each article belongs to one team
  • Foreign Key: news.team_id

users (1) ───────────────→ (N) news
  • Each user authors many articles
  • Each article has one author
  • Foreign Key: news.user_id
```

### Relationship Constraints

| Relationship | ON DELETE | ON UPDATE |
|--------------|-----------|-----------|
| players → teams | CASCADE | CASCADE |
| games → teams | CASCADE | CASCADE |
| events → teams | CASCADE | CASCADE |
| galleries → teams | CASCADE | CASCADE |
| news → teams | CASCADE | CASCADE |
| news → users | CASCADE | CASCADE |

---

## 4. Normalization Analysis

### First Normal Form (1NF)
✅ All attributes are atomic (no multi-valued attributes)  
✅ Each attribute contains only single values

### Second Normal Form (2NF)
✅ Compliant with 1NF  
✅ No partial dependencies on composite keys  
✅ All non-key attributes depend on entire primary key

### Third Normal Form (3NF)
✅ Compliant with 2NF  
✅ No transitive dependencies  
✅ All non-key attributes depend only on primary key

### Boyce-Codd Normal Form (BCNF)
✅ For every functional dependency X → Y, X is a candidate key  
✅ No anomalies in relationships

**Conclusion:** Database design is normalized to **BCNF** ✅

---

## 5. Data Integrity & Constraints

### Referential Integrity
```sql
-- Foreign key constraints ensure data consistency
FOREIGN KEY (team_id) REFERENCES teams(id) ON DELETE CASCADE ON UPDATE CASCADE
FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE
```

### Unique Constraints
```sql
ALTER TABLE users ADD CONSTRAINT UNIQUE(email);
ALTER TABLE news ADD CONSTRAINT UNIQUE(slug);
```

### Check Constraints
```sql
ALTER TABLE games ADD CONSTRAINT CHECK(status IN ('scheduled', 'completed', 'cancelled'));
ALTER TABLE news ADD CONSTRAINT CHECK(status IN ('draft', 'published'));
ALTER TABLE users ADD CONSTRAINT CHECK(role IN ('admin', 'member'));
```

---

## 6. Indexing Strategy

### Primary Indexes
- `users.id` - PRIMARY KEY
- `teams.id` - PRIMARY KEY
- `players.id` - PRIMARY KEY
- `games.id` - PRIMARY KEY
- `events.id` - PRIMARY KEY
- `galleries.id` - PRIMARY KEY
- `news.id` - PRIMARY KEY

### Foreign Key Indexes (auto-created)
- `players.team_id`
- `games.team_id`
- `events.team_id`
- `galleries.team_id`
- `news.team_id`
- `news.user_id`

### Secondary Indexes (for search optimization)
```sql
CREATE INDEX idx_users_email ON users(email);
CREATE INDEX idx_players_team_id ON players(team_id);
CREATE INDEX idx_games_team_id ON games(team_id);
CREATE INDEX idx_games_status ON games(status);
CREATE INDEX idx_games_date ON games(scheduled_date);
CREATE INDEX idx_events_team_id ON events(team_id);
CREATE INDEX idx_galleries_team_id ON galleries(team_id);
CREATE INDEX idx_news_team_id ON news(team_id);
CREATE INDEX idx_news_user_id ON news(user_id);
CREATE INDEX idx_news_slug ON news(slug);
CREATE INDEX idx_news_status ON news(status);
CREATE INDEX idx_news_created_at ON news(created_at);
```

---

## 7. Sample Queries

### Complex Queries Examples

```sql
-- Get team with all related data (with player count)
SELECT 
    t.id, t.name, 
    COUNT(DISTINCT p.id) as player_count,
    COUNT(DISTINCT g.id) as game_count,
    COUNT(DISTINCT ga.id) as photo_count
FROM teams t
LEFT JOIN players p ON t.id = p.team_id AND p.deleted_at IS NULL
LEFT JOIN games g ON t.id = g.team_id AND g.deleted_at IS NULL
LEFT JOIN galleries ga ON t.id = ga.team_id AND ga.deleted_at IS NULL
WHERE t.id = 1
GROUP BY t.id;

-- Get latest 5 published news with author info
SELECT 
    n.id, n.title, n.slug, n.created_at,
    u.name as author,
    t.name as team
FROM news n
JOIN users u ON n.user_id = u.id
JOIN teams t ON n.team_id = t.id
WHERE n.status = 'published' AND n.deleted_at IS NULL
ORDER BY n.created_at DESC
LIMIT 5;

-- Get games by status with statistics
SELECT 
    status,
    COUNT(*) as count,
    AVG(CASE WHEN score_home > score_away THEN 1 ELSE 0 END) as win_rate
FROM games
WHERE deleted_at IS NULL
GROUP BY status;

-- Find duplicate players (if any)
SELECT name, COUNT(*) as count
FROM players
WHERE deleted_at IS NULL
GROUP BY name
HAVING COUNT(*) > 1;
```

---

## 8. Backup & Recovery

### Full Backup Strategy
```bash
# Daily backup
mysqldump -u root -p garuda_hustler > backup_$(date +%Y%m%d).sql

# With compression
mysqldump -u root -p garuda_hustler | gzip > backup_$(date +%Y%m%d).sql.gz
```

### Recovery Procedure
```bash
# From .sql file
mysql -u root -p garuda_hustler < backup_20241202.sql

# From compressed file
gunzip < backup_20241202.sql.gz | mysql -u root -p garuda_hustler
```

---

**Database Design Version:** 1.0  
**Last Reviewed:** December 2024  
**Status:** ✅ Production Ready
