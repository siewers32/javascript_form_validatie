create table pet( pet_no numeric(9), pet_name varchar(100), species varchar(100), gender varchar(60), birthdate date, owner varchar(100));

insert into pet values("100","sushi","bird","female","2000-10-23","sam");
insert into pet values("101","sushi","bird","female","2001-11-20","tom");
insert into pet values("102","fluppy","bird","male","2002-03-02","sam");
insert into pet values("103","stinky","dog","male","2005-01-03","kim");
insert into pet values("104","kinky","cat","male","2005-02-14","sam");
insert into pet values("105","flubber","cow","male","1992-05-31","tom");
insert into pet values("106","brownie","dog","male","2007-07-21","sam");
insert into pet values("107","snowy","dog","female","2010-12-25","kim");
insert into pet values("108","duffy","duck","female","2015-11-05","tom");
insert into pet values("109","sleepy","cat","female","2012-08-30","tom");
insert into pet values("110","dazzle","bird","male","2013-06-23","kim");

select * from pet;