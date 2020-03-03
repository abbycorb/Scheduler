CREATE DATABASE schedule_generator;

CREATE TABLE course (
    courseID INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR (45) NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL
);

CREATE TABLE student (
    studentID INT PRIMARY KEY,
    first_name VARCHAR (45) NOT NULL,
    last_name VARCHAR (45)  NOT NULL,
    assigned_courseID INT NOT NULL,
    CONSTRAINT fk_courseID
                     FOREIGN KEY (assigned_courseID)
                     REFERENCES course (courseID)
                     ON DELETE CASCADE

);

CREATE TABLE meetingDay (
    courseID INT NOT NULL,
    day VARCHAR (45) NOT NULL,
    CONSTRAINT fk_courseID_mtgDay
                        FOREIGN KEY (courseID)
                        REFERENCES course (courseID)
                        ON DELETE CASCADE
);

CREATE TABLE schedule (
    scheduleID INT AUTO_INCREMENT PRIMARY KEY,
    studentID INT NOT NULL,
    course VARCHAR (45) NOT NULL,
    scheduled_day VARCHAR (45) NOT NULL,
    room_num INT (45) NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    CONSTRAINT fk_studentID
                      FOREIGN KEY (studentID)
                      REFERENCES student (studentID)
                      ON DELETE CASCADE
);

CREATE TABLE availability (
    availabilityID INT AUTO_INCREMENT PRIMARY KEY,
    day_available VARCHAR (45) NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL

);

CREATE TABLE stud_availability (
    studentID INT NOT NULL,
    availabilityID INT NOT NULL,
    CONSTRAINT fk_student_id
                            FOREIGN KEY (studentID)
                            REFERENCES student (studentID)
                            ON DELETE CASCADE,
    CONSTRAINT fk_avail_id
                            FOREIGN KEY (availabilityID)
                            REFERENCES availability (availabilityID)
                            ON DELETE CASCADE
);