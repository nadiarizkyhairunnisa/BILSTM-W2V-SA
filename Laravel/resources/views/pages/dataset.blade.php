@extends('layouts.app')

@section('content')
    <!-- First Card -->
    <x-card>
        <x-slot name="title">
            Deskripsi Dataset
        </x-slot>
        <p>
            Dataset yang digunakan adalah teks ulasan berbagai produk
            dari situs e-commerce Lazada. Data mentah terdiri dari 5
            juta ulasan dengan 249 jenis produk yang telah di-crawling
            oleh peneliti sebelumnya. Data merupakan data sekunder
            yang didapat dari
            <a href="https://github.com/revanmd/indonesian-dataset-SA-ML" target="_blank">
                repository
            </a>
            Kak Revan Muhammad Daffa yang tugas akhirnya menjadi
            referensi utama penelitian tugas akhir saya. Sebelum dapat
            digunakan oleh model, data melalui tahap prapengolahan
            terlebih dahulu seperti penghapusan data duplikat, text
            cleaning, word correction, stopword removal, dan stemming.
        </p>
        <p>
            Setelah itu, data melalui proses label encoding, ulasan
            dengan rating 4 dan 5 dikategorikan sebagai sentimen
            positif dengan label "1", rating 1 dan 2 dikategorikan
            sebagai sentimen negatif dengan label "0", dan rating 3
            dieliminasi karena batasan penelitian hanya berfokus pada
            dua sentimen tersebut. Setelah itu dilakukan undersampling
            karena tingkat imbalance data yang tinggi, digunakan
            pustaka Imblearn RandomUnderSampler dengan
            sampling_strategy sebesar 0.5. Rincian jumlah data dapat
            dilihat pada diagram dan tabel berikut.
        </p>
        <div class="row">
            <div class="table-number col-lg-7 col-12">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Data mentah</td>
                            <td>5,543,474</td>
                        </tr>
                        <tr>
                            <td>Setelah penghapusan data duplikat</td>
                            <td>3,967,825</td>
                        </tr>
                        <tr>
                            <td>
                                Setelah penghapusan ulasan bersentimen netral
                            </td>
                            <td>3,801,316</td>
                        </tr>
                        <tr>
                            <td>Setelah undersampling</td>
                            <td>498,104</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="imagediv col-lg-5 col-12">
                <img src="img/data_overview.png" />
            </div>
        </div>
    </x-card>
    <!-- End of First Card -->

    <!-- Second Card -->
    <x-card>
        <x-slot name="title">
            Dataset 1 - [Text Cleaning]
        </x-slot>
        <p>
            Pada dataset ini hanya dilakukan satu tahap preprocessing,
            yaitu text cleaning. Proses text cleaning meliputi
            lowercasing, penghapusan username, hastag, url, tanda
            baca, angka, emoji, dan spasi yang berlebihan. Berikut
            beberapa sampel datanya.
        </p>
        <div id="samples_preproc_opt_1" name="samples_preproc_opt_1"> </div>
    </x-card>
    <!-- End of Second Card -->

    <!-- Third Card -->
    <x-card>
        <x-slot name="title">
            Dataset 2 - [Text Cleaning - Word Correction - Stopword
            Removal - Stemming]
        </x-slot>
        <p>
            Skema dataset ini dilakukan beberapa tahapan preprocessing
            meliputi text cleaning, word correction, stemming, dan
            stopword removal. Proses text cleaning yang dilakukan pada
            dataset ini sama dengan dataset sebelumnya. Proses word
            correction dilakukan dengan mengganti kata yang tidak baku
            menjadi baku menggunakan kamus colloquial indonesia
            lexicon yang peneliti dapatkan dari Github (user:
            nasalsabila).
        </p>
        <p>
            Stopword removal adalah proses penghapusan kata hubung,
            kata ganti, preposisi, dan jenis kata yang tidak
            diperlukan lainnya, proses ini dilakukan menggunakan
            daftar stopword dari pustaka Sastrawi yang dimodifikasi
            oleh peneliti. Stemming merupakan proses pemenggalan kata
            untuk mendapatkan akar kata, peneliti juga menggunakan
            pustaka Sastrawi untuk melakukan proses ini.
        </p>
        <div id="samples_preproc_opt_2" name="samples_preproc_opt_2"></div>
    </x-card> <!-- End of Third Card -->
@endsection

@section('script')
    <script src="js/datasetScript.js"></script>
@endsection
