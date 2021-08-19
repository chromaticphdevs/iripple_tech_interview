drop table issues;
create table issues(
    id int(10) not null primary key auto_increment,
    type enum('Bugs' , 'Enhancement') not null,
    project_id int(10) not null,
    issue_number varchar(50),
    subject varchar(100),
    description text,
    developer_id int(10) not null,
    tester_id int(10) not null,
    status enum('on-going' , 'cancelled' , 'completed') default 'on-going',
    grade enum('pending','passed' , 'failed') default 'pending',
    release_date date,
    finishing_date date comment 'issue deadline',
    completion_date date,
    
    
    created_by int(10) not null,
    created_at timestamp default now(),
    updated_at timestamp default now() ON UPDATE now()
);