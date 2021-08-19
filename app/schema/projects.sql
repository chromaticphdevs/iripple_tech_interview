create table projects(
    id int(10) not null primary key auto_increment,
    code varchar(50) unique,
    project varchar(100),
    created_at timestamp default now(),
    created_by int(10) not null
);

