## Pertanyaan dan Jawaban (Jobsheet 3)
1. **Apa fungsi dari `APP_KEY` pada file `.env` Laravel?**  
   *Jawab*: Digunakan untuk enkripsi data sensitif di Laravel, seperti session dan password reset token.

2. **Bagaimana cara men-generate nilai untuk `APP_KEY`?**  
   *Jawab*: Gunakan perintah berikut:
   ```sh
   php artisan key:generate
   ```

3. **Secara default, Laravel memiliki berapa file migrasi dan untuk apa saja?**  
   *Jawab*: Laravel memiliki 4 file migrasi yaitu:
   - `create_users_table`
   - `create_password_reset_tokens_table`
   - `create_failed_jobs_table`
   - `create_personal_access_tokens_table`
   
   Masing-masing digunakan untuk mengelola pengguna, reset password, pencatatan kegagalan pekerjaan, dan token akses personal.

4. **Apa tujuan dari `$table->timestamps();` dalam migrasi?**  
   *Jawab*: Menambahkan kolom `created_at` dan `updated_at` secara otomatis.

5. **Tipe data apa yang dihasilkan dari `$table->id();`?**  
   *Jawab*: `bigInteger (unsigned) auto-increment`.

6. **Apa perbedaan `$table->id();` dengan `$table->id('level_id');`?**  
   *Jawab*: `$table->id();` membuat primary key default bernama `id`, sedangkan `$table->id('level_id');` membuat primary key dengan nama `level_id`.

7. **Apa kegunaan fungsi `->unique()` dalam migrasi?**  
   *Jawab*: Untuk memastikan nilai dalam kolom tersebut tidak ada yang duplikat.

8. **Kenapa `level_id` di `m_user` menggunakan `$table->unsignedBigInteger('level_id')` sedangkan di `m_level` menggunakan `$table->id('level_id')`?**  
   *Jawab*: Karena `level_id` di `m_user` adalah foreign key, sementara `level_id` di `m_level` adalah primary key.

9. **Apa fungsi dari Class `Hash` dan `Hash::make('1234');`?**  
   *Jawab*: Class `Hash` digunakan untuk enkripsi password, dan `Hash::make('1234');` mengubah string `1234` menjadi hash yang aman.

10. **Apa kegunaan tanda `?` dalam Query Builder?**  
    *Jawab*: Untuk binding parameter agar terhindar dari SQL Injection.

11. **Apa tujuan dari `protected $table = 'm_user';` dan `protected $primaryKey = 'user_id';`?**  
    *Jawab*: Untuk menentukan nama tabel dan primary key yang digunakan oleh model.

12. **Mana yang lebih mudah digunakan antara DB Façade, Query Builder, dan Eloquent ORM?**  
    *Jawab*: Eloquent ORM lebih mudah digunakan karena berbasis OOP, lebih ringkas, dan otomatis menangani hubungan antar tabel dibandingkan DB Façade dan Query Builder.