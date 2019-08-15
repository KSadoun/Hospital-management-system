/*CREATE TABLE PPATIENTS*/
CREATE TABLE patients (
  patient_no int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  patient_fullname varchar(256) NOT NULL,
  patient_address varchar(256) NOT NULL,
  patient_city varchar(256) NOT NULL,
  patient_gender varchar(256) NOT NULL,
  patient_email varchar(256) NOT NULL,
  patient_password varchar(256) NOT NULL,
  patient_creation_date DATETIME NOT NULL,
  patient_updation_date DATETIME NOT NULL,
  display varchar(256) NOT NULL
);

INSERT INTO patients (patient_fullname, patient_address, patient_city, patient_gender, patient_email, patient_password, patient_creation_date, patient_updation_date, display) VALUES ('Raj Kumar Khan', 'Here', 'earth/indonesia', 'male', 'rajkumarkhan@gmail.com', 'raj', NOW(), '0000-00-00 00:00:00', 'yes');

INSERT INTO patients (patient_fullname, patient_address, patient_city, patient_gender, patient_email, patient_password, patient_creation_date, patient_updation_date, display) VALUES ('lilyan ahad', 'Pakistan', 'Karachaki', 'male/female', 'lilyan@gmail.com', 'lilyan', NOW(), '0000-00-00 00:00:00', 'yes');

INSERT INTO patients (patient_fullname, patient_address, patient_city, patient_gender, patient_email, patient_password, patient_creation_date, patient_updation_date, display) VALUES ('Ralph lloyd', 'beside ballona somewhere', 'pallalino', 'male', 'ralph@gmail.com', 'ralph', NOW(), '0000-00-00 00:00:00', 'yes');

INSERT INTO patients (patient_fullname, patient_address, patient_city, patient_gender, patient_email, patient_password, patient_creation_date, patient_updation_date, display) VALUES ('Sara something', 'Heaven(jk)', 'city of the devil correctors', 'female', 'sara@gmail.com', 'sara', NOW(), '0000-00-00 00:00:00', 'yes');



/*CREATE APPOINTMENTS TABLE*/
CREATE TABLE appointments (
  appointment_no int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  patient_no int(11) NOT NULL,
  patient_fullname varchar(256) NOT NULL,
  doctor_fullname varchar(256) NOT NULL,
  doctor_specialization varchar(256) NOT NULL,
  appointment_fee INT(11) NOT NULL,
  appointment_date_time DATETIME NOT NULL,
  appointment_creation_date DATETIME NOT NULL,
  display varchar(256) NOT NULL
);


/*CREATE DOCTOR TABLE*/
CREATE TABLE doctors (
  doctor_no int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  doctor_fullname varchar(256) NOT NULL,
  doctor_specialization varchar(256) NOT NULL,
  doctor_address varchar(256) NOT NULL,
  doctor_fee int(11) NOT NULL,
  doctor_number varchar(256) NOT NULL,
  doctor_email varchar(256) NOT NULL,
  doctor_password varchar(256) NOT NULL,
  doctor_creation_date DATETIME NOT NULL,
  doctor_updation_date DATETIME NOT NULL,
  display varchar(256) NOT NULL
);

/*a doctor demo field*/
INSERT INTO doctors(`doctor_fullname`,`doctor_specialization`,`doctor_address`,`doctor_fee`,`doctor_number`,`doctor_email`,`doctor_password`,`doctor_creation_date`,`doctor_updation_date`, `display`) VALUES ('Ahmed Khan', 'Addiction psychiatrist', '2122 tabuk, saudi arabia', '500', '0590654359', 'ahmedkhan@gmail.com', 'ahmed', NOW(), '0000-00-00 00:00:00', 'yes');

INSERT INTO doctors(`doctor_fullname`,`doctor_specialization`,`doctor_address`,`doctor_fee`,`doctor_number`,`doctor_email`,`doctor_password`,`doctor_creation_date`,`doctor_updation_date`, `display`) VALUES ('Ali Raju', 'Allergist (immunologist)', 'Al-Faysaliya Al-Janubiya, Dammam', '750', '0591642758', 'aliraju@gmail.com', 'ali', NOW(), '0000-00-00 00:00:00', 'yes');

INSERT INTO doctors(`doctor_fullname`,`doctor_specialization`,`doctor_address`,`doctor_fee`,`doctor_number`,`doctor_email`,`doctor_password`,`doctor_creation_date`,`doctor_updation_date`, `display`) VALUES ('Mushtaq Khan', 'Cardiologist', '8918 mujin, Berlin, Germany', '1200', '0512676810', 'mushtaqkhan@gmail.com', 'mushtaq', NOW(), '0000-00-00 00:00:00', 'yes');

INSERT INTO doctors(`doctor_fullname`,`doctor_specialization`,`doctor_address`,`doctor_fee`,`doctor_number`,`doctor_email`,`doctor_password`,`doctor_creation_date`,`doctor_updation_date`, `display`) VALUES ('Dom Gn', 'Allergist (immunologist)', 'somewhere in this universe', '700', '0516565849', 'Domgn@gmail.com', 'dom', NOW(), '0000-00-00 00:00:00', 'yes');

INSERT INTO doctors(`doctor_fullname`,`doctor_specialization`,`doctor_address`,`doctor_fee`,`doctor_number`,`doctor_email`,`doctor_password`,`doctor_creation_date`,`doctor_updation_date`, `display`) VALUES ('Wes Bos', 'Adolescent medicine specialist', 'Mountains, moon', '1000', '0550456751', 'wesbos@gmail.com', 'wes', NOW(), '0000-00-00 00:00:00', 'yes');

INSERT INTO doctors(`doctor_fullname`,`doctor_specialization`,`doctor_address`,`doctor_fee`,`doctor_number`,`doctor_email`,`doctor_password`,`doctor_creation_date`,`doctor_updation_date`, `display`) VALUES ('Jin Sama', 'Cardiac electrophysiologist', 'Any dark room', '20', '0592342528', 'jinsama@gmail.com', 'jin', NOW(), '0000-00-00 00:00:00', 'yes');

INSERT INTO doctors(`doctor_fullname`,`doctor_specialization`,`doctor_address`,`doctor_fee`,`doctor_number`,`doctor_email`,`doctor_password`,`doctor_creation_date`,`doctor_updation_date`, `display`) VALUES ('Shaitan', 'Addiction psychiatrist', 'Trust me you dont wanna come here', '1000000', '0555555555', 'shaitan@gmail.com', 'shaitan', NOW(), '0000-00-00 00:00:00', 'yes');

INSERT INTO doctors(`doctor_fullname`,`doctor_specialization`,`doctor_address`,`doctor_fee`,`doctor_number`,`doctor_email`,`doctor_password`,`doctor_creation_date`,`doctor_updation_date`, `display`) VALUES ('Elisha Munoz', 'Cardiologist', 'I freaking still dont know', '800', '0550895289', 'zeze@gmail.com', 'zeze', NOW(), '0000-00-00 00:00:00', 'yes');

INSERT INTO doctors(`doctor_fullname`,`doctor_specialization`,`doctor_address`,`doctor_fee`,`doctor_number`,`doctor_email`,`doctor_password`,`doctor_creation_date`,`doctor_updation_date`, `display`) VALUES ('Homo Sapien', 'Anesthesiologist', 'where there is free money there is homo sapien', '99999', '0590321572', 'homosapien@gmail.com', 'homo', NOW(), '0000-00-00 00:00:00', 'yes');


/*CREATE ADMIN TABLE AND ADD THE 2 ONLY ADMINS*/
CREATE TABLE admins(
  admin_no int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  admin_username varchar(256) NOT NULL,
  admin_password varchar(256) NOT NULL
);
INSERT INTO admins (admin_username, admin_password) VALUES ('ballona', 'luli');


/*CREATE SPECIALIZATIONS TABLE AND INSERT SOME ROWS*/
CREATE TABLE specializations (
  specialization_no int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  specialization_name varchar(256) NOT NULL,
  specialization_creation_date DATETIME NOT NULL,
  display DATETIME NOT NULL
);
INSERT INTO specializations(specialization_name, specialization_creation_date, display) VALUES('Addiction psychiatrist', NOW(), 'yes');
INSERT INTO specializations(specialization_name, specialization_creation_date, display) VALUES('Adolescent medicine specialist', NOW(), 'yes');
INSERT INTO specializations(specialization_name, specialization_creation_date, display) VALUES('Allergist (immunologist)', NOW(), 'yes');
INSERT INTO specializations(specialization_name, specialization_creation_date, display) VALUES('Anesthesiologist', NOW(), 'yes');
INSERT INTO specializations(specialization_name, specialization_creation_date, display) VALUES('Cardiac electrophysiologist', NOW(), 'yes');
INSERT INTO specializations(specialization_name, specialization_creation_date, display) VALUES('Cardiologist', NOW(), 'yes');

