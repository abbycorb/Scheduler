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

INSERT INTO `availability` (`availabilityID`, `day_available`, `start_time`, `end_time`) VALUES ('Mon 2-3', 'Monday', '2:00', '3:00');
INSERT INTO `availability` (`availabilityID`, `day_available`, `start_time`, `end_time`) VALUES ('Mon 3-4', 'Monday', '3:00', '4:00');
INSERT INTO `availability` (`availabilityID`, `day_available`, `start_time`, `end_time`) VALUES ('Mon 4-5', 'Monday', '4:00', '5:00');
INSERT INTO `availability` (`availabilityID`, `day_available`, `start_time`, `end_time`) VALUES ('Mon 5-6', 'Monday', '5:00', '6:00');
INSERT INTO `availability` (`availabilityID`, `day_available`, `start_time`, `end_time`) VALUES ('Mon 6-7', 'Monday', '6:00', '7:00');
INSERT INTO `availability` (`availabilityID`, `day_available`, `start_time`, `end_time`) VALUES ('Mon 7-8', 'Monday', '7:00', '8:00');
INSERT INTO `availability` (`availabilityID`, `day_available`, `start_time`, `end_time`) VALUES ('Mon 8-9', 'Monday', '8:00', '9:00');
INSERT INTO `availability` (`availabilityID`, `day_available`, `start_time`, `end_time`) VALUES ('Tues 2-3', 'Tuesday', '2:00', '3:00');
INSERT INTO `availability` (`availabilityID`, `day_available`, `start_time`, `end_time`) VALUES ('Tues 3-4', 'Tuesday', '3:00', '4:00');
INSERT INTO `availability` (`availabilityID`, `day_available`, `start_time`, `end_time`) VALUES ('Tues 4-5', 'Tuesday', '4:00', '5:00');
INSERT INTO `availability` (`availabilityID`, `day_available`, `start_time`, `end_time`) VALUES ('Tues 5-6', 'Tuesday', '5:00', '6:00');
INSERT INTO `availability` (`availabilityID`, `day_available`, `start_time`, `end_time`) VALUES ('Tues 6-7', 'Tuesday', '6:00', '7:00');
INSERT INTO `availability` (`availabilityID`, `day_available`, `start_time`, `end_time`) VALUES ('Tues 7-8', 'Tuesday', '7:00', '8:00');
INSERT INTO `availability` (`availabilityID`, `day_available`, `start_time`, `end_time`) VALUES ('Tues 8-9', 'Tuesday', '8:00', '9:00');
INSERT INTO `availability` (`availabilityID`, `day_available`, `start_time`, `end_time`) VALUES ('Wed 2-3', 'Wednesday', '2:00', '3:00');
INSERT INTO `availability` (`availabilityID`, `day_available`, `start_time`, `end_time`) VALUES ('Wed 3-4', 'Wednesday', '3:00', '4:00');
INSERT INTO `availability` (`availabilityID`, `day_available`, `start_time`, `end_time`) VALUES ('Wed 4-5', 'Wednesday', '4:00', '5:00');
INSERT INTO `availability` (`availabilityID`, `day_available`, `start_time`, `end_time`) VALUES ('Wed 5-6', 'Wednesday', '5:00', '6:00');
INSERT INTO `availability` (`availabilityID`, `day_available`, `start_time`, `end_time`) VALUES ('Wed 6-7', 'Wednesday', '6:00', '7:00');
INSERT INTO `availability` (`availabilityID`, `day_available`, `start_time`, `end_time`) VALUES ('Wed 7-8', 'Wednesday', '7:00', '8:00');
INSERT INTO `availability` (`availabilityID`, `day_available`, `start_time`, `end_time`) VALUES ('Wed 8-9', 'Wednesday', '8:00', '9:00');





