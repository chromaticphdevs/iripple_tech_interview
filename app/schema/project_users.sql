create table project_users(
    id int(10) not null primary key auto_increment,
    user_id int(10) not null,
    project_id int(10) not null,
    added_by int(10) not null
    created_at timestamp default now(),
);