
INSERT INTO Planta (n_planta,cant_maquinas) VALUES
('Cosido','30'),('Electronica','15'),('Moldes','10');

INSERT INTO Proceso (id_proceso,n_planta,g_complejidad) VALUES
('1','Cosido', 'Dificil') ,('2','Electronica', 'Dificil'),('3','Moldes', 'Dificil') ;

INSERT INTO Maquina (num_maquina,marca,modelo,id_proceso) VALUES
('1','MABE','T1000', '1'),('2','DAEWOO','T2000', '2'),('4','SONY','T3000', '3');


