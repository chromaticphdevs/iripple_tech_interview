create table issue_cycles(
    id int(10) not null primary key auto_increment,
    cycle_number varchar(50) unique,
    issue_id int(10) not null,
    tester_id int(10) not null,
    date date,
    notes text,
    grade enum('passed', 'failed'),
    created_at timestamp default now()
);