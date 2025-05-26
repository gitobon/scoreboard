-- schema.sql

CREATE TABLE judges (
  id SERIAL PRIMARY KEY,
  username VARCHAR(50) UNIQUE NOT NULL,
  display_name VARCHAR(100) NOT NULL
);

CREATE TABLE participants (
  id SERIAL PRIMARY KEY,
  name VARCHAR(100) NOT NULL
);

CREATE TABLE scores (
  id SERIAL PRIMARY KEY,
  judge_id INT NOT NULL REFERENCES judges(id),
  participant_id INT NOT NULL REFERENCES participants(id),
  points INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

USE scoreboard_db;

INSERT INTO participants (name) VALUES
  ('Alice'),
  ('Bob'),
  ('Charlie'),
 ('Gito'),
  ('Mary'),
  ('Diana');
