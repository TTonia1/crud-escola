create database escola;
use escola;

create table professor(
id_professor INT not null  primary key auto_increment,
nome_professor varchar(45),
data_nascimento date,
CPF char(11),
materia varchar(45)
);

create table aulas(
id_aula INT not null  primary key auto_increment
);

create table diario(
id_diario INT not null  primary key auto_increment,
hora_aula datetime,
turma varchar(45),
id_professor INT NOT NULL,
FOREIGN KEY (id_professor) REFERENCES professor(id_professor),
id_aula INT NOT NULL,
FOREIGN KEY (id_aula) REFERENCES aulas(id_aula)
);