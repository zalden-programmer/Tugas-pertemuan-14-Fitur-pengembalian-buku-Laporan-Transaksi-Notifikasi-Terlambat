# Tugas-pertemuan-14-Fitur-pengembalian-buku-Laporan-Transaksi-Notifikasi-Terlambat

**Nama** Meiffio Hasanain M
**NIM:** 60324061
---

## Tugas 1: Fitur Pengembalian Buku (40%)

**Instruksi:** Implementasi lengkap fitur pengembalian buku dengan perhitungan denda.

**Spesifikasi:**
1. View Detail Transaksi dengan button "Kembalikan Buku"
2. Method `kembalikan()` di Controller (sudah ada template)
3. Perhitungan Denda:
   - Denda Rp 5.000/hari
   - Hanya jika terlambat
   - Tampilkan total denda di detail
4. Update Stok: Stok buku bertambah 1 saat dikembalikan

> Screenshot hasil implementasi:

**1. View transaksi dengan button "kembalikan buku" dan denda**
<img width="943" height="464" alt="image" src="https://github.com/user-attachments/assets/012d7540-3913-4708-a3e8-57908b9a0094" />

**2. Tampilan stok berkurang saat buku dipinjam (19)**

<img width="416" height="136" alt="image" src="https://github.com/user-attachments/assets/354d64a5-7fbe-4969-8e9b-c1d59503178b" />

**3. Tampilan setelah buku dikembalikan stok normal kembali (20)**

<img width="412" height="135" alt="image" src="https://github.com/user-attachments/assets/4af9a038-a7b8-4d33-b5e6-38adf26563ce" />

---

## Tugas 2: Laporan Transaksi (30%)

**Instruksi:** Buat halaman laporan transaksi dengan filter.

**Spesifikasi:**
1. Route: `/transaksi/laporan`
2. Filter:
   - Range tanggal (dari–sampai)
   - Status (Semua / Dipinjam / Dikembalikan)
   - Anggota (dropdown)
3. Tampilan:
   - Tabel transaksi
   - Total transaksi
   - Total denda (jika ada)
4. Export PDF: Button untuk export laporan ke PDF

> Screenshot hasil implementasi:

**1. filer, tampilan transaksi, export PDF**
<img width="947" height="446" alt="image" src="https://github.com/user-attachments/assets/4a4bcdb0-15bd-41bb-8404-732a9aeede06" />

**2. hasil export PDF**

<img width="589" height="224" alt="image" src="https://github.com/user-attachments/assets/7a5e632e-fc24-4e78-8326-1e8d5e81b46a" />

---

## Tugas 3: Notifikasi Terlambat (30%)

**Instruksi:** Tambah fitur notifikasi untuk buku yang terlambat dikembalikan.

**Spesifikasi:**
1. Dashboard Widget:
   - Card "Buku Terlambat"
   - Jumlah transaksi yang terlambat
   - List anggota yang terlambat
2. Badge Terlambat:
   - Di index transaksi, tambah badge "Terlambat" warna merah
   - Tampilkan berapa hari terlambat
3. Reminder:
   - Di detail transaksi, tampilkan warning jika sudah melewati tanggal kembali

**Dokumentasi:**

> Screenshot hasil implementasi:

**1. Dashboard Widget**

<img width="668" height="272" alt="image" src="https://github.com/user-attachments/assets/d6c0cec6-5211-42fc-8d2d-fdad55dee214" />

**2. Badge terlambat di index**

<img width="944" height="172" alt="image" src="https://github.com/user-attachments/assets/bae78281-ca94-4a9c-bd25-ff1a00ae0fda" />

**3. Reminder**

<img width="608" height="470" alt="image" src="https://github.com/user-attachments/assets/1eb35af9-e990-42e7-868f-794555d33fa8" />


