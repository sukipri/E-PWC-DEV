select * FROM TBedahJadwalOrder
	/* DELETE FROM TBedahJadwalOrder WHERE OrderNomor LIKE '%OO%' */
select * FROM TBedahRuang WHERE RuangKode >= '011' UNION Select '000' as RuangKode , 'Ruang Operasi' as RuangNama , '1' as RuangStatus 
select TOP 10 * from TBedahJadwal
select JalanNoReg,JalanCaraDaftar,AppJenisDaftar,JalanTanggal,PrshKode from TRawatJalan WHERE PrshKode='1-0113' AND JalanCaraDaftar='4' AND AppJenisDaftar='2'  AND JalanTanggal  BETWEEN '2020-01-01' AND '2020-12-31 23:59:00'
select JalanNoReg,PasienNomorRM ,PasienAlamat,PasienNama,JalanCaraDaftar,AppJenisDaftar,JalanTanggal,JalanRMTanggal FROM TRawatJalan WHERE JalanNoReg LIKE '%PL-T%' order by JalanTanggal desc
select * from JadwalDokter WHERE DokterKode='01.003'
select * FROM TPelaku WHERE PelakuKode='01.003'

/*E-CHECK*/
select  TOP 1 *   from tb_qc_01 tq order by NEWID()
	/* INSERT INTO Citarum.dbo.tb_qc_01 (idmain_qc_01, qc_kode_01, qc_pertanyaan_01, qc_jawaban_01) VALUES('QC0994845732', 'QC1002', '8 x 8', '64'); */

SELECT * FROM TBUser WHERE akses='312' OR akses='31'
	SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='TBUser';
	/* INSERT INTO Citarum.dbo.TBUser (idmain, kode, namauser, passuser, akses, password_text, token) VALUES('STP021839349534', 'STP2001', 'ngadi1001', 'd76689da4340c9e94fb05c51e5eb648e', '312', 'pwc123', 'OSDPWEP'); */

SELECT * from tb_ec_titik_01
/* 	TRUNCATE table tb_ec_titik_01  */

SELECT * FROM  tb_ec_titik_01_rec
	SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='tb_ec_titik_01_rec';

	/* TRUNCATE table tb_ec_titik_01_rec */
	SELECT * FROM tb_ec_titik_01_rec WHERE rec_tglinput_01 BETWEEN '2020-10-03 00:00:00' AND '2020-10-03 00:59:00'
	
/*SDM */
select * FROM  TPPI;
select * from tb_kop WHERE jenis='2'
select * from tb_kop_detail WHERE idmain_kop='1734161664190919022418'
select * from tb_kary_tembusan
Select * from tb_pembiayaan
select * from TKaryVar WHERE VarNama like '%mutu%'
select * from tb_Kary_var_dtl
Select * from tb_kary_part WHERE idmain_kary='04130959'
Select * from tb_pembiayaan_rekam
Select * from tb_pembiayaan_jenis
Select * from tb_biaya_jenis
select * from tb_cat_tugas
select * from tb_cat_rekam
select * from tb_kel_bidang
select * from tb_kel_bidang_rekam
select * from tb_kop_in_detail
select * from tb_berkas 
select * from tb_pesan WHERE isi LIKE '%berkas%'
select * from tb_log 
select * from TKaryVar
select * from TKaryawanPinjam WHERE KaryNomor='04151003'
select * from TKaryawanPinjam 
select * from TBUser WHERE idmain='677/SMG/YAKKUM'
Select TOP 1000 * from TKaryawan WHERE KaryNomor='04181143' order by KaryNoUrut,KaryNoSub,KaryNama asc
SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='TKaryawan';
/* Gaji  */
select * from TGaji WHERE KaryNomor='183/SMG/YAKKUM' order by GajiBulan desc 
select * from TGajiTHR WHERE KaryNomor='04181143'  order by GajiTahun desc 
select * from TGajiTHR WHERE GajiTahun='2020' AND GajiOtorisasi='4' order by GajiTahun desc 
select TOP 1 KaryNomor,GajiBulan,GajiPokokVar,GajiPokokJml,GajiJabatanVar,GajiJabatanJml,GajiFungsiVar,GajiFungsiJml,GajiKhususVar,GajiKhususJml FROM TGaji WHERE  KaryNomor='522/SMG/YAKKUM' AND GajiStatus='1' AND GajiBulan='201909'  order by GajiBulan desc
select * from TGajiVar;
/* Gaji  */

/*pendaftarab ONline OFFLINE */
	select top 100 PasienNomorRM,PasienNoKartuJamin,PasienNama from TPasien WHERE PasienNomorRM='544719'
	select TOP 10 JalanNoReg,PasienNomorRM,PasienNama,JalanNoUrut,JalanNoRujukan,AppJenisDaftar,AppKhusus from TRawatJalan WHERE JalanNoReg='PL-07O1603'
	select TOP 10 JalanNoReg,PasienNomorRM,PasienNama,JalanNoUrut,JalanNoRujukan,AppJenisDaftar,AppKhusus,JalanStatus,WaktuPesan from TRawatJalan WHERE AppJenisDaftar='4' order by JalanTanggal desc
	select TOP 10 * from TRawatJalan WHERE PasienNomorRM='544719' order by  JalanTanggal desc
	select  * from TRawatJalan WHERE JalanRMTanggal BETWEEN '2020-08-26' AND '2020-08-26 23:59' AND NOT JalanStatus='9' AND UnitKode='14'
	select TOP 10 * from TRawatJalan WHERE PasienNama LIKE '%hack%' order by  JalanTanggal desc
	select * FROM JadwalDokter;
		SELECT  * from JadwalDokter WHERE DokterKode='19.011'
	select * FROM TPelaku WHERE PelakuKode='21.030'
	select top 2 * FROM TPelaku order by NEWID()
	
Select * from TUnitPrs
Select * from TUnit WHERE UnitGrup='KSP'
select * from TBGambar WHERE PasienNomorRM='544719' 
select TOP 10 * from TPasien where PasienNomorRM='544719'
select TOP 2 * from TRawatJalan where PasienNomorRM='544719' order by JalanTanggal desc
select * from TRawatJalan WHERE PasienNomorRM='704918' order by JalanTanggal desc
	/* DELETE FROM TRawatJalan WHERE JalanNoReg='PL-WS9675'
/*....................................*/

/*DKK BRIDGING*/
	select * from vcovidtt

/*--------------------TJ ABSENSI-------------------------------------**/
 	SELECT TOP 100 *  FROM TJ_MAIN_DATA.dbo.tJadwal order by NIK desc
 	
 	SELECT TOP 100 *  FROM TJ_MAIN_DATA.dbo.tCutiMohon	order by NEWID()
 	
		
/*--------------------TJ ABSENSI-------------------------------------**/	
select sum(convert(float,(jam_pel))) as jampel FROM tb_kary_part
exec Proc_Prs_LapGaji '2019' , '49'
/* truncate  table tb_cat_rekam
/* truncate  table tb_kary_tembusan
/* update TRawatJalan set AppJenisDaftar='1' WHERE JalanNoReg='PL-02O28297'
/* update TGaji set GajiOtorisasi='4' WHERE not GajiBulan='202003'
/* update TGajiTHR set GajiOtorisasi='0' WHERE  GajiTahun='2020' AND KaryNomor='04181143'
/* tb_cat_tugas
/*delete FROM tb_pembiayaan WHERE kode='PB19042905'
/*delete FROM tb_kop_in_detail WHERE kode='KPIN19051001'
/*delete FROM tb_kel_bidang_rekam WHERE kode='KBDR19050901'
/*delete FROM tb_cat_tugas WHERE idmain_cat_tugas='175070100190507075952'
/*delete FROM tb_pembiayaan_rekam WHERE idmain_pembiayaan_rekam='400219852190504085934'
/* delete from TRawatJalan WHERE JalanNoReg='PL-190722152'
/* delete from TBUser WHERE idmain='1448007893190729014052'
/* update TBUser set akses='4' WHERE idmain='935030589190729112831'
/* update TRawatJalan set AppJenisDaftar='3' WHERE JalanNoReg='PL-1909-5557'
 *  DELETE FROM TRawatJalan WHERE JalanNoReg LIKE '%PL-T%'
 */
/* DELETE TBUser WHERE idmain='-1386091640190904110824'  
 delete tb_berkas WHERE tipe='10' delete tb_pesan WHERE status='1' */
/* update TGaji set GajiOtorisasi='1' WHERE GajiOtorisasi='0'
/* SELECT namauser, COUNT(*)
 update TKaryawan set status='2' WHERE status is null
FROM TBUser
GROUP BY namauser
HAVING ( COUNT(namauser) > 1 ) */

/*---------------------------------------------*/