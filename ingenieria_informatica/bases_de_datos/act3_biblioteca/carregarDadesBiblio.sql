# Carregar les dades a l exercici de la biblioteca
# una opcio possible

load data local infile 'autor.txt' into table autor;
load data local infile 'obra.txt' into table obra;
load data local infile 'escriu.txt' into table escriu;
load data local infile 'volum.txt' into table volum;
load data local infile 'edicio.txt' into table edicio;
load data local infile 'exemplar.txt' into table exemplar;
load data local infile 'tema.txt' into table tema;
load data local infile 'es.txt' into table es;
load data local infile 'subtema.txt' into table subtema;
load data local infile 'soci.txt' into table soci;
delimiter //
create trigger dates_ok before insert on prestecs for each row begin if new.data_fi<new.data_ini then set new.data_fi=adddate(new.data_ini,15); end if; end; //
delimiter ;
load data local infile 'prestec.txt' into table prestecs;
