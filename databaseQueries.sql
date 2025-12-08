CREATE DATABASE Coachies;
USE Coachies;

CREATE TABLE student(
    student_id INT PRIMARY KEY,
    studentid INT, -- Cette colonne semble être une clé étrangère vers la table chat
    student_fname VARCHAR(50),
    student_lname VARCHAR(50),
    student_email VARCHAR(50),
    student_password VARCHAR(50),
    profile_image VARCHAR(255),
    online_status INT
);

CREATE TABLE coach(
    coach_id INT PRIMARY KEY,
    coach_fname VARCHAR(50),
    coach_lname VARCHAR(50),
    coach_email VARCHAR(50), -- Ajout de l'email pour le coach
    coach_password VARCHAR(50),
    profile_image VARCHAR(255),
    online_status INT
);

CREATE TABLE course(
    course_id INT PRIMARY KEY,
    course_name VARCHAR(50),
    description_image VARCHAR(255)
    -- Suppression de la virgule en trop
);

CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(50) NOT NULL,
    user_pass VARCHAR(255) NOT NULL,
    user_email VARCHAR(100) NOT NULL UNIQUE,
    user_profile VARCHAR(255),
    user_country VARCHAR(50),
    user_gender ENUM('male', 'female', 'other') DEFAULT 'other',
    account_type ENUM('student', 'coach', 'admin') DEFAULT 'student',
    dob DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

ALTER TABLE users 
ADD COLUMN log_in ENUM('Offline', 'Online', 'Away', 'Busy') DEFAULT 'Offline';