@extends('layouts.app')

@section('content')
    <!-- First Card -->
    <x-card>
        <x-slot name="title">
            Deskripsi Model
        </x-slot>
        <div class="row">
            <div class="paragraph col-lg-12 col-12">
                <p>
                    Model yang digunakan adalah model Sequential dengan
                    algoritma Bidirectional Long Short-Term Memory
                    (Bi-LSTM) yang embedding layer-nya menggunakan vektor
                    dari model Word2Vec. Model ini dibuat menggunakan
                    library Keras dan Scikit-Learn. Bi-LSTM merupakan
                    kombinasi dua layer LSTM dengan arah forward dan
                    backward.
                </p>
                <div class="imagescaled">
                    <img src="img/lstm_peepholes.png" />
                    <center>
                        <i>Diagram arsitektur LSTM (Yan, 2015)</i>
                    </center>
                </div>
                <p>
                    LSTM diciptakan pertama kali oleh Seep Hochreiter dan
                    Jurgen Schmidhuber pada tahun 1997 untuk mengatasi
                    masalah vanishing dan exploding gradient pada proses
                    BPTT (Backpropagation Through Time) pada RNN. Inovasi
                    LSTM adalah adanya unit memori yang disebut dengan
                    cell state atau memory state yang bertujuan agar
                    informasi pada sel dapat mengalir secara terpisah
                    dengan interupsi seminimal mungkin, sehingga nilainya
                    tidak berubah akibat operasi komputasi lainnya.
                </p>
                <p>
                    Arsitektur unit LSTM dapat dilihat pada ilustrasi
                    pertama. Ada tiga gerbang yang mengatur lalu lintas
                    informasi pada LSTM, yaitu forget gate, input gate,
                    dan output gate, serta cell state untuk mempertahankan
                    informasi sebelumnya. Untuk penjelasan lebih detail
                    dapat dilihat
                    <a href="https://colah.github.io/posts/2015-08-Understanding-LSTMs/">di sini</a>.
                </p>
                <p>
                    Masukan dalam analisis sentimen adalah sekuens yang
                    terdiri dari token-token kata, sehingga hasil analisis
                    akan lebih baik jika tidak hanya mengandalkan konteks
                    yang telah lewat dari unit sebelumnya, namun juga
                    memanfaatkan konteks dari unit berikutnya seperti yang
                    diilustrasikan pada gambar kedua.
                </p>
            </div>
            <div class="paragraph col-lg-6 col-12">
                <p>
                    Meskipun LSTM dapat mengatasi masalah long-term
                    dependency yang dialami oleh RNN, baik LSTM maupun RNN
                    hanya dapat menggunakan informasi yang didapat dari
                    konteks dari ‘masa lalu’, sedangkan konteks dari ‘masa
                    depan’ tidak dapat dimanfaatkan dikarenakan arsitektur
                    hanya bersifat satu arah
                </p>
                <p>
                    Untuk mengatasi masalah ini, didesain Bi-LSTM yang
                    dapat memanfaatkan konteks dari dua arah sekaligus,
                    yaitu forward dan backward. Backward layer pada
                    Bi-LSTM merupakan unit LSTM standar, hanya input
                    sekuensnya saja yang berkebalikan dengan forward
                    layer.
                </p>
            </div>

            <div class="paragraph col-lg-6 col-12">
                <div class="imagediv">
                    <img src="img/bi-lstm-contexts.png" />
                    <center>
                        <i>Ilustrasi kalimat yang membutuhkan konteks dua
                            arah</i>
                    </center>
                    <img src="img/bidirectional lstm.png" />
                    <center>
                        <i>Diagram arsitektur Bi-LSTM (He & Han, 2020)</i>
                    </center>
                </div>
            </div>
        </div>
    </x-card>
    {{-- End of First Card --}}

    {{-- Second Card --}}
    <x-card>
        <x-slot name="title">
            Konfigurasi Model
        </x-slot>
        <div class="row">
            <div class="paragraph col-lg-12 col-12">
                <p>
                    Proses pengujian sistem dilakukan menggunakan data
                    latih yang telah dilakukan undersampling dengan jumlah
                    422,042 dan data uji yang berjumlah 76,062. Proses
                    pelatihan model Bidirectional Long Short-Term Memory
                    (Bi-LSTM) dilakukan dengan batasan epoch sebesar 200
                    dengan fungsi callback berupa fungsi early stopping
                    yang akan menghentikan proses training jika tidak ada
                    peningkatan nilai recall setelah 20 kali iterasi untuk
                    mencegah overfitting dan fungsi model checkpoint untuk
                    menyimpan model dengan kinerja terbaik, yang dalam hal
                    ini metrik performance yang dipilih peneliti adalah
                    nilai recall.
                </p>
                <p>
                    Pelatihan dan pengujian dilakukan menggunakan dua
                    model, yaitu base model, yaitu model dengan parameter
                    yang diusahakan semirip mungkin dengan parameter yang
                    digunakan oleh peneliti sebelumnya pada model CNN
                    (Daffa, 2022), dan tuned model, yaitu model dengan
                    parameter hasil hyperparameter tuning. Tuning
                    dilakukan menggunakan grid search dengan cross
                    validation sebesar 3-fold untuk mencari parameter
                    batch size, optimizer, learning rate, dropout rate,
                    kernel initializer terbaik pada model.
                </p>
                <p>
                    Parameter yang digunakan pada base model adalah batch
                    size (64), optimizer function (Stochastic Gradient
                    Descent), learning rate (0.001), epoch (200), callback
                    (Early Stopping), dropout rate (0.5), Loss Function
                    (Binary Cross Entropy), dan kernel initializer
                    (default: Glorot Uniform). Sementara parameter yang
                    digunakan pada tuned model adalah batch size (128),
                    optimizer function (Adam), learning rate (0.001),
                    epoch (200), callback (Early Stopping), nilai dropout
                    rate sebesar 0.6, dan kerner initializer (Uniform).
                </p>
            </div>
            <div class="table-responsive col-lg-12 col-12">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>Parameter</th>
                            <th>Base Model</th>
                            <th>Tuned Model</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Batch Size</td>
                            <td>64</td>
                            <td>128</td>
                        </tr>
                        <tr>
                            <td>Optimizer Function</td>
                            <td>Stochastic Gradient Descent (SGD)</td>
                            <td>Adam</td>
                        </tr>
                        <tr>
                            <td>Learning Rate</td>
                            <td>0.001</td>
                            <td>0.001</td>
                        </tr>
                        <tr>
                            <td>Epoch</td>
                            <td>200</td>
                            <td>200</td>
                        </tr>
                        <tr>
                            <td>Dropout Rate</td>
                            <td>0.5</td>
                            <td>0.6</td>
                        </tr>
                        <tr>
                            <td>Callback Function</td>
                            <td>Early Stopping</td>
                            <td>Early Stopping</td>
                        </tr>
                        <tr>
                            <td>Kernel Initializer</td>
                            <td>Glorot Uniform</td>
                            <td>Uniform</td>
                        </tr>
                    </tbody>
                </table>
            </div> <!-- End of Div Table -->
        </div>
    </x-card>

    {{-- Second Card --}}
    <x-card>
        <x-slot name="title">
            Hasil Pelatihan dan Pengujian Model
        </x-slot>
        <div class="row" data-modelingURL="{{ route('modeling.post') }}">
            <x-img> img/metric_base_clean.png </x-img>
            <x-img> img/loss_base_clean.png </x-img>
        </div>
        <div align="center">
            <button type="button" class="btn btn-dark" value="base_clean_train_evaluation">
                Training Result
            </button>
            <button type="button" class="btn btn-dark" value="base_clean_test_evaluation,data_table">
                Testing Result
            </button>
            <button type="reset" class="btn btn-light" name="hide" id="hide" value="data_table">
                Hide
            </button>
        </div>
        <div id="data_table">
            @if (isset($tableData))
                <x-table :headers="['Epoch', 'Loss', 'Accuracy', 'F1', 'Score', 'Precision', 'Recall', 'TP', 'TN', 'FP', 'FN']" :data="$tableData" />
            @endif
        </div>
        <hr />
        <!-- END OF BASE CLEAN -->
        <!-- BASE STEM -->
        <div class="row">
            <x-img> img/metric_base_stem.png </x-img>
            <x-img> img/loss_base_stem.png </x-img>
        </div>
        <div align="center">
            <button type="button" class="btn btn-dark" name="load_data" id="load_data"
                value="base_stem_train,data_table_2">
                Training Result
            </button>
            <button type="button" class="btn btn-dark" name="load_data" id="load_data_2"
                value="base_stem_test,data_table_2">
                Testing Result
            </button>
            <button type="reset" class="btn btn-light" name="hide" id="hide" value="data_table_2">
                Hide
            </button>
        </div>
        <div id="data_table_2"></div>
        <hr />
        <!-- END OF BASE STEM -->
        <!-- TUNED CLEAN -->
        <div class="row">
            <x-img> img/metric_tuned_clean.png </x-img>
            <x-img> img/loss_tuned_clean.png </x-img>
        </div>
        <div align="center">
            <button type="button" class="btn btn-dark" name="load_data" id="load_data"
                value="tuned_clean_train,data_table_3">
                Training Result
            </button>
            <button type="button" class="btn btn-dark" name="load_data" id="load_data_2"
                value="tuned_clean_test,data_table_3">
                Testing Result
            </button>
            <button type="reset" class="btn btn-light" name="hide" id="hide" value="data_table_3">
                Hide
            </button>
        </div>
        <div id="data_table_3"></div>
        <hr />
        <!-- END OF TUNED CLEAN -->
        <!-- TUNED STEM -->
        <div class="row">
            <x-img> img/metric_tuned_stem.png </x-img>
        </div>
        <div align="center">
            <button type="button" class="btn btn-dark" name="load_data" id="load_data"
                value="tuned_stem_train,data_table_4">
                Training Result
            </button>
            <button type="button" class="btn btn-dark" name="load_data" id="load_data_2"
                value="tuned_stem_test,data_table_4">
                Testing Result
            </button>
            <button type="reset" class="btn btn-light" name="hide" id="hide" value="data_table_4">
                Hide
            </button>
        </div>
        <div id="data_table_4"></div>
        <br />
        <!-- END OF TUNED STEM-->
    </x-card>


    <!-- start of fourth Card -->
    <x-card>
        <x-slot name="title">
            Analisis Hasil Penelitian
        </x-slot>
        <div class="row">
            <div class="paragraph col-lg-12 col-12">
                <p>
                    Berdasarkan hasil pengujian secara keseluruhan, dapat
                    disimpulkan bahwa tuned model memiliki performance
                    yang lebih baik dibandingkan base model berdasarkan
                    nilai akurasi, presisi, recall, dan F1-Score. Tuned
                    model yang diuji dengan dataset pertama, yaitu data
                    dengan proses prapengolahan berupa text cleaning,
                    memperoleh presisi dan F1-Score tertinggi dengan nilai
                    sebesar 0.99391 dan 0.94581. Sementara dengan dataset
                    kedua, yaitu data dengan proses prapengolahan meliputi
                    text cleaning - word correction - stopword removal -
                    stemming memperoleh nilai akurasi dan recall tertinggi
                    dengan nilai sebesar 0.90386 dan 0.90326.
                </p>
                <!-- <br /> -->
                <div class="center-content col-lg-12 col-12">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>Model</th>
                                <th>Dataset</th>
                                <th>Epoch</th>
                                <th>Accuracy</th>
                                <th>Precision</th>
                                <th>Recall</th>
                                <th>F1 Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Base</td>
                                <td>Dataset 1</td>
                                <td>118</td>
                                <td>0.88746</td>
                                <td>0.9923</td>
                                <td>0.88766</td>
                                <td>0.93648</td>
                            </tr>
                            <tr>
                                <td>Base</td>
                                <td>Dataset 2</td>
                                <td>121</td>
                                <td>0.89071</td>
                                <td>0.99371</td>
                                <td>0.88985</td>
                                <td>0.93834</td>
                            </tr>
                            <tr>
                                <td>Tuned</td>
                                <td>Dataset 1</td>
                                <td>29</td>
                                <td>0.90281</td>
                                <td class="highlight">0.99391</td>
                                <td>0.90259</td>
                                <td class="highlight">0.94581</td>
                            </tr>
                            <tr>
                                <td>F1-Score</td>
                                <td>Dataset 2</td>
                                <td>34</td>
                                <td class="highlight">0.90386</td>
                                <td>0.99432</td>
                                <td class="highlight">0.90326</td>
                                <td>0.94638</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br />
                <!-- End of Div Table -->
                <p>
                    Hasil pengujian berdasarkan model menunjukkan bahwa
                    tuned model memiliki rata-rata nilai tertinggi dari
                    seluruh metrik, dengan nilai akurasi sebesar 0.90333,
                    nilai presisi sebesar 0.99411, nilai recall sebesar
                    0.90292, dan F1-Score sebesar 0.94609.
                </p>
                <div class="table-responsive col-lg-12 col-12">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>Model</th>
                                <th>Accuracy</th>
                                <th>Precision</th>
                                <th>Recall</th>
                                <th>F1 Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Base</td>
                                <td>0.88908</td>
                                <td>0.99300</td>
                                <td>0.88875</td>
                                <td>0.93741</td>
                            </tr>
                            <tr>
                                <td>Tuned</td>
                                <td class="highlight">0.90333</td>
                                <td class="highlight">0.99411</td>
                                <td class="highlight">0.90292</td>
                                <td class="highlight">0.94609</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p>
                    Sedangkan hasil pengujian berdasarkan dataset
                    menunjukkan bahwa model yang diuji menggunakan dataset
                    kedua memiliki rata-rata nilai tertinggi dari seluruh
                    metrik, dengan nilai akurasi sebesar 0.89727, nilai
                    presisi sebesar 0.99401, nilai recall sebesar 0.89655,
                    dan F1-Score sebesar 0.94236.
                </p>
                <div class="table-responsive col-lg-12 col-12">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>Dataset</th>
                                <th>Accuracy</th>
                                <th>Precision</th>
                                <th>Recall</th>
                                <th>F1 Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Dataset 1</td>
                                <td>0.89513</td>
                                <td>0.99310</td>
                                <td>0.89512</td>
                                <td>0.94114</td>
                            </tr>
                            <tr>
                                <td>Dataset 2</td>
                                <td class="highlight">0.89728</td>
                                <td class="highlight">0.99401</td>
                                <td class="highlight">0.89655</td>
                                <td class="highlight">0.94236</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- End of Div Table -->
            </div>
        </div>
    </x-card>
    <!-- End of Fourth Card -->
@endsection

@section('script')
    <script src="js/modelingScript2.js"></script>
@endsection
