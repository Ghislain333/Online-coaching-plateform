CREATE DATABASE Coachies;

USE Coachies;

CREATE TABLE student (
    student_id INT PRIMARY KEY,
    studentid INT, -- Cette colonne semble être une clé étrangère vers la table chat
    student_fname VARCHAR(50),
    student_lname VARCHAR(50),
    student_email VARCHAR(50),
    student_password VARCHAR(50),
    profile_image VARCHAR(255),
    online_status INT
);

CREATE TABLE coach (
    coach_id INT PRIMARY KEY,
    coach_fname VARCHAR(50),
    coach_lname VARCHAR(50),
    coach_email VARCHAR(50), -- Ajout de l'email pour le coach
    coach_password VARCHAR(50),
    profile_image VARCHAR(255),
    online_status INT
);

CREATE TABLE course (
    courseId INT PRIMARY KEY AUTO_INCREMENT,
    CourseName VARCHAR(50),
    CoverPhoto VARCHAR(255),
    youtubeId VARCHAR(100),
    notes TEXT,
    CourseDescription TEXT,
    LangName VARCHAR(50)
);

CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(50) NOT NULL,
    user_pass VARCHAR(255) NOT NULL,
    user_email VARCHAR(100) NOT NULL UNIQUE,
    user_profile VARCHAR(255),
    user_country VARCHAR(50),
    user_gender ENUM('male', 'female', 'other') DEFAULT 'other',
    account_type ENUM('Student', 'Coach', 'Admin') DEFAULT 'Student',
    dob DATE,
    levels INT DEFAULT 1,
    user_domain VARCHAR(100),
    personal_coach VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

ALTER TABLE users
ADD COLUMN log_in ENUM(
    'Offline',
    'Online',
    'Away',
    'Busy'
) DEFAULT 'Offline';

CREATE TABLE users_chat (
    msg_id INT PRIMARY KEY AUTO_INCREMENT,
    sender_username VARCHAR(50) NOT NULL,
    receiver_username VARCHAR(50) NOT NULL,
    msg_content TEXT NOT NULL,
    msg_status ENUM('read', 'unread') DEFAULT 'unread',
    msg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sender_username) REFERENCES users (user_name) ON DELETE CASCADE,
    FOREIGN KEY (receiver_username) REFERENCES users (user_name) ON DELETE CASCADE
);

CREATE TABLE StudentOffers (
    offer_id INT PRIMARY KEY AUTO_INCREMENT,
    cover_image VARCHAR(255),
    video VARCHAR(100),
    notes TEXT,
    course_description TEXT,
    course_name VARCHAR(100),
    langName VARCHAR(50),
    user_id INT,
    user_level INT,
    FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE
);