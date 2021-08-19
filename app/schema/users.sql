create table users(
    id int(10) not null primary key auto_increment,
    user_code char(8) unique,
    email varchar(100) not null unique,
    first_name varchar(100) not null,
    last_name varchar(100) not null,
    password varchar(255) not null,
    created_at timestamp default now(),
    updated_at timestamp default now() ON UPDATE now()
);