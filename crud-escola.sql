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
id_aula INT not null  primary key auto_increment,
numero_sala char(2),
tipo_sala varchar(50)
);

create table diario(
id_diario INT not null  primary key auto_increment,
hora_aula time,
turma varchar(45),
id_professor INT NOT NULL,
FOREIGN KEY (id_professor) REFERENCES professor(id_professor)
ON UPDATE CASCADE,
id_aula INT NOT NULL,
FOREIGN KEY (id_aula) REFERENCES aulas(id_aula) ON UPDATE CASCADE
);
