CREATE TABLE programa (
  idprograma NUMBER(11) NOT NULL,
  programa varchar(250) NOT NULL,
  condicion NUMBER(1) NOT NULL,
  constraint PK_PROGRAMA primary key (idprograma) using index tablespace PLANACCION
);

CREATE TABLE recursos (
  idrecurso NUMBER(11) NOT NULL,
  recurso_humano varchar(100) NOT NULL,
  recurso_fisico varchar(100) NOT NULL,
  recurso_financiero NUMBER NOT NULL,
  condicion NUMBER(1) NOT NULL,
  constraint PK_RECURSOS primary key (idrecurso) using index tablespace PLANACCION
);

CREATE TABLE eje_estrategico (
  ideje_estrategico NUMBER(11) NOT NULL,
  eje_estrategico varchar(15) NOT NULL,
  estrategia varchar(250) NOT NULL,
  condicion NUMBER(1) NOT NULL,
  constraint PK_EJE_ESTRATEGICO primary key (ideje_estrategico) using index tablespace PLANACCION
);

CREATE TABLE permiso (
  idpermiso NUMBER(11) NOT NULL,
  nombre varchar(30) NOT NULL,
  constraint PK_PERMISO primary key (idpermiso) using index tablespace PLANACCION
);

CREATE TABLE actividades (
  idactividades NUMBER(11) NOT NULL,
  codigo int(3) NOT NULL,
  iniciativas_est varchar(500) NOT NULL,
  meta varchar(500) NOT NULL,
  tiempo_duracion` varchar(25) NOT NULL,
  tiempo_unidad` varchar(10)  NOT NULL,
  indicador_rendimiento` varchar(150) NOT NULL,
  idusuario NUMBER(11) NOT NULL,
  idprograma NUMBER(11) NOT NULL,
  ideje_estrategico NUMBER(11) NOT NULL,
  idrecursos NUMBER(11) NOT NULL,
  condicion_A NUMBER(1) NOT NULL,
  constraint PK_ACTIVIDAD primary key (idactividades) using index tablespace PLANACCION,
  constraint FK_USUARIO_ACTIVIDAD foreign key (idusuario) references usuario,
  constraint FK_RECURSOS_ACTIVIDAD foreign key (idrecursos) references recursos,
  constraint FK_PROGRAMA_ACTIVIDAD foreign key (idprograma) references programa,
  constraint FK_EJE_ESTRATEGICO_ACTIVIDAD foreign key (ideje_estrategico) references eje_estrategico
);

CREATE TABLE seguimiento (
  idseguimiento NUMBER(11) NOT NULL,
  seguimiento varchar(500) NOT NULL,
  porcentaje_avance_tiempo varchar(50) NOT NULL,
  porcentaje_avance_actividad varchar(50) NOT NULL,
  acciones_correctivas varchar(250) NOT NULL,
  idactividades NUMBER(11) NOT NULL,
  condicion_S NUMBER(1) NOT NULL,
  constraint PK_SEGUIMIENTO primary key (idseguimiento) using index tablespace PLANACCION,
  constraint FK_ACTIVIDAD_SEGUIMIENTO foreign key (idactividades) references actividades
);

CREATE TABLE usuario (
  idusuario NUMBER(11) NOT NULL,
  primer_apellido varchar(25) NOT NULL,
  segundo_apellido varchar(25) NOT NULL,
  primer_nombre varchar(25) NOT NULL,
  segundo_nombre varchar(25) NOT NULL,
  tipo_documento varchar(20) NOT NULL,
  num_documento varchar(20) NOT NULL,
  direccion varchar(70) NOT NULL,
  telefono varchar(20) NOT NULL,
  email varchar(50) NOT NULL,
  cargo varchar(20) NOT NULL,
  login varchar(20) NOT NULL,
  clave varchar(64) NOT NULL,
  imagen varchar(50) NOT NULL,
  condicion NUMBER(1) NOT NULL,
  constraint PK_USUARIO primary key (idusuario) using index tablespace PLANACCION
);

CREATE TABLE usuario_permiso (
  idusuario_usuario NUMBER(11) NOT NULL,
  idusuario NUMBER(11) NOT NULL,
  idpermiso NUMBER(11) NOT NULL,
  constraint PK_USUPERMISO primary key (idusuario_usuario) using index tablespace PLANACCION,
  constraint FK_USUARIO_USUPERMISO foreign key (idusuario) references usuario,
  constraint FK_PERMISO_USUPERMISO foreign key (idpermiso) references permiso,
);
