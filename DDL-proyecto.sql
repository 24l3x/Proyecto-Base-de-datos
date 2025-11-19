
CREATE TABLE Sesion (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL
);

CREATE TABLE Planta (
    n_planta VARCHAR(20),
    cant_maquinas INTEGER,
    CONSTRAINT pk_planta PRIMARY KEY (n_planta)
);

CREATE TABLE Juguete (
    juguete_id INTEGER,
    nombre VARCHAR(50),
    tipo VARCHAR(50),
    CONSTRAINT pk_juguete PRIMARY KEY (juguete_id)
);
CREATE TABLE Tecnico (
    num_empleado INTEGER,
    nombre VARCHAR(50),
    apellido VARCHAR(50),
    tel_contancto INTEGER,
    tipo_tecnico VARCHAR(11) NOT NULL,
    especialidad VARCHAR(50) DEFAULT NULL,
    experiencia VARCHAR(50) DEFAULT NULL,
    CONSTRAINT pk_tecnico PRIMARY KEY (num_empleado),
    CONSTRAINT chk_tipo_tecnico CHECK (tipo_tecnico IN ('Industrial', 'Textil')),
    CONSTRAINT chk_logica_especializacion CHECK (
        (tipo_tecnico = 'Industrial' AND especialidad IS NOT NULL AND experiencia IS NULL) OR
        (tipo_tecnico = 'Textil' AND especialidad IS NULL AND experiencia IS NOT NULL)
    )
);
CREATE TABLE Fabrica (
    juguete_id INTEGER,
    n_planta VARCHAR(20),
    CONSTRAINT pk_fabrica PRIMARY KEY (juguete_id, n_planta),
    CONSTRAINT fk_fabrica_juguete FOREIGN KEY (juguete_id)
        REFERENCES Juguete (juguete_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    CONSTRAINT fk_fabrica_planta FOREIGN KEY (n_planta)
        REFERENCES Planta (n_planta)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);
CREATE TABLE Proceso (
    id_proceso INTEGER,
    n_planta VARCHAR(20) NOT NULL,
    g_complejidad VARCHAR(30),
    CONSTRAINT pk_proceso PRIMARY KEY (id_proceso),
    CONSTRAINT fk_proceso_planta FOREIGN KEY (n_planta)
        REFERENCES Planta (n_planta)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
);

CREATE TABLE Maquina (
    num_maquina INTEGER,
    modelo VARCHAR(50),
    marca VARCHAR(50),
    id_proceso INTEGER NOT NULL,
    CONSTRAINT pk_maquina PRIMARY KEY (num_maquina),
    CONSTRAINT fk_maquina_proceso FOREIGN KEY (id_proceso)
        REFERENCES Proceso (id_proceso)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
);
CREATE TABLE Asignacion (
    id_asignacion INTEGER AUTO_INCREMENT ,
    num_maquina INTEGER NOT NULL UNIQUE,
    num_empleado INTEGER NOT NULL UNIQUE,
    turno VARCHAR(20),
    f_inicio DATE,
    f_fin DATE,
    CONSTRAINT pk_asignacion PRIMARY KEY (id_asignacion),
    CONSTRAINT fk_asig_maquina FOREIGN KEY (num_maquina)
        REFERENCES Maquina (num_maquina)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    CONSTRAINT fk_asig_tecnico FOREIGN KEY (num_empleado)
        REFERENCES Tecnico (num_empleado)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
);