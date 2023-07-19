CREATE TABLE exalumnos (
  id_exalumno SERIAL PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  apellido_paterno VARCHAR(100) NOT NULL,
  apellido_materno VARCHAR(100) NOT NULL,
  genero VARCHAR(10) NOT NULL,
  expediente VARCHAR(9) NOT NULL,
  fecha_nacimiento DATE NOT NULL,
  correo_electronico VARCHAR(100) NOT NULL,
  telefono VARCHAR(20) NOT NULL,
  nacionalidad VARCHAR(100) NOT NULL,
  direccion VARCHAR(200) NOT NULL
);

CREATE TABLE carrera (
  id_carrera SERIAL PRIMARY KEY,
  nombre_carrera VARCHAR(100) NOT NULL,
  facultad VARCHAR(100) NOT NULL
);

CREATE TABLE historia (
  id_historia SERIAL PRIMARY KEY,
  promedio_global NUMERIC(2,1),
  fecha_inicio DATE NOT NULL,
  fecha_fin DATE NOT NULL,
  nombre_empresa VARCHAR(100),
  cargo VARCHAR(100),
  laborando BOOLEAN NOT NULL,
  descripcion TEXT NOT NULL,
  id_exalumno INT NOT NULL,
  id_carrera INT NOT NULL,
  FOREIGN KEY (id_exalumno) REFERENCES exalumnos(id_exalumno),
  FOREIGN KEY (id_carrera) REFERENCES carrera(id_carrera)
);