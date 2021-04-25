/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     31/03/2018 12:17:23 p.m.                     */
/*==============================================================*/


/*==============================================================*/
/* Table: estudiantes                                           */
/*==============================================================*/
create table estudiantes
(
   codestudiante        int not null auto_increment  comment '',
   documento            varchar(20) not null  comment '',
   nombres              varchar(50) not null  comment '',
   apellidos            varchar(50) not null  comment '',
   correo               varchar(50) not null  comment '',
   fechanac             date not null  comment '',
   genero               tinyint(2) not null default 1  comment '1 masculino
             2 femenino',
   primary key (codestudiante)
);

/*==============================================================*/
/* Table: facultades                                            */
/*==============================================================*/
create table facultades
(
   codfacultad          int not null auto_increment  comment '',
   codsede              int not null  comment '',
   nombrefacultad       varchar(100) not null  comment '',
   primary key (codfacultad)
);

/*==============================================================*/
/* Table: programas                                             */
/*==============================================================*/
create table programas
(
   codprograma          int not null auto_increment  comment '',
   codfacultad          int not null  comment '',
   nombreprograma       varchar(100) not null  comment '',
   primary key (codprograma)
);

/*==============================================================*/
/* Table: relprogest                                            */
/*==============================================================*/
create table relprogest
(
   codprograma          int not null  comment '',
   codestudiante        int not null  comment '',
   primary key (codprograma, codestudiante)
);

/*==============================================================*/
/* Table: sedes                                                 */
/*==============================================================*/
create table sedes
(
   codsede              int not null auto_increment  comment '',
   nombresede           varchar(50) not null  comment '',
   primary key (codsede)
);

alter table facultades add constraint fk_facultades_ref_sedes foreign key (codsede)
      references sedes (codsede) on delete restrict on update cascade;

alter table programas add constraint fk_programas_ref_facultades foreign key (codfacultad)
      references facultades (codfacultad) on delete restrict on update cascade;

alter table relprogest add constraint fk_relprogest_ref_programas foreign key (codprograma)
      references programas (codprograma) on delete restrict on update cascade;

alter table relprogest add constraint fk_relprogest_ref_estudiantes foreign key (codestudiante)
      references estudiantes (codestudiante) on delete restrict on update cascade;

