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
    course_grade DECIMAL(3,2),
    student_id VARCHAR(8),
    PRIMARY KEY(course_id),
    FOREIGN KEY(student_id)
        REFERENCES Student_Program_Evaluation(student_id)
        ON UPDATE CASCADE ON DELETE CASCADE

);

/*student info*/
INSERT INTO Student_Program_Evaluation(student_id,student_fname,student_lname,student_mname,yr_section) VALUES('12-12345','Juan','dela Cruz','Santos','BSCS-SD4B');

/*first year first sem*/
INSERT INTO Course VALUES('',1,'MATH-102','College Algebra',3,0,'1st Year','1st-Semester',2.00,'12-12345');
INSERT INTO Course VALUES('',2,'MATH-105','Plane Trigonometry',3,0,'1st Year','1st-Semester',2.50,'12-12345');
INSERT INTO Course VALUES('',3,'ENG-101','Oral/Diagnostic English',3,0,'1st Year','1st-Semester',2.00,'12-12345');
INSERT INTO Course VALUES('',4,'NSTP-001','National Service Training Program I',3,0,'1st Year','1st-Semester',1.50,'12-12345');
INSERT INTO Course VALUES('',5,'PHED-101','Physical Fitness',2,0,'1st Year','1st-Semester',1.25,'12-12345');
INSERT INTO Course VALUES('',6,'COMP-111','Microcomputer Application',2,1,'1st Year','1st-Semester',1.75,'12-12345');
INSERT INTO Course VALUES('',7,'COMP-110','Introduction to Computer Science',2,1,'1st Year','1st-Semester',2.00,'12-12345');
INSERT INTO Course VALUES('',8,'SSCI-102','Philippine Government The New Constitution',3,0,'1st Year','1st-Semester',1.25,'12-12345');
INSERT INTO Course VALUES('',9,'SSCI-101A','Philippine History',3,0,'1st Year','1st-Semester',1.75,'12-12345');
INSERT INTO Course VALUES('',10,'SSCI-104','Philosophy of Man',3,0,'1st Year','1st-Semester',2.25,'12-12345');

/*first year second sem*/
INSERT INTO Course VALUES('',11,'FILI-101','Sining ng Pakikipagtalastasan',3,0,'1st Year','2nd-Semester',1.00,'12-12345');
INSERT INTO Course VALUES('',12,'CHEM-113','General & Inorganic Chemistry',2,1,'1st Year','2nd-Semester',2.00,'12-12345');
INSERT INTO Course VALUES('',13,'ENG-104','Study & Thinking Skills',3,0,'1st Year','2nd-Semester',1.50,'12-12345');
INSERT INTO Course VALUES('',14,'COMP-121','Computer Programming 1 (C++)',2,1,'1st Year','2nd-Semester',1.75,'12-12345');
INSERT INTO Course VALUES('',15,'PHED-102','Games and Sports',2,0,'1st Year','2nd-Semester',1.25,'12-12345');
INSERT INTO Course VALUES('',16,'MATH-119','Calculus I (Differential Calculus)',3,0,'1st Year','2nd-Semester',2.75,'12-12345');
INSERT INTO Course VALUES('',17,'PSYC-101','General Psychology',3,0,'1st Year','2nd-Semester',2.00,'12-12345');
INSERT INTO Course VALUES('',18,'NSTP-002','National Service Training Program II',3,0,'1st Year','2nd-Semester',1.50,'12-12345');
INSERT INTO Course VALUES('',19,'COMP-122','Information Systems Management',2,1,'1st Year','2nd-Semester',2.00,'12-12345');

/*second year first sem*/
INSERT INTO Course VALUES('',20,'PHED-201','Rhythmic Activities',2,0,'2nd Year','1st-Semester',1.25,'12-12345');
INSERT INTO Course VALUES('',21,'CHEM-213','Organic Chemistry',2,1,'2nd Year','1st-Semester',3.00,'12-12345');
INSERT INTO Course VALUES('',22,'MATH-120','Calculus II (Integral Calculus)',3,0,'2nd Year','1st-Semester',2.50,'12-12345');
INSERT INTO Course VALUES('',23,'BMGT-101','Principles of Management',3,0,'2nd Year','1st-Semester',2.50,'12-12345');
INSERT INTO Course VALUES('',24,'COMP-212','Data Structure & Algorithm Analysis',1,2,'2nd Year','1st-Semester',1.75,'12-12345');
INSERT INTO Course VALUES('',25,'COMP-213','Logic Design and Switching Theory',2,1,'2nd Year','1st-Semester',2.75,'12-12345');
INSERT INTO Course VALUES('',26,'COMP-211','Computer Programming II (Ass/L)',2,1,'2nd Year','1st-Semester',2.25,'12-12345');
INSERT INTO Course VALUES('',27,'ENG-105','Writing in Discipline',3,0,'2nd Year','1st-Semester',1.25,'12-12345');
INSERT INTO Course VALUES('',28,'FILI-102','Pagbasa at Pagsulat sa Iba\'t-Ibang Dsiplina',3,0,'2nd Year','1st-Semester',1.75,'12-12345');


/*second year second sem*/
INSERT INTO Course VALUES('',29,'COMP-222','File Organization for Data Management',2,1,'2nd Year','2nd-Semester',1.25,'12-12345');
INSERT INTO Course VALUES('',30,'PHED-202','Recreational Activities',2,0,'2nd Year','2nd-Semester',1.00,'12-12345');
INSERT INTO Course VALUES('',31,'PHYS-113','College Physics I (Mechanics and Heat)',2,1,'2nd Year','2nd-Semester',2.75,'12-12345');
INSERT INTO Course VALUES('',32,'ACTG-111','Fundamentals of Accounting P1',6,0,'2nd Year','2nd-Semester',2.00,'12-12345');
INSERT INTO Course VALUES('',33,'COMP-223','Computer Organization and Architecture',1,2,'2nd Year','2nd-Semester',1.75,'12-12345');
INSERT INTO Course VALUES('',34,'LITE-101','Philippine Literature',3,0,'2nd Year','2nd-Semester',1.75,'12-12345');
INSERT INTO Course VALUES('',35,'COMP-221','Computer Programming III (Java)',2,1,'2nd Year','2nd-Semester',1.25,'12-12345');
INSERT INTO Course VALUES('',36,'MATH-124','Probability and Statistics',3,0,'2nd Year','2nd-Semester',2.25,'12-12345');


/*third year first sem*/

INSERT INTO Course VALUES('',37,'COMP-311','Introduction to Numerical Analysis',1,2,'3rd Year','1st-Semester',1.75,'12-12345');
INSERT INTO Course VALUES('',38,'COMP-312','Computer Programming IV (VB)',2,1,'3rd Year','1st-Semester',2.00,'12-12345');
INSERT INTO Course VALUES('',39,'COMP-313','Database Management System with Laboratory',2,1,'3rd Year','1st-Semester',1.50,'12-12345');
INSERT INTO Course VALUES('',40,'COMP-314','Operating Systems',2,1,'3rd Year','1st-Semester',1.50,'12-12345');
INSERT INTO Course VALUES('',41,'PHYS-213','College Physics 2 (Wave,Sound,Electromagnetism)',2,1,'3rd Year','1st-Semester',2.75,'12-12345');
INSERT INTO Course VALUES('',42,'MATH-127','Discreet Mathematics',3,0,'3rd Year','1st-Semester',2.50,'12-12345');
INSERT INTO Course VALUES('',43,'NSCI-113','Fundamentals of Physical Science',3,0,'3rd Year','1st-Semester',2.50,'12-12345');
INSERT INTO Course VALUES('',44,'SSCI-110','Rizal\'s Life, Works and Writings',3,0,'3rd Year','1st-Semester',1.25,'12-12345');
INSERT INTO Course VALUES('',45,'ENG-108','Technical Writing and Reporting',3,0,'3rd Year','1st-Semester',1.75,'12-12345');

/*third year second sem*/
INSERT INTO Course VALUES('',46,'COMP-320','Data Communications I',2,1,'3rd Year','1st-Semester',2.25,'12-12345');
INSERT INTO Course VALUES('',47,'COMP-322','Computing Theory (Automata)',1,2,'3rd Year','1st-Semester',1.75,'12-12345');
INSERT INTO Course VALUES('',48,'COMP-323','Object Oriented Programming',2,1,'3rd Year','1st-Semester',1.50,'12-12345');
INSERT INTO Course VALUES('',49,'COMP-324','Computer Programming V',2,1,'3rd Year','1st-Semester',2.00,'12-12345');
INSERT INTO Course VALUES('',50,'COMP-325A','Systems Analysis & Design',2,1,'3rd Year','1st-Semester',1.75,'12-12345');
INSERT INTO Course VALUES('',51,'SSCI-111B','Principles of Economics with Taxation',3,0,'3rd Year','1st-Semester',2.75,'12-12345');
INSERT INTO Course VALUES('',52,'SSCI-126','Social Philosophy',3,0,'3rd Year','1st-Semester',1.50,'12-12345');



UPDATE Student_Program_Evaluation SET avg_grade = 
SELECT (sum(course_grade * (course_unit_lec + course_unit_lab))) / (SUM(course_unit_lec) + SUM(course_unit_lab))as TOTAL FROM Course WHERE student_id = '12-12345'
WHERE student_id = '12-12345';