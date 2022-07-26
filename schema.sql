create table categories(id int not null auto_increment,
name varchar(255) not null,
PRIMARY KEY (id)
);
create table expenses(
    id int not null auto_increment,
    title VARCHAR(255) not null,
    category_id int not null,
    expense float(5,2) not null,
    date date not null,
    PRIMARY KEY(id),
    FOREIGN KEY (category_id) references categories(id)
);