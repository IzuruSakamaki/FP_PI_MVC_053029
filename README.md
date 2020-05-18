# FP_PI_MVC_053029

Oleh : Mohammad Ifaizul Hasan - 05311840000029

---
## Setup
* Database terdapat pada folder Database (nama database standar: fp)
* Konfigurasi database terdapat pada **`Constants.php`**
* Directory telah disesuaikan seperti apa yang telah dibuat oleh Saya
* Letakkan langsung pada folder htdocs

## Controllers
**SumbanganController.php**
* `index()` digunakan untuk mengatur pengambilan data dari `sumbangan`
* `listed()` digunakan untuk mengatur pengambilan data dari `identitas_sumbangan`
* `add()` digunakan untuk mengatur penambahan data pada `log_sumbangan` sekaligus mengatur pembaruan data pada `sumbangan`
* `donatur()` digunakan untuk mengatur render tampilan menuju ke **`donatur.html`**
* `donate()` digunakan untuk mengatur penambahan data secara massal (banyak) pada `log_sumbangan` sekaligus mengatur pembaruan data secara massal (banyak) pada `sumbangan`

**DompetController.php**
* `index()` digunakan untuk mengatur pengambilan data dari `sumbangan` sesuai dengan *`$_SESSION`*

**HomeController.php**
* `index($params)` digunakan untuk mengatur pengambilan data dari `log_sumbangan` dan `log_penyaluran`

**AkunController.php**
* `index()` digunakan untuk mengatur *`$_SESSION`*
* `login()` digunakan untuk mengatur pengambilan data dari `identitas`
* `register()` digunakan untuk mengatur penambahan data ke `identitas`
* `profile()` digunakan untuk mengatur pengambilan data dari `identitas` sesuai *`$_SESSION`*
* `ubah()` digunakan untuk mengatur pembaruan data pada `identitas` sesuai *`$_SESSION`*
* `exit()` digunakan untuk mengatur penghancuran *`$_SESSION`*

## Models
**Sumbangan.php**
* `findAll()` digunakan untuk mengambil seluruh data dari `sumbangan` dengan diurutkan ascending berdasarkan jenis
* `FindAllListed()` digunakan untuk mengambil seluruh data dari`identitas_sumbangan` dengan diurutkan ascending berdasarkan kategori
* `insert($id, $data)` digunakan untuk menambah data input kedalam `log_sumbangan`
* `update($data)` digunakan untuk memperbarui data pada `sumbangan` dengan melakukan penambahan banyak sumbangan yang terkumpul
* `insertAll($id, $data)` digunakan untuk menambah banyak data input kedalam `log_sumbangan`
* `update($data)` digunakan untuk memperbarui banyak data pada `sumbangan` dengan melakukan penambahan banyak sumbangan yang terkumpul

**Dompet.php**
* `findAll()` digunakan untuk mengambil seluruh data dari `log_sumbangan` yang memiliki kesamaan *`$_SESSION`* dengan diurutkan descending berdasarkan nomor

**Home.php**
* `findSumbangan()` digunakan untuk mengambil seluruh data dari `log_sumbangan` dengan diurutkan descending berdasarkan nomor
* `findPenyaluran()` digunakan untuk mengambil seluruh data dari `log_penyaluran` dengan diurutkan descending berdasarkan nomor

**Akun.php**
* `account($data)` digunakan untuk mengambil data nama, alamat, usia, pekerjaan dari `identitas` sesuai dengan *`$_SESSION`*
* `insert($data)` digunakan untuk menambah data kedalam `identitas`
* `check($data)` digunakan untuk mengambil data id, pass dari `identitas` untuk dicocokkan dengan input user
* `change($id, $data)` digunakan untuk merubah beberapa data kedalam `identitas` sesuai dengan id

## Views
**home**
* **`index.html`**

![home](/image/1home.png)

gambar 1.1. Halaman utama. Menampilkan log sumbangan dan penyaluran

### .

**sumbangan**
* **`index.html`**

![sumbangan](/image/2sumbangan.png)

gambar 2.1. Halaman Sumbangan. Menampilkan daftar dari sumbangan yang diterima/diperbolehkan

### .

![sumbangan](/image/3sumbangankomoditas.png)

gambar 2.2. Halaman Sumbangan. Menampilkan dropdown menu yang tersedia

### .

![sumbangan](/image/5sumbanganmenyumbang.png)

gambar 2.3. Halaman Sumbangan. Menampilkan modal/popup untuk menyumbang satu jenis

### .

![sumbangan](/image/6sumbanganberhasil.png)

gambar 2.4. Halaman Sumbangan. Menampilkan message ketika sumbangan berhasil

### .

![sumbangan](/image/8sumbangangagal.png)

gambar 2.5. Halaman Login Register. Menampilkan message ketika sumbangan gagal karena belum login

### .

* **`listed.html`**

![sumbangan](/image/4sumbanganpermintaan.png)

gambar 2.6. Halaman Sumbangan. Menampilkan daftar dari permintaan sumbangan

### .

* **`donatur.html`**

![sumbangan](/image/7sumbanganbanyak.png)

gambar 2.7. Side: Halaman Donatur. Menampilkan halaman untuk melakukan donasi banyak kategori sekaligus

### .

**dompet**
* **`index.html`**

![dompet](/image/10dompetrekap.png)

gambar 2.8. Halaman Dompet. Menampilkan hasil rekap dari donasi yang telah dilakukan

### .

**akun**
* **`index.html`**

![akun](/image/9akunregisterberhasil.png)

gambar 2.9. Halaman Akun. Menampilkan formulir login dan register (contoh disini adalah ketika berhasil melakukan registrasi)

### .

* **`profile.html`**

![akun](/image/11akunprofile.png)

gambar 2.10. Halaman Akun. Menampilkan identitas diri sesuai dengan user yang login

### .

![akun](/image/12akunedit.png)

gambar 2.11. Halaman Akun. Menampilkan modal/popup untuk mengubah identitas user yang login

### .

![akun](/image/13akuneditberhasil.png)

gambar 2.12. Halaman Akun. Menampilkan pesan berhasil mengubah identitas user yang login

### .
