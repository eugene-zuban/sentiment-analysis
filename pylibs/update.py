import pickle, sqlite3, numpy as np, os

from vectorizer import vect

def update_model(db_path, model, batch_size=5000):
    connection = sqlite3.connect(db_path)
    cursor = connection.cursor()
    cursor.execute("SELECT review, sentiment FROM reviews")

    reviews = cursor.fetchmany(batch_size)
    while reviews:
        data = np.array(reviews)
        X = data[:, 0]
        y = data[:, 1].astype(int)

        classes = np.array([0, 1])
        X_train = vect.transform(X)
        model.partial_fit(X_train, y, classes=classes)
        reviews = cursor.fetchmany(batch_size)

    connection.close
    return model

def main():
    classifier = pickle.load(open(os.path.join('pylibs/pkl_objects', 'classifier.pkl'), 'rb'))
    db = os.path.join('storage/db/review_db.sqlite')
    update_model(db_path=db, model=classifier)
    pickle.dump(classifier, open(os.path.join('pylibs/pkl_objects', 'classifier.pkl'), 'wb'), protocol=4)

if __name__ == "__main__":
   main()
