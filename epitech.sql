drop DATABASE if EXISTS epitech;
create DATABASE epitech;
    use epitech;

create table profile
(
    id_p int(3) not null auto_increment,
    name varchar(100) not null,
    mdp varchar(100) not null,
    company_name varchar(100),
    email varchar(200),
    tel varchar(13),
    primary key(id_p)
);