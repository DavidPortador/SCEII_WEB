drop database sceii;
create database sceii;
use sceii;

create table carrera(
    id int not null auto_increment,
    nombre varchar(50) not null,
    constraint carreraPK primary key (id)
);

create table semestre(
    id int not null auto_increment,
    nombre varchar(50) not null,
    constraint semestrePK primary key (id)
);

create table usuario(
    id int not null auto_increment,
    token varchar(400) unique,
    nombre varchar(50) not null,
    apellidos varchar(50) not null,
    correo varchar(50) not null unique,
    clave char(44) not null,
    genero char(1) not null,
    tipoUsuario varchar(15) not null,
    fecha_Nac date,
    constraint usuarioPK primary key (id),
    constraint usuarioUN unique (correo),
    constraint usuarioCK1 check
        (genero = 'm' or genero = 'f' or genero = 'o'),
    constraint usuarioCK2 check
        (tipoUsuario = 'administrador' or tipoUsuario = 'docente' or
        tipoUsuario = 'alumno' or tipoUsuario = 'visitante')
);

create table administrador(
    id int not null auto_increment,
    id_usuario int,
    constraint adminPK primary key (id),
    constraint adminFK foreign key (id_usuario) references usuario (id)
);

create table docente(
    id int not null auto_increment,
    id_usuario int,
    constraint docentePK primary key (id),
    constraint docenteFK foreign key (id_usuario) references usuario (id)
);

create table alumno(
    id int not null auto_increment,
    no_control varchar(8) not null,
    id_usuario int,
    id_carrera int,
    id_semestre int,
    constraint alumnoPK primary key (id),
    constraint alumnoUN unique (no_control),
    constraint alumnoFK1 foreign key (id_usuario) references usuario (id),
    constraint alumnoFK2 foreign key (id_carrera) references carrera (id),
    constraint alumnoFK3 foreign key (id_semestre) references semestre (id)
);

create table visitante(
    id int not null auto_increment,
    institucion varchar(50),
    fecha date,
    id_usuario int,
    constraint visitantePK primary key (id),
    constraint visitanteFK1 foreign key (id_usuario) references usuario (id)
);

create table materia(
    id int not null auto_increment,
    nombre varchar(50) not null,
    codigo varchar(10) not null,
    id_docente int,
    id_semestre int,
    constraint materiaPK primary key (id),
    constraint materiaUN unique (codigo),
    constraint materiaFK1 foreign key (id_docente) references docente (id),
    constraint materiaFK2 foreign key (id_semestre) references semestre (id)
);

create table prestamo(
    id int not null auto_increment,
    descripcion varchar(100),
    fecha_Ini date,
    fecha_Fin date,
    fecha_Ent date,
    id_usuario int,
    constraint prestamoPK primary key (id),
    constraint prestamoFK foreign key (id_usuario) references usuario (id),
    constraint prestamoCK check (fecha_Ini < fecha_Ent)
);

create table practicas(
    id int not null auto_increment,
    nombre varchar(50) not null,
    valor float,
    porcentaje int,
    actividades int,
    realizo int,
    id_materia int,
    constraint practicasPK primary key (id),
    constraint practicasFK foreign key (id_materia) references materia (id),
    constraint practicasCK check (valor >= 0 and valor <= 100)
);

create table archivo(
    id int not null auto_increment,
    nombre varchar(50),
    enlace text(500),
    id_practica int,
    constraint archivoPK primary key (id),
    constraint archivoFK foreign key (id_practica) references practicas (id)
);

create table cuestionario(
    id int not null auto_increment,
    valor float,
    id_practica int,
    constraint cuestionarioPK primary key (id),
    constraint cuestionarioFK foreign key (id_practica) references practicas (id),
    constraint cuestionarioCK check (valor >= 0 and valor <= 100)
);

create table preguntas(
    id int not null auto_increment,
    descripcion varchar(100),
    id_cuestionario int,
    constraint preguntasPK primary key (id),
    constraint preguntasFK foreign key (id_cuestionario) references cuestionario (id)
);

create table respuestas(
    id int not null auto_increment,
    descripcion varchar(100),
    id_pregunta int,
    resultado boolean,
    constraint respuestasPK primary key (id),
    constraint respuestasFK foreign key (id_pregunta) references preguntas (id)
);

create table enlaces(
    id int not null auto_increment,
    enlace text(500),
    tipoEnlace varchar(30),
    id_materia int,
    constraint enlacesPK primary key (id),
    constraint enlacesFK foreign key (id_materia) references materia (id)
);

-- TABLA ACTIVIDADES

create table actividades (
    id int(11) not null auto_increment,
    nombre varchar(50) not null,
    realizado char(1) not null,
    id_practica int(11) not null,
    id_archivo int(11) default null,
    constraint actividadesPK primary key (id),
    constraint actividadesFK1 foreign key (id_practica) references practicas (id),
    constraint actividadesFK2 foreign key (id_archivo) references archivo (id)
);

-- FIN

create table alumno_materia(
    id int not null auto_increment,
    id_alumno int,
    id_materia int,
    constraint AMPK primary key (id),
    constraint AMFK1 foreign key (id_alumno) references alumno (id),
    constraint AMFK2 foreign key (id_materia) references materia (id)
);

create table alumno_practica(
    id int not null auto_increment,
    puntos float,
    id_alumno int,
    id_practica int,
    constraint APPK primary key (id),
    constraint APFK1 foreign key (id_alumno) references alumno (id),
    constraint APFK2 foreign key (id_practica) references practicas (id)
);

create table materia_practica(
    id int not null auto_increment,
    id_materia int,
    id_practica int,
    constraint MPPK primary key (id),
    constraint MPFK1 foreign key (id_materia) references materia (id),
    constraint MPFK2 foreign key (id_practica) references practicas (id)
);

create table practica_cuestionario(
    id int not null auto_increment,
    id_practica int,
    id_cuestionario int,
    constraint PCPK primary key (id),
    constraint PCFK1 foreign key (id_practica) references practicas (id),
    constraint PCFK2 foreign key (id_cuestionario) references cuestionario (id)
);

-- TRANSACCIONES (Usuario => tipoUsuario)

/*
create procedure insert_alumno(p_id_usuario int, p_no_control int, p_id_carrera int, p_id_semestre int)
language sql
    begin
        start transaction;
        insert into alumno(id_usuario, no_control ,id_carrera, id_semestre)
        values(p_id_usuario, p_no_control, p_id_carrera, p_id_semestre);
        commit;
    end;

create procedure insert_docente(p_id_usuario int)
language sql
    begin
        start transaction ;
        insert into docente(id_usuario)
        values(p_id_usuario);
        commit;
    end;

create procedure insert_visitante(p_id_usuario int, p_institucion varchar(50))
language sql
    begin
        start transaction ;
        insert into visitante(id_usuario, institucion, fecha)
        values(p_id_usuario, p_institucion, curdate());
        commit;
    end;

create or replace procedure insert_usuario_alumno
(p_nombre varchar(50), p_apelllidos varchar(50), p_correo varchar(50), p_clave varchar(44),
p_genero char(1),p_fecha_nac date, p_no_control int, p_id_carrera int, p_id_semestre int)
language sql
    begin
        start transaction ;
        insert into usuario(nombre, apellidos, correo, clave, genero, tipoUsuario, fecha_Nac)
        values(p_nombre, p_apelllidos, p_correo, password(p_clave), p_genero,'alumno', p_fecha_nac);
        set @id_usuario = (select id from usuario u where correo=p_correo);
        if @id_usuario is null then
            signal sqlstate '45000'
            set message_text  = 'el usuario no existe';
            rollback ;
        else
            call insert_alumno(@id_usuario,p_no_control,p_id_carrera,p_id_semestre);
            commit;
        commit;
            end if;
    end;


create or replace procedure insert_usuario_docente
(p_nombre varchar(50), p_apelllidos varchar(50), p_correo varchar(50), p_clave varchar(44),
p_genero char(1),p_fecha_nac date)
language sql
    begin
        start transaction ;
        insert into usuario(nombre, apellidos, correo, clave, genero, tipoUsuario, fecha_Nac)
        values(p_nombre, p_apelllidos, p_correo, password(p_clave), p_genero,'docente', p_fecha_nac);
        set @id_usuario = (select id from usuario u where correo=p_correo);
        if @id_usuario is null then
            signal sqlstate '45000'
            set message_text  = 'el usuario no existe';
            rollback ;
        else
            call insert_docente(@id_usuario);
            commit;
        commit;
            end if;
    end;

create or replace procedure insert_usuario_visitante
(p_nombre varchar(50), p_apelllidos varchar(50), p_correo varchar(50), p_clave varchar(44),
p_genero char(1),p_fecha_nac date, p_institucion varchar(50))
language sql
    begin
        start transaction ;
        insert into usuario(nombre, apellidos, correo, clave, genero, tipoUsuario, fecha_Nac)
        values(p_nombre, p_apelllidos, p_correo, password(p_clave), p_genero,'visitante', p_fecha_nac);
        set @id_usuario = (select id from usuario u where correo=p_correo);
        if @id_usuario is null then
            signal sqlstate '45000'
            set message_text  = 'el usuario no existe';
            rollback ;
        else
            call insert_visitante(@id_usuario,p_institucion);
            commit;
        commit;
            end if;
    end;
*/



/*v2*/

/*---*/
/*
create procedure insert_alumno(p_id_usuario int, p_no_control int, p_id_carrera int, p_id_semestre int)
language sql
    begin
        start transaction;
        insert into alumno(id_usuario, no_control ,id_carrera, id_semestre)
        values(p_id_usuario, p_no_control, p_id_carrera, p_id_semestre);
        commit;
    end;


create procedure insert_docente(p_id_usuario int)
language sql
    begin
        start transaction ;
        insert into docente(id_usuario)
        values(p_id_usuario);
        commit;
    end;


create procedure insert_visitante(p_id_usuario int, p_institucion varchar(50))
language sql
    begin
        start transaction ;
        insert into visitante(id_usuario, institucion, fecha)
        values(p_id_usuario, p_institucion, curdate());
        commit;
    end;


create or replace procedure insert_usuario_alumno
(p_nombre varchar(50), p_apelllidos varchar(50), p_correo varchar(50), p_clave varchar(44),
p_genero char(1),p_fecha_nac date, p_no_control int, p_id_carrera int, p_id_semestre int)
language sql
    begin
        start transaction;
        set @correo = (select id from usuario where correo = p_correo);
        if @correo is null then
        set @no_control = (select no_control from alumno where no_control = p_no_control);
        if @no_control is null then
        insert into usuario(nombre, apellidos, correo, clave, genero, tipoUsuario, fecha_Nac)
        values(p_nombre, p_apelllidos, p_correo, password(p_clave), p_genero,'alumno', p_fecha_nac);
        set @id_usuario = (select id from usuario u where correo=p_correo);
        if @id_usuario is null then
            signal sqlstate '45000'
            set message_text  = 'El usuario no existe';
            rollback ;
        else
            call insert_alumno(@id_usuario,p_no_control,p_id_carrera,p_id_semestre);
            commit;
        commit;
            end if;
        else
            signal sqlstate '45000'
            set message_text  = 'El no. Control ya se encuentra registrado';
            end if;
        else
            signal sqlstate '45000'
            set message_text  = 'El correo ya se encuentra registrado';
            end if;
    end;


create or replace procedure insert_token(p_correo varchar(50), p_token varchar(400))
language sql
begin
update usuario set token = p_token where correo = p_correo;
end;

create or replace procedure insert_usuario_docente
(p_nombre varchar(50), p_apelllidos varchar(50), p_correo varchar(50), p_clave varchar(44),
p_genero char(1),p_fecha_nac date)
language sql
    begin
        start transaction ;
         set @correo = (select id from usuario where correo = p_correo);
        if @correo is null then
        insert into usuario(nombre, apellidos, correo, clave, genero, tipoUsuario, fecha_Nac)
        values(p_nombre, p_apelllidos, p_correo, password(p_clave), p_genero,'docente', p_fecha_nac);
        set @id_usuario = (select id from usuario u where correo=p_correo);
        if @id_usuario is null then
            signal sqlstate '45000'
            set message_text  = 'el usuario no existe';
            rollback ;
        else
            call insert_docente(@id_usuario);
            commit;
        commit;
            end if;
        else
            signal sqlstate '45000'
            set message_text  = 'El correo ya se encuentra registrado';
            end if;
    end;

create or replace procedure insert_usuario_visitante
(p_nombre varchar(50), p_apelllidos varchar(50), p_correo varchar(50), p_clave varchar(44),
p_genero char(1),p_fecha_nac date, p_institucion varchar(50))
language sql
    begin
        start transaction ;
        set @correo = (select id from usuario where correo = p_correo);
        if @correo is null then
        insert into usuario(nombre, apellidos, correo, clave, genero, tipoUsuario, fecha_Nac)
        values(p_nombre, p_apelllidos, p_correo, password(p_clave), p_genero,'visitante', p_fecha_nac);
        set @id_usuario = (select id from usuario u where correo=p_correo);
        if @id_usuario is null then
            signal sqlstate '45000'
            set message_text  = 'el usuario no existe';
            rollback ;
        else
            call insert_visitante(@id_usuario,p_institucion);
            commit;
        commit;
            end if;
        else
             signal sqlstate '45000'
            set message_text  = 'El correo ya se encuentra registrado';
             end if;
    end;

create or replace procedure login (p_correo varchar(50), p_clave varchar(44))
language sql
    begin
        set @id = (select id from usuario where correo = p_correo and clave = password(p_clave));
        if @id is not null then
            select token from usuario where id = @id;
            else
            signal sqlstate '45000'
            set message_text  = 'Datos incorrectos';
            end if;
    end;
*/
/*---*/

-- TABLAS INICIALIZADAS EN LA BASE DE DATOS

insert into carrera (nombre) values 
	('Licenciatura en administracion'),
    ('Ingeniería ambiental'),
    ('Ingeniería bioquímica'),
    ('Ingeniería electrónica'),
    ('Ingeniería en gestión empresarial'),
    ('Ingeniería Industrial'),
    ('Ingeniería mecánica'),
    ('Ingeniería mecatrónica'),
    ('Ingeniería en sistemas computacionales'),
    ('Ingeniería química');

insert into semestre (nombre) values 
	('1'),
    ('2'),
    ('3'),
    ('4'),
    ('5'),
    ('6'),
    ('7'),
    ('8'),
    ('9'),
    ('10'),
    ('11'),
    ('12'),
    ('otro');



-- REGISTROS DE PRUEBA



-- insert alumno
insert into usuario 
(nombre, apellidos, correo, clave, genero, tipoUsuario, fecha_Nac) values 
    ('Johan Rafael', 'Rojas Cardenas', 'johan@itcelaya.edu.mx', password('12345'), 'm', 'alumno', '2000-01-01');

insert into alumno (no_control, id_usuario, id_carrera, id_semestre) values 
    ('39020457', 1, 9, 6);
    
--select * from usuario u join alumno a on u.id = a.id_usuario join carrera c on c.id = a.id_carrera;

-- insert docente
insert into usuario (nombre, apellidos, correo, clave, genero, tipoUsuario, fecha_Nac) values 
    ('Juan Rafael', 'Escutia Cardenas', 'juan@itcelaya.edu.mx', password('12345'), 'm', 'docente', '1970-01-01');

insert into docente (id_usuario) values
    (2);
    
--select * from usuario u join docente d on u.id = d.id_usuario;

-- insert materia

INSERT INTO materia (id, nombre, codigo, id_docente, id_semestre) VALUES
    (1, 'Laboratorio de seguridad', '100', 1, 1),
    (2, 'Laboratorio de manofacturas', '101', 1, 2),
    (3, 'Laboratorio de ergonomia', '102', 1, 7);

-- insert practicas

INSERT INTO practicas (id, nombre, valor, porcentaje, actividades, realizo, id_materia) VALUES
    (1, 'Practica de seguridad 1', 20, 100, 2, 2, 1),
    (2, 'Practica de seguridad 2', 20, 25, 4, 1, 1),
    (3, 'Practica 3', 20, 75, 4, 3, 1);

-- insert actividades

INSERT INTO actividades (id, nombre, realizado, id_practica, id_archivo) VALUES
    (1, 'actividad 1 ', 's', 1, NULL),
    (2, 'actividad 2', 's', 1, NULL),
    (3, 'actividad 1-2', 's', 2, NULL),
    (4, 'actividad 2-2', 'n', 2, NULL),
    (5, 'actividad 3-2', 'n', 2, NULL),
    (6, 'actividad 4-2', 'n', 2, NULL),
    (8, 'actividad 1-3', 's', 3, NULL),
    (9, 'actividad 2-3', 's', 3, NULL),
    (10, 'actividad 3-3', 's', 3, NULL),
    (11, 'actividad 4-3', 'n', 3, NULL);