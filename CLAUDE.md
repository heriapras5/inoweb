# CLAUDE.md

Panduan proyek ini untuk Claude Code.

## Gaya Penulisan (WAJIB)

Dilarang keras memakai strip panjang, yaitu em dash (U+2014) dan en dash (U+2013), di mana pun: teks balasan chat, kode, komentar, string UI, dokumen, maupun commit message. Karakter ini dianggap AI slop.

Gantinya: pakai tanda hubung pendek `-`, koma, titik, atau ubah struktur kalimat. Ini juga berlaku saat menulis file baru; jangan menyalin gaya strip panjang dari percakapan.

## Proyek

Aplikasi Laravel (INOWEB, company profile + admin CMS). Frontend asset memakai Vite (Tailwind v4 + Alpine.js), input di `resources/css/app.css` dan `resources/js/app.js`, dimuat lewat `@vite()` di layout.

Catatan deploy: repo ini meng-track `public/build`, jadi setiap perubahan di `resources/` wajib diikuti `npm run build` di lokal sebelum push, agar hash manifest di hosting konsisten.

Animasi hero (efek ketik judul) berupa Alpine inline di `resources/views/frontend/home.blade.php`, bukan di bundle JS, jadi perubahan animasi tidak butuh rebuild.
