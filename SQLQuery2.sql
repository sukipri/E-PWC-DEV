 
/*PEDF ONLINE MJKN */ /* RJ & RI */
	select * from Citarum.dbo.TRawatJalan WHERE JalanNoReg LIKE '%WS%' AND JalanRMTanggal BETWEEN '2022-05-01' AND '2022-05-30' AND JalanStatus='1'
	select * from TTmpTidur WHERE RuangKode='BGV' AND TTStatusAktif='1'
	select * from Citarum.dbo.TRawatInap WHERE PasienNomorRM='234326'
	SELECT * FROM Citarum.dbo.tb_token_01
	select * from Citarum.dbo.TBedahJadwal WHERE JadwalTanggal BETWEEN '2022-11-16' AND '2022-11-17'
	select * from Citarum.dbo.TJadwalHFIZ WHERE NamaDok LIKE '%ryan%' 
	select DISTINCT KodeDok from Citarum.dbo.TJadwalHFIZ
	select * from Citarum.dbo.TPerusahaan WHERE PrshStatus='A'
	select * from Citarum.dbo.TRawatJalan order by JalanRMTanggal desc
	select * from Citarum.dbo.TBedahJadwal WHERE JadwalStatus='0' AND   JadwalTanggal BETWEEN  '2023-05-29' AND '2023-05-29 23:59:00' order by JadwalTglDaftar desc
	select * from Citarum.dbo.TBedahJadwal WHERE PasienNomorRM='816008'
	select * from Citarum.dbo.TOrderLabPas
/* APLIKASI DYNASYS  816008*/
	"TOrderFrm", "TOrderFrmDetil"
	

	select * from Citarum.dbo.TOrderFrm WHERE OrderNomor='OF-2305-0144'
		select * from Citarum.dbo.TOrderFrm WHERE OtorisasiStatus='0' AND (OrderTgl BETWEEN '2023-04-12' AND '2023-04-12 23:59:00') AND OrderJenis='J'
	select * from Citarum.dbo.TOrderFrmDetil WHERE OrderNomor='OF-2305-0144'
	select * from Citarum.dbo.TSupplier
	
	
/* CPF DATA*/
			632500
			select * from TRawatINap order by InapTglMasuk desc 
			select InapNoAdmisi,PasienNomorRM,InapTglMasuk,InapJamMasuk,InapTglKeluar,InapJamKeluar,InapStatus from TRawatINap WHERE InapNoAdmisi='IN-2303-1153'  order by InapTglMasuk desc 
			select * from Citarum.dbo.tb_cpf01_keg_01
			select * from Citarum.dbo.tb_cpf01_keg02_01 where idmain_keg_01='OTQxNzM1230420111423'
			select * from Citarum.dbo.tb_cpf01_keg02_02 WHERE idmain_keg_02='OTMxNjMx230427085859'
			select * from Citarum.dbo.tb_cpf01_keg02_03 WHERE idmain_keg_03='OTk5ODEz230505090037'
			select * from Citarum.dbo.tb_cpf01_keg02_03_rec
			select * from Citarum.dbo.tb_cpf01_keg_02
			select * from Citarum.dbo.tb_cpf01_keg_03
			select * from Citarum.dbo.tb_cpf01_keg_03_rec WHERE idmain_keg_01='OTA0MjA5230202085752'
			select * from Citarum.dbo.tb_cpf01_form_01 WHERE idmain_inap_01='IN-2303-1160'
			select * from Citarum.dbo.tb_cpf01_form_01 WHERE idmain_keg_01='OTA0MjA5230202085752'
			select * from Citarum.dbo.tb_cpf01_form_01_head 
			select COUNT(*)  from Citarum.dbo.tb_cpf01_keg_03_rec WHERE idmain_keg_03='OTk1MTMw230222083612' AND idmain_keg_01='ODkxNTk5230222083822'
			select * from Citarum.dbo.tb_cpf01_form_01 WHERE idmain_keg_01='OTA0MjA5230202085752'
			 	/* truncate table Citarum.dbo.tb_cpf01_keg02_03_rec */
				/* delete from Citarum.dbo.tb_cpf01_form_01 WHERE idmain_inap_01='IN-2304-0415' */
			/* delete from Citarum.dbo.tb_cpf01_form_01_head WHERE idmain_inap_01='IN-2303-0209' */
			select TOP 100 * from VPasienInap order by InapTglMasuk desc
				select * from tb_cpf_form_01 WHERE form_uploader='912385461231230ds8fs0dfufwehfrg'
		/* truncate  table tb_cpf01_form_01 */
		/* delete from tb_cpf_form_01   WHERE idmain_cpf_form_01='OTg2Mzk5211110075838' */ 
				
		
		select * from TBUser WHERE akses='31'
		select * from TBUser WHERE namauser LIKE '%ADM%'
			insert into TBUser(idmain,kode,namauser,passuser,akses,password_text,token)VALUES('73737373734jnjdngjfngjfngj','ADM','ADM','d76689da4340c9e94fb05c51e5eb648e','31','pwc123','d76689da4340c9e94fb05c51e5eb648e');
		
		
/* Ep-E-Presence */
		/* TRUNCATE table tb_ep_geo_01; */
		/* delete FROM TJ_Main_Data.dbo.TA_Record_Info  WHERE Per_ID='4960523' */		
		/* delete FROM TJ_Main_Data.dbo.TA_Record_Info  WHERE ID='502734' */
		/* delete FROM TJ_Main_Data.dbo.tJadwal  WHERE BUlan='202112' AND NIK='4850212' */	
		select * from Citarum.dbo.TKaryawan  WHERE KaryNomor='681/SMG/YAKKUM'
		select * from TUnit 
		select * from tb_ep_geo_01 
		select * from TJ_Main_Data.dbo.tJadwal order by Bulan desc
				select * from TJ_Main_Data.dbo.tJadwal WHERE NIK='4211163' AND Bulan='202112' order by bulan desc	 
				select * from TJ_Main_Data.dbo.tJadwal WHERE NIK='4171080' order by bulan desc	 
		select * from TJ_Main_Data.dbo.tShif
		select * from TJ_Main_Data.dbo.HR_Personnel  WHERE Per_Code='4010892'
		select * from TJ_Main_Data.dbo.tStruktural
		select * from TJ_Main_Data.dbo.TA_Record_Info  WHERE Per_Code='4181143' order by ID desc
		select * from TJ_Main_Data.dbo.TA_Record_Info  order by ID desc
		SELECT cast(Date_Time as time(0)) FROM TJ_Main_Data.dbo.TA_Record_Info  WHERE Per_Code='4960523'
		select * from TJ_Main_Data.dbo.TA_Record_Info  WHERE ep_lat_01='-6.969389'
		select * from Citarum.dbo.TBUser WHERE  akses='11'
		Select TOP 1000 * from TKaryawan WHERE KaryNomor='523/SMG/YAKKUM' order by KaryNoUrut,KaryNoSub,KaryNama asc
		
		
/*-----------------------*/
		
		
/*delete FROM TRawatJalan WHERE JalanNoReg LIKE '%WS%' */
/**/
select sum(convert(float,(jam_pel))) as jampel FROM tb_kary_part
exec Proc_Prs_LapGaji '2019' , '49'

/*0----------------------------*/
select * from tb_qc_01
SELECT * FROM Citarum.dbo.TBUser where not  akses='4' AND not akses='312'
	SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='TBUser';


/*#--ECHECK*/
select * from TBUser WHERE namauser LIKE '%sukipri%'

select * from tb_ec_titik_01_rec
	select COUNT(*) FROM tb_ec_titik_01_rec
	select * from tb_ec_titik_01_rec WHERE rec_laporan_01 like  '%TEST%'
	/*delete from tb_ec_titik_01_rec WHERE rec_laporan_01 like  '%TEST%' */
	
#KRITIK & SARAN
select * from Citarum.dbo.tb_ks_01
truncate table Citarum.dbo.tb_ks_01

#GAJI
select * from Citarum.dbo.TGajiYakkum WHERE KaryNomorYakkum='04181140'
select * from Citarum.dbo.TKaryawan WHERE KaryNomorYakkum='04181143'
select * from Citarum.dbo.TKaryVar WHERE VarSeri='KELOMPOK'
/* update Citarum.dbo.TGajiYakkum SET GajiStatus='1' WHERE KaryNomorYakkum='04181143' */
/* update Citarum.dbo.TGajiYakkum SET GajiStatus='1' WHERE GajiStatus='0' */

