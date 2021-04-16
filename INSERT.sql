INSERT INTO programa (idprograma, programa, condicion) VALUES
(1, 'La UPC propende por el emprendimiento la innovación la inclusión y el bienestar universitario como base para la creación de Cultura universitaria pertinente', 1),
(2, 'La UPC promueve un ambiente óptimo y confiable de trabajo en concordancia con los principios y valores institucionales', 1),
(3, 'Alinear a la Universidad Popular del Cesar con las tendencias y contexto regional y nacional de tal forma que se fortalezca su pertinencia y competitividad académica', 1),
(4, 'La UPC consolida una administración que gestiona y garantiza la eficiencia y sostenibilidad de los proyectos', 1),
(5, 'Alinear a la Universidad Popular del Cesar con las tendencias y contexto regional y nacional de tal forma que se fortalezca su pertinencia y competitividad acad', 1);

INSERT INTO recursos (idrecurso, recurso_humano, recurso_fisico, recurso_financiero, condicion) VALUES
(1, 'Recurso humano 01', 'Recurso fisico 01', 8500000, 1),
(2, 'Recurso humano 02', 'Recurso fisico 02', 10000000, 1),
(3, 'Recurso humano 03', 'Recurso fisico 03', 2500000, 1),
(4, 'Recurso humano 04', 'Recurso fisico 04', 5000000, 0),
(5, 'Recurso humano 05', 'Recurso fisico 05', 5000000, 1),
(6, 'Recurso humano 06', 'Recurso fisico 06', 5000000, 0),
(7, 'Recurso humano 07', 'Recurso fisico 07', 500000, 1),
(8, 'Recurso humano 08', 'Recurso fisico 08', 2500000, 0),
(9, 'Recurso humano 09', 'Recurso fisico 09', 98, 0),
(10, 'Recurso humano 10', 'Recurso fisico 10', 10000000, 1),
(11, 'Recurso humano 11', 'Recurso fisico 11', 1500000, 1);

INSERT INTO eje_estrategico (ideje_estrategico, eje_estrategico, estrategia, condicion) VALUES
(1, 'MISIONALIDAD', 'UPC Incluyente equitativa promotora del emprendimiento y socialmente responsable.', 1),
(2, 'TRANSVERSALES', 'UPC Incluyente equitativa promotora del emprendimiento y socialmente responsable.', 1),
(3, 'GESTIÓN_UNIVERS', 'UPC Eficiente Sostenible y Transparente', 1),
(4, 'GOBERNANZA', 'UPC Bien Representada', 1);


INSERT INTO permiso (idpermiso, nombre) VALUES
(1, 'Escritorio'),
(2, 'Recurso'),
(3, 'Actividad'),
(4, 'Estrategias & Programas'),
(5, 'Acceso'),
(6, 'Consultar Seguimientos'),
(7, 'Consultar Actividades');


INSERT INTO actividades (idactividades, codigo, iniciativas_est, meta, tiempo_duracion, tiempo_unidad, indicador_rendimiento, idusuario, idprograma, ideje_estrategico, idrecursos, condicion_A) VALUES
(1, 1, 'Impulsar la formación  integral de aprovechamiento del tiempo libre, deporte, cultura y salud que contribuyan a su bienestar y al desarrollo de habilidades globales para la vida', 'Desarrollar  Una jornada en conmemoración a  la  semana universitaria  y     Desarrollar dos (2) jornadas de inducción  a la vida universitaria,  dirigido a estudiantes de  primer semestre.', 'duracion', 'unidad', 'rendimiento', 1, 2, 1, 1, 1),
(2, 2, 'Impulsar la formación  integral de aprovechamiento del tiempo libre, deporte, cultura y salud que contribuyan a su bienestar y al desarrollo de habilidades globales para la vida', 'Desarrollar catorce (14) actividades en el marco del programa de estímulos e incentivos a estudiantes, docentes, administrativos, pre pensionados e hijos de funcionarios', 'Abril - Diciemb', 'Meses', 'No. De actividades ejecutadas/o. de actividades programadas*100', 2, 3, 2, 5, 0),
(10, 3, 'sdfs', 'fsd', 'dfsdf', 'dfsds', 'dxzczx', 1, 1, 1, 1, 1),
(11, 4, 'iniciativas_est', 'meta', 'tiempo_du', 'tiemp', 'indicador', 1, 1, 1, 1, 1),
(12, 5, 'dsdfsdfsdfs', 'dsfaasdasdas', 'sdssdf', 'dfsdfsd', 'efsdasdda', 2, 3, 3, 5, 1),
(13, 6, 'sdklsdfklsfdkl', 'jhdjhsdjhsd', '6', 'ene-julio', 'No. De actividades ejecutadas/o. de actividades programadas*100', 1, 4, 1, 3, 1);


INSERT INTO seguimiento (idseguimiento, seguimiento, porcentaje_avance_tiempo, porcentaje_avance_actividad, acciones_correctivas, idactividades, condicion_S) VALUES
(1, 'sdfsfsdfsdfs', 'dsffsdfsdf', 'sdfdfsdf', 'efdsfsfsdf', 10, 1),
(2, 'xcxzczxcz', 'sdfsfklcxzklcz', 'xzmclzxcmz', 'klsdflksdfslkdf', 10, 1),
(3, '', 'dfsdfsd', 'asdada', 'sadasdasd', 10, 1),
(4, '', 'sdfssdfs', 'sdfsdf', 'dfdsfsdfs', 1, 1),
(5, '', 'zczxczxczx', 'zczxcz', 'dsfsdfsdf', 11, 1);


INSERT INTO usuario (idusuario, primer_apellido, segundo_apellido, primer_nombre, segundo_nombre, tipo_documento, num_documento, direccion, telefono, email, cargo, login, clave, imagen, condicion) VALUES
(1, 'Fragozo', 'Blanchar', 'Arnold', 'Daniel', 'CI', '1122417156', 'Mz 11 Cs 42 Alamos 2', '3194635485', 'arnold.fb16@gmail.com', 'estudiante', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '1542133001.jpg', 1),
(2, 'Acosta', 'Lopez', 'Kevin', 'Joseph', 'CI', '1010133966', 'Mz 11 Cs 42 Alamos 2', '3194635485', 'kevin.20099@hotmail.com', 'Estudiante', 'jefe', '452b889d10df869834152618463e1c07ce88001a40c9fff5d4fdf300c65684c6', '1542132979.jpg', 1),
(3, 'Fragozo', 'Blanchar', 'Daniel', 'Daniel', 'CI', '1122417156', 'Mz 11 Cs 42 Alamos 2', '3194635485', 'arnold.fb16@gmail.com', 'Estudiante', 'act', 'f83f07be16e270186d35b876916c461995ebc3af5b1798f898c33285a1847dbc', '1548362952.jpg', 1),
(4, 'Fragozo', 'Blanchar', 'Daniel', 'Daniel', 'CI', '1122417156', 'Mz 11 Cs 42 Alamos 2', '3194635485', 'arnold.fb16@gmail.com', 'Estudiante', 'Rec', '50a45e647dbbd90e85ede9b3991387db66bb2c201ba9ad3295288755a66ee727', '1548363748.jpg', 1),
(5, 'Fragozo', 'Blanchar', 'Daniel', 'Daniel', 'CI', '1122417156', 'Mz 11 Cs 42 Alamos 2', '3194635485', 'arnold.fb16@gmail.com', 'Estudiante', 'E&amp;P', '35a9e381b1a27567549b5f8a6f783c167ebf809f1c4d6a9e367240484d8ce281', '1542132964.jpg', 1),
(6, 'Blanchar', 'Fragozo', 'Daniel', 'Arnold', 'CC', '1122417156', 'Mz 11 Cs 42 Alamos 2', '3194635485', 'arnold.fb16@gmail.com', 'Estudiante', 'E&amp;P', '35a9e381b1a27567549b5f8a6f783c167ebf809f1c4d6a9e367240484d8ce281', '1542139736.jpg', 1),
(7, 'FRA', 'BLA', 'ARD', 'DAN', 'CC', '45534534', 'Mz 11 Cs 42 Alamos 2', '3194635485', 'arnold.fb16@gmail.com', 'Estudiante', 'E&amp;PREC', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '', 1),
(8, 'FRA', 'BLA', 'ARD', 'DAN', 'CI', '45534534', 'Mz 11 Cs 42 Alamos 2', '3194635485', 'arnold.fb16@gmail.com', 'Estudiante', 'E&amp;amp;PREC', 'ed92e4c7e54e3f4a29d8041ec93124bd3c1ec4825701cac42b3fffaf0bd7120a', '1542141607.jpg', 1),
(9, 'FRA', 'BLA', 'ARD', 'DAN', 'CI', '45534534', 'Mz 11 Cs 42 Alamos 2', '3194635485', 'arnold.fb16@gmail.com', 'Estudiante', 'E&amp;amp;PREC', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '1542144342.jpg', 1),
(10, 'FRA', 'BLA', 'ARD', 'DAN', 'CI', '45534534', 'Mz 11 Cs 42 Alamos 2', '3194635485', 'arnold.fb16@gmail.com', 'Estudiante', 'E&amp;amp;PREC', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1542144491.jpg', 1);


INSERT INTO usuario_permiso (idusuario_usuario, idusuario, idpermiso) VALUES
(1, 7, 1),
(2, 7, 2),
(3, 7, 3),
(4, 8, 1),
(5, 8, 2),
(6, 8, 3),
(7, 9, 4),
(8, 9, 5),
(9, 10, 4),
(10, 10, 5),
(40, 1, 1),
(41, 1, 2),
(42, 1, 3),
(43, 1, 4),
(44, 1, 5),
(45, 1, 6),
(46, 1, 7),
(50, 2, 3),
(51, 2, 5),
(52, 2, 6),
(56, 3, 1),
(57, 3, 2),
(58, 3, 3),
(59, 4, 1),
(60, 4, 2),
(61, 4, 3),
(62, 4, 4);
