#1
SELECT ten_mon, noi_dung_tom_tat, don_gia
FROM mon_an;
#2
SELECT ten_loai, ten_mon, noi_dung_tom_tat, don_gia
FROM mon_an,loai_mon_an
WHERE mon_an.ma_loai=loai_mon_an.ma_loai
ORDER BY ten_loai, don_gia ASC;
#3
SELECT ten_khach_hang, dia_chi,dien_thoai
FROM khach_hang
ORDER BY ten_khach_hang ASC;
#4
SELECT ten_khach_hang, dia_chi,dien_thoai
FROM khach_hang
WHERE ten_khach_hang LIKE "Nguyễn%"
ORDER BY ten_khach_hang ASC;
#5
SELECT ten_mon, noi_dung_tom_tat, don_gia
FROM mon_an
ORDER BY don_gia DESC;
#6
SELECT ten_mon, noi_dung_tom_tat, don_gia
FROM mon_an
WHERE ten_mon LIKE "Canh%";
#7
SELECT ten_mon, noi_dung_tom_tat, don_gia
FROM mon_an
WHERE ten_mon LIKE "%gà%";
#8
SELECT ten_mon, noi_dung_tom_tat, don_gia
FROM mon_an
WHERE don_gia>=50000 and don_gia<=100000;
#9
SELECT ten_mon, noi_dung_tom_tat, don_gia
FROM mon_an, loai_mon_an
WHERE mon_an.ma_loai=loai_mon_an.ma_loai AND loai_mon_an.ten_loai LIKE "%Súp%";
#10
SELECT ten_mon, noi_dung_tom_tat, don_gia
FROM mon_an
WHERE don_gia>50000 ;
#11
SELECT ten_mon, noi_dung_tom_tat, don_gia
FROM mon_an
JOIN loai_mon_an ON mon_an.ma_loai = loai_mon_an.ma_loai
WHERE loai_mon_an.ten_loai LIKE '%cơm%' OR loai_mon_an.ten_loai LIKE '%canh%';
#12
SELECT ten_mon, noi_dung_tom_tat, don_gia
FROM mon_an
ORDER BY don_gia DESC
LIMIT 0,10;
#13
SELECT ten_mon, don_gia, khuyen_mai
FROM mon_an;
#14
SELECT ten_khach_hang, email, dia_chi, dien_thoai
FROM khach_hang;
#15
SELECT ten_mon, noi_dung_tom_tat
FROM mon_an
ORDER BY don_gia DESC;
#16
SELECT ten_mon, noi_dung_tom_tat, don_gia
FROM mon_an
WHERE ten_mon LIKE "%n";
#17
SELECT ten_mon, don_gia
FROM mon_an
WHERE noi_dung_tom_tat LIKE "%cà chua%" OR noi_dung_tom_tat LIKE "%dưa leo%";
#18
SELECT *
FROM khach_hang
ORDER BY email ASC;
#18
SELECT *
FROM khach_hang
ORDER BY email DESC;
#20
SELECT ma_mon, ten_mon, don_gia
FROM mon_an
ORDER BY don_gia DESC
LIMIT 0,5;
#21
SELECT *
FROM mon_an
WHERE ma_loai="1";
#22
SELECT *
FROM mon_an
WHERE ma_loai="1" AND don_gia BETWEEN 20000 AND 25000;
#23
SELECT ma_mon, mon_an.ma_loai, ten_mon, ten_loai, don_gia
FROM mon_an, loai_mon_an
WHERE mon_an.ma_loai=loai_mon_an.ma_loai AND don_gia>=50000;
#24
SELECT chi_tiet_hoa_don.ma_hoa_don, ma_mon, so_luong
FROM chi_tiet_hoa_don
INNER JOIN hoa_don ON hoa_don.ma_hoa_don = chi_tiet_hoa_don.ma_hoa_don
WHERE chi_tiet_hoa_don.ma_hoa_don="1";
#25
SELECT khach_hang.ma_khach_hang, ten_khach_hang, ngay_dat
FROM khach_hang
INNER JOIN hoa_don ON hoa_don.ma_khach_hang = khach_hang.ma_khach_hang;
#26
SELECT loai_mon_an.ma_loai, loai_mon_an.ten_loai, COUNT(mon_an.ma_mon) AS so_luong_mon
FROM loai_mon_an 
INNER JOIN mon_an ON loai_mon_an.ma_loai=mon_an.ma_loai
GROUP BY loai_mon_an.ma_loai, loai_mon_an.ten_loai
ORDER BY so_luong_mon;
#27
SELECT loai_mon_an.ma_loai, loai_mon_an.ten_loai, COUNT(mon_an.ma_mon) AS so_luong_mon
FROM loai_mon_an 
INNER JOIN mon_an ON loai_mon_an.ma_loai=mon_an.ma_loai
GROUP BY loai_mon_an.ma_loai, loai_mon_an.ten_loai
HAVING so_luong_mon>5
ORDER BY so_luong_mon;

