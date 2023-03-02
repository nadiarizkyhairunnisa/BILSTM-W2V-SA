@extends('layouts.app')

@section('content')
    <!-- First Card -->
    <x-card>
        <x-slot name="title">
            Sentiment Analysis Live Demo
        </x-slot>
        <div class="form-input">
            <h6 class="option-form">Ulasan</h6>
            <input name="ulasan" id="ulasan" class="form-control" type="text"
                placeholder="Contoh: Produk bagus, pengiriman cepat, dan penjual ramah" />
        </div>
        <br />
        <h6 class="option-form">Prapengolahan Teks</h6>
        <div class="radio icheck-default">
            <input class="form-check-input" type="radio" name="radioPreproc" id="radioPreproc1" value="1" checked />
            <label class="form-check-label" for="radioPreproc1">
                Text Cleaning
            </label>
        </div>
        <div class="radio icheck-default">
            <input class="form-check-input" type="radio" name="radioPreproc" id="radioPreproc2" value="2"
                unchecked />
            <label class="form-check-label" for="radioPreproc2">
                Text Cleaning - Word Correction - Stemming - Stopword
                Removal
            </label>
        </div>
        <br />
        <h6 class="option-form">Model</h6>
        <div class="radio icheck-default">
            <input class="form-check-input" type="radio" name="radioModel" id="radioModel1" value="1" checked />
            <label class="form-check-label" for="radioModel1">
                Base Model
            </label>
        </div>
        <div class="radio icheck-default">
            <input class="form-check-input" type="radio" name="radioModel" id="radioModel2" value="2" unchecked />
            <label class="form-check-label" for="radioModel2">
                Tuned Model
            </label>
        </div>
        <div class="submit">
            <br />
            <button type="button" class="btn btn-dark" name="submit" id="submit">
                Submit
            </button>
            <button type="reset" class="btn btn-light" name="reset" id="reset">
                Reset
            </button>
        </div>
        <div class="result">
            <div name="ulasan" id="ulasan"></div>
            <div name="result" id="result"></div>
        </div>
    </x-card>
    <!-- End of First Card -->
@endsection
