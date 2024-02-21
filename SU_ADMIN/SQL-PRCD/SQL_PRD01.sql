create procedure insertuser @IDUSER varchar(50),
@kode varchar(50),@namauser varchar(50),@passuser varchar(50)
as
insert into data_user(iduser,kode,namauser,passuser)
values(@IDUSER,@kode,@namauser,@passuser)