# Judge Scoreboard Application (LAMP Stack)

## Overview
A simple PHP-MySQL app to let judges score participants, with a public scoreboard.

## Setup Instructions
1. Install WAMP: https://www.wampserver.com/en/
2. Place project folder in `C:/wamp64/www/scoreboard`
3. Run WAMP and access via `http://localhost/scoreboard`
4. Create DB using phpMyAdmin with provided schema.
Browse locally to:
http://localhost/scoreboard/admin.php → add judges & participants
http://localhost/scoreboard/judge.php → submit scores
http://localhost/scoreboard/index.php → view scoreboard

## SQL Schema
CREATE DATABASE scoreboard;
USE scoreboard;

CREATE TABLE judges (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) UNIQUE NOT NULL,
  display_name VARCHAR(100) NOT NULL
);

CREATE TABLE participants (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL
);

CREATE TABLE scores (
  id INT AUTO_INCREMENT PRIMARY KEY,
  judge_id INT NOT NULL REFERENCES judges(id),
  participant_id INT NOT NULL REFERENCES participants(id),
  score INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

## Design Choices
- PDO with prepared statements for SQL‐injection safety and portability (MySQL locally / PostgreSQL in production).
- AJAX + JSON endpoints (add_judge.php, add_participant.php, submit_score.php) for seamless feedback and form reset.
- Modal notifications via vanilla JS for clear success/error messages.
- Auto‐refresh scoreboard every 10 seconds to simulate live updates.
- Simple, responsive CSS with a common navbar for easy navigation between Admin, Judge, and Scoreboard pages.
- 
## Assumptions
- No login required (per instructions)
- Participants are manually pre-filled directly added to the database. But for future advancement, Admin can be adding participants
- Judges identified via unique username

## Features to Add with More Time
- Role‐based authentication (login for Admin/Judge). TThis will prevent unauthorized access and enhance transparency
- Edit/Delete functionality for judges, participants, and scores.
- Real‐time updates via WebSockets instead of polling.
- Pagination or search bar is important on large scoreboards.

## Author
BonGito
#Firebal
