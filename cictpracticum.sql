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
    birthday DATE,
    email VARCHAR(50),
    gender VARCHAR(10) NOT NULL,
    address VARCHAR(500),
    contact_number VARCHAR(20),
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
    seen_by VARCHAR(20),
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

CREATE TABLE Student_Attached_File
(
    attached_file_id INT NOT NULL AUTO_INCREMENT,
    file_name VARCHAR(100),
    form_type VARCHAR(20),
    file_path VARCHAR(500),
    user_id VARCHAR(20),
    status VARCHAR(20) DEFAULT 'pending',
    PRIMARY KEY(attached_file_id),
    FOREIGN KEY(user_id)
        REFERENCES Account(user_id)
        ON UPDATE CASCADE ON DELETE CASCADE
);


CREATE TABLE Company
(
    company_id INT NOT NULL AUTO_INCREMENT,
    company_name VARCHAR(200),
    company_address VARCHAR(150),
    company_contact_no VARCHAR(25),
    company_email VARCHAR(50),
    company_overview VARCHAR(10000),
    company_website_url VARCHAR(300),
    approved_by_coordinator BOOLEAN DEFAULT 0,
    PRIMARY KEY(company_id)
);

CREATE TABLE Evaluator
(
    evaluator_id INT NOT NULL AUTO_INCREMENT,
    evaluator_position VARCHAR(70),
    user_id VARCHAR(20) NOT NULL UNIQUE,
    company_id INT,
    PRIMARY KEY(evaluator_id),
    FOREIGN KEY(company_id)
        REFERENCES Company(company_id)
        ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY(user_id)
        REFERENCES Account(user_id)
        ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE Cert_of_Acceptance
(
    coa_id INT NOT NULL AUTO_INCREMENT,
    division_dept VARCHAR(50),
    date_start DATE,
    date_finished DATE,
    approved_by_coordinator BOOLEAN DEFAULT 0,
    approved_by_evaluator BOOLEAN DEFAULT 0,
    approved_by_dean BOOLEAN DEFAULT 0,
    student_id VARCHAR(8) NOT NULL,
    company_id INT NOT NULL,
    PRIMARY KEY(coa_id),
    FOREIGN KEY(student_id)
        REFERENCES Student(student_id)
        ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY(company_id)
        REFERENCES Company(company_id)
);

CREATE TABLE Student_Sched
(
    student_sched_id INT NOT NULL AUTO_INCREMENT,
    sched_day VARCHAR(30),
    sched_time VARCHAR(30),
    student_id VARCHAR(8) NOT NULL,
    PRIMARY KEY(student_sched_id),
    FOREIGN KEY(student_id)
        REFERENCES Student(student_id)
        ON UPDATE CASCADE ON DELETE CASCADE
);


CREATE TABLE Student_Assessment
(
    student_assessment_id INT NOT NULL AUTO_INCREMENT,
    student_id VARCHAR(8),
    student_name VARCHAR(50),
    yr_section VARCHAR(30),
    avg_grade DECIMAL(3,2),
    status VARCHAR(15),
    attached_file_url VARCHAR(200),
    PRIMARY KEY(student_assessment_id)
);


CREATE TABLE Evaluation_Form
(
    evaluation_id INT NOT NULL AUTO_INCREMENT,
    student_id VARCHAR(8),
    evaluator_id INT,
    date_commenced DATE,
    date_completed DATE,
    comments VARCHAR(500),
    total_points INT,
    grade DECIMAL(3,2),
    equivalent VARCHAR(20),
    PRIMARY KEY(evaluation_id),
    FOREIGN KEY(student_id)
        REFERENCES Student(student_id)
        ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY(evaluator_id)
        REFERENCES Evaluator(evaluator_id)
        ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE Criteria
(
    criteria_id INT NOT NULL AUTO_INCREMENT,
    criteria_name VARCHAR(50),
    points_scored INT,
    remarks VARCHAR(100),
    evaluation_id INT,
    PRIMARY KEY(criteria_id),
    FOREIGN KEY(evaluation_id)
        REFERENCES Evaluation_Form(evaluation_id)
        ON UPDATE CASCADE ON DELETE CASCADE
);

INSERT INTO Account(user_id,lastname,firstname,
 middle_initial,birthday,email,gender,address,contact_number, 
 password,position) VALUES ('coordinator','Tolentino','Noel','N.','1970-12-30',
 'noelnt2003@yahoo.com','Male','Bataan','09162548074','12345','Coordinator');

INSERT INTO Student_Assessment(student_id,student_name,yr_section,avg_grade,status) 
VALUES('10-02597','Juan dela Cruz','BSCS-SD4B',1.25,'OK');

 INSERT INTO Coordinator(user_id) VALUES('coordinator');

INSERT INTO Announcement(title,content,coordinator_id) 
VALUES('Welcome to Online CICT Practicum Management System',
'The College of Information and Communications Technology (CICT) started with
a set of programs housed under the former Institute of Engineering and Architecture (IEA). 
Although two ICT courses were already offered in Balanga Campus since 1991, four new ICT academic 
programs were approved by the then BPSC Board of Trustees starting AY 2005-2006. These programs include: Bachelor of Science in Computer Science with two areas of concentration namely Software Development and Network and Data Communication; Bachelor of Science in Information Technology and Associate in Technical Graphics.
Enrollees of the ICT courses grew in number together with the number of faculty members. Geared towards being a full-fledged academic unit, the administration caused the conversion of the former Laboratory School Building into ICT Building in 2005.',1
);



CREATE TABLE IF NOT EXISTS Student_Program_Evaluation
(
    student_id VARCHAR(8),
    student_fname VARCHAR(30),
    student_lname VARCHAR(30),
    student_mname VARCHAR(30),
    yr_section VARCHAR(30),
    avg_grade DECIMAL(3,2),
    status VARCHAR(15),
    PRIMARY KEY(student_id)
);


CREATE TABLE IF NOT EXISTS Course
(
    course_id INT NOT NULL AUTO_INCREMENT,
    course_order_id INT,
    course_code VARCHAR(20),
    course_title VARCHAR(100),
    course_unit_lec INT,
    course_unit_lab INT,
    course_yr VARCHAR(50),
    course_semester VARCHAR(50),
    course_grade VARCHAR(30),
    student_id VARCHAR(8),
    PRIMARY KEY(course_id),
    FOREIGN KEY(student_id)
        REFERENCES Student_Program_Evaluation(student_id)
        ON UPDATE CASCADE ON DELETE CASCADE

);

/*student info*/
INSERT INTO Student_Program_Evaluation(student_id,student_fname,student_lname,student_mname,yr_section) VALUES('12-12344','Juan','dela Cruz','Santos','BSCS-SD4B');

/*first year first sem*/
INSERT INTO Course VALUES('',1,'MATH-102','College Algebra',3,0,'1st Year','1st-Semester','DRP','12-12344');
INSERT INTO Course VALUES('',2,'MATH-105','Plane Trigonometry',3,0,'1st Year','1st-Semester','2.50','12-12344');
INSERT INTO Course VALUES('',3,'ENG-101','Oral/Diagnostic English',3,0,'1st Year','1st-Semester','2.00','12-12344');
INSERT INTO Course VALUES('',4,'NSTP-001','National Service Training Program I',3,0,'1st Year','1st-Semester','1.50','12-12344');
INSERT INTO Course VALUES('',5,'PHED-101','Physical Fitness',2,0,'1st Year','1st-Semester','1.25','12-12344');
INSERT INTO Course VALUES('',6,'COMP-111','Microcomputer Application',2,1,'1st Year','1st-Semester','1.75','12-12344');
INSERT INTO Course VALUES('',7,'COMP-110','Introduction to Computer Science',2,1,'1st Year','1st-Semester','2.00','12-12344');
INSERT INTO Course VALUES('',8,'SSCI-102','Philippine Government The New Constitution',3,0,'1st Year','1st-Semester','1.25','12-12344');
INSERT INTO Course VALUES('',9,'SSCI-101A','Philippine History',3,0,'1st Year','1st-Semester','1.75','12-12344');
INSERT INTO Course VALUES('',10,'SSCI-104','Philosophy of Man',3,0,'1st Year','1st-Semester','2.25','12-12344');

/*first year second sem*/
INSERT INTO Course VALUES('',11,'FILI-101','Sining ng Pakikipagtalastasan',3,0,'1st Year','2nd-Semester','1.00','12-12344');
INSERT INTO Course VALUES('',12,'CHEM-113','General & Inorganic Chemistry',2,1,'1st Year','2nd-Semester','2.00','12-12344');
INSERT INTO Course VALUES('',13,'ENG-104','Study & Thinking Skills',3,0,'1st Year','2nd-Semester','1.50','12-12344');
INSERT INTO Course VALUES('',14,'COMP-121','Computer Programming 1 (C++)',2,1,'1st Year','2nd-Semester','5.00','12-12344');
INSERT INTO Course VALUES('',15,'PHED-102','Games and Sports',2,0,'1st Year','2nd-Semester','1.25','12-12344');
INSERT INTO Course VALUES('',16,'MATH-119','Calculus I (Differential Calculus)',3,0,'1st Year','2nd-Semester','2.75','12-12344');
INSERT INTO Course VALUES('',17,'PSYC-101','General Psychology',3,0,'1st Year','2nd-Semester','2.00','12-12344');
INSERT INTO Course VALUES('',18,'NSTP-002','National Service Training Program II',3,0,'1st Year','2nd-Semester','1.50','12-12344');
INSERT INTO Course VALUES('',19,'COMP-122','Information Systems Management',2,1,'1st Year','2nd-Semester','2.00','12-12344');

/*second year first sem*/
INSERT INTO Course VALUES('',20,'PHED-201','Rhythmic Activities',2,0,'2nd Year','1st-Semester','1.25','12-12344');
INSERT INTO Course VALUES('',21,'CHEM-213','Organic Chemistry',2,1,'2nd Year','1st-Semester','INC','12-12344');
INSERT INTO Course VALUES('',22,'MATH-120','Calculus II (Integral Calculus)',3,0,'2nd Year','1st-Semester','2.50','12-12344');
INSERT INTO Course VALUES('',23,'BMGT-101','Principles of Management',3,0,'2nd Year','1st-Semester','2.50','12-12344');
INSERT INTO Course VALUES('',24,'COMP-212','Data Structure & Algorithm Analysis',1,2,'2nd Year','1st-Semester','1.75','12-12344');
INSERT INTO Course VALUES('',25,'COMP-213','Logic Design and Switching Theory',2,1,'2nd Year','1st-Semester','2.75','12-12344');
INSERT INTO Course VALUES('',26,'COMP-211','Computer Programming II (Ass/L)',2,1,'2nd Year','1st-Semester','INC','12-12344');
INSERT INTO Course VALUES('',27,'ENG-105','Writing in Discipline',3,0,'2nd Year','1st-Semester','1.25','12-12344');
INSERT INTO Course VALUES('',28,'FILI-102','Pagbasa at Pagsulat sa Iba\'t-Ibang Dsiplina',3,0,'2nd Year','1st-Semester','1.75','12-12344');


/*second year second sem*/
INSERT INTO Course VALUES('',29,'COMP-222','File Organization for Data Management',2,1,'2nd Year','2nd-Semester','1.25','12-12344');
INSERT INTO Course VALUES('',30,'PHED-202','Recreational Activities',2,0,'2nd Year','2nd-Semester','1.00','12-12344');
INSERT INTO Course VALUES('',31,'PHYS-113','College Physics I (Mechanics and Heat)',2,1,'2nd Year','2nd-Semester','2.75','12-12344');
INSERT INTO Course VALUES('',32,'ACTG-111','Fundamentals of Accounting P1',6,0,'2nd Year','2nd-Semester','2.00','12-12344');
INSERT INTO Course VALUES('',33,'COMP-223','Computer Organization and Architecture',1,2,'2nd Year','2nd-Semester','1.75','12-12344');
INSERT INTO Course VALUES('',34,'LITE-101','Philippine Literature',3,0,'2nd Year','2nd-Semester','1.75','12-12344');
INSERT INTO Course VALUES('',35,'COMP-221','Computer Programming III (Java)',2,1,'2nd Year','2nd-Semester','1.25','12-12344');
INSERT INTO Course VALUES('',36,'MATH-124','Probability and Statistics',3,0,'2nd Year','2nd-Semester','2.25','12-12344');


/*third year first sem*/

INSERT INTO Course VALUES('',37,'COMP-311','Introduction to Numerical Analysis',1,2,'3rd Year','1st-Semester','1.75','12-12344');
INSERT INTO Course VALUES('',38,'COMP-312','Computer Programming IV (VB)',2,1,'3rd Year','1st-Semester','2.00','12-12344');
INSERT INTO Course VALUES('',39,'COMP-313','Database Management System with Laboratory',2,1,'3rd Year','1st-Semester','1.50','12-12344');
INSERT INTO Course VALUES('',40,'COMP-314','Operating Systems',2,1,'3rd Year','1st-Semester','1.50','12-12344');
INSERT INTO Course VALUES('',41,'PHYS-213','College Physics 2 (Wave,Sound,Electromagnetism)',2,1,'3rd Year','1st-Semester','2.75','12-12344');
INSERT INTO Course VALUES('',42,'MATH-127','Discreet Mathematics',3,0,'3rd Year','1st-Semester','2.50','12-12344');
INSERT INTO Course VALUES('',43,'NSCI-113','Fundamentals of Physical Science',3,0,'3rd Year','1st-Semester','2.50','12-12344');
INSERT INTO Course VALUES('',44,'SSCI-110','Rizal\'s Life, Works and Writings',3,0,'3rd Year','1st-Semester','1.25','12-12344');
INSERT INTO Course VALUES('',45,'ENG-108','Technical Writing and Reporting',3,0,'3rd Year','1st-Semester','1.75','12-12344');

/*third year second sem*/
INSERT INTO Course VALUES('',46,'COMP-320','Data Communications I',2,1,'3rd Year','2nd-Semester','2.25','12-12344');
INSERT INTO Course VALUES('',47,'COMP-322','Computing Theory (Automata)',1,2,'3rd Year','2nd-Semester','1.75','12-12344');
INSERT INTO Course VALUES('',48,'COMP-323','Object Oriented Programming',2,1,'3rd Year','2nd-Semester','1.50','12-12344');
INSERT INTO Course VALUES('',49,'COMP-324','Computer Programming V',2,1,'3rd Year','2nd-Semester','2.00','12-12344');
INSERT INTO Course VALUES('',50,'COMP-325A','Systems Analysis & Design',2,1,'3rd Year','2nd-Semester','1.75','12-12344');
INSERT INTO Course VALUES('',51,'SSCI-111B','Principles of Economics with Taxation',3,0,'3rd Year','2nd-Semester','2.75','12-12344');
INSERT INTO Course VALUES('',52,'SSCI-126','Social Philosophy',3,0,'3rd Year','2nd-Semester','INC','12-12344');



UPDATE Student_Program_Evaluation SET avg_grade = 
(SELECT (sum(course_grade * (course_unit_lec + course_unit_lab))) / (SUM(course_unit_lec) + SUM(course_unit_lab))as TOTAL FROM Course WHERE student_id = '12-12344')
WHERE student_id = '12-12344';

UPDATE Student_Program_Evaluation SET status = 'Not Qualified' WHERE student_id = '12-12344';




CREATE TABLE Weekly_Reports
(

    weekly_report_id INT NOT NULL AUTO_INCREMENT,
    task_title VARCHAR(50),
    task_start_date DATE,
    task_end_date DATE,
    task_start_time VARCHAR(10),
    task_end_time VARCHAR(10),
    task_details VARCHAR(3000),
    task_equipped VARCHAR(1000),
    comments VARCHAR(1000),
    date_filled_up_by_eval DATE,
    is_task_completed BOOLEAN,
    evaluator_id INT,
    student_id VARCHAR(8),
    seen_by_coor INT DEFAULT 0,
    seen_by_evaluator INT DEFAULT 0,
    PRIMARY KEY(weekly_report_id),
    FOREIGN KEY(student_id)
        REFERENCES Student(student_id)
        ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY(evaluator_id)
        REFERENCES Evaluator(evaluator_id)

);