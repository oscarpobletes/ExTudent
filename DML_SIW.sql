--carrera
INSERT INTO carrera (nombre_carrera, facultad) 
VALUES 
('Licenciatura en Comunicación', 'Facultad de Comunicación'), 
('Licenciatura en Psicología', 'Facultad de Psicología'), 
('Licenciatura en Administración de Hoteles y Restaurantes', 'Facultad de Turismo y Gastronomía'), 
('Licenciatura en Contaduría Pública y Finanzas', 'Facultad de Ciencias Económicas y Empresariales'), 
('Licenciatura en Mercadotecnia', 'Facultad de Ciencias Económicas y Empresariales'), 
('Licenciatura en Arquitectura', 'Facultad de Arquitectura y Diseño'), 
('Licenciatura en Diseño Industrial', 'Facultad de Arquitectura y Diseño'), 
('Licenciatura en Ingeniería Ambiental', 'Facultad de Ingeniería'), 
('Licenciatura en Ingeniería Mecatronica', 'Facultad de Ingeniería'), 
('Licenciatura en Ingeniería Industrial', 'Facultad de Ingeniería'), 
('Licenciatura en Derecho', 'Facultad de Derecho'), 
('Licenciatura en Nutrición', 'Facultad de Ciencias de la Salud'), 
('Licenciatura en Ingeniería en Sistemas Computacionales', 'Facultad de Ingeniería'), 
('Licenciatura en Diseño Gráfico', 'Facultad de Arquitectura y Diseño'), 
('Licenciatura en Ciencias Ambientales', 'Facultad de Ciencias de la Sustentabilidad');


-- exalumnos
INSERT INTO exalumnos (nombre, apellido_paterno, apellido_materno, genero, expediente, fecha_nacimiento, correo_electronico, telefono, nacionalidad, direccion) 
VALUES 
('Juan', 'Pérez', 'González', 'Masculino', 'a00426099', '1995-06-15', 'juan.perez@gmail.com', '5512345678', 'Mexicana', 'Calle 123, Ciudad de México'),
('María', 'García', 'Hernández', 'Femenino', 'a00123456', '1997-02-28', 'maria.garcia@hotmail.com', '5523456789', 'Mexicana', 'Avenida 456, Ciudad de México'),
('Carlos', 'López', 'Sánchez', 'Masculino', 'a00987654', '1990-10-10', 'carlos.lopez@yahoo.com', '5534567890', 'Mexicana', 'Boulevard 789, Ciudad de México'),
('Ana', 'Martínez', 'Gómez', 'Femenino', 'a00321098', '1992-05-03', 'ana.martinez@gmail.com', '5545678901', 'Mexicana', 'Calle 234, Ciudad de México'),
('Luis', 'Fernández', 'Ruiz', 'Masculino', 'a00543210', '1994-09-22', 'luis.fernandez@hotmail.com', '5556789012', 'Mexicana', 'Avenida 567, Ciudad de México'),
('Fernanda', 'Hernández', 'Martínez', 'Femenino', 'a00765432', '1999-12-16', 'fernanda.hernandez@gmail.com', '5567890123', 'Mexicana', 'Boulevard 901, Ciudad de México'),
('Pedro', 'Sánchez', 'García', 'Masculino', 'a00654321', '1998-08-08', 'pedro.sanchez@yahoo.com', '5578901234', 'Mexicana', 'Calle 345, Ciudad de México'),
('Laura', 'González', 'Pérez', 'Femenino', 'a00210987', '1993-04-11', 'laura.gonzalez@hotmail.com', '5589012345', 'Mexicana', 'Avenida 678, Ciudad de México'),
('Jorge', 'Martínez', 'Hernández', 'Masculino', 'a00876543', '1996-01-24', 'jorge.martinez@gmail.com', '5590123456', 'Mexicana', 'Boulevard 234, Ciudad de México'),
('Sofía', 'López', 'Fernández', 'Femenino', 'a00456789', '1991-07-07', 'sofia.lopez@yahoo.com', '5511122334', 'Mexicana', 'Calle 901, Ciudad de México');


-- historia

INSERT INTO historia (promedio_global, fecha_inicio, fecha_fin, nombre_empresa, cargo, laborando, descripcion, id_exalumno, id_carrera) 
VALUES 
(8.9, '2015-09-01', '2016-02-28', 'ABC Company', 'Asistente de Marketing', false, 'Trabajé en el departamento de marketing durante 6 meses.', 1, 1),
(9.2, '2016-06-01', '2019-05-30', 'XYZ Agency', 'Analista de Investigación de Mercados', true, 'Actualmente trabajo en el área de investigación de mercados.', 1, 5),
(8.5, '2016-01-01', '2016-08-31', 'Acme Inc.', 'Asistente de Finanzas', false, 'Realicé actividades administrativas y financieras en el departamento de finanzas.', 2, 4),
(7.8, '2017-01-01', '2017-12-31', 'The Marketing Co.', 'Asistente de Publicidad', false, 'Trabajé en la implementación de campañas publicitarias para diversas marcas.', 3, 5),
(9.6, '2016-06-01', '2018-05-30', 'Def Co.', 'Analista de Sistemas', true, 'Actualmente trabajo en el desarrollo de sistemas informáticos para la empresa.', 4, 15),
(8.7, '2018-03-01', '2019-08-31', 'GHI Services', 'Asistente de Recursos Humanos', false, 'Realicé actividades administrativas y de selección de personal en el departamento de recursos humanos.', 5, 2),
(9.0, '2019-01-01', '2022-06-30', 'JKL Corp.', 'Analista de Marketing Digital', true, 'Actualmente trabajo en la implementación de estrategias de marketing digital para la empresa.', 6, 5),
(7.5, '2018-01-01', '2018-12-31', 'MNO Agency', 'Asistente de Investigación de Mercados', false, 'Realicé actividades de apoyo en proyectos de investigación de mercado.', 7, 5),
(9.1, '2020-01-01', '2021-12-31', 'PQR Ltda.', 'Analista de Finanzas', false, 'Realicé actividades en el área de finanzas de la empresa.', 8, 4),
(8.2, '2019-05-01', '2020-12-31', 'STU Co.', 'Asistente de Ventas', false, 'Realicé actividades de atención al cliente y apoyo en ventas.', 9, 5),
(9.3, '2021-01-01', '2023-03-31', 'VWX Corp.', 'Analista de Sistemas', true, 'Actualmente trabajo en el desarrollo de sistemas informáticos para la empresa.', 10, 15);







