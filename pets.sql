DROP DATABASE IF EXISTS pets;
CREATE DATABASE pets;
USE pets;

CREATE TABLE `pet` (
  pet_no int(11) NOT NULL AUTO_INCREMENT,
  pet_name varchar(100) NOT NULL,
  species varchar(100) NOT NULL,
  gender varchar(60) NOT NULL,
  birthdate date NOT NULL,
  owner varchar(100) NOT NULL,
  active tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (pet_no)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


insert into pet values("100","sushi","bird","female","2000-10-23","sam",1);
insert into pet values("101","sushi","bird","female","2001-11-20","tom",1);
insert into pet values("102","fluppy","bird","male","2002-03-02","sam",1);
insert into pet values("103","stinky","dog","male","2005-01-03","kim",1);
insert into pet values("104","kinky","cat","male","2005-02-14","sam",1);
insert into pet values("105","flubber","cow","male","1992-05-31","tom",1);
insert into pet values("106","brownie","dog","male","2007-07-21","sam",1);
insert into pet values("107","snowy","dog","female","2010-12-25","kim",1);
insert into pet values("108","duffy","duck","female","2015-11-05","tom",1);
insert into pet values("109","sleepy","cat","female","2012-08-30","tom",1);
insert into pet values("110","dazzle","bird","male","2013-06-23","kim",1);