IF OBJECT_ID('TSDIG1', N'id') is null
	drop table TSDIG1;
GO
create table TSDIG1 (
  id int not null primary key,
  username varchar(10) not null,
  pass varchar(10),
  filier_id int
);
insert into TSDIG1 (id, username, pass, filier_id) values (1, 'user','user123',4), (2, 'test','test123', 3), (3, 'admin','admin123',2), (4, 'root','root123',1);
select * from TSDIG1;

IF OBJECT_ID('FILIER', N'id') is null
	drop table FILIER;
GO
create table FILIER (
  id int not null primary key,
  filierName varchar(20),
);

insert into FILIER (id, filierName) values (1, 'filierName1'), (2, 'filierName2'), (3, 'filierName3'), (4, 'filierName4');
select * from FILIER;

select username, pass, filierName, filier_id from TSDIG1 join FILIER on filier_id = FILIER.id;
