CREATE TABLE estudiantes(
    nie varchar(10),
    nombre varchar(70) not null,
    genero char(1) not null,
    foto varchar(70) not null,
    descriptores longblob not null,
    PRIMARY KEY(nie)
);

CREATE TABLE profesor(
    c_profe smallint AUTO_INCREMENT,
    nombre_p varchar(70) not null,
    PRIMARY KEY(c_profe)
);

CREATE TABLE subdirector(
    c_sub smallint AUTO_INCREMENT,
    nombre_s varchar(70) not null,
    PRIMARY KEY(c_sub)
);

CREATE TABLE admin(
    c_admin smallint AUTO_INCREMENT,
    nombre_a varchar(70) not null,
    PRIMARY KEY(c_admin)
);

CREATE TABLE usuario(
    c_d smallint AUTO_INCREMENT,
    c_profe smallint,
    c_sub smallint,
    c_admin smallint,
    usu_p varchar(30),
    contra_p varchar(30),
    usu_s varchar(30),
    contra_s varchar(30),
    usu_a varchar(30),
    contra_a varchar(30),
    PRIMARY KEY(c_d),
    INDEX(c_profe),
    INDEX(c_sub),
    INDEX(c_admin),
    FOREIGN KEY (c_profe) REFERENCES profesor(c_profe),
    FOREIGN KEY (c_sub) REFERENCES subdirector(c_sub),
    FOREIGN KEY (c_admin) REFERENCES admin(c_admin)
);

CREATE TABLE materia(
    c_materia smallint AUTO_INCREMENT,
    nombre_m varchar(90) not null,
    PRIMARY KEY(c_materia)
);

CREATE TABLE anio(
    c_anio smallint AUTO_INCREMENT,
    anio char(4) not null,
    PRIMARY KEY(c_anio)
);

CREATE TABLE profe_materia(
    c_mp smallint AUTO_INCREMENT,
    c_profe smallint,
    c_materia smallint,
    PRIMARY KEY(c_mp),
    INDEX(c_profe),
    INDEX(c_materia),
    FOREIGN KEY(c_profe) REFERENCES profesor(c_profe),
    FOREIGN KEY(c_materia) REFERENCES materia(c_materia)
);

CREATE TABLE alum_materia(
    c_am smallint AUTO_INCREMENT,
    nie varchar(10) not null,
    c_materia smallint,
    PRIMARY KEY(c_am),
    INDEX(c_materia),
    FOREIGN KEY(nie) REFERENCES estudiantes(nie),
    FOREIGN KEY(c_materia) REFERENCES materia(c_materia)
);

CREATE TABLE materia_a(
    c_ma smallint AUTO_INCREMENT,
    c_anio smallint,
    c_materia smallint,
    PRIMARY KEY(c_ma),
    INDEX(c_anio),
    INDEX(c_materia),
    FOREIGN KEY(c_anio) REFERENCES anio(c_anio),
    FOREIGN KEY(c_materia) REFERENCES materia(c_materia)
);

CREATE TABLE alum_anio(
    c_aa smallint AUTO_INCREMENT,
    nie varchar(10) not null,
    c_anio smallint,
    PRIMARY KEY(c_aa),
    INDEX(nie),
    INDEX(c_anio),
    FOREIGN KEY(nie) REFERENCES estudiantes(nie),
    FOREIGN key(c_anio) REFERENCES anio(c_anio)
);


CREATE TABLE seccion(
    c_se smallint AUTO_INCREMENT,
    seccion char(1) not null,
    PRIMARY key(c_se)
);

CREATE TABLE grado(
    c_grado smallint AUTO_INCREMENT,
    grado char(1) not null,
    PRIMARY KEY(c_grado)
);

CREATE TABLE seccion_profe(
    c_sp smallint AUTO_INCREMENT,
    c_se smallint,
    c_profe smallint,
    PRIMARY KEY(c_sp),
    INDEX(c_se),
    INDEX(c_profe),
    FOREIGN KEY(c_se) REFERENCES seccion(c_se),
    FOREIGN KEY(c_profe) REFERENCES profesor(c_profe)
);

CREATE TABLE grado_profe(
    c_gp smallint AUTO_INCREMENT,
    c_profe smallint,
    c_grado smallint,
    PRIMARY KEY(c_gp),
    INDEX(c_profe),
    INDEX(c_grado),
    FOREIGN KEY(c_profe) REFERENCES profesor(c_profe),
    FOREIGN KEY(c_grado) REFERENCES grado(c_grado)
);


CREATE TABLE aula_grado(
    c_almg smallint AUTO_INCREMENT,
    c_anio smallint,
    c_grado smallint,
    c_se smallint,
    PRIMARY KEY(c_almg),
    INDEX(c_anio),
    INDEX(c_grado),
    INDEX(c_se),
    FOREIGN KEY(c_anio) REFERENCES anio(c_anio),
    FOREIGN KEY(c_grado) REFERENCES grado(c_grado),
    FOREIGN KEY(c_se) REFERENCES seccion(c_se)
);

CREATE TABLE alum_seccion(
    c_as smallint AUTO_INCREMENT,
    c_se smallint,
    nie varchar(10) not null,
    PRIMARY KEY(c_as),
    INDEX(c_se),
    INDEX(nie),
    FOREIGN KEY(c_se) REFERENCES seccion(c_se),
    FOREIGN KEY(nie) REFERENCES estudiantes(nie)
);

CREATE TABLE alum_grado(
    c_ag smallint AUTO_INCREMENT,
    c_anio smallint,
    c_grado smallint,
    c_se smallint,
    PRIMARY KEY(c_ag),
    INDEX(c_anio),
    INDEX(c_grado),
    INDEX(c_se),
    FOREIGN KEY(c_anio) REFERENCES anio(c_anio),
    FOREIGN KEY(c_grado) REFERENCES grado(c_grado),
    FOREIGN KEY(c_se) REFERENCES seccion(c_se)
);

CREATE TABLE turno(
    c_turno smallint AUTO_INCREMENT,
    turno varchar(10) not null,
    PRIMARY KEY(c_turno)
);

CREATE TABLE asistencia_g(
    c_asisg smallint AUTO_INCREMENT,
    nie varchar(10) not null,
    c_anio smallint,
    c_turno smallint,
    hora time,
    dia date,
    asisg char(1),
    asg_j char(1),
    asig_in char(1),
    asg_ai char(1),
    PRIMARY KEY(c_asisg),
    INDEX(nie),
    INDEX(c_anio),
    INDEX(c_turno),
    FOREIGN KEY(nie) REFERENCES estudiantes(nie),
    FOREIGN KEY(c_anio) REFERENCES anio(c_anio),
    FOREIGN KEY(c_turno) REFERENCES turno(c_turno)
);

CREATE TABLE asistencia_m(
    c_asism smallint AUTO_INCREMENT,
    nie varchar(10) not null,
    c_anio smallint,
    c_turno smallint,
    hora time,
    dia date,
    asism char(1),
    asm_j char(1),
    asim_in char(1),
    asm_ai char(1),
    PRIMARY KEY(c_asism),
    INDEX(nie),
    INDEX(c_anio),
    INDEX(c_turno),
    FOREIGN KEY(nie) REFERENCES estudiantes(nie),
    FOREIGN KEY(c_anio) REFERENCES anio(c_anio),
    FOREIGN KEY(c_turno) REFERENCES turno(c_turno)
);

CREATE TABLE asism_seccion(
    c_siscm smallint AUTO_INCREMENT,
    c_se smallint,
    c_asism smallint,
    PRIMARY KEY(c_siscm),
    INDEX(c_se),
    INDEX(c_asism),
    FOREIGN KEY(c_se) REFERENCES seccion(c_se),
    FOREIGN KEY(c_asism) REFERENCES asistencia_m(c_asism)
);

CREATE TABLE asism_grado(
    c_asgm smallint AUTO_INCREMENT,
    c_asism smallint,
    c_grado smallint,
    PRIMARY KEY(c_asgm),
    INDEX(c_asism),
    INDEX(c_grado),
    FOREIGN KEY(c_asism) REFERENCES asistencia_m(c_asism),
    FOREIGN KEY(c_grado) REFERENCES grado(c_grado)
);

CREATE TABLE asisg_seccion(
    c_asiss smallint AUTO_INCREMENT,
    c_asisg smallint,
    c_se smallint,
    PRIMARY KEY(c_asiss),
    INDEX(c_se),
    INDEX(c_asisg),
    FOREIGN KEY(c_se) REFERENCES seccion(c_se),
    FOREIGN KEY(c_asisg) REFERENCES asistencia_g(c_asisg)
);

CREATE TABLE asisg_grado(
    c_asgg smallint AUTO_INCREMENT,
    c_asisg smallint,
    c_grado smallint,
    PRIMARY KEY(c_asgg),
    INDEX(c_asisg),
    INDEX(c_grado),
    FOREIGN KEY(c_asisg) REFERENCES asistencia_g(c_asisg),
    FOREIGN KEY(c_grado) REFERENCES grado(c_grado)
);