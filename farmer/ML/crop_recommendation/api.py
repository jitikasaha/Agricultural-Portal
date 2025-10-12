from flask import Flask, request, jsonify
import numpy as np
import pandas as pd
import joblib
from sklearn.ensemble import RandomForestClassifier

app = Flask(__name__)

# Load dataset
dataset_path = "farmer/ML/crop_recommendation/Crop_recommendation.csv"
dataset = pd.read_csv(dataset_path)

# Split dataset into features and labels
X = dataset.iloc[:, :-1].values
y = dataset.iloc[:, -1].values

# Train the model using RandomForestClassifier
classifier = RandomForestClassifier(n_estimators=10, criterion='entropy', random_state=0)
classifier.fit(X, y)

@app.route('/')
def home():
    return "Crop Recommendation API is Running!"

@app.route('/predict', methods=['POST'])
def predict():
    try:
        data = request.get_json()
        user_input = np.array([[data["N"], data["P"], data["K"], data["temperature"], 
                                data["humidity"], data["pH"], data["rainfall"]]])

        prediction = classifier.predict(user_input)
        return jsonify({"recommended_crop": prediction[0]})
    
    except Exception as e:
        return jsonify({"error": str(e)})

if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0', port=5000)
