DROP DATABASE IF EXISTS Studyorganizer;
CREATE DATABASE Studyorganizer;

use Studyorganizer;

CREATE TABLE Users (
    userID int PRIMARY KEY AUTO_INCREMENT,
    username varchar(255) NOT NULL,
    password varchar(255),
    accessToken varchar(255),
    authKey varchar(255)
);


CREATE TABLE Subjects (
    subjectID int PRIMARY KEY AUTO_INCREMENT,
    subjectname varchar(255) NOT NULL
);

CREATE TABLE Assignments (
    homeworkID int PRIMARY KEY AUTO_INCREMENT,
    title varchar(255) NOT NULL,
    description varchar(255) NOT NULL,
    isCompleted boolean,
    due_date date NOT NULL,
    userID int,
    subjectID int,
    FOREIGN KEY (userID) REFERENCES Users(userID),
    FOREIGN KEY (subjectID) REFERENCES Subjects(subjectID)
);

CREATE TABLE Teachers (
    teacherID int PRIMARY KEY AUTO_INCREMENT,
    teachername varchar(255) NOT  NULL,
    isActive boolean
);

CREATE TABLE Teacher_has_Subject (
    subjectID int,
    teacherID int,
    PRIMARY KEY (subjectID, teacherID),
    FOREIGN KEY (subjectID) REFERENCES Subjects(subjectID),
    FOREIGN KEY (teacherID) REFERENCES Teachers(teacherID)
);
