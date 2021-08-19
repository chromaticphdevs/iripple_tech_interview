create table invites(
    id int(10) not null primary key auto_increment,
    invite_number varchar(50) unique,
    type enum('join_platform' , 'join_project') not null,
    invited_by int(10) comment 'user who sent the invitation',
    invitee varchar(100) comment 'can be an email or userid',
    href text comment 'user can jump here after clicking the invite',
    status enum('expired' , 'pending' , 'used') default 'pending',
    created_at timestamp default now() ,
    updated_at timestamp default now() ON UPDATE now()
);