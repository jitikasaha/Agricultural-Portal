import pandas as pd
import numpy as np
import warnings
warnings.filterwarnings("ignore")
import json
import os
import sys

# Get the input parameters as command line arguments
def parse_val(arg):
    try:
        return float(json.loads(arg))
    except Exception:
        return float(arg)

n_params = parse_val(sys.argv[1])
p_params = parse_val(sys.argv[2])
k_params = parse_val(sys.argv[3])
t_params = parse_val(sys.argv[4])
h_params = parse_val(sys.argv[5])
ph_params = parse_val(sys.argv[6])
r_params = parse_val(sys.argv[7])

# Read the dataset
script_dir = os.path.dirname(os.path.abspath(__file__))
csv_path = os.path.join(script_dir, 'Crop_recommendation.csv')
if not os.path.exists(csv_path):
    csv_path = 'ML/crop_recommendation/Crop_recommendation.csv'
dataset = pd.read_csv(csv_path)

#Divide the dataset into features and labels
X = dataset.iloc[:, :-1].values
y = dataset.iloc[:, -1].values

#Split the dataset into training and test sets
from sklearn.model_selection import train_test_split
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size = 0.2, random_state = 0)

#Train the model using the Random Forest Classifier algorithm
from sklearn.ensemble import RandomForestClassifier
classifier = RandomForestClassifier(n_estimators = 10, criterion = 'entropy', random_state = 0)
classifier.fit(X_train, y_train)

#Get the user inputs and store them in a numpy array
#user_input = np.array([[90,42,43,21,82,6.5,203]]) - ans is rice.
user_input = np.array([[n_params,p_params,k_params,t_params,h_params,ph_params,r_params]])

#Make predictions using the trained model
predictions = classifier.predict(user_input)

#Print the predicted crop
print(str(predictions[0]))
