DROP DATABASE cictpracticum;
CREATE DATABASE cictpracticum;
USE cictpracticum;


CREATE TABLE Account
(
    account_no INT NOT NULL AUTO_INCREMENT,
    user_id VARCHAR(20) NOT NULL UNIQUE,
    lastname VARCHAR(30) NOT NULL,
    firstname VARCHAR(30) NOT NULL,
    middle_initial VARCHAR(4),
    birthday DATE NOT NULL,
    email VARCHAR(50),
    gender VARCHAR(10) NOT NULL,
    address VARCHAR(500),
    contact_number VARCHAR(15),
    password VARCHAR(30) NOT NULL,
    position VARCHAR(15) NOT NULL,
    PRIMARY KEY(account_no)
);


CREATE TABLE Student
(   
    student_id VARCHAR(8) NOT NULL,
    course VARCHAR(50) NOT NULL,
    major VARCHAR(50) NOT NULL,
    age INT(2) NOT NULL,
    user_id VARCHAR(20) NOT NULL,
    lat VARCHAR(50),
    long VARCHAR(50),
    PRIMARY KEY(student_id),
    FOREIGN KEY (user_id)
        REFERENCES Account(user_id)
        ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE Student_Status
(
    student_id VARCHAR(8) NOT NULL,
    semester VARCHAR(20) NOT NULL,
    academic_year VARCHAR(15) NOT NULL,
    no_of_required_hours INT(3),
    no_of_remaining_hours INT(3),
    FOREIGN KEY (student_id)
        REFERENCES Student(student_id)
        ON UPDATE CASCADE ON DELETE CASCADE

);

CREATE TABLE Coordinator
(
    coordinator_id INT AUTO_INCREMENT NOT NULL,
    user_id VARCHAR(20) NOT NULL,
    PRIMARY KEY(coordinator_id),
    FOREIGN KEY (user_id)
        REFERENCES Account(user_id)
        ON UPDATE CASCADE ON DELETE CASCADE
);


CREATE TABLE Announcement
(
    announcement_id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    content VARCHAR(5000) NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    coordinator_id INT NOT NULL,
    PRIMARY KEY(announcement_id),
    FOREIGN KEY (coordinator_id)
        REFERENCES Coordinator(coordinator_id)
        ON UPDATE CASCADE ON DELETE CASCADE
);


CREATE TABLE Application_Form
(
    date_submitted TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    recommendation VARCHAR(5000),
    findings VARCHAR(500),
    approved_by_coordinator BOOLEAN DEFAULT 0
);

/*THERE SHOULDNT BE A FAMILY NO SINCE THERE IS ALREADY A STUDENT ID 1 TO MANY*/
CREATE TABLE Personal_Information
(
    height VARCHAR(5),
    weight VARCHAR(8),
    civil_status VARCHAR(10),
    place_of_birth VARCHAR(50),
    student_id VARCHAR(8) UNIQUE, /*unique*/
    FOREIGN KEY (student_id)
        REFERENCES Student(student_id)
        ON UPDATE CASCADE ON DELETE CASCADE
);


CREATE TABLE Family_Background
(
    family_no INT NOT NULL AUTO_INCREMENT,
    guardian_name VARCHAR(60),
    age INT(2),
    address VARCHAR(200),
    occupation VARCHAR(50),
    relationship VARCHAR(20),
    contact_number VARCHAR(15),
    student_id VARCHAR(8),
    PRIMARY KEY(family_no),
    FOREIGN KEY (student_id)
        REFERENCES Personal_Information(student_id)
        ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE School_Data
(
    school_data_no INT NOT NULL AUTO_INCREMENT,
    level VARCHAR(15),
    school_name VARCHAR(100),
    date_graduated DATE,
    student_id VARCHAR(8),
    PRIMARY KEY(school_data_no),
    FOREIGN KEY (student_id)
        REFERENCES Personal_Information(student_id)
        ON UPDATE CASCADE ON DELETE CASCADE

);


CREATE TABLE Employment_Record
(
    employment_record_no INT NOT NULL AUTO_INCREMENT,
    level VARCHAR(15),
    school_name VARCHAR(100),
    date_graduated DATE,
    student_id VARCHAR(8),
    PRIMARY KEY(employment_record_no),
    FOREIGN KEY (student_id)
        REFERENCES Personal_Information(student_id)
        ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE Character_Reference
(
    char_ref_no INT NOT NULL AUTO_INCREMENT,
    char_ref_name VARCHAR(50),
    char_ref_address VARCHAR(100),
    char_ref_contact_number VARCHAR(15),
    student_id VARCHAR(8),
    PRIMARY KEY(char_ref_no),
    FOREIGN KEY (student_id)
        REFERENCES Personal_Information(student_id)
        ON UPDATE CASCADE ON DELETE CASCADE
);


INSERT INTO Account(user_id,lastname,firstname,
 middle_initial,birthday,email,gender,address,contact_number, 
 password,position) VALUES ('coordinator','Tolentino','Noel','N.','1970-12-30',
 'noelnt2003@yahoo.com','Male','Bataan','09162548074','cictpracticum2015','Coordinator');

 INSERT INTO Coordinator(position,user_id) VALUES('Coordinator','coordinator');