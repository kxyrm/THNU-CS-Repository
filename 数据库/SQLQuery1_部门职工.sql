create table 部门
(
	部门号 char(4),
	部门名 varchar(100),
	constraint pk_部门 primary key(部门号),
)


create table 科室
(
	科室号 char(4),
	科室名 varchar(100),
	部门号 char(4),
	constraint pk_科室 primary key(科室号),
	constraint fk_科室 foreign key(部门号) references 部门(部门号),
	
)

create table 职工
(
	职工号 char(12),
	姓名 varchar(20),
	性别 char(2),
	出生日期 date,
	住址 varchar(100),
	科室号 char(4)
	constraint pk_职工 primary key(职工号),
	constraint fk_职工 foreign key(科室号) references 科室(科室号)
)

insert into 部门 values('0001','销售部');

insert into 科室 values('0001','战略科','0001');
insert into 科室 values('0002','财会科','0001');
insert into 科室 values('0003','生产科','0001');
insert into 科室(科室号,科室名) values('1005','技术科');

insert into 职工 values('202011050114','刘顺','男','2000.1.2','安徽','0001');
insert into 职工 values('202011050116','李四','男','2000.8.2','安徽','0002');
insert into 职工 values('202011050117','王五','男','2000.4.2','安徽','0003');
insert into 职工(职工号,姓名,性别,出生日期,住址) values('202011050115','张三','男','2000.1.2','安徽');



update 科室 set 科室名 = '战略科' where 科室名 = '一科';
alter table 科室 alter column 科室名 varchar(100);

use zg;




select 职工号,姓名 from 职工 where 出生日期 < '2001-01-01';

select 职工号,姓名 from 职工 where 科室号 is null;

select 科室号 as 科室号,count(职工号) as 人数 from 职工 group by 科室号,职工号;


select 职工号,姓名 from 
(select 职工号,姓名,科室名 from 职工,科室 where 职工.科室号 = 科室.科室号)
 as teep
 where 科室名 = '财会科' or 科室名 = '生产科'


 insert into 科室(科室号,科室名) values('1005','技术科');

 update 职工 set 出生日期 = '1983-10-1' where 职工号 = '10015';

 delete from 职工 where 科室号 = '1005';
