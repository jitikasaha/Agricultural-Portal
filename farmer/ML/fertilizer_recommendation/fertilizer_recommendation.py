import pandas as pd
import os
import sys
import warnings
warnings.filterwarnings("ignore")
from sklearn.preprocessing import LabelEncoder
from sklearn.tree import DecisionTreeClassifier

# Load the dataset
script_dir = os.path.dirname(os.path.abspath(__file__))
csv_path = os.path.join(script_dir, "fertilizer_recommendation.csv")
if not os.path.exists(csv_path):
    csv_path = "ML/fertilizer_recommendation/fertilizer_recommendation.csv"
data = pd.read_csv(csv_path)

# Label encoding for categorical features
le_soil = LabelEncoder()
data['Soil Type'] = le_soil.fit_transform(data['Soil Type'])
le_crop = LabelEncoder()
data['Crop Type'] = le_crop.fit_transform(data['Crop Type'])

# Splitting the data into input and output variables
X = data.iloc[:, :8]
y = data.iloc[:, -1]

# Training the Decision Tree Classifier model
dtc = DecisionTreeClassifier(random_state=0)
dtc.fit(X, y)

# Get the input parameters as command line arguments
jsonn = float(sys.argv[1])
jsonp = float(sys.argv[2])
jsonk = float(sys.argv[3])
jsont = float(sys.argv[4])
jsonh = float(sys.argv[5])
jsonsm = float(sys.argv[6])
jsonsoil = str(sys.argv[7]).strip('"\'')
jsoncrop = str(sys.argv[8]).strip('"\'')

soil_enc = le_soil.transform([jsonsoil])[0] if jsonsoil in le_soil.classes_ else 0
crop_enc = le_crop.transform([jsoncrop])[0] if jsoncrop in le_crop.classes_ else 0

user_input = pd.DataFrame([[jsont, jsonh, jsonsm, soil_enc, crop_enc, jsonn, jsonk, jsonp]], columns=X.columns)

fertilizer_name = dtc.predict(user_input)

# Return the prediction as a string
print(str(fertilizer_name[0]))