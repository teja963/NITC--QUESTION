create database nitcq;

create table Admin(
 Id int not null primary key,
 Name varchar(45) not null,
 Department varchar(45) not null
 );
 
create table Student(
 Roll_no varchar(45) not null primary key,
 Email_no varchar(45) not null,
 Branch varchar(45) not null,
 First_name varchar(45) not null,
 Last_name varchar(45) not null,
 Mobile_no char(10) not null,
 Id int,
 foreign key(Id) references Admin(Id)
 );
 
create table Login(
 Roll_no varchar(45) not null primary key,
 Password varchar(45) not null,
 foreign key(Roll_no) references Student(Roll_no)
 );
 
create table Elective_info(
 Course_id varchar(45) not null primary key,
 course_name varchar(45) not null,
 faculty varchar(45) not null,
 elective_info varchar(7000) not null,
 Id int,
 foreign key(Id) references Admin(Id)
 );
 
create table Placement_info(
 Company_name varchar(45) not null primary key,
 CTC int not null,
 Reference varchar(200) not null,
 Interview_exp varchar(7000) not null,
 Role varchar(45) not null,
 Id int,
 foreign key(Id) references Admin(Id)
 );
 
create table refers(
 Roll_no varchar(45) not null,
 Company_name varchar(45) not null,
 primary key(Roll_no,Company_name),
 foreign key(Roll_no) references Student(Roll_no),
 foreign key(Company_name) references Placement_info(Company_name)
 );
 
create table Reference_Notes(
 R_id int not null primary key auto increment,
 Branch varchar(45) not null,
 Notes longblob not null,
 Subject varchar(45) not null,
 Year int not null,
 Roll_no varchar(45),
 foreign key(Roll_no) references Student(Roll_no)
 );
 
create table Question_paper(
 Qp_no int not null primary key,
 Branch varchar(45) not null,
 Year int not null,
 Subject varchar(45) not null,
 Q_paper longblob not null,
 Roll_no varchar(45),
 Id int,
 foreign key(Roll_no) references Student(Roll_no),
 foreign key(Id) references Admin(Id)
 );
 
create table access(
  Roll_no varchar(45) not null,
  Course_id varchar(45) not null,
  primary key(Roll_no,Course_id),
  foreign key(Roll_no) references Student(Roll_no),
  foreign key(Course_id) references Elecitve_info(Course_id)
  );
 
 
 

 
 
 
