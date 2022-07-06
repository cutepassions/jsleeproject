create table board (
   num int not null auto_increment,
   lecture varchar(20) not null,
   professor varchar(20) not null,
   name varchar(20) not null,
   reason varchar(20) not null,
   advan varchar(20) not null,
   disadvan varchar(20) not null,
   rating int(20) not null,
   regist_day char(20) not null,
   recommend int(20) not null,
   primary key(num)
);
