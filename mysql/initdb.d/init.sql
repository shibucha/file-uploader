create table images(
    id int auto_increment not null primary key,
    file_name varchar(255) not null,
    file_path varchar(255) not null,
    description varchar(140),
    updated_at datetime DEFAULT CURRENT_TIMESTAMP,
    created_at datetime DEFAULT CURRENT_TIMESTAMP,
);