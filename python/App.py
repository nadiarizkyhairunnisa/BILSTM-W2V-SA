from flask import Flask, request, jsonify, make_response
from flask_restful import reqparse, Api, Resource
from Controller.Preprocessing import Preprocessing
from Controller.Modeling import Modeling
from Model.DataReader import DataReader
from keras.models import load_model
from flask_cors import CORS

class App:

    app = Flask(__name__)
    CORS(app)

    global base_tokenizer_path, tuned_tokenizer_path, colloquial_lexicon_path, stopword_list_path, base_model_path, tuned_model_path, third_model_path
    
    base_tokenizer_path    = "resources/tokenizer/tokenizer_base_stem.pickle"
    tuned_tokenizer_path   = "resources/tokenizer/tokenizer_tuned_stem.pickle"
    colloquial_lexicon_path= "resources/wordlist/colloquial_indonesian_lexicon.csv"
    stopword_list_path     = "resources/wordlist/idn_stopwords.txt"
    base_model_path        = "resources/model/BiLSTM_best_weights_stem_base.h5"
    tuned_model_path       = "resources/model/BiLSTM_best_weights_stem_tuned.h5"


    @app.route('/', methods=["GET","POST"])
    def predictSentiment():

        ulasan = request.form.get("ulasan")
        preprocOption = request.form.get("preproc")
        print("PREPROC OPTION VALUES", preprocOption)

        modelOption = request.form.get("model")
        print("MODEL OPTION VALUES", modelOption)

        if preprocOption == "1":
            ulasan = Preprocessing.text_cleaning(ulasan)
            print("masuk text cleaning")
        else:
            ulasan = Preprocessing.text_cleaning(ulasan)
            print("finsihed text cleaning: ", ulasan)

            colloquial_lexicon =  DataReader.get_slang_dictionary(colloquial_lexicon_path)
            ulasan = Preprocessing.word_correction(ulasan, colloquial_lexicon)
            print("finsihed word correction: ", ulasan)

            stopword_list = DataReader.get_stopword_list(stopword_list_path)
            print(stopword_list)
            ulasan = Preprocessing.stopword_removal(ulasan, stopword_list)
            print("finsihed stopword_removal:", ulasan)

            ulasan = Preprocessing.stemming(ulasan)
            print("finshed text stemming:", ulasan)

        model = None
        if modelOption == "1":
            model       = load_model(base_model_path, custom_objects={"f1_m": Modeling.f1_m, "precision_m": Modeling.precision_m, "recall_m": Modeling.recall_m})
            
        else:
            model = load_model(tuned_model_path, custom_objects={"f1_m": Modeling.f1_m, "precision_m": Modeling.precision_m, "recall_m": Modeling.recall_m})
            

        tokenizer   = DataReader.get_tokenizer(base_tokenizer_path)
        ulasan_seq  = Modeling.get_seq(review = ulasan, tokenizer = tokenizer)
        result      = Modeling.predict_sentiment(model, ulasan_seq)
        print(ulasan)
        print(result)

        return {"ulasan": ulasan,
                "preproc": preprocOption,
                "model": modelOption,
                "result": result} 


    @app.route('/modeling', methods=["GET", "POST"]) 
    def getEvaluationData():
        data_option = request.form.get("data_option")
        print("DATA OPTION VALUES: ", data_option)

        if data_option == "base_clean_train":
            data_path = "resources/evaluation/base_clean_train.csv"
        elif data_option == "base_clean_test":
            data_path = "resources/evaluation/base_clean_test.csv"
        elif data_option == "base_stem_train":
            data_path = "resources/evaluation/base_stem_train.csv"
        elif data_option == "base_stem_test":
            data_path = "resources/evaluation/base_stem_test.csv"
        elif data_option == "tuned_clean_train":
            data_path = "resources/evaluation/tuned_clean_train.csv"
        elif data_option == "tuned_clean_test":
            data_path = "resources/evaluation/tuned_clean_test.csv"
        elif data_option == "tuned_stem_train":
            data_path = "resources/evaluation/tuned_stem_train.csv"
        else:
            data_path = "resources/evaluation/tuned_stem_test.csv"

        return {"data_path":data_path}

    @app.route('/dataset', methods=["GET", "POST"]) 
    def getSampleData():
        data_option = request.form.get("data_option")
        print("DATA OPTION VALUES: ", data_option)

        if data_option == "data_table":
            data_path = "resources/sample/data_clean_sample_final.csv"
        elif data_option == "data_table_2":
            data_path = "resources/sample/data_stem_sample_final.csv"
        elif data_option == "stem_train":
            data_path = "resources/sample/data_stem_sample_final.csv"
        else:
            data_path = "resources/sample/data_stem_sample_final.csv"

        return {"data_path":data_path}


    if __name__ == '__main__':
        app.run(debug=True)