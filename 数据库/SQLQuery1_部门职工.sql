create table ����
(
	���ź� char(4),
	������ varchar(100),
	constraint pk_���� primary key(���ź�),
)


create table ����
(
	���Һ� char(4),
	������ varchar(100),
	���ź� char(4),
	constraint pk_���� primary key(���Һ�),
	constraint fk_���� foreign key(���ź�) references ����(���ź�),
	
)

create table ְ��
(
	ְ���� char(12),
	���� varchar(20),
	�Ա� char(2),
	�������� date,
	סַ varchar(100),
	���Һ� char(4)
	constraint pk_ְ�� primary key(ְ����),
	constraint fk_ְ�� foreign key(���Һ�) references ����(���Һ�)
)

insert into ���� values('0001','���۲�');

insert into ���� values('0001','ս�Կ�','0001');
insert into ���� values('0002','�ƻ��','0001');
insert into ���� values('0003','������','0001');
insert into ����(���Һ�,������) values('1005','������');

insert into ְ�� values('202011050114','��˳','��','2000.1.2','����','0001');
insert into ְ�� values('202011050116','����','��','2000.8.2','����','0002');
insert into ְ�� values('202011050117','����','��','2000.4.2','����','0003');
insert into ְ��(ְ����,����,�Ա�,��������,סַ) values('202011050115','����','��','2000.1.2','����');



update ���� set ������ = 'ս�Կ�' where ������ = 'һ��';
alter table ���� alter column ������ varchar(100);

use zg;




select ְ����,���� from ְ�� where �������� < '2001-01-01';

select ְ����,���� from ְ�� where ���Һ� is null;

select ���Һ� as ���Һ�,count(ְ����) as ���� from ְ�� group by ���Һ�,ְ����;


select ְ����,���� from 
(select ְ����,����,������ from ְ��,���� where ְ��.���Һ� = ����.���Һ�)
 as teep
 where ������ = '�ƻ��' or ������ = '������'


 insert into ����(���Һ�,������) values('1005','������');

 update ְ�� set �������� = '1983-10-1' where ְ���� = '10015';

 delete from ְ�� where ���Һ� = '1005';
