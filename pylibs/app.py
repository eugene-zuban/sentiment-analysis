import pickle, re, os, sys, json
import numpy as np
from vectorizer import vect

def main(review):
    try:
        classifier = pickle.load(open(os.path.join('pylibs/pkl_objects', 'classifier.pkl'), 'rb'))

        transformedReview = vect.transform([review])
        predicted_class = classifier.predict(transformedReview)[0]
        predicted_probability = np.max(classifier.predict_proba(transformedReview)) * 100

        print(json.dumps({
            'is_positive': str(predicted_class),
            'probability': str(predicted_probability),
            'review': review
        }))

    except Exception as e:
        print(e)
        sys.exit()

if __name__ == "__main__":
   main(sys.stdin.read())
