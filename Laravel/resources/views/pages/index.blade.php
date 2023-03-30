@extends('layouts.app')


@section('content')
    <!-- First Card -->
    <x-card>
        <x-slot name="title">
            Abstrak Penelitian
        </x-slot>
        <p>
            Analisis sentimen adalah bidang komputasional yang
            mempelajari tentang opini, sentimen, emosi, dan
            perilaku manusia terhadap entitas dan atribut yang
            diekspresikan melalui teks tertulis. Analisis sentimen
            berperan besar bagi perusahaan atau organisasi karena
            pendapat publik mengenai produk dan layanan mereka
            sangat berharga untuk dijadikan evaluasi dan strategi
            bisnis. Pada penelitian ini, dikembangkan sistem yang
            dapat mengklasifikasikan sentimen ulasan produk
            menggunakan metode Bidirectional Long Short-Term
            Memory (Bi-LSTM) dan Word Embedding, yaitu Word2Vec
            sebagai embedding layer. Pengembangan sistem
            menggunakan dua model, yaitu base model yang
            konfigurasi parameternya sama dengan model CNN yang
            digunakan pada penelitian sebelumnya, dan tuned model
            yang konfigurasi parameternya berdasarkan hasil
            hyperparameter tuning. Hasil penelitian menunjukkan
            model kedua memiliki performa terbaik pada keempat
            metrik dengan nilai akurasi 90.33%, precision 99.41%,
            recall 90.29%, dan F1-Score 94.61%. Dibandingkan
            penelitian sebelumnya, sistem yang dibangun memperoleh
            akurasi dan recall yang lebih rendah dengan selisih
            masing-masing 3.15% dan 0.94%, tetapi memiliki
            precision dan F1-Score yang lebih tinggi dengan
            selisih masing-masing 8.18% dan 3.43%.
        </p>
        <p>
            Kata Kunci: Sentimen Analisis, Ulasan Produk,
            Bidirectional Long Short Term-Memory, Word Embedding,
            Word2Vec
        </p>
    </x-card>
    <!-- End of First Card -->

    <!-- Second Card -->
    <x-card>
        <x-slot name="title">
            Deskripsi Penelitian
        </x-slot>
        <div class="imagescaled">
            <img src="img/research-pipeline_final.png" class="center" />
        </div>
        <p>
            Penelitian ini menjelaskan implementasi sentimen
            analisis menggunakan metode Bidirectional Long
            Short-Term Memory dan Word2Vec. Data yang digunakan
            adalah data sekunder yang diambil dari peneliti
            sebelumnya, yaitu ulasan pada situs e-commerce Lazada.
            Bahasa pemrograman yang digunakan untuk penelitian ini
            adalah Python. Pra pengolahan teks dilakukan
            menggunakan pustaka Python seperti Regular Expression,
            Sastrawi, NLTK, Swifter, dan yang lainnya.
        </p>
        <p>
            Untuk proses ekstraksi fitur, digunakan Word2Vec
            Embedding yang akan dilatih pada corpus Wikipedia
            berbahasa Indonesia yang tersedia secara publik di
            laman Wikimedia. Corpus akan melalui proses pelatihan
            menggunakan pustaka Gensim yang juga telah tersedia
            secara publik, untuk mempersingkat waktu pelatihan
            digunakan Cython yang dapat mempercepat training loop.
            Setelah model Word2Vec telah berhasil dibuat,
            dilakukan proses pelatihan model Bi-LSTM. Untuk proses
            pelatihan model, pustaka Scikit-Learn, Keras dan
            Tensorflow digunakan untuk proses inisialisasi dan
            pelatihan forward layer dan backward layer Bi-LSTM.
        </p>
        <br /><br />
        <center>Powered by</center>
        <div class="center-content">
            <img src="img/logo-aird.jpeg" />
            <img src="img/logo-unsri.png" />
        </div>
    </x-card> <!-- End of Second Card -->
@endsection
