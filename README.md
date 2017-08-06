# Natural Language Processing: Sentiment Analysis.
Implementing a Sentiment Analysis Machine Learning model in Python and integrating it into a Laravel project.

## About the project.
After reading Sebastian Raschka's Python Machine Learning book, 
I decided to implement a Sentiment Analysis movie review classifier on Python and use Laravel for working with it.
Laravel provides API endpoints for working with the classifier, and Vuejs serves the frontend part, 
so the result is pretty interesting. 

I made this project just for practicing, and there is no "real-world" usage of it. 
It is just an example of how to embed a trainedmachine learning model into a non-python web app.

## Installation instruction is for Laravel Homestead.
Currently, the project uses Laravel 5.4. More about homestead https://laravel.com/docs/5.4/homestead

1. SSH to the vagrant box.

2. Install Python dependencies: Anaconda 4.4.0
```
cd /tmp
wget https://repo.continuum.io/archive/Anaconda3-4.4.0-Linux-x86_64.sh
bash Anaconda3-4.4.0-Linux-x86_64.sh
rm Anaconda3-4.4.0-Linux-x86_64.sh
```

3. Create SQLite
```
touch project_dir/storage/db/review_db.sqlite
```

4. `.env` file:
```
DB_DATABASE={path_to_the_project_root}/storage/db/review_db.sqlite
PYTHON_BIN_PATH="~vagrant/anaconda3/bin/python"
```
Use a correct path instead of `{path_to_the_project_root}`

5. Run `artisan migrate` from the web project root.

## Updating the classifier:
in project root dir: `python pylibs/update.py`
`update.py` uses users fedbacks from `review_db.sqlite` for updating the trained model.
Every time user submits a review, the user can leave a feedback about the users' movie review prediction. 
We can use those feedbacks for better train our model.
But, it is better to check the feedbacks first and remove incorrect predictions.


## Software versions

**Classifier:** SGDClassifier from scikit-learn library. SGDClassifier is a Logistic Regression Classifier using out-of-core learning process to train the model.

**Laravel:** 5.4

**Python:** Python 3.6.1 from Anaconda 4.4.0 (64-bit)
